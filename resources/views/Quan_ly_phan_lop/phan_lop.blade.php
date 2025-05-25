<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phân lớp</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
</head>
<style>
  .choices-multiple {
    min-width: 250px;
  }
  .choices__list--dropdown {
    max-height: 200px;
    overflow-y: auto;
  }
</style>
<body>
  <div class="wrapper">
    @include('components/sidebar')
    <!-- Main content -->
    <div class="main p-4">
      <div class="content" id="content" style="margin-left: 70px;">
        <div class="container-fluid">
          <!-- Page Header -->
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Phân lớp</h2>
          </div>
          <!-- Form to add new employee -->
          <div class="search-item">
            <label for="status-filter">Tải file danh sách học sinh</label>
            <form action="{{ route('import_lop',['id'=>$phan_lop->pl_id]) }}" method="post" enctype="multipart/form-data" id="import-form">
              @csrf
              <input type="file" name="file" id="file-input" class="d-none" required>
              <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button">Import Excel</button>
            </form>
          </div>
          <div class="search-item">
          </div>
          <div class="search-container">
            <h3> Thông tin lớp</h3>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="gv_cn">Giáo viên chủ nhiệm</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ho_ten_cn }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_viet">Giáo viên Việt</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ho_ten_vn }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_nuoc_ngoai">Giáo viên nước ngoài</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ho_ten_nn }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lop">Lớp</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_lop }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoi">Khối</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_khoi }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="phong_hoc">Phòng học</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_phong_hoc }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="he_dao_tao">Hệ đào tạo</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_he_dao_tao }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoa_hoc">Khóa học</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_khoa_hoc }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky">Kỳ</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_ky }}" readonly>
              </div>
            </div>
          </div>
          <form class="search-container" action="{{ url('xl_phan_lop') }}" method="post">
          @csrf
            <div class="filter-row">
              <input type="text" name="id" value="{{ $phan_lop->pl_id }}" hidden>
              <div class="search-item d-inline-block w-50">
                    <select name="hoc_sinhs[]" class="form-select choices-multiple" multiple>
                        @foreach($hoc_sinh_mois as $hs)
                            <option value="{{ $hs->id }}">
                            {{ $hs->id }} - {{ $hs->ho_ten }}
                            </option>
                        @endforeach
                    </select>
              </div>
            </div>
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
                <button class="btn btn-outline-secondary ms-2">
                  <a href="{{route('export_lop',['id'=>$phan_lop->pl_id])}}">
                    <i class="fa-solid fa-file-export me-1"></i> Xuất Excel
                  </a>
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_phan_lop')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách phân lớp
                </a>
              </div>
            </div>
          </form>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Họ tên</th>
                  <th>Ngày nhập học</th>
                  <th>Nick name</th>
                  <th>Giới tính</th>
                  <th>Ngày sinh</th>
                  <th>Quốc tịch</th>
                  <th>Khóa học</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hoc_sinhs as $hoc_sinh)
                <tr>
                  <td>{{$hoc_sinh->id}}</td>
                  <td>{{$hoc_sinh->ho_ten}}</td>
                  <td>{{$hoc_sinh->ngay_nhap_hoc}}</td>
                  <td>{{$hoc_sinh->nickname}}</td>
                  <td>{{$hoc_sinh->gioi_tinh==1?"Nam":"Nữ"}}</td>
                  <td>{{$hoc_sinh->ngay_sinh}}</td>
                  <td>{{$hoc_sinh->quoc_tich}}</td>
                  <td>{{$hoc_sinh->ten_khoa_hoc}}</td>
                  <td class="action-column">
                    <a class="action-button" href="{{route('chi_tiet_hs',['id' => $hoc_sinh->id])}}" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
                    <a class="action-button" href="{{route('xl_duoi',['id' => $hoc_sinh->id])}}" title="Đuổi khỏi lớp"><i class="fa-solid fa-user-minus"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class="pagination-container">
            <nav>
              <ul class="pagination mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
  <script>
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  // Nút làm mới phần Phân lớp
  document.getElementById('reset-btn').addEventListener('click', function () {
    const inputs = document.querySelectorAll('.search-container select');

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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.choices-multiple').forEach(function(selectEl) {
        if (!selectEl.classList.contains('choices-initialized')) {
            new Choices(selectEl, {
            removeItemButton: true,
            placeholderValue: 'Chọn học sinh...',
            searchEnabled: true,
            shouldSort: false
            });
            selectEl.classList.add('choices-initialized');
        }
        });
    });
    </script>

@include('components/bao_loi')
</body>
</html>