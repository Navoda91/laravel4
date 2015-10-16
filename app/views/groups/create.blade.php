<!DOCTYPE html>

@include('layouts.navbar');
@include('layouts.groupbar');

<h1> Create a Group </h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'groups')) }}

    <div class="form-group">
        {{ Form::label('name', 'Group Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Group Status') }}
        <!-- {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'AWESOME', '2' => 'COOL', '3' => 'BORED'), Input::old('nerd_level'), array('class' => 'form-control')) }} -->
        {{Form::checkbox('status', null, true, array('id'=>'status'))}} Active 
        
    </div>

    {{ Form::submit('Create the Group!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>



