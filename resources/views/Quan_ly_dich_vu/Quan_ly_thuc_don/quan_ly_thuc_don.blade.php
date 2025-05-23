<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý thực đơn</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý thực đơn</h2>
          </div>
          
          <!-- Search and Filter Section -->
          <form class="search-container" action="{{url('ql_td')}}" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tuan_search">Tuần</label>
                <select id="position-filter" name = "tuan_search" class="form-select">
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}"{{ $tuan->id==$tuan_search?"selected":"" }}>Tuần thứ {{$tuan->tuan}} năm {{$tuan->nam}}</option>
                  @endforeach
                </select>
              </div>
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary">
                  <i class="fa-solid fa-search me-1"></i> Tìm kiếm
                </button>
                <button type="button" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
              </form>
                <form action="{{ url('import_menu') }}" method="post" enctype="multipart/form-data" id="import-form">
                  @csrf
                  <input type="file" name="file" id="file-input" class="d-none" required>
                  <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button"><i class="fa-solid fa-file-import me-1"></i>Import Excel</button>
                </form>
              </div>
            </div>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Buổi</th>
                  <th>Tên bữa</th>
                  <th>Thứ 2</th>
                  <th>Thứ 3</th>
                  <th>Thứ 4</th>
                  <th>Thứ 5</th>
                  <th>Thứ 6</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2">Sáng</td>
                  <td>Bữa sáng 1</td>
                  <td>{{$thuc_don[0]->sang1}}</td>
                  <td>{{$thuc_don[1]->sang1}}</td>
                  <td>{{$thuc_don[2]->sang1}}</td>
                  <td>{{$thuc_don[3]->sang1}}</td>
                  <td>{{$thuc_don[4]->sang1}}</td>
                </tr>
                <tr>
                  <td>Bữa sáng 2</td>
                  <td>{{$thuc_don[0]->sang2}}</td>
                  <td>{{$thuc_don[1]->sang2}}</td>
                  <td>{{$thuc_don[2]->sang2}}</td>
                  <td>{{$thuc_don[3]->sang2}}</td>
                  <td>{{$thuc_don[4]->sang2}}</td>
                </tr>
                <tr>
                  <td rowspan="5">Trưa</td>
                  <td>Món chính</td>
                  <td>{{$thuc_don[0]->chinh}}</td>
                  <td>{{$thuc_don[1]->chinh}}</td>
                  <td>{{$thuc_don[2]->chinh}}</td>
                  <td>{{$thuc_don[3]->chinh}}</td>
                  <td>{{$thuc_don[4]->chinh}}</td>
                </tr>
                <tr>
                  <td>Món rau</td>
                  <td>{{$thuc_don[0]->rau}}</td>
                  <td>{{$thuc_don[1]->rau}}</td>
                  <td>{{$thuc_don[2]->rau}}</td>
                  <td>{{$thuc_don[3]->rau}}</td>
                  <td>{{$thuc_don[4]->rau}}</td>
                </tr>
                <tr>
                  <td>Món canh</td>
                  <td>{{$thuc_don[0]->canh}}</td>
                  <td>{{$thuc_don[1]->canh}}</td>
                  <td>{{$thuc_don[2]->canh}}</td>
                  <td>{{$thuc_don[3]->canh}}</td>
                  <td>{{$thuc_don[4]->canh}}</td>
                </tr>
                <tr>
                  <td>Cơm trắng</td>
                  <td>{{$thuc_don[0]->com}}</td>
                  <td>{{$thuc_don[1]->com}}</td>
                  <td>{{$thuc_don[2]->com}}</td>
                  <td>{{$thuc_don[3]->com}}</td>
                  <td>{{$thuc_don[4]->com}}</td>
                </tr>
                <tr>
                  <td>Cháo</td>
                  <td>{{$thuc_don[0]->chao}}</td>
                  <td>{{$thuc_don[1]->chao}}</td>
                  <td>{{$thuc_don[2]->chao}}</td>
                  <td>{{$thuc_don[3]->chao}}</td>
                  <td>{{$thuc_don[4]->chao}}</td>
                </tr>
                <tr>
                  <td rowspan="2" colspan="2">Bữa ăn chiều</td>
                  <td>{{$thuc_don[0]->chieu1}}</td>
                  <td>{{$thuc_don[1]->chieu1}}</td>
                  <td>{{$thuc_don[2]->chieu1}}</td>
                  <td>{{$thuc_don[3]->chieu1}}</td>
                  <td>{{$thuc_don[4]->chieu1}}</td>
                </tr>
                <tr>
                  <td>{{$thuc_don[0]->chieu2}}</td>
                  <td>{{$thuc_don[1]->chieu2}}</td>
                  <td>{{$thuc_don[2]->chieu2}}</td>
                  <td>{{$thuc_don[3]->chieu2}}</td>
                  <td>{{$thuc_don[4]->chieu2}}</td>
                </tr>
                <tr>
                  <td colspan="2">Ăn nhẹ</td>
                  <td>{{$thuc_don[0]->nhe}}</td>
                  <td>{{$thuc_don[1]->nhe}}</td>
                  <td>{{$thuc_don[2]->nhe}}</td>
                  <td>{{$thuc_don[3]->nhe}}</td>
                  <td>{{$thuc_don[4]->nhe}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          
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
   
  document.getElementById('reset-btn').addEventListener('click', function () {
    window.location.href = '{{ url("ql_td") }}';
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