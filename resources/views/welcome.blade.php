<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storing Data As JSON</title>
</head>
<body>
    <form action="{{ route('football-players.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="course">Course:</label>
            <input type="text" name="course" id="course" required>
        </div>
        <div>
            <label for="position">Position:</label>
            <input type="text" name="position" id="position" required>
        </div>
        <div>
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" required>
        </div>
        
        <div id="availability-times-container">
            <label for="availability_times">Availability Times:</label>
            <div class="availability-time">
                <input type="text" name="availability_days[]" placeholder="e.g., Monday" required>
                <input type="text" name="availability_times[]" placeholder="e.g., 9-11 AM" required>
            </div>
        </div>
        
        <button type="button" id="add-time">Add More Availability Times</button>
        
        <button type="submit">Submit</button>
    </form>

    <h1>Football Players</h1>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Position</th>
                <th>Nationality</th>
                <th>Availability Times</th>
            </tr>
        </thead>
        <tbody>
            @foreach($footballPlayers as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->course }}</td>
                    <td>{{ $player->position }}</td>
                    <td>{{ $player->nationality }}</td>
                    <td>
                        @foreach(json_decode($player->availability_times, true) as $availability)
                            {{ $availability['day'] }}: {{ $availability['time'] }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <script>
        document.getElementById('add-time').addEventListener('click', function () {
            var container = document.getElementById('availability-times-container');
            var newField = document.createElement('div');
            newField.classList.add('availability-time');
            newField.innerHTML = `
                <input type="text" name="availability_days[]" placeholder="e.g., Wednesday" required>
                <input type="text" name="availability_times[]" placeholder="e.g., 2-4 PM" required>
            `;
            container.appendChild(newField);
        });
    </script>
    
    
</body>
</html>