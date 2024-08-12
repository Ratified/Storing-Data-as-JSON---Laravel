<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FootballPlayer;

class FootballPlayerController extends Controller
{
    public function index(){
        $footballPlayers = FootballPlayer::all();
        return view('welcome', compact('footballPlayers'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "course" => "required|string|max:255",
            "position" => "required|string|max:255",
            "nationality" => "required|string|max:255",
            "availability_days" => "required|array",
            "availability_days.*" => "required|string|max:255",
            "availability_times" => "required|array",
            "availability_times.*" => "required|string|max:255",
        ]);

        $availability = [];
         foreach($validatedData["availability_days"] as $key => $day){
              $availability[] = [
                "day" => $day,
                "time" => $validatedData["availability_times"][$key]
              ];
         }

         FootballPlayer::create([
            "name" => $validatedData["name"],
            "course" => $validatedData["course"],
            "position" => $validatedData["position"],
            "nationality" => $validatedData["nationality"],
            "availability_times" => json_encode($availability)
         ]);

         return redirect()->route('welcome')->with('success', 'Football player created successfully');
    }
}