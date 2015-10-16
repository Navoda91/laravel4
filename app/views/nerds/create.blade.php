<!-- app/views/nerds/create.blade.php -->

<!DOCTYPE html>

@include('layouts.navbar');
@include('layouts.nerdbar');

<h1>Create a Nerd</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'nerds')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
    </div>

    <div>
        {{ Form::label('nerd_groups','Select Groups')}}
        {{ Form::select('nerd_groups[]', $group_list, Input::old('nerd_groups'), array('multiple'=>'multiple', 'class' => 'form-control') )}}
    </div>

    <div> 
    <br/> 
    {{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}
    </div>
    

{{ Form::close() }}

</div>
</body>
</html>
