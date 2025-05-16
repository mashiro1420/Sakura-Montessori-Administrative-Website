<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Trường Mẫu Giáo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Thời khóa biểu</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Bảng giá dịch vụ</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tuyến xe</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Thực đơn</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Điểm danh</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Điểm danh xe bus</a></li>
              <li><a class="dropdown-item" href="#">Điểm danh trên lớp</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="#">Học phí</a></li>
        </ul>
      </div>
      <div class="d-flex">
        <a href="{{ url('xl_dang_xuat') }}" class="btn btn-outline-danger">Đăng xuất</a>
      </div>
    </div>
  </nav>