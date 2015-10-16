<!-- app/views/nerds/edit.blade.php -->

<!DOCTYPE html>

@include('layouts.navbar');
@include('layouts.nerdbar');

<h1>Edit {{ $nerd->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($nerd, array('route' => array('nerds.update', $nerd->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
    </div>
     <div>
        {{ Form::label('nerd_groups','Select Groups')}}
        {{ Form::select('nerd_groups[]', $group_list, Input::old('nerd_groups'), array('multiple'=>'multiple', 'class' => 'form-control') )}}
    </div>


    {{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>