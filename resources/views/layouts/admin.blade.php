@php
    use App\Models\UserModel;

    
    $data = Cache::remember('dataUser', 60, function () {
        $id = $_SESSION['VERSION_USER'];
        $user = new UserModel();
          return $user->getUser($id);
    }); 
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css')}}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('admin.index')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="#" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{URL::asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Adminn</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-between">
          <div class="image">
            <img src="{{ URL::asset('storage/'.$data->image)}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{$data->full_name}}</a>
          </div>
          <a href="{{route('admin.logout')}}"><i class="fa-solid fa-right-from-bracket" style="color: #FFF; border: 1px solid #fff; padding:10px; border-radius:50%;" ></i></a>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fa-regular fa-user mr-2"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('users.add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm người dùng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('permission.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Phân quyền</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-book mr-2"></i>
                <p>
                  Products
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('category.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh mục</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('product.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sản phẩm</p>
                  </a>
                </li>
              </ul>
              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-cart-shopping mr-1"></i>
                <p>
                  Cart
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đơn hàng</p>
                  </a>
                </li>
              </ul>
              
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-display mr-1"></i>
                <p>
                  Display
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slide trang chủ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Giới thiệu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nội dung trang chủ</p>
                  </a>
                </li>
              </ul>
              
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <div class="spinner-box">
      <div class="pulse-container">  
        <div class="pulse-bubble pulse-bubble-1"></div>
        <div class="pulse-bubble pulse-bubble-2"></div>
        <div class="pulse-bubble pulse-bubble-3"></div>
      </div>
    </div>


      <!-- jQuery -->
      <script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- ChartJS -->
      <script src="{{URL::asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
      <!-- Sparkline -->
      <script src="{{URL::asset('assets/plugins/sparklines/sparkline.js')}}"></script>
      <!-- JQVMap -->
      <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
      <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{URL::asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
      <!-- daterangepicker -->
      <script src="{{URL::asset('assets/plugins/moment/moment.min.js')}}"></script>
      <script src="{{URL::asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="{{URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
      <!-- Summernote -->
      <script src="{{URL::asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
      <!-- overlayScrollbars -->
      <script src="{{URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{URL::asset('assets/dist/js/adminlte.js')}}"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{URL::asset('assets/dist/js/pages/dashboard.js')}}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{URL::asset('assets/dist/js/demo.js')}}"></script>

      <script src="{{URL::asset('assets/js/event.js')}}"></script>

      <script src="{{URL::asset('assets/ckeditor/ckeditor.js')}}"></script>
      <script type="text/javascript">
          CKEDITOR.replace('noidung');
          CKEDITOR.replace('noidung1');
          CKEDITOR.replace('noidung2');
      </script>
      
</body>

</html>