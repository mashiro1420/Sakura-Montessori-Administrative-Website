<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm nhân viên</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Thêm nhân viên</h2>
          </div>
          <!-- Form to add new employee -->
          <div class="search-item">
              <label for="status-filter">Thêm nhiều nhân viên</label>
              <form action="{{ url('/import_nv') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <input type="file" name="file" id="file-input" class="d-none" required>
                <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button">Import Excel</button>
              </form>
            </div>
          <form class="search-container" action="{{url('xl_them_nv')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ và tên" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Giới tính</label>
                <select name="gioi_tinh" class="form-select">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" name="noi_sinh" class="form-control" placeholder="Nhập nơi sinh" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" name="ngay_sinh" class="form-control" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_vao_lam">Ngày vào làm</label>
                <input type="date" name="ngay_vao_lam" class="form-control">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd">Số căn cước công dân</label>
                <input type="number" name="cmnd" class="form-control" placeholder="Nhập số căn cước công dân" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_cap">Ngày cấp</label>
                <input type="date" name="ngay_cap" class="form-control" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_cap">Nơi cấp</label>
                <input type="text" name="noi_cap" class="form-control" placeholder="Nhập nơi cấp" > 
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich">Quốc tịch</label>
                <input type="text" name="quoc_tich" class="form-control" placeholder="Nhập quốc tích" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dan_toc">Dân tộc</label>
                <input type="text" name="dan_toc" class="form-control" placeholder="Nhập dân tộc" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ton_giao">Tôn giáo</label>
                <input type="text" name="ton_giao" class="form-control" placeholder="Nhập tôn giáo" >
              </div>
            </div>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="chuc_vu">Chức vụ</label>
                <select name="chuc_vu" class="form-select">
                  @foreach($chuc_vus as $chuc_vu)
                    <option value="{{$chuc_vu->id}}">{{$chuc_vu->ten_chuc_vu}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_nv')}}">
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
    <script>
      document.getElementById('import-button').addEventListener('click', function() {
        document.getElementById('file-input').click(); // Mở file picker khi nhấn nút
      });
  
      document.getElementById('file-input').addEventListener('change', function() {
        document.getElementById('import-form').submit(); // Tự động submit form khi chọn file
      });
    </script>
</body>
</html>