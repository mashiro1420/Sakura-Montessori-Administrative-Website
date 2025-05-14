<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật tài liệu giảng dạy</title>
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
    <div class="main p-4">
      <div class="content" id="content" style="margin-left: 70px;">
        <div class="container-fluid">
          <!-- Page Header -->
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật tài liệu giảng dạy</h2>
          </div>
          <!-- Form to add new employee -->
          <div class="search-item">
              <label for="status-filter">Cập nhật nhiều tài liệu giảng dạy</label>
              <form action="{{ url('/import_nv') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <input type="file" name="file" id="file-input" class="d-none" required>
                <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button">Import Excel</button>
              </form>
            </div>
          <form class="search-container" action="" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tuan">Tuần</label>
                <select id="position-filter" name = "tuan" class="form-select" readonly> 
                  <option value="" disable selected>Chọn tuần</option>
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}">Tuần thứ {{$tuan->tuan}} năm {{$tuan->nam}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky">Kỳ</label>
                <select id="position-filter" name="ky" class="form-select" readonly> 
                  <option value="" disable selected>Chọn kỳ</option>
                  @foreach($kys as $ky)
                    <option value="{{$ky->id}}">{{$ky->ten_ky}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky">Lớp</label>
                <select id="position-filter" name="ky" class="form-select" readonly> 
                  <option value="" disable selected>Chọn lớp</option>
                  @foreach($lops as $lop)
                    <option value="{{$lop->id}}">{{$lop->ten_lop}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="link_giao_an">Link giáo án</label>
                <input type="link" name="link_giao_an" value="{{$tl_giang_day->link_giao_an}}" class="form-control" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="mo_ta">Mô tả</label>
                <textarea name="mo_ta" id="" col="30" row="10" class="form-control">
                    {{$tl_giang_day->mo_ta}}
                </textarea>
              </div>
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
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_tlgd')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách tài liệu giảng dạy
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
  // Nút làm mới phần Cập nhật tài liệu giảng dạy
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
@include('components/bao_loi')
</body>
</html>