<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('admin/assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">

                <div class="nav-profile-text">
                  <p class="mb-1 text-black"></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{route('profile')}}">
                  <i class="mdi mdi-contacts me-2 text-success"></i> my profile </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item mdi mdi-logout" href="{{route('logout')}}" >
                   logout
                </a>

              </div>
            </li>

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-img">
                      <img src="{{asset('admin/assets/images/يونس.jpg')}}" alt="image">
                      <span class="availability-status online"></span>
                  </div>
                  <div class="nav-profile-text">
                    <p class="mb-1 text-black">{{Auth::user()->name}}</p>
                  </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="{{route('profile')}}">
                    <i class="mdi mdi-contacts me-2 text-success"></i> my profile </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item mdi mdi-logout" href="{{route('logout')}}" >
                     logout
                  </a>

                </div>
              </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('admin/assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('admin/assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('admin/assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav flex-column">
                <!-- Profile Section -->
                <li class="nav-item nav-profile">
                    <a href="{{route('profile')}}" class="nav-link">
                      <div class="nav-profile-image">
                        <img src="{{asset('admin/assets/images/يونس.jpg')}}" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                      </div>
                      <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                        <span class="text-secondary text-small">Fullstack Developer</span>
                      </div>
                      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                  </li>

                <hr class="sidebar-divider">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="{{ route('AdminHomePage') }}">
                        <i class="mdi mdi-view-dashboard-outline me-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @role('super_admin')
                <!-- User Management -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#users-menu">
                        <i class="mdi mdi-account-group me-2"></i>
                        <span>Users Management</span>
                        <i class="mdi mdi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="users-menu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('add_user') }}"><i class="mdi mdi-account-plus me-2"></i> Add User</a></li>
                            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('view_users') }}"><i class="mdi mdi-account-box-multiple me-2"></i> View Users</a></li>
                        </ul>
                    </div>
                </li>
                @endrole

                @role(['super_admin', 'content_manager'])
                <!-- Articles -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#articles-menu">
                        <i class="mdi mdi-file-document-box-outline me-2"></i>
                        <span>Articles</span>
                        <i class="mdi mdi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="articles-menu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('add_article') }}"><i class="mdi mdi-file-plus me-2"></i> Add Article</a></li>
                            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('view_articles') }}"><i class="mdi mdi-file-multiple me-2"></i> View Articles</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#category-menu">
                        <i class="mdi mdi-tag-multiple-outline me-2"></i>
                        <span>Categories</span>
                        <i class="mdi mdi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="category-menu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('add_category') }}"><i class="mdi mdi-tag-plus me-2"></i> Add Category</a></li>
                            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('view_categories') }}"><i class="mdi mdi-tag-multiple me-2"></i> View Categories</a></li>
                        </ul>
                    </div>
                </li>
                @endrole

                <!-- Settings -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#">
                        <i class="mdi mdi-cog-outline me-2"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-danger" href="{{ route('logout') }}">
                        <i class="mdi mdi-logout me-2"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
@yield('content')
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
