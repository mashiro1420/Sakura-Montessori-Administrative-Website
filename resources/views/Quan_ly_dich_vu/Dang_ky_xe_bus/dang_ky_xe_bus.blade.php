<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký xe bus cho học sinh</title>
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
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Đăng ký xe bus cho học sinh</h2>
          </div>
          <form class="search-container" action="" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="hoc_sinh">Học sinh</label required>
                <select id="hoc_sinh" name = "hoc_sinh" class="form-select">
                    @foreach ($hoc_sinhs as $hoc_sinh)
                        <option value="{{$hoc_sinh->id}}">
                            {{$hoc_sinh->ho_ten}}
                        </option>
                    @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-50">
                <label for="tuyen_xe">Tuyến xe</label>
                <input type="text" id="tuyen_xe" name = "tuyen_xe" class="form-control" placeholder="Nhập tuyến xe">
              </div>
              <div class="search-item d-inline-block w-50">
                <label for="diem_don">Điểm đón</label>
                <input type="text" id="diem_don" name = "diem_don" class="form-control" placeholder="Nhập điểm đón">
              </div>
              <div class="search-item d-inline-block w-50">
                <label for="sang">Giờ sáng</label>
                <input type="time" id="sang" name = "sang" class="form-control" placeholder="Nhập giờ sáng">
              </div>
              <div class="search-item d-inline-block w-50">
                <label for="toi">Giờ tối</label>
                <input type="time" id="toi" name = "toi" class="form-control" placeholder="Nhập giờ tối">
              </div>
              <div class="search-item d-inline-block w-50">
                <label for="so_km">Số km/label>
                <input type="number" id="so_km" name = "so_km" class="form-control" placeholder="Nhập số km">
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
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_dk_bus_hs')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách
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
  // Nút làm mới phần Đăng ký xe bus cho học sinh
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