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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Thêm thời khóa biểu</h2>
          </div>
          
          <!-- Import Excel Section -->
          {{-- <div class="import-section">
            <h5><i class="fa-solid fa-file-import me-2"></i>Thêm nhiều thời khóa biểu</h5>
            <form action="{{ url('/import_nv') }}" method="post" enctype="multipart/form-data" id="import-form">
              @csrf
              <div class="d-flex align-items-center">
                <input type="file" name="file" id="file-input" class="form-control" required style="max-width: 400px;">
                <button type="submit" name="import" class="btn btn-primary ms-3">
                  <i class="fa-solid fa-file-excel me-1"></i> Import Excel
                </button>
              </div>
            </form>
          </div> --}}
          
          <!-- Timetable Form -->
          <form action="" method="post">
            @csrf
            
            <!-- Form Header with Class and Week Selection -->
            <div class="form-header">
              <div class="col-md-4">
                <label for="phan_lop" class="form-label fw-bold">Lớp:</label>
                <select id="phan_lop" name="phan_lop" class="form-select" required>
                  <option value="" disabled selected>Chọn lớp</option>
                  @foreach($phan_lops as $phan_lop)
                    <option value="{{$phan_lop->id}}">{{$phan_lop->id}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label for="tuan" class="form-label fw-bold">Tuần:</label>
                <select id="tuan" name="tuan" class="form-select" required>
                  <option value="" disabled selected>Chọn tuần</option>
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}">{{$tuan->ten_tuan}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <!-- Timetable -->
            <div class="timetable-container">
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
                </thead>
                <tbody>
                  @for ($i = 1; $i <= 11; $i++)
                    <tr>
                      <td class="period-label">Tiết {{$i}}</td>
                      <td><input type="text" name="tiet{{$i}}t2" class="lesson-input form-control" placeholder=""></td>
                      <td><input type="text" name="tiet{{$i}}t3" class="lesson-input form-control" placeholder=""></td>
                      <td><input type="text" name="tiet{{$i}}t4" class="lesson-input form-control" placeholder=""></td>
                      <td><input type="text" name="tiet{{$i}}t5" class="lesson-input form-control" placeholder=""></td>
                      <td><input type="text" name="tiet{{$i}}t6" class="lesson-input form-control" placeholder=""></td>
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
      const inputs = document.querySelectorAll('input[type="text"], select');
      inputs.forEach(input => {
        if (input.tagName === 'SELECT') {
          input.selectedIndex = 0;
        } else {
          input.value = '';
        }
      });
    });
    
    // Enhance UX with focus highlighting for table cells
    const lessonInputs = document.querySelectorAll('.lesson-input');
    lessonInputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.backgroundColor = 'rgba(59, 125, 221, 0.1)';
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.style.backgroundColor = '';
      });
    });
  </script>
  @include('components/bao_loi')
</body>
</html>