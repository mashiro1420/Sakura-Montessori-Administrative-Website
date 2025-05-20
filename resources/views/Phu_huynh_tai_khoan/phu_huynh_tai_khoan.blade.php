<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chi tiết tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
</head>
<body>
@include('components/navbar')
<div class="container content-container">
  <!-- Thong tin hoc sinh -->
  <div class="card shadow-sm border-0 rounded-4 mb-4 p-4">
    <div class="d-flex justify-content-between">
      <h2 class="text-primary mb-4" style="color: var(--primary-dark) !important;">Thông tin cơ bản</h2>
      <div class="button-container">
        <a href="{{url('ph_sua_tai_khoan')}}" class="btn btn-primary btn-pink w-10">
          <i class="fas fa-edit me-1"></i> Sửa thông tin
        </a>
      </div>
    </div>
    <!-- Basic Info Grid -->
    <div class="row g-3">
      <div class="col-md-3"><label>Mã học sinh</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->id}}"></div>
      <div class="col-md-3"><label>Họ và tên</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->ho_ten}}"></div>
      <div class="col-md-3"><label>Nick name</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->nickname}}"></div>
      <div class="col-md-3"><label>Giới tính</label>
        <select class="form-select" disabled>
          <option value="1" {{$hoc_sinh->gioi_tinh=='1'?"selected":""}}>Nam</option>
          <option value="0" {{$hoc_sinh->gioi_tinh=='2'?"selected":""}}>Nữ</option>
        </select>
      </div>
      <div class="col-md-3"><label>Ngày sinh</label><input type="date" class="form-control" readonly value="{{$hoc_sinh->ngay_sinh}}"></div>
      <div class="col-md-3"><label>Ngày nhập học</label><input type="date" class="form-control" readonly value="{{$hoc_sinh->ngay_nhap_hoc}}"></div>
      <div class="col-md-3"><label>Ngày thôi học</label><input type="date" class="form-control" readonly value="{{$hoc_sinh->ngay_thoi_hoc}}"></div>
      <div class="col-md-3"><label>Quốc tịch</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->quoc_tich}}"></div>
      <div class="col-md-3"><label>Ngôn ngữ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->ngon_ngu}}"></div>
      <div class="col-md-3"><label>Thường trú</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->thuong_tru}}"></div>
      <div class="col-md-3"><label>Địa chỉ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->dia_chi}}"></div>
      <div class="col-md-3"><label>Lớp</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->ten_lop." - ".$hoc_sinh->ten_ky}}"></div>
      <div class="col-md-3"><label>Loại học phí</label>
        <input type="text" class="form-control" readonly value="{{$hoc_sinh->loai_hoc_phi=='0'?'Học phí kỳ':($hoc_sinh->loai_hoc_phi=='1'?'Học phí năm':'Học phí tháng')}}">
      </div>
      <div class="col-md-3"><label>Môn năng khiếu</label>
        <input type="text" class="form-control" readonly value="@php
        if(!empty($hoc_sinh->nang_khieu)){
          foreach ($nang_khieu as $mon) {
            if ($mon->id == $hoc_sinh->nang_khieu) {
              echo $mon->ten_mon_hoc;
            }
          }
        } else {
          echo 'Không đăng ký';
        }
        @endphp">
      </div>
      <div class="col-md-3"><label>Khóa học</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->ten_khoa_hoc}}"></div>
    </div>
  </div>

  <!-- Thong tin phu huynh -->
  <div class="card shadow-sm border-0 rounded-4 p-4">
    <h2 class="text-primary mb-4" style="color: var(--primary-dark) !important;">Thông tin phụ huynh</h2>
    <div class="row g-3">
      <div class="col-md-3"><label>Họ tên mẹ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->ho_ten_me}}"></div>
      <div class="col-md-3"><label>Số điện thoại của mẹ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->sdt_me}}"></div>
      <div class="col-md-3"><label>Email của mẹ</label><input type="email" class="form-control" readonly value="{{$hoc_sinh->email_me}}"></div>
      <div class="col-md-3"><label>Nghề nghiệp của mẹ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->nghe_nghiep_me}}"></div>
      <div class="col-md-3"><label>Số căn cước của mẹ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->cmnd_me}}"></div>
      <div class="col-md-3"><label>Năm sinh của mẹ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->nam_sinh_me}}"></div>
      <div class="col-md-3"><label>Quốc tịch của mẹ</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->quoc_tich_me}}"></div>
      <div class="col-md-3"><label>Họ tên bố</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->ho_ten_bo}}"></div>
      <div class="col-md-3"><label>Số điện thoại của bố</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->sdt_bo}}"></div>
      <div class="col-md-3"><label>Email của bố</label><input type="email" class="form-control" readonly value="{{$hoc_sinh->email_bo}}"></div>
      <div class="col-md-3"><label>Nghề nghiệp của bố</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->nghe_nghiep_bo}}"></div>
      <div class="col-md-3"><label>Số căn cước của bố</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->cmnd_bo}}"></div>
      <div class="col-md-3"><label>Năm sinh của bố</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->nam_sinh_bo}}"></div>
      <div class="col-md-3"><label>Quốc tịch của bố</label><input type="text" class="form-control" readonly value="{{$hoc_sinh->quoc_tich_bo}}"></div>
    </div>
  </div>
</div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('components/bao_loi')
</html>
