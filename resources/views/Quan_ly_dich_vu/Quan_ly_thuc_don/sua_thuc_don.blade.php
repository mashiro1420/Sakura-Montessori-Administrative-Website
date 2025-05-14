<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thực đơn</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật thực đơn</h2>
          </div> 
          <form class="search-container" action="" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tuan">Tuần</label>
                <select id="position-filter" name = "tuan" class="form-select" required> 
                  <option value="" disable selected>Tất cả các tuần</option>
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}">Tuần thứ {{$tuan->tuan}} năm {{$tuan->nam}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thu">Thứ</label>
                <input type="text" name="thu" class="form-control" value="" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sang1">Bữa sáng 1</label>
                <input type="text" name="sang1" class="form-control" value="" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sang2">Bữa sáng 2</label>
                <input type="text" name="sang2" class="form-control" value="" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chinh">Món chính</label>
                <input type="text" name="chinh" class="form-control" value="">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="rau">Rau</label>
                <input type="text" name="rau" class="form-control" value="">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="canh">Canh</label>
                <input type="text" name="canh" class="form-control" value="" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="com">Cơm</label>
                <input type="text" name="com" class="form-control" value="" > 
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chao">Cháo</label>
                <input type="text" name="chao" class="form-control" value="">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chieu1">Bữa chiều 1</label>
                <input type="text" name="chieu1" class="form-control" value="">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chieu2">Bữa chiều 2</label>
                <input type="text" name="chieu2" class="form-control" value="" >
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nhe">Bữa nhẹ</label>
                <input type="text" name="nhe" class="form-control" value="" >
              </div>
            </div>
            </div>

            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_td')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách thực đơn
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