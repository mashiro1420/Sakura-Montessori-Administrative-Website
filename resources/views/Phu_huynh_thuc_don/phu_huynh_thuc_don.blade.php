<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thực đơn hôm nay</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/user/thuc_don.css') }}">
</head>
<body>
@include('components/navbar')
<div class="container content-container">
  <!-- Page Header -->
  <div class="page-header">
    <h2 class="page-title">Thực đơn hôm nay</h2>
    <p class="text-muted mt-2">Danh sách thực đơn hôm nay tại trường của con</p>
  </div>
  
  <!-- Search Panel -->
  <div class="search-panel">
    <div class="row g-3">
      <div class="col-md-4">
        <label for="search_tuan" class="form-label small text-muted">Tuần</label>
        <select id="search_tuan" name="search_tuan" class="form-select">
          <option value="" disabled selected>Tìm kiếm theo tuần</option>
          @foreach ($tuans as $tuan)
            <option value="{{$tuan->id}}" {{ !empty($search_tuan)&&$search_tuan==$tuan->id?"selected":"" }}>
              {{$tuan->ten_tuan}}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3 d-flex align-items-end">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end w-100">
          <button class="btn btn-pink">
            <i class="fas fa-search me-1"></i> Tìm kiếm
          </button>
          <button class="btn btn-secondary">
            <i class="fas fa-sync-alt me-1"></i> Làm mới
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="table-container">
    <div class="table-responsive">
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
            <td class="buoi_style" rowspan="2">Sáng</td>
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
            <td class="buoi_style" rowspan="5">Trưa</td>
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
            <td class="buoi_style" rowspan="2" colspan="2">Bữa ăn chiều</td>
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
            <td class="buoi_style" colspan="2">Ăn nhẹ</td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const btnReset = document.querySelector('.btn-secondary');

    btnReset.addEventListener('click', function () {
      // Xóa giá trị trong ô input tìm kiếm
      document.getElementById('search_name').value = '';

      // Đặt lại giá trị của dropdown tuần
      document.getElementById('search_tuan').selectedIndex = 0;
    });
  });
</script>
</body>
</html>
