<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật bảng giá</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật bảng giá</h2>
          </div>
          <form class="search-container" action="{{url('xl_sua_bg')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="dich_vu">Tên loại dịch vụ</label required>
                <select id="dich_vu" name = "dich_vu" class="form-select">
                    @foreach ($dich_vus as $dich_vu)
                        <option value="{{$dich_vu->id}}" {{ $bang_gia->id_dich_vu==$dich_vu->id?"selected":"" }}>
                            {{$dich_vu->ten_dich_vu}}
                        </option>
                    @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ten_gia">Tên dịch vụ</label>
                <input type="text" name="ten_gia" class="form-control" value="{{$bang_gia->ten_gia}}" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gia">Giá</label>
                <input type="int" name="gia" class="form-control" value="{{$bang_gia->gia}}" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dinh_nghia">Định nghĩa</label>
                <textarea name="dinh_nghia" id="dinh_nghia" class="form-control" cols="30" rows="5">{{$bang_gia->dinh_nghia}}</textarea>
              </div>

            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_bg')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách bảng giá
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