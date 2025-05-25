<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa thông tin tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
</head>
<body>
@include('components/navbar')
<div class="container content-container">
  <!-- Form sua thong tin hoc sinh -->
  <form action="{{url('xl_sua_ph')}}" method="POST">
    @csrf
    <div class="card shadow-sm border-0 rounded-4 mb-4 p-4">
        <div class="d-flex justify-content-between mb-4">
            <h2 class="text-primary m-0 p-0" style="color: var(--primary-dark) !important;">Sửa thông tin cơ bản</h2>
            <div class="button_container">
                <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#modalDoiMatKhau">
                    Đổi mật khẩu
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-circle-check"></i> Lưu thay đổi
                </button>
                <a href="{{url('ph_tai_khoan')}}" class="btn btn-dark">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại
                </a>
            </div>  
        </div>
      <div class="row g-3">
        <div class="col-md-3"><label>Mã học sinh</label><input type="text" name="id" class="form-control" readonly value="{{$hoc_sinh->id}}" readonly></div>
        <div class="col-md-3"><label>Họ và tên</label><input type="text" name="ho_ten" class="form-control" value="{{$hoc_sinh->ho_ten}}" readonly></div>
        <div class="col-md-3"><label>Nick name</label><input type="text" name="nickname" class="form-control" value="{{$hoc_sinh->nickname}}"></div>
        <div class="col-md-3"><label>Giới tính</label><input type="text" name="gioi_tinh" class="form-control" value="{{$hoc_sinh->gioi_tinh=='1'?"Nam":"Nữ"}}"></div>
        <div class="col-md-3"><label>Ngày sinh</label><input type="date" name="ngay_sinh" class="form-control" value="{{$hoc_sinh->ngay_sinh}}"></div>
        <div class="col-md-3"><label>Quốc tịch</label><input type="text" name="quoc_tich" class="form-control" value="{{$hoc_sinh->quoc_tich}}"></div>
        <div class="col-md-3"><label>Ngôn ngữ</label><input type="text" name="ngon_ngu" class="form-control" value="{{$hoc_sinh->ngon_ngu}}"></div>
        <div class="col-md-3"><label>Thường trú</label><input type="text" name="thuong_tru" class="form-control" value="{{$hoc_sinh->thuong_tru}}"></div>
        <div class="col-md-3"><label>Nơi sinh</label><input type="text" name="noi_sinh" class="form-control" value="{{$hoc_sinh->noi_sinh}}"></div>
        <div class="col-md-3"><label>Địa chỉ</label><input type="text" name="dia_chi" class="form-control" value="{{$hoc_sinh->dia_chi}}"></div>
      </div>
    </div>
    <div class="card shadow-sm border-0 rounded-4 mb-4 p-4">
      <h2 class="text-primary mb-4" style="color: var(--primary-dark) !important;">Thông tin sức khỏe</h2>
      <textarea type="text" name="thong_tin_suc_khoe" class="form-control" placeholder="Nhập thông tin sức khỏe">{{$hoc_sinh->thong_tin_suc_khoe}}</textarea>
    </div>
    <!-- Thong tin phu huynh -->
    <div class="card shadow-sm border-0 rounded-4 p-4">
      <h2 class="text-primary mb-4" style="color: var(--primary-dark) !important;">Sửa thông tin phụ huynh</h2>
      <div class="row g-3">
        <div class="col-md-3"><label>Họ tên mẹ</label><input type="text" name="ho_ten_me" class="form-control" value="{{$hoc_sinh->ho_ten_me}}"></div>
        <div class="col-md-3"><label>Số điện thoại của mẹ</label><input type="text" name="sdt_me" class="form-control" value="{{$hoc_sinh->sdt_me}}"></div>
        <div class="col-md-3"><label>Email của mẹ</label><input type="email" name="email_me" class="form-control" value="{{$hoc_sinh->email_me}}"></div>
        <div class="col-md-3"><label>Nghề nghiệp của mẹ</label><input type="text" name="nghe_nghiep_me" class="form-control" value="{{$hoc_sinh->nghe_nghiep_me}}"></div>
        <div class="col-md-3"><label>Số căn cước của mẹ</label><input type="text" name="cmnd_me" class="form-control" value="{{$hoc_sinh->cmnd_me}}"></div>
        <div class="col-md-3"><label>Năm sinh của mẹ</label><input type="text" name="nam_sinh_me" class="form-control" value="{{$hoc_sinh->nam_sinh_me}}"></div>
        <div class="col-md-3"><label>Quốc tịch của mẹ</label><input type="text" name="quoc_tich_me" class="form-control" value="{{$hoc_sinh->quoc_tich_me}}"></div>
        <div class="col-md-3"><label>Họ tên bố</label><input type="text" name="ho_ten_bo" class="form-control" value="{{$hoc_sinh->ho_ten_bo}}"></div>
        <div class="col-md-3"><label>Số điện thoại của bố</label><input type="text" name="sdt_bo" class="form-control" value="{{$hoc_sinh->sdt_bo}}"></div>
        <div class="col-md-3"><label>Email của bố</label><input type="email" name="email_bo" class="form-control" value="{{$hoc_sinh->email_bo}}"></div>
        <div class="col-md-3"><label>Nghề nghiệp của bố</label><input type="text" name="nghe_nghiep_bo" class="form-control" value="{{$hoc_sinh->nghe_nghiep_bo}}"></div>
        <div class="col-md-3"><label>Số căn cước của bố</label><input type="text" name="cmnd_bo" class="form-control" value="{{$hoc_sinh->cmnd_bo}}"></div>
        <div class="col-md-3"><label>Năm sinh của bố</label><input type="text" name="nam_sinh_bo" class="form-control" value="{{$hoc_sinh->nam_sinh_bo}}"></div>
        <div class="col-md-3"><label>Quốc tịch của bố</label><input type="text" name="quoc_tich_bo" class="form-control" value="{{$hoc_sinh->quoc_tich_bo}}"></div>
      </div>
    </div>
  </form>
</div>
<!-- Modal Doi Mat Khau -->
  <div class="modal fade" id="modalDoiMatKhau" tabindex="-1" aria-labelledby="modalDoiMatKhauLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDoiMatKhauLabel">Đổi mật khẩu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="search-container" action="{{url('xl_doi_mk')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="mb-3">
                <label for="tai_khoan">Tên tài khoản</label>
                <input type="text" name="tai_khoan" class="form-control" value="{{ session('tai_khoan') }}" readonly>
              </div>
              <div class="mb-3">
                <label for="mat_khau_cu">Mật khẩu cũ</label>
                <input type="password" name="mat_khau_cu" class="form-control" placeholder="Nhập mật khẩu mới" required>
              </div>
              <div class="mb-3">
                <label for="mat_khau_moi">Mật khẩu mới</label>
                <input type="password" name="mat_khau_moi" class="form-control" placeholder="Nhập mật khẩu mới" required>
              </div>
              <div class="mb-3">
                <label for="xac_nhan">Nhập lại mật khẩu mới</label>
                <input type="password" name="xac_nhan" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('components/bao_loi')
</html>
