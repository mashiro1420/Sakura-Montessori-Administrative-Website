<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">
      <i class="fas fa-school me-2"></i>Sakura Montessori
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{url('ph_tkb')}}"><i class="far fa-calendar-alt me-1"></i>Thời khóa biểu</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('ph_bg')}}"><i class="fas fa-tags me-1"></i>Bảng giá dịch vụ</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('ph_tx')}}"><i class="fas fa-bus me-1"></i>Tuyến xe</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('ph_td')}}"><i class="fas fa-utensils me-1"></i>Thực đơn</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-clipboard-check me-1"></i>Điểm danh
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{url('ph_diem_danh_xe_bus')}}"><i class="fas fa-bus me-2"></i>Điểm danh xe bus</a></li>
            <li><a class="dropdown-item" href="{{url('ph_diem_danh_tren_lop')}}"><i class="fas fa-chalkboard-teacher me-2"></i>Điểm danh trên lớp</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-money-bill-wave me-1"></i>Học phí</a></li>
      </ul>
    </div>
    <div class="d-flex ms-3">
      <a href="{{ url('xl_dang_xuat') }}" class="btn btn-outline-danger">
        <i class="fas fa-sign-out-alt me-1"></i>Đăng xuất
      </a>
    </div>
  </div>
</nav>