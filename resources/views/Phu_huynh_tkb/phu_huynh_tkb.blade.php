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
<div class="container content-container">
  <!-- Page Header -->
  <div class="page-header">
    <h2 class="page-title">Thời khóa biểu</h2>
    <p class="text-muted mt-2">Danh sách thời khóa biểu tại trường của con</p>
  </div>
  
  <!-- Search Panel -->
  <div class="search-panel">
    <form class="row g-3" action="{{ route('ph_tkb') }}" method="get">
      @csrf
      <div class="col-md-4">
        <label for="tuan_search" class="form-label small text-muted">Tuần</label>
        <select id="tuan_search" name="tuan_search" class="form-select">
          @php
          if(empty($tuan_search)) $tuan_search = $tuan_hien_tai->id;
          @endphp
          @foreach ($tuans as $tuan)
            <option value="{{$tuan->id}}" {{ (!empty($tuan_search)&&$tuan_search==$tuan->id)?"selected":"" }}>
             Tuần {{$tuan->id}} năm {{$tuan->nam}}
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
    </form>
  </div>
  
  <!-- Table -->
  <div class="table-container">
    <div class="table-responsive">
      @php
        use Carbon\Carbon;
        $ngay_hoc = [];
        for ($i = 0; $i <= 5; $i++) {
          $ngay_hoc[] = Carbon::parse($tkb->tu_ngay)->addDays($i)->toDateString();
        }
      @endphp
      <table class="table">
        <thead>
          <tr>
            <th style="width: 80px;">Tiết</th>
            <th class="day-header">Thứ 2</th>
            <th class="day-header">Thứ 3</th>
            <th class="day-header">Thứ 4</th>
            <th class="day-header">Thứ 5</th>
            <th class="day-header">Thứ 6</th>
          </tr>
          <tr>
            <th style="width: 80px;">Ngày</th>
            <th class="date-header">{{$ngay_hoc[0]}}</th>
            <th class="date-header">{{$ngay_hoc[1]}}</th>
            <th class="date-header">{{$ngay_hoc[2]}}</th>
            <th class="date-header">{{$ngay_hoc[3]}}</th>
            <th class="date-header">{{$ngay_hoc[4]}}</th>
          </tr>
        </thead>
        <tbody class="service-table-body">
          @for ($i = 1; $i <= 11; $i++)
            <tr>
              <td class="period-label">Tiết {{$i}}</td>
              <td>@php
                foreach($mon_hocs as $mon_hoc){
                  echo $mon_hoc->id == $tkb_ngays[0]['tiet'.$i] ? $mon_hoc->ten_mon_hoc : "";
                }
              @endphp </td>
              <td>@php
                foreach($mon_hocs as $mon_hoc){
                  echo $mon_hoc->id == $tkb_ngays[1]['tiet'.$i] ? $mon_hoc->ten_mon_hoc : "";
                }
              @endphp </td>
              <td>@php
                foreach($mon_hocs as $mon_hoc){
                  echo $mon_hoc->id == $tkb_ngays[2]['tiet'.$i] ? $mon_hoc->ten_mon_hoc : "";
                }
              @endphp </td>
              <td>@php
                foreach($mon_hocs as $mon_hoc){
                  echo $mon_hoc->id == $tkb_ngays[3]['tiet'.$i] ? $mon_hoc->ten_mon_hoc : "";
                }
              @endphp </td>
              <td>@php
                foreach($mon_hocs as $mon_hoc){
                  echo $mon_hoc->id == $tkb_ngays[4]['tiet'.$i] ? $mon_hoc->ten_mon_hoc : "";
                }
              @endphp </td>
            </tr>
          @endfor
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
@include('components/bao_loi')
</html>
