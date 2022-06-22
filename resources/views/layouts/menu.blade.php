<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('departments') ? 'active' : '' }}">
    <a class="nav-link" href="/room_911">
        <i class="fas fa-universal-access"></i><span>ROOM_911</span>
    </a>
</li>
<li class="side-menus {{ Request::is('departments') ? 'active' : '' }}">
    <p class="nav-link">
        <span>Employees</span>
    </p>
</li>
<li class="side-menus {{ Request::is('employee') ? 'active' : '' }}">
    <a class="nav-link" href="/employee">
        <i class="fas fa-user-plus"></i>List of Employees</span>
    </a>
</li>
<li class="side-menus {{ Request::is('employee/create') ? 'active' : '' }}">
    <a class="nav-link" href="/employee/create">
        <i class="fas fa-user-plus"></i>Add Employee</span>
    </a>
</li>
<li class="side-menus {{ Request::is('import_csv') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('import') }}">
        <i class="fas fa-users"></i><span>Import List .CSV</span>
    </a>
</li>
<li class="side-menus">
    <p class="nav-link">
        <span>Departments</span>
    </p>
</li>
<li class="side-menus {{ Request::is('department') ? 'active' : '' }}">
    <a class="nav-link" href="/department">
        <i class=" fas fa-building"></i><span>List of Departments</span>
    </a>
</li>
<li class="side-menus {{ Request::is('department/create') ? 'active' : '' }}">
    <a class="nav-link" href="/department/create">
        <i class="fas fa-person-booth"></i><span>Add Departments</span>
    </a>
</li>

