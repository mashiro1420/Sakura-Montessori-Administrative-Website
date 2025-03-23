<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/Quan_ly_nhan_vien/Quan_ly_nhan_vien.css') }}">
</head>
<body>
  <div class="wrapper">
    @include('components/sidebar')
    <!-- Main content -->
    <div class="main p-4">
      <div class="content" id="content" style="margin-left: 70px;">
        <div class="container-fluid">
          <!-- Page Header -->
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật Nhân Viên</h2>
          </div>
          <div class="mb-3">
            <a class="btn btn-primary ms-2">
              <i class="fa-solid fa-rotate me-1"></i> Cập nhật thông tin bằng cấp
            </a>
            <a class="btn btn-primary ms-2">
              <i class="fa-solid fa-rotate me-1"></i> Cập nhật thông tin hôn nhân
            </a>
            <a class="btn btn-primary ms-2" href="{{url('cap_nhat_thong_tin_dan_su')}}">
              <i class="fa-solid fa-rotate me-1"></i> Cập nhật thông tin dân sự
            </a>
            <a class="btn btn-primary ms-2">
              <i class="fa-solid fa-rotate me-1"></i> Cập nhật thông tin liên hệ
            </a>
          </div>
          <!-- Form to update employee -->
          <form class="search-container" action="" method="">
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" id="ho_ten" class="form-control" placeholder="Nhập họ và tên" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Giới tính</label>
                <select id="gioi_tinh" class="form-select" required>
                  <option value="">Nam</option>
                  <option value="">Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" id="noi_sinh" class="form-control" placeholder="Nhập nơi sinh" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" id="ngay_sinh" class="form-control" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_vao_lam">Ngày vào làm</label>
                <input type="date" id="ngay_vao_lam" class="form-control">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_nghi_viec">Ngày nghỉ việc</label>
                <input type="date" id="ngay_nghi_viec" class="form-control">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="tham_nien">Thâm niên</label>
                <input type="text" id="tham_nien" class="form-control" placeholder="Nhập thâm niên">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd">Số căn cước công dân</label>
                <input type="text" id="cmnd" class="form-control" placeholder="Nhập số căn cước công dân" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_cap">Ngày cấp</label>
                <input type="date" id="ngay_cap" class="form-control" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_cap">Nơi cấp</label>
                <input type="text" id="noi_cap" class="form-control" placeholder="Nhập nơi cấp" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich">Quốc tịch</label>
                <input type="text" id="quoc_tich" class="form-control" placeholder="Nhập quốc tích" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dan_toc">Dân tộc</label>
                <input type="text" id="dan_toc" class="form-control" placeholder="Nhập dân tộc" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ton_giao">Tôn giáo</label>
                <input type="text" id="ton_giao" class="form-control" placeholder="Nhập tôn giáo" required>
              </div>
            </div>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="chuc_vu">Chức vụ</label>
                <select id="chuc_vu" class="form-select" required>
                  <option value="1">Hiệu trưởng</option>
                  <option value="2">Hiệu phó</option>
                  <option value="3">Giáo viên</option>
                  <option value="4">Kế toán trưởng</option>
                  <option value="5">Nhân viên kế toán</option>
                  <option value="6">Trưởng phòng nhân sự</option>
                  <option value="7">Nhân viên nhân sự</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="trang_thai">Trạng thái</label>
                <select id="trang_thai" class="form-select" required>
                  <option value="active">Đang làm việc</option>
                  <option value="inactive">Đã nghỉ việc</option>
                </select>
              </div>
            </div>

            <div class="action-buttons">
              <div>
                <button class="btn btn-primary">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('quan_ly_nhan_vien')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách nhân viên
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  // Ẩn hiện sidebar
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  // Nút làm mới phần thêm nhân viên
  document.getElementById('reset-btn').addEventListener('click', function () {
    const inputs = document.querySelectorAll('.search-container input, .search-container select');

    inputs.forEach(input => {
      if (input.tagName === 'SELECT') {
        input.selectedIndex = 0;
      } else {
        input.value = '';
      }
    });
  });
  </script>
</body>
</html>