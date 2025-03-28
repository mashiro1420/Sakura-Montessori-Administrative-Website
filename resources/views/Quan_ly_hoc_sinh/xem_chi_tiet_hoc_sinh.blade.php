<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xem chi tiết học sinh</title>
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
          <div class="page-header d-flex justify-content-between">
            <h2><i class="fa-solid fa-chalkboard-user"></i>Xem chi tiết học sinh</h2> 
            <div>
              <a class="btn btn-outline-secondary ms-2" href="{{url('ql_hs')}}">
                <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách học sinh
              </a>
            </div>
          </div>
          <!-- Form to add new employee -->
          <div class="search-container">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="id">Mã học sinh</label>
                <input type="text" name="id" class="form-control" value="{{$hoc_sinh->id}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" value="{{$hoc_sinh->ho_ten}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" name="ngay_sinh" class="form-control" value="{{$hoc_sinh->ngay_sinh}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Giới tính</label>
                <select name="gioi_tinh" class="form-select" >
                  <option value="Nam" {{$hoc_sinh->gioi_tinh=='Nam'?"selected":""}}>Nam</option>
                  <option value="Nữ" {{$hoc_sinh->gioi_tinh=='Nữ'?"selected":""}}>Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="di_bus">Đi bus</label>
                <select name="di_bus" class="form-select" readonly>
                  <option value="Có" {{$hoc_sinh->di_bus=='Có'?"selected":""}}>Có</option>
                  <option value="Không" {{$hoc_sinh->di_bus=='Không'?"selected":""}}>Không</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="loai_hoc_phi">Loại học phí</label>
                <select name="loai_hoc_phi" class="form-select" readonly>
                  {{-- @foreach($loai_hoc_phis as $loai_hoc_phi)
                    <option value="{{$loai_hoc_phi->id}}">{{$loai_hoc_phi->ten_loai_hoc_phi}}</option>
                  @endforeach --}}
                  <option value="Loại học phí 1" {{$hoc_sinh->loai_hoc_phi=='Loại học phí 1'?"selected":""}}>Loại học phí 1</option>
                  <option value="Loại học phí 2" {{$hoc_sinh->loai_hoc_phi=='Loại học phí 2'?"selected":""}}>Loại học phí 2</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_nhap_hoc">Ngày nhập học</label>
                <input type="date" name="ngay_nhap_hoc" value="{{$hoc_sinh->ngay_nhap_hoc}}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nickname">Nick name</label> 
                <input type="text" name="nickname" class="form-control" value="{{$hoc_sinh->nickname}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich">Quốc tịch</label>
                <input type="text" name="quoc_tich" class="form-control" value="{{$hoc_sinh->quoc_tich}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngon_ngu">Ngôn ngữ</label>
                <input type="text" name="ngon_ngu" class="form-control" value="{{$hoc_sinh->ngon_ngu}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="can_nang">Cân nặng</label>
                <input type="text" name="can_nang" class="form-control" value="{{$hoc_sinh->can_nang}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chieu_cao">Chiều cao</label>
                <input type="text" name="chieu_cao" class="form-control" value="{{$hoc_sinh->chieu_cao}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" name="noi_sinh" class="form-control" value="{{$hoc_sinh->noi_sinh}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thong_tin_suc_khoe">Thông tin sức khỏe</label>
                <input type="text" name="thong_tin_suc_khoe" class="form-control" value="{{$hoc_sinh->thong_tin_suc_khoe}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thuong_tru">Thường trú</label>
                <input type="text" name="thuong_tru" class="form-control" value="{{$hoc_sinh->thuong_tru}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="{{$hoc_sinh->dia_chi}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nguoi_dua_don">Người đưa đón</label>
                <input type="text" name="nguoi_dua_don" class="form-control" value="{{$hoc_sinh->nguoi_dua_don}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lien_he_khan">Liên hệ khẩn</label>
                <input type="text" name="lien_he_khan" class="form-control" value="{{$hoc_sinh->lien_he_khan}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten_me">Họ tên mẹ</label>
                <input type="text" name="ho_ten_me" class="form-control" value="{{$hoc_sinh->ho_ten_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sdt_me">Số điện thoại của mẹ</label>
                <input type="text" name="sdt_me" class="form-control" value="{{$hoc_sinh->sdt_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="email_me">Email của mẹ</label>
                <input type="email" name="email_me" class="form-control" value="{{$hoc_sinh->email_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nghe_nghiep_me">Nghề nghiệp của mẹ</label>
                <input type="text" name="nghe_nghiep_me" class="form-control" value="{{$hoc_sinh->nghe_nghiep_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd_me">Số căn cước của mẹ</label>
                <input type="text" name="cmnd_me" class="form-control" value="{{$hoc_sinh->cmnd_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nam_sinh_me">Năm sinh của mẹ</label>
                <input type="text" name="nam_sinh_me" class="form-control" value="{{$hoc_sinh->nam_sinh_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich_me">Quốc tịch của mẹ</label>
                <input type="text" name="quoc_tich_me" class="form-control" value="{{$hoc_sinh->quoc_tich_me}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten_bo">Họ tên bố</label>
                <input type="text" name="ho_ten_bo" class="form-control" value="{{$hoc_sinh->ho_ten_bo}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sdt_bo">Số điện thoại của bố</label>
                <input type="text" name="sdt_bo" class="form-control" value="{{$hoc_sinh->sdt_bo}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="email_bo">Email của bố</label>
                <input type="email" name="email_bo" class="form-control" value="{{$hoc_sinh->email_bo}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nghe_nghiep_bo">Nghề nghiệp của bố</label>
                <input type="text" name="nghe_nghiep_bo" class="form-control" value="{{$hoc_sinh->nghe_nghiep_bo}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd_bo">Số căn cước của bố</label>
                <input type="text" name="cmnd_bo" class="form-control" value="{{$hoc_sinh->cmnd_bo}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nam_sinh_bo">Năm sinh của bố</label>
                <input type="text" name="nam_sinh_bo" class="form-control" value="{{$hoc_sinh->nam_sinh_bo}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich_bo">Quốc tịch của bố</label>
                <input type="text" name="quoc_tich_bo" class="form-control" value="{{$hoc_sinh->quoc_tich_bo}}" readonly>
              </div>
            </div>
          </div>
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
  </script>
</body>
</html>