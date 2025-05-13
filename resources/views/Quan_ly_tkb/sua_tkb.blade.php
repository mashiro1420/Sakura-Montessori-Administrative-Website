<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa thời khóa biểu</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Sửa thời khóa biểu</h2>
          </div>
          <form action="" method="post">
            @csrf
            <div class="form-section">
              <h5>Thông tin chung</h5>
              <div class="row mb-3">
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
                      <option value="{{$tuan->id}}">Tuần {{$tuan->tuan}} ({{$tuan->tu_ngay}} đến {{$tuan->den_ngay}})</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="thu" class="form-label fw-bold">Thứ:</label>
                  <input type="text" id="thu" name="thu" class="form-control" value="" placeholder="Nhập thứ trong tuần" required>
                </div>
              </div>
            </div>
            <div class="form-section">
              <h5 id="timetable-heading">Thời khóa biểu</h5>
              <div class="timetable-container">
                <table class="timetable">
                  <thead>
                    <tr>
                      <th style="width: 80px;">Tiết</th>
                      <th class="day-header" id="day-header">Môn học</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for ($i = 1; $i <= 11; $i++)
                      <tr>
                        <td class="period-label">Tiết {{$i}}</td>
                        <td><input type="text" name="tiet{{$i}}" class="lesson-input form-control" placeholder="Nhập tên môn học"></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
              </div>
            </div>
            <div class="action-buttons d-flex justify-content-between">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu thời khóa biểu
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
    
    // Update day header when day is selected
    document.getElementById('thu').addEventListener('change', function() {
      const dayText = this.options[this.selectedIndex].text;
      document.getElementById('day-header').textContent = dayText;
      document.getElementById('timetable-heading').textContent = `Thời khóa biểu ${dayText}`;
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