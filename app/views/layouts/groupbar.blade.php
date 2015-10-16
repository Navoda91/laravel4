<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('groups') }}">Groups</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('groups') }}">View All Groups</a></li>
        <li><a href="{{ URL::to('groups/create') }}">Create a Group</a>
    </ul>
</nav>