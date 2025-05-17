<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chỉnh thời khóa biểu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <style>
    .timetable-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
    
    .timetable {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed;
    }
    
    .timetable th, .timetable td {
      border: 1px solid #dee2e6;
      padding: 10px;
      text-align: center;
      vertical-align: middle;
      height: 60px;
    }
    
    .timetable th {
      background-color: #f8f9fa;
      font-weight: 600;
      color: #495057;
    }
    
    .timetable th.day-header {
      background-color: #3b7ddd;
      color: white;
    }
    .timetable th.date-header {
      background-color: #5277ad;
      color: white;
    }
    
    .timetable td input {
      width: 100%;
      border: 1px solid #ced4da;
      border-radius: 4px;
      padding: 4px;
      text-align: center;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .timetable td input:focus {
      border-color: #3b7ddd;
      box-shadow: 0 0 0 0.2rem rgba(59, 125, 221, 0.25);
      outline: 0;
    }
    
    .period-label {
      background-color: #e9ecef;
      font-weight: 500;
    }
    
    .form-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    
    .class-selector {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .import-section {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 8px;
      border-left: 4px solid #3b7ddd;
    }
    
    .action-buttons {
      margin-top: 30px;
    }

    /* Input trong ô thời khóa biểu */
    .lesson-input {
      height: 50px;
      font-size: 0.9rem;
    }
    
    /* Animation cho hover trên các ô */
    .timetable td:hover {
      background-color: rgba(59, 125, 221, 0.05);
    }
    
    /* Styling cho tooltip hay pop-up */
    .lesson-help {
      position: relative;
      cursor: help;
    }
    
    .lesson-help:hover::after {
      content: "Nhập tên môn học hoặc hoạt động";
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      background-color: #333;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 12px;
      white-space: nowrap;
      z-index: 10;
    }
  </style>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Chỉnh thời khóa biểu</h2>
          </div>
          
          <!-- Import Excel Section -->
          
          <!-- Timetable Form -->
          <form action="{{url('xl_tao_tkb')}}" method="post">
            @csrf
            
            <!-- Form Header with Class and Week Selection -->
            <div class="form-header">
              <div class="col-md-3">
                <input type="text" class="form-control" id="id" name="id" value="{{ $tkb->id }}" hidden>
                <label for="lop" class="form-label fw-bold">Lớp:</label>
                <input type="text" class="form-control" id="lop" name="lop" value="{{ $tkb->ten_lop }}" readonly>
              </div>
              <div class="col-md-1">
                <label for="tuan" class="form-label fw-bold">Tuần:</label>
                <input type="text" class="form-control" id="tuan" name="tuan" value="{{ $tkb->tuan }}" readonly>
              </div>
              <div class="col-md-2">
                <label for="ky" class="form-label fw-bold">Kỳ:</label>
                <input type="text" class="form-control" id="ky" name="ky" value="{{ $tkb->ten_ky }}" readonly>
              </div>
            </div>
            
            <!-- Timetable -->
            <div class="timetable-container">
              @php
                use Carbon\Carbon;
                $ngay_hoc = [];
                for ($i = 0; $i <= 5; $i++) {
                  $ngay_hoc[] = Carbon::parse($tkb->tkb_tu_ngay)->addDays($i)->toDateString();
                }
              @endphp
              <table class="timetable">
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
                <tbody>
                  @for ($i = 1; $i <= 11; $i++)
                    <tr>
                      <td class="period-label">Tiết {{$i}}</td>
                      <td>
                        <select name="tiet{{$i}}t2" id="t2{{$i}}" class="lesson-input form-control select2">
                          <option value=""></option>
                          @foreach($mon_hocs as $mon_hoc)
                            <option value="{{$mon_hoc->id}}" {{ !empty($tkb_ngays[0]['tiet'.$i])&&$tkb_ngays[0]['tiet'.$i]==$mon_hoc->id?"selected":"" }}>{{$mon_hoc->ten_mon_hoc}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="tiet{{$i}}t3" id="t3{{$i}}" class="lesson-input form-control select2">
                          <option value=""></option>
                          @foreach($mon_hocs as $mon_hoc)
                            <option value="{{$mon_hoc->id}}" {{ !empty($tkb_ngays[1]['tiet'.$i])&&$tkb_ngays[1]['tiet'.$i]==$mon_hoc->id?"selected":"" }}>{{$mon_hoc->ten_mon_hoc}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="tiet{{$i}}t4" id="t4{{$i}}" class="lesson-input form-control select2">
                          <option value=""></option>
                          @foreach($mon_hocs as $mon_hoc)
                            <option value="{{$mon_hoc->id}}" {{ !empty($tkb_ngays[2]['tiet'.$i])&&$tkb_ngays[2]['tiet'.$i]==$mon_hoc->id?"selected":"" }}>{{$mon_hoc->ten_mon_hoc}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="tiet{{$i}}t5" id="t5{{$i}}" class="lesson-input form-control select2">
                          <option value=""></option>
                          @foreach($mon_hocs as $mon_hoc)
                            <option value="{{$mon_hoc->id}}" {{ !empty($tkb_ngays[3]['tiet'.$i])&&$tkb_ngays[3]['tiet'.$i]==$mon_hoc->id?"selected":"" }}>{{$mon_hoc->ten_mon_hoc}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="tiet{{$i}}t6" id="t6{{$i}}" class="lesson-input form-control select2">
                          <option value=""></option>
                          @foreach($mon_hocs as $mon_hoc)
                            <option value="{{$mon_hoc->id}}" {{ !empty($tkb_ngays[4]['tiet'.$i])&&$tkb_ngays[4]['tiet'.$i]==$mon_hoc->id?"selected":"" }}>{{$mon_hoc->ten_mon_hoc}}</option>
                          @endforeach
                        </select>
                      </td>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
            
            <!-- Action Buttons -->
            <div class="action-buttons d-flex justify-content-between">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu thời khóa biểu
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary" href="{{url('ql_tkb')}}">
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
    // Sidebar toggle
    const hamBurger = document.querySelector(".toggle-btn");
    hamBurger.addEventListener("click", function () {
      document.querySelector("#sidebar").classList.toggle("expand");
    });
    
    // Reset button
    document.getElementById('reset-btn').addEventListener('click', function () {
      // Reset tất cả các input và select trong form
      const form = this.closest('form');
      form.reset();

      // Bắt buộc cập nhật lại giao diện cho các select (nếu cần)
      const selects = form.querySelectorAll('select');
      selects.forEach(select => {
        select.selectedIndex = [...select.options].findIndex(opt => opt.defaultSelected);
      });
    });

    
    document.getElementById('reset-btn').addEventListener('click', function (e) {
      e.preventDefault(); // Ngăn chặn hành vi reset mặc định

      const form = this.closest('form');
      form.reset();

      // Reset các thẻ select về option rỗng (phục vụ cho select2 hiển thị placeholder)
      const selects = form.querySelectorAll('select.select2');
      selects.forEach(select => {
        // Gán giá trị rỗng
        $(select).val(null).trigger('change');
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $('.select2').select2({
        placeholder: "",
        allowClear: true
      });
    });
  </script>
  @include('components/bao_loi')
</body>
</html>