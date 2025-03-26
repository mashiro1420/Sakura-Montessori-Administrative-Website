<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin bằng cấp</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Cập nhật thông tin bằng cấp</h2>
          </div>
          <!-- Form to add new employee -->
          <form class="search-container" action="{{url('xl_ttbc')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="id">Mã nhân viên</label>
                <input type="text" name="id" class="form-control" value="{{ $nhan_vien->id }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="trinh_do_hoc_van">Trình độ học vấn</label>
                <input type="text" name="trinh_do_hoc_van" value="{{ $bang_cap->trinh_do_hoc_van }}" class="form-control" placeholder="Nhập trình độ học vấn" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="trinh_do_chuyen_mon">Trình độ chuyên môn</label>
                <input type="text" name="trinh_do_chuyen_mon" value="{{ $bang_cap->trinh_do_chuyen_mon }}" class="form-control" placeholder="Nhập trình độ chuyên môn" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="trinh_do_chinh">Trình độ chuyên môn chính</label>
                <input type="text" name="trinh_do_chinh" value="{{ $bang_cap->trinh_do_chinh }}" class="form-control" placeholder="Nhập trình độ chuyên môn chính" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="truong_dao_tao">Trường đào tạo</label>
                <input type="text" name="truong_dao_tao" value="{{ $bang_cap->truong_dao_tao }}" class="form-control" placeholder="Nhập trường đào tạo" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="xep_loai">Xếp loại</label>
                <input type="text" name="xep_loai" value="{{ $bang_cap->xep_loai }}" class="form-control" placeholder="Nhập xếp loại" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="hinh_thuc_dao_tao">Hình thức đào tạo</label>
                <input type="text" name="hinh_thuc_dao_tao" value="{{ $bang_cap->hinh_thuc_dao_tao }}" class="form-control" placeholder="Nhập hình thức đào tạo" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nam_tot_nghiep">Năm tốt nghiệp</label>
                <input type="text" name="nam_tot_nghiep" value="{{ $bang_cap->nam_tot_nghiep }}" class="form-control" placeholder="Nhập năm tốt nghiệp" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chung_chi">Chứng chỉ</label>
                <input type="text" name="chung_chi" value="{{ $bang_cap->chung_chi }}" class="form-control" placeholder="Nhập chứng chỉ" required>
              </div>
            </div>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="chuyen_nganh">Chuyên ngành</label>
                <select name="chuyen_nganh" class="form-select" required>                 
                    @foreach($chuyen_nganhs as $chuyen_nganh)
                      <option value="{{$chuyen_nganh->id}}" {{!empty($bang_cap->id_chuyen_nganh)&&$bang_cap->id_chuyen_nganh==$chuyen_nganh->id?"selected":""}}>{{$chuyen_nganh->ten_chuyen_nganh}}</option>
                    @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="montessori">Montessori</label>
                <select name="montessori" class="form-select" required>                 
                    <option value="0">Không</option>
                    <option value="1" {{!empty($bang_cap->montessori)&&$bang_cap->montessori==1?"selected":""}}>Có</option>
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
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{route('sua_nv',['id' => $nhan_vien->id])}}">
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
  // Ẩn hiện sidebar
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  // Nút làm mới phần thêm nhân viên
  document.getElementById('reset-btn').addEventListener('click', function () {
    const inputs = document.querySelectorAll('.search-container input, .search-container select');

    inputs.forEach(input => {
      if (input.tagName === 'SELECT') {
        input.selectedIndex = 0;
      } else {
        input.value = '';
      }
    });
  });
  </script>
</body>
</html>