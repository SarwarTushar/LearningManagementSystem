<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">

    <span class="brand-text font-weight-light">Learning Management</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

        <li class="nav-item ">
          <a href="{{route('category.index')}}" class="nav-link {{Request::is('category') ? 'active' : ''}}">
            <i class="fas fa-book-open"></i>
            <p>
              Category
            </p>
          </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('course.index')}}" class="nav-link {{Request::is('course') ? 'active' : ''}}">
              <i class="fas fa-list"></i>
              <p>
                Course
              </p>
            </a>
          </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
