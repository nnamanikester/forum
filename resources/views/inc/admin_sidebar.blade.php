<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Manage Users</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="usersDropdown">
            <a class="dropdown-item" href="{{route('users.index')}}"><i class="fas fa-users"></i> All Users</a>
            <a class="dropdown-item" href="{{route('roles.users', 1)}}"><i class="fas fa-user-shield"></i> Administrators</a>
            <a class="dropdown-item" href="{{route('roles.users', 2)}}"><i class="fas fa-user-clock"></i> Moderators</a>
            <a class="dropdown-item" href="{{route('roles.users', 3)}}"><i class="fas fa-user-astronaut"></i> Subscribers</a>
            <a class="dropdown-item" href="{{route('users.active')}}"><i class="fas fa-check"></i> Active</a>
            <a class="dropdown-item" href="{{route('users.pending')}}"><i class="fas fa-info-circle"></i> Pending</a>
            <a class="dropdown-item" href="{{route('users.blocked')}}"><i class="fas fa-ban"></i> Blocked</a>
        </div>
    </li>

    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="threadsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-reply"></i>
            <span>Manage Threads</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="threadsDropdown">
            <a class="dropdown-item" href="{{route('threads.index')}}"><i class="fas fa-reply-all"></i> All Threads</a>
            <a class="dropdown-item" href="{{route('threads.approved')}}"><i class="fas fa-check"></i> Approved Threads</a>
            <a class="dropdown-item" href="{{route('threads.pending')}}"><i class="fas fa-info-circle"></i> Pending Threads</a>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('categories.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Manage Categories</span>
        </a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="{{route('levels.index')}}">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Manage Levels</span>
        </a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="{{route('roles.index')}}">
            <i class="fab fa-fw fa-joomla"></i>
            <span>Manage Roles</span>
        </a>
    </li>



    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
</ul>