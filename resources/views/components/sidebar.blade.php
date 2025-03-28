<aside id="sidebar">
  <div class="d-flex">
    <button class="toggle-btn" type="button">
      <i class="lni lni-grid-alt"></i>
    </button>
    <div class="sidebar-logo">
      <a href="#">Admin Page</a>
    </div>
  </div>
  <ul class="sidebar-nav">
    <li class="sidebar-item">
      <a href="{{url('ql_tk')}}" class="sidebar-link">
        <i class="fa-solid fa-user"></i>
        <span class="text">Quản lý tài khoản</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa-solid fa-table-list"></i>
        <span class="text">Quản lý danh mục</span>
      </a>
      <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        <li class="sidebar-item">
          <a href="ql_dm_chuc_vu" class="sidebar-link">Danh mục khóa học</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục hệ đào tạo</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục bằng cấp trình độ</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục khối</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục lớp học</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục chức vụ</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục chương trình
            học</a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">Danh mục phòng học</a>
        </li>
      </ul>
    </li>
    <li class="sidebar-item">
      <a href="{{url('quan_ly_dich_vu_dao_tao')}}" class="sidebar-link">
        <i class="fa-solid fa-school"></i>
        <span class="text">Quản lý dịch vụ đào tạo</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{url('ql_nv')}}" class="sidebar-link">
        <i class="fa-solid fa-chalkboard-user"></i>
        <span class="text">Quản lý nhân viên</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{url('ql_hs')}}" class="sidebar-link">
        <i class="fa-solid fa-graduation-cap"></i>
        <span class="text">Quản lý học sinh</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="#" class="sidebar-link">
        <i class="fa-solid fa-chart-pie"></i>
        <span class="text">Thống kê báo cáo</span>
      </a>
    </li>
  </ul>
  <div class="sidebar-footer">
    <a href="{{url('xl_dang_xuat')}}" class="sidebar-link">
      <i class="lni lni-exit"></i>
      <span>Logout</span>
    </a>
  </div>
</aside> 