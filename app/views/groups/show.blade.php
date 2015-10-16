<!DOCTYPE html>

@include('layouts.navbar');
@include('layouts.groupbar');


<h1>Showing {{ $group->name }}</h1>

 <div class="jumbotron text-center">
        <h2>{{ $group->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $group->description }}<br>
            <strong>Status:</strong> {{ ($group->status == 1) ? 'Active' : 'Inactive' }}
        </p>
    </div>

</div>
</body>
</html>




