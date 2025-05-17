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
  <link rel="icon" type="image/png" href="{{ asset('imgs/favicon-skr.png') }}">
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
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h2>Thông tin cơ bản</h2>
              <div id="button_container">
                <a id="hien_thi_thanh_toan_btn" href="{{route('hien_thi_thanh_toan',['id' => $hoc_sinh->id])}}" class="btn btn-primary">
                  Hiển thị thanh toán
                </a> 
                <button id="chuyen_lop_btn" class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#uploadChuyenLopModal" {{ $hoc_sinh->trang_thai == 0?"hidden":"" }}>
                  Chuyển lớp
                </button> 
                <button id="nhap_hoc_lai_btn" class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#uploadNhapHocLaiModal" {{ $hoc_sinh->trang_thai == 1?"hidden":"" }}>
                  Nhập học lại
                </button>
                <button id="bao_luu_btn" class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#uploadBaoLuuModal" {{ $hoc_sinh->trang_thai == 0?"hidden":"" }}>
                  Bảo lưu
                </button>
                <button id="thoi_hoc_btn" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#uploadThoiHocModal" {{ $hoc_sinh->trang_thai == 0?"hidden":"" }}>
                  Thôi học
                </button>
              </div>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="id">Mã học sinh</label>
              <input type="text" name="id" class="form-control" readonly value="{{$hoc_sinh->hs_id}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ho_ten">Họ và tên</label>
              <input type="text" name="ho_ten" class="form-control" readonly placeholder="Nhập họ và tên" value="{{$hoc_sinh->ho_ten}}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nickname">Nick name</label>
              <input type="text" name="nickname" class="form-control" readonly value="{{$hoc_sinh->nickname}}" placeholder="Nhập nick name">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="gioi_tinh">Giới tính</label>
              <select name="gioi_tinh" class="form-select" readonly>
                <option value="1" {{$hoc_sinh->gioi_tinh=='1'?"selected":""}}>Nam</option>
                <option value="0"{{$hoc_sinh->gioi_tinh=='2'?"selected":""}}>Nữ</option>
              </select>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngay_sinh">Ngày sinh</label>
              <input type="date" name="ngay_sinh" class="form-control" readonly value="{{$hoc_sinh->ngay_sinh}}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngay_nhap_hoc">Ngày nhập học</label>
              <input type="date" name="ngay_nhap_hoc" class="form-control" readonly value="{{$hoc_sinh->ngay_nhap_hoc}}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngay_thoi_hoc">Ngày thôi học</label>
              <input type="date" id="ngay_thoi_hoc" name="ngay_thoi_hoc" class="form-control" readonly value="{{$hoc_sinh->ngay_thoi_hoc}}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="quoc_tich">Quốc tịch</label>
              <input type="text" name="quoc_tich" class="form-control" readonly value="{{$hoc_sinh->quoc_tich}}" placeholder="Nhập quốc tịch" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngon_ngu">Ngôn ngữ</label>
              <input type="text" name="ngon_ngu" class="form-control" readonly value="{{$hoc_sinh->ngon_ngu}}" placeholder="Nhập ngôn ngữ" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="thuong_tru">Thường trú</label>
              <input type="text" name="thuong_tru" class="form-control" readonly value="{{$hoc_sinh->thuong_tru}}" placeholder="Nhập thường trú" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="dia_chi">Địa chỉ</label>
              <input type="text" name="dia_chi" class="form-control" readonly value="{{$hoc_sinh->dia_chi}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ten_lop">Lớp</label>
              <input type="text" name="ten_lop" class="form-control" readonly value="{{$hoc_sinh->ten_lop." - ".$hoc_sinh->ten_ky}}" placeholder="Nhập lớp" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="loai_hoc_phi">Loại học phí</label>
              <input type="text" name="loai_hoc_phi" class="form-control" readonly placeholder="Nhập địa chỉ" value="{{$hoc_sinh->loai_hoc_phi=='0'?"Học phí kỳ":($hoc_sinh->loai_hoc_phi=='1'?"Học phí năm":"Học phí tháng")}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nang_khieu">Môn năng khiếu</label>
              <input type="text" name="nang_khieu" class="form-control" readonly placeholder="Nhập địa chỉ" value="@php
              if(!empty($hoc_sinh->nang_khieu)){
                foreach ($nang_khieu as $mon) {
                  if ($mon->id == $hoc_sinh->nang_khieu) {
                    echo $mon->ten_mon_hoc;
                  }
                }
              } else {
                echo "Không đăng ký";
              }
              @endphp">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="khoa_hoc">Khóa học</label>
              <input type="text" name="khoa_hoc" class="form-control" readonly value="{{$hoc_sinh->ten_khoa_hoc}}" placeholder="Nhập thường trú" readonly>
            </div>
          </div>
          <div class="filter-row">
            <h2>Thông tin sức khỏe</h2>
            <div class="search-item d-inline-block w-25">
              <label for="can_nang">Cân nặng (KG)</label>
              <input type="number" name="can_nang" class="form-control" readonly placeholder="Nhập cân nặng" value="{{$hoc_sinh->can_nang}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="chieu_cao">Chiều cao (CM)</label>
              <input type="number" name="chieu_cao" class="form-control" readonly placeholder="Nhập chiều cao" value="{{$hoc_sinh->chieu_cao}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="noi_sinh">Nơi sinh</label>
              <input type="text" name="noi_sinh" class="form-control" readonly placeholder="Nhập nơi sinh" value="{{$hoc_sinh->noi_sinh}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="thong_tin_suc_khoe">Thông tin sức khỏe</label>
              <textarea type="text" name="thong_tin_suc_khoe" class="form-control" readonly placeholder="Nhập thông tin sức khỏe">{{$hoc_sinh->thong_tin_suc_khoe}}</textarea>
            </div>
          </div>
          <div class="filter-row">
            <h2>Thông tin phụ huynh</h2>
            <div class="search-item d-inline-block w-25">
              <label for="ho_ten_me">Họ tên mẹ</label>
              <input type="text" name="ho_ten_me" class="form-control" readonly value="{{$hoc_sinh->ho_ten_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="sdt_me">Số điện thoại của mẹ</label>
              <input type="text" name="sdt_me" class="form-control" readonly value="{{$hoc_sinh->sdt_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="email_me">Email của mẹ</label>
              <input type="email" name="email_me" class="form-control" readonly value="{{$hoc_sinh->email_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nghe_nghiep_me">Nghề nghiệp của mẹ</label>
              <input type="text" name="nghe_nghiep_me" class="form-control" readonly value="{{$hoc_sinh->nghe_nghiep_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="cmnd_me">Số căn cước của mẹ</label>
              <input type="text" name="cmnd_me" class="form-control" readonly value="{{$hoc_sinh->cmnd_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nam_sinh_me">Năm sinh của mẹ</label>
              <input type="text" name="nam_sinh_me" class="form-control" readonly value="{{$hoc_sinh->nam_sinh_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="quoc_tich_me">Quốc tịch của mẹ</label>
              <input type="text" name="quoc_tich_me" class="form-control" readonly value="{{$hoc_sinh->quoc_tich_me}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ho_ten_bo">Họ tên bố</label>
              <input type="text" name="ho_ten_bo" class="form-control" readonly value="{{$hoc_sinh->ho_ten_bo}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="sdt_bo">Số điện thoại của bố</label>
              <input type="text" name="sdt_bo" class="form-control" readonly value="{{$hoc_sinh->sdt_bo}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="email_bo">Email của bố</label>
              <input type="email" name="email_bo" class="form-control" readonly value="{{$hoc_sinh->email_bo}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nghe_nghiep_bo">Nghề nghiệp của bố</label>
              <input type="text" name="nghe_nghiep_bo" class="form-control" readonly value="{{$hoc_sinh->nghe_nghiep_bo}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="cmnd_bo">Số căn cước của bố</label>
              <input type="text" name="cmnd_bo" class="form-control" readonly value="{{$hoc_sinh->cmnd_bo}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nam_sinh_bo">Năm sinh của bố</label>
              <input type="text" name="nam_sinh_bo" class="form-control" readonly value="{{$hoc_sinh->nam_sinh_bo}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="quoc_tich_bo">Quốc tịch của bố</label>
              <input type="text" name="quoc_tich_bo" class="form-control" readonly value="{{$hoc_sinh->quoc_tich_bo}}">
            </div>
          </div>
        @if(!empty($hoc_sinh->di_bus))
          <div class="filter-row">
            <h2>Thông tin đưa đón</h2>
            <div class="search-item d-inline-block w-25">
              <label for="tuyen_xe">Tuyến xe</label>
              <input type="text" name="tuyen_xe" class="form-control" readonly placeholder="Nhập người đưa đón" value="{{$hoc_sinh->ten_tuyen_xe}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="diem_don">Điểm đón</label>
              <input type="text" name="diem_don" class="form-control" readonly placeholder="Nhập người đưa đón" value="{{$hoc_sinh->diem_don}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="so_km">Số KM</label>
              <input type="text" name="so_km" class="form-control" readonly placeholder="Nhập người đưa đón" value="{{$hoc_sinh->so_km}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nguoi_dua_don">Người đưa đón</label>
              <input type="text" name="nguoi_dua_don" class="form-control" readonly placeholder="Nhập người đưa đón" value="{{$hoc_sinh->nguoi_dua_don}}">
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="lien_he_khan">Liên hệ khẩn</label>
              <input type="text" name="lien_he_khan" class="form-control" readonly placeholder="Nhập liên hệ khẩn" value="{{$hoc_sinh->lien_he_khan}}">
            </div>
          </div>
        @endIf
        </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Model thôi học -->
    <div class="modal fade" id="uploadThoiHocModal" tabindex="-1" aria-labelledby="uploadThoiHoc" aria-hidden="true">
      <div class="modal-dialog">
        <form id="import-form" action="{{ url('xl_thoi_hoc') }}" method="POST" enctype="multipart/form-data" class="modal-content">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="uploadThoiHoc">Khai báo thôi học</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
          </div>
          <div class="modal-body">
            <input type="text" name="id" class="form-control" value="{{ $hoc_sinh->hs_id }}" hidden>
            <label for="">File tài liệu</label>
            <input type="file" name="file" class="form-control" id="file-input" required>
          </div>
          <div class="modal-body">
            <label for="ngay_thoi_hoc_update">Ngày thôi học</label>
            <input type="date" class="form-control" name="ngay_thoi_hoc_update" id="ngay_thoi_hoc_update" required min="{{$hoc_sinh->ngay_nhap_hoc}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Model nhập học lại -->
    <div class="modal fade" id="uploadNhapHocLaiModal" tabindex="-1" aria-labelledby="uploadNhapHocLai" aria-hidden="true">
      <div class="modal-dialog">
        <form id="import-form" action="{{ url('xl_nhap_hoc_lai') }}" method="POST" enctype="multipart/form-data" class="modal-content">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="uploadNhapHocLai">Khai báo nhập học lại</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
          </div>
          <div class="modal-body">
          <input type="text" name="id" class="form-control" value="{{ $hoc_sinh->hs_id }}" hidden>
            <label for="">File tài liệu</label>
            <input type="file" name="file" class="form-control" id="file-input" required>
          </div>
          <div class="modal-body">
            <label for="ngay_nhap_hoc_update">Ngày nhập học lại</label>
            <input type="date"  class="form-control" name="ngay_nhap_hoc_update" id="ngay_nhap_hoc_update" required min="{{ $hoc_sinh->ngay_thoi_hoc }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Model bảo lưu -->
    <div class="modal fade" id="uploadBaoLuuModal" tabindex="-1" aria-labelledby="uploadBaoLuu" aria-hidden="true">
      <div class="modal-dialog">
        <form id="import-form" action="{{url('xl_bao_luu')}}" method="POST" enctype="multipart/form-data" class="modal-content">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="uploadBaoLuu">Khai báo bảo lưu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
          </div>
          <div class="modal-body">
            <input type="text" name="id" class="form-control" value="{{ $hoc_sinh->hs_id }}" hidden>
            <label for="file">File tài liệu</label>
            <input type="file" name="file" class="form-control" id="file-input" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal fade" id="uploadChuyenLopModal" tabindex="-1" aria-labelledby="uploadChuyenLop" aria-hidden="true">
      <div class="modal-dialog">
        <form id="import-form" action="" method="POST" enctype="multipart/form-data" class="modal-content">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="uploadChuyenLop">Khai báo chuyển lớp</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
          </div>
          <div class="modal-body">
            <label for="lop_update">Lớp</label>
            <select name="lop_update" class="form-select" id="lop_update">
              @foreach($phan_lops as $lop)
                <option value="{{$lop->id}}" {{ $hoc_sinh->id_phan_lop == $lop->id?"selected":"" }}>{{$lop->ten_lop}}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-body">
            <input type="text" name="id" class="form-control" value="{{ $hoc_sinh->hs_id }}" hidden>
            <label for="file">File tài liệu</label>
            <input type="file" name="file" class="form-control" id="file-input" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
          </div>
        </form>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const hamBurger = document.querySelector(".toggle-btn");
    hamBurger.addEventListener("click", function () {
      document.querySelector("#sidebar").classList.toggle("expand");
    });
  </script>
@include('components/bao_loi')
</body>
</html>