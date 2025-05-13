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
          <a href="ql_dm_chuc_vu" class="sidebar-link">Danh mục chức vụ</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_chuyen_nganh" class="sidebar-link">Danh mục chuyên ngành</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_dich_vu" class="sidebar-link">Danh mục dịch vụ</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_he_dao_tao" class="sidebar-link">Danh mục hệ đào tạo</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_khoa_hoc" class="sidebar-link">Danh mục khóa học</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_khoi" class="sidebar-link">Danh mục khối</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_lop" class="sidebar-link">Danh mục lớp học</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_mon_hoc" class="sidebar-link">Danh mục môn học</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_phong_hoc" class="sidebar-link">Danh mục phòng học</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dm_quyen" class="sidebar-link">Danh mục quyền</a>
        </li>
      </ul>
    </li>
    <li class="sidebar-item">
      <a href="#" class="sidebar-link">
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
      <a href="{{url('ql_phan_lop')}}" class="sidebar-link">
        <i class="fa-solid fa-chalkboard"></i>
        <span class="text">Quản lý phân lớp</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{url('ql_tkb')}}" class="sidebar-link">
        <i class="fa-solid fa-calendar-days"></i>
        <span class="text">Quản lý thời khóa biểu</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth2"
        aria-expanded="false" aria-controls="auth2">
        <i class="fa-solid fa-users-rays"></i>
        <span class="text">Quản lý dịch vụ</span>
      </a>
      <ul id="auth2" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        <li class="sidebar-item">
          <a href="{{url('ql_lt')}}" class="sidebar-link">Quản lý lộ trình xe</a>
        </li>
        <li class="sidebar-item">
          <a href="{{url('ql_bg')}}" class="sidebar-link">Quản lý bảng giá</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_td" class="sidebar-link">Quản lý thực đơn</a>
        </li>
        <li class="sidebar-item">
          <a href="ql_dk_bus_hs" class="sidebar-link">Quản lý đăng ký xe bus</a>
        </li>
      </ul>
    </li>
    <li class="sidebar-item">
      <a href="#" class="sidebar-link">
        <i class="fa-solid fa-chart-pie"></i>
        <span class="text">Thống kê báo cáo</span>
      </a>
    </li>
  </ul>
  <div class="sidebar-footer">
    <a href="{{route('cai_dat_tk')}}" class="sidebar-link">
      <i class="lni lni-gears-3"></i>
      <span>Cài đặt tài khoản</span>
    </a>
    <a href="{{url('xl_dang_xuat')}}" class="sidebar-link">
      <i class="lni lni-exit"></i>
      <span>Logout</span>
    </a>
  </div>
</aside> 