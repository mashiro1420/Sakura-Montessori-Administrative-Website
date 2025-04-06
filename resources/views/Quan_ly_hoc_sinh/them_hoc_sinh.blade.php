<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm học sinh</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Thêm học sinh</h2>
          </div>
          <div class="search-item">
            <label for="status-filter">Thêm nhiều học sinh</label>
            <form action="{{ url('import_hs') }}" method="post" enctype="multipart/form-data" id="import-form">
              @csrf
              <input type="file" name="file" id="file-input" class="d-none" required>
              <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button">Import Excel</button>
            </form>
          </div>
          <!-- Form to add new employee -->
          <form class="search-container" action="{{url('xl_them_hs')}}" method="post">
          @csrf
            <div class="filter-row">
              <h2>Thông tin cơ bản</h2>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ và tên" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nickname">Nick name</label>
                <input type="text" name="nickname" class="form-control" placeholder="Nhập nick name">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Giới tính</label>
                <select name="gioi_tinh" class="form-select" required>
                  <option value="1">Nam</option>
                  <option value="0">Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" name="ngay_sinh" class="form-control" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_nhap_hoc">Ngày nhập học</label>
                <input type="date" name="ngay_nhap_hoc" class="form-control" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich">Quốc tịch</label>
                <input type="text" name="quoc_tich" class="form-control" placeholder="Nhập quốc tịch" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngon_ngu">Ngôn ngữ</label>
                <input type="text" name="ngon_ngu" class="form-control" placeholder="Nhập ngôn ngữ" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thuong_tru">Thường trú</label>
                <input type="text" name="thuong_tru" class="form-control" placeholder="Nhập thường trú" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="loai_hoc_phi">Loại học phí</label>
                <select name="loai_hoc_phi" class="form-select" required>
                  <option value="0">Học phí kỳ</option>
                  <option value="1">Học phí năm</option>
                  <option value="2">Học phí tháng</option>
                </select>
              </div>
            </div>
            <div class="filter-row">
              <h2>Thông tin sức khỏe</h2>
              <div class="search-item d-inline-block w-25">
                <label for="can_nang">Cân nặng (KG)</label>
                <input type="number" name="can_nang" class="form-control" placeholder="Nhập cân nặng">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chieu_cao">Chiều cao (CM)</label>
                <input type="number" name="chieu_cao" class="form-control" placeholder="Nhập chiều cao">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" name="noi_sinh" class="form-control" placeholder="Nhập nơi sinh">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thong_tin_suc_khoe">Thông tin sức khỏe</label>
                <textarea type="text" name="thong_tin_suc_khoe" class="form-control" placeholder="Nhập thông tin sức khỏe"></textarea>
              </div>
            </div>
            <div class="filter-row">
              <h2>Thông tin phụ huynh</h2>
              <div>
                <div class="search-item d-inline-block w-25">
                  <label for="ho_ten_me">Họ tên mẹ</label>
                  <input type="text" name="ho_ten_me" class="form-control" placeholder="Nhập họ tên mẹ">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="sdt_me">Số điện thoại của mẹ</label>
                  <input type="text" name="sdt_me" class="form-control" placeholder="Nhập số điện thoại của mẹ">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="email_me">Email của mẹ</label>
                  <input type="email" name="email_me" class="form-control" placeholder="Nhập email của mẹ">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="nghe_nghiep_me">Nghề nghiệp của mẹ</label>
                  <input type="text" name="nghe_nghiep_me" class="form-control" placeholder="Nhập nghề nghiệp của mẹ">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="cmnd_me">Số căn cước của mẹ</label>
                  <input type="text" name="cmnd_me" class="form-control" placeholder="Nhập số căn cước của mẹ">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="nam_sinh_me">Năm sinh của mẹ</label>
                  <input type="text" name="nam_sinh_me" class="form-control" placeholder="Nhập năm sinh của mẹ">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="quoc_tich_me">Quốc tịch của mẹ</label>
                  <input type="text" name="quoc_tich_me" class="form-control" placeholder="Nhập quốc tịch của mẹ">
                </div>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten_bo">Họ tên bố</label>
                <input type="text" name="ho_ten_bo" class="form-control" placeholder="Nhập họ tên bố">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sdt_bo">Số điện thoại của bố</label>
                <input type="text" name="sdt_bo" class="form-control" placeholder="Nhập số điện thoại của bố">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="email_bo">Email của bố</label>
                <input type="email" name="email_bo" class="form-control" placeholder="Nhập email của bố">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nghe_nghiep_bo">Nghề nghiệp của bố</label>
                <input type="text" name="nghe_nghiep_bo" class="form-control" placeholder="Nhập nghề nghiệp của bố">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd_bo">Số căn cước của bố</label>
                <input type="text" name="cmnd_bo" class="form-control" placeholder="Nhập số căn cước của bố">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nam_sinh_bo">Năm sinh của bố</label>
                <input type="text" name="nam_sinh_bo" class="form-control" placeholder="Nhập năm sinh của bố">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich_bo">Quốc tịch của bố</label>
                <input type="text" name="quoc_tich_bo" class="form-control" placeholder="Nhập quốc tịch của bố">
              </div>
            </div>
            <div class="filter-row">
              <h2>Thông tin đưa đón</h2>
              <div class="search-item d-inline-block w-25">
                <label for="di_bus">Đi bus</label>
                <select name="di_bus" class="form-select" required>
                  <option value="0">Không</option>
                  <option value="1">Có</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nguoi_dua_don">Người đưa đón</label>
                <input type="text" name="nguoi_dua_don" class="form-control" placeholder="Nhập người đưa đón">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lien_he_khan">Liên hệ khẩn</label>
                <input type="text" name="lien_he_khan" class="form-control" placeholder="Nhập liên hệ khẩn">
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
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_hs')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách học sinh
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
      document.getElementById('file-input').click();  
    });

    document.getElementById('file-input').addEventListener('change', function() {
      document.getElementById('import-form').submit();  
    });
  </script>
</body>
</html>