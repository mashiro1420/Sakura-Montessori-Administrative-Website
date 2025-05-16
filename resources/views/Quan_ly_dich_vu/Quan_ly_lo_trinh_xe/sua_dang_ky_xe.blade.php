<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật lộ trình xe bus</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật lộ trình xe bus</h2>
          </div>
          <form class="search-container" action="{{url('')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tuyen_xe">Tuyến xe</label>
                <input type="text" name="tuyen_xe" class="form-control" value="{{$lo_trinh_xe->tuyen_xe}}" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay">Ngày</label>
                <input type="date" name="ngay" value="{{$lo_trinh_xe->ngay}}" class="form-control" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lai_xe">Lái xe</label>
                <select name="lai_xe" class="form-select" required>
                  @foreach($lai_xes as $lai_xe)
                    <option value="{{$lai_xe->id}}" {{$lo_trinh_xe->id_lai_xe==$nhan_vien->id?"selected":""}}>{{$lai_xe->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="monitor">Monitor</label>
                <select name="monitor" class="form-select" required>
                  @foreach($monitors as $monitor)
                    <option value="{{$monitor->id}}" {{$lo_trinh_xe->id_monitor==$nhan_vien->id?"selected":""}}>{{$monitor->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="bien_so_xe">Biển số xe</label>
                <input type="text" name="bien_so_xe" class="form-control" placeholder="Nhập biển số xe" required>
              </div>
            </div>
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_lt')}}">
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
  </script>
@include('components/bao_loi')
</body>
</html>