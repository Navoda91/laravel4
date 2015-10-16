<!DOCTYPE html>

@include('layouts.navbar');
@include('layouts.groupbar');

<h1>Edit {{$group->name}} </h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Group Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Group Status') }}
        <!-- {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'AWESOME', '2' => 'COOL', '3' => 'BORED'), Input::old('nerd_level'), array('class' => 'form-control')) }} -->
        {{Form::checkbox('status');}} Active
    </div>

    {{ Form::submit('Edit the Group!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>