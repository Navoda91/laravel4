<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>

@include('layouts.navbar');
@include('layouts.nerdbar');

<h1>Showing {{ $nerd->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $nerd->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $nerd->email }}<br>
            <strong>Level:</strong> {{ $nerd->nerd_level }}<br>
            <strong>Groups In:</strong>{{ implode(', ', $nerd->groups->lists('name'))}} 
        </p>
    </div>

</div>
</body>
</html>