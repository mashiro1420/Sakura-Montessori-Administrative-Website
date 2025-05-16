<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hiển thị thanh toán</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Hiển thị thanh toán</h2>
          </div>
          <form class="search-container" action="{{url('xl_sua_bg')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Tên học sinh</label>
                <input type="text" name="ho_ten" class="form-control" value="{{ $thanh_toan->ho_ten ?? '' }}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_tao">Ngày tạo</label>
                <input type="date" name="ngay_tao" class="form-control" value="{{$thanh_toan->ngay_tao}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_thanh_toan">Ngày thanh toán</label>
                <input type="date" name="ngay_thanh_toan" class="form-control" value="{{$thanh_toan->ngay_thanh_toan}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="tong_dich_vu">Tổng dịch vụ</label>
                <input type="int" name="tong_dich_vu" class="form-control" value="{{number_format($thanh_toan->tong_dich_vu)}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="tong_hoc_phi">Tổng học phí</label>
                <input type="int" name="tong_hoc_phi" class="form-control" value="{{number_format($thanh_toan->tong_hoc_phi)}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="phat_trien">Phát triển</label>
                <input type="int" name="phat_trien" class="form-control" value="{{number_format($thanh_toan->phat_trien)}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="tong_tien">Tổng tiền</label>
                <input type="int" name="tong_tien" class="form-control" value="{{number_format($thanh_toan->tong_so_tien)}}">
              </div>
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#uploadModal">
                  Thanh toán
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
  <!-- Modal Upload File -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="import-form" action="" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Tải lên file thanh toán</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <input type="file" name="file" class="form-control" id="file-input" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Tải lên</button>
      </div>
    </form>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
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
@include('components/bao_loi')
</body>
</html>