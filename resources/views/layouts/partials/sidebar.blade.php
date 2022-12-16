<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{setActive('/')}}">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{setActive('patients')}} {{setActive('patients/*')}}">
        <a class="nav-link" href="{{route('patient.index')}}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Patients</span>
        </a>
      </li>
      <li class="nav-item {{setActive('settings')}}">
        <a class="nav-link" href="{{route('setting.index')}}">
          <i class="icon-head menu-icon ti-key"></i>
          <span class="menu-title">Change Password</span>
        </a>
      </li>
    </ul>
</nav>