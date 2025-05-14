<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thời khóa biểu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
</head>
<body>
@include('components/navbar')
  <!-- Title & Filter -->
  <div class="container mt-4">
    <h2 class="text-center">Thời khóa biểu</h2>
    <div class="row my-3">
      <div class="col-md-4"> 
        <select id="position-filter" name = "tuan" class="form-select">
            <option value="" disable selected>Tất cả các tuần</option>
            @foreach($tuans as $tuan)
            <option value="{{$tuan->id}}">Tuần thứ {{$tuan->tuan}} năm {{$tuan->nam}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-md-8 text-end">
        <button class="btn btn-pink me-2"><i class="fas fa-search"></i> Tìm kiếm</button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tiết / Thứ</th>
            <th>Thứ 2</th>
            <th>Thứ 3</th>
            <th>Thứ 4</th>
            <th>Thứ 5</th>
            <th>Thứ 6</th>
          </tr>
        </thead>
        <tbody>
          <% for (let i = 1; i <= 11; i++) { %>
          <tr>
            <td>Tiết <%= i %></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <% } %>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
