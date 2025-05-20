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
        <li class="nav-item"><a class="nav-link" href="{{url('ph_thanh_toan')}}"><i class="fas fa-money-bill-wave me-1"></i>Học phí</a></li>
      </ul>
    </div>
    <div class="dropdown ms-3">
      <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--primary-dark) !important;">
        <i class="fas fa-user-circle fa-2x text-primary" style="color: var(--primary-dark) !important;"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li>
          <a class="dropdown-item" href="{{ url('ph_tai_khoan') }}">
            <i class="fas fa-id-badge me-2"></i>Chi tiết tài khoản
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ url('xl_dang_xuat') }}">
            <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>