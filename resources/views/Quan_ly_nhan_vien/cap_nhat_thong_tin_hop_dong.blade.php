<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin hợp đồng</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật thông tin hợp đồng</h2>
          </div>
          <!-- Form to add new employee -->
          <form class="search-container" action="{{url('xl_tthd')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="id">Mã nhân viên</label>
                <input type="text" name="id" class="form-control" value="{{ $nhan_vien->id }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="loai_hd">Loại hợp đồng</label>
                <input type="text" name="loai_hd" class="form-control" value="{{ $hop_dong->loai_hd }}" placeholder="Nhập loại hợp đồng" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="so_hd">Số hợp đồng</label>
                <input type="text" name="so_hd" class="form-control" value="{{ $hop_dong->so_hd }}" placeholder="Nhập số hợp đồng" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_ky">Ngày ký hợp đồng</label>
                <input type="date" name="ngay_ky" class="form-control" value="{{ $hop_dong->ngay_ky }}" placeholder="Nhập email riêng" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_ket_thuc">Ngày kết thúc hợp đồng</label>
                <input type="date" name="ngay_ket_thuc" class="form-control" value="{{ $hop_dong->ngay_ket_thuc }}" placeholder="Nhập email nội bộ" required>
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
                <a class="btn btn-outline-secondary ms-2" href="{{route('sua_nv',['id' => $nhan_vien->id])}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
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
</body>
</html>