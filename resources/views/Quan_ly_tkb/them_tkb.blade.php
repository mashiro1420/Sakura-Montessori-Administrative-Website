<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm thời khóa biểu</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Thêm thời khóa biểu</h2>
          </div>
          <!-- Form to add new employee -->
          <div class="search-item">
                <label for="status-filter">Thêm nhiều thời khóa biểu</label>
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
                <input type="text" name="tuan" value-"" id="file-input" class="d-none" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Lớp</label>
                <select id="position-filter" name = "phan_lop" class="form-select" required >
                  <option value="" disable selected>Chọn lớp</option>
                  @foreach($phan_lops as $phan_lop)
                    <option value="{{$phan_lop->id}}" >{{$phan_lop->id}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thu">Thứ</label>
                <input type="text" name="thu" class="form-control" placeholder="Nhập thứ trong tuần" >
              </div>
              @foreach([
                ['name' => 'tiet1', 'label' => 'Tiết 1', 'for' => 'tiet1', 'placeholder' => 'Nhập tiết 1'],
                ['name' => 'tiet2', 'label' => 'Tiết 2', 'for' => 'tiet2', 'placeholder' => 'Nhập tiết 2'],
                ['name' => 'tiet3', 'label' => 'Tiết 3', 'for' => 'tiet3', 'placeholder' => 'Nhập tiết 3'],
                ['name' => 'tiet4', 'label' => 'Tiết 4', 'for' => 'tiet4', 'placeholder' => 'Nhập tiết 4'],
                ['name' => 'tiet5', 'label' => 'Tiết 5', 'for' => 'tiet5', 'placeholder' => 'Nhập tiết 5'],
                ['name' => 'tiet6', 'label' => 'Tiết 6', 'for' => 'tiet6', 'placeholder' => 'Nhập tiết 6'],
                ['name' => 'tiet7', 'label' => 'Tiết 7', 'for' => 'tiet7', 'placeholder' => 'Nhập tiết 7'],
                ['name' => 'tiet8', 'label' => 'Tiết 8', 'for' => 'tiet8', 'placeholder' => 'Nhập tiết 8'],
                ['name' => 'tiet9', 'label' => 'Tiết 9', 'for' => 'tiet9', 'placeholder' => 'Nhập tiết 9'],
                ['name' => 'tiet10', 'label' => 'Tiết 10', 'for' => 'tiet10', 'placeholder' => 'Nhập tiết 10'],
                ['name' => 'tiet11', 'label' => 'Tiết 11', 'for' => 'tiet11', 'placeholder' => 'Nhập tiết 11']
                ] as $field)
                <div class="search-item d-inline-block w-25">
                    <label for="{{$field['for']}}">{{$field['label']}}</label>
                    <input type="text" name="{{$field['name']}}" class="form-control" placeholder="{{$field['placeholder']}}" >
                </div>
                @endforeach
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
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_tkb')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách thời khóa biểu
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
  // Nút làm mới phần thêm thời khóa biểu
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