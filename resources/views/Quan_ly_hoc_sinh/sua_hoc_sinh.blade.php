<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật học sinh</title>
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
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i>Cập nhật học sinh</h2>
          </div>
          <!-- Form to add new employee -->
          <form class="search-container" action="{{url('xl_sua_hs')}}" method="post">
          @csrf
            <div class="filter-row">
              <h2>Thông tin cơ bản</h2>
              <div class="search-item d-inline-block w-25">
                <label for="id">Mã học sinh</label>
                <input type="text" name="id" class="form-control" value="{{$hoc_sinh->hs_id}}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ và tên" value="{{$hoc_sinh->ho_ten}}" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nickname">Nick name</label>
                <input type="text" name="nickname" class="form-control" value="{{$hoc_sinh->nickname}}" placeholder="Nhập nick name">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Giới tính</label>
                <select name="gioi_tinh" class="form-select" required>
                  <option value="1" {{$hoc_sinh->gioi_tinh=='1'?"selected":""}}>Nam</option>
                  <option value="0"{{$hoc_sinh->gioi_tinh=='2'?"selected":""}}>Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" name="ngay_sinh" class="form-control" value="{{$hoc_sinh->ngay_sinh}}" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_nhap_hoc">Ngày nhập học</label>
                <input type="date" name="ngay_nhap_hoc" class="form-control" value="{{$hoc_sinh->ngay_nhap_hoc}}" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich">Quốc tịch</label>
                <input type="text" name="quoc_tich" class="form-control" value="{{$hoc_sinh->quoc_tich}}" placeholder="Nhập quốc tịch" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngon_ngu">Ngôn ngữ</label>
                <input type="text" name="ngon_ngu" class="form-control" value="{{$hoc_sinh->ngon_ngu}}" placeholder="Nhập ngôn ngữ" required>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thuong_tru">Thường trú</label>
                <input type="text" name="thuong_tru" class="form-control" value="{{$hoc_sinh->thuong_tru}}" placeholder="Nhập thường trú">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ" value="{{$hoc_sinh->dia_chi}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="loai_hoc_phi">Loại học phí</label>
                <select name="loai_hoc_phi" class="form-select" required>
                  <option value="0" {{$hoc_sinh->loai_hoc_phi=='0'?"selected":""}}>Học phí kỳ</option>
                  <option value="1" {{$hoc_sinh->loai_hoc_phi=='1'?"selected":""}}>Học phí năm</option>
                  <option value="2" {{$hoc_sinh->loai_hoc_phi=='2'?"selected":""}}>Học phí tháng</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nang_khieu">Môn năng khiếu</label>
                <select name="nang_khieu" class="form-select" >
                  <option value="" {{empty($hoc_sinh->id_nang_khieu)?"selected":""}}>Không đăng ký</option>
                  @foreach ($nang_khieu as $mon)
                  <option value="{{ $mon->id }}" {{$hoc_sinh->id_nang_khieu==$mon->id?"selected":""}}>{{$mon->ten_mon_hoc}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoa_hoc">Khóa học</label>
                <select id="khoa_hoc" name="khoa_hoc" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($khoa_hocs as $khoa_hoc)
                    <option value="{{$khoa_hoc->id}}" {{ $hoc_sinh->id_khoa_hoc==$khoa_hoc->id?"selected":"" }}>{{$khoa_hoc->ten_khoa_hoc}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="filter-row">
              <h2>Thông tin sức khỏe</h2>
              <div class="search-item d-inline-block w-25">
                <label for="can_nang">Cân nặng (KG)</label>
                <input type="number" name="can_nang" class="form-control" placeholder="Nhập cân nặng" value="{{$hoc_sinh->can_nang}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chieu_cao">Chiều cao (CM)</label>
                <input type="number" name="chieu_cao" class="form-control" placeholder="Nhập chiều cao" value="{{$hoc_sinh->chieu_cao}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" name="noi_sinh" class="form-control" placeholder="Nhập nơi sinh" value="{{$hoc_sinh->noi_sinh}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="thong_tin_suc_khoe">Thông tin sức khỏe</label>
                <textarea type="text" name="thong_tin_suc_khoe" class="form-control" placeholder="Nhập thông tin sức khỏe">{{$hoc_sinh->thong_tin_suc_khoe}}</textarea>
              </div>
            </div>
            <div class="filter-row">
              <h2>Thông tin phụ huynh</h2>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten_me">Họ tên mẹ</label>
                <input type="text" name="ho_ten_me" class="form-control" value="{{$hoc_sinh->ho_ten_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sdt_me">Số điện thoại của mẹ</label>
                <input type="text" name="sdt_me" class="form-control" value="{{$hoc_sinh->sdt_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="email_me">Email của mẹ</label>
                <input type="email" name="email_me" class="form-control" value="{{$hoc_sinh->email_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nghe_nghiep_me">Nghề nghiệp của mẹ</label>
                <input type="text" name="nghe_nghiep_me" class="form-control" value="{{$hoc_sinh->nghe_nghiep_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd_me">Số căn cước của mẹ</label>
                <input type="text" name="cmnd_me" class="form-control" value="{{$hoc_sinh->cmnd_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nam_sinh_me">Năm sinh của mẹ</label>
                <input type="text" name="nam_sinh_me" class="form-control" value="{{$hoc_sinh->nam_sinh_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich_me">Quốc tịch của mẹ</label>
                <input type="text" name="quoc_tich_me" class="form-control" value="{{$hoc_sinh->quoc_tich_me}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten_bo">Họ tên bố</label>
                <input type="text" name="ho_ten_bo" class="form-control" value="{{$hoc_sinh->ho_ten_bo}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="sdt_bo">Số điện thoại của bố</label>
                <input type="text" name="sdt_bo" class="form-control" value="{{$hoc_sinh->sdt_bo}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="email_bo">Email của bố</label>
                <input type="email" name="email_bo" class="form-control" value="{{$hoc_sinh->email_bo}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nghe_nghiep_bo">Nghề nghiệp của bố</label>
                <input type="text" name="nghe_nghiep_bo" class="form-control" value="{{$hoc_sinh->nghe_nghiep_bo}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd_bo">Số căn cước của bố</label>
                <input type="text" name="cmnd_bo" class="form-control" value="{{$hoc_sinh->cmnd_bo}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="nam_sinh_bo">Năm sinh của bố</label>
                <input type="text" name="nam_sinh_bo" class="form-control" value="{{$hoc_sinh->nam_sinh_bo}}">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich_bo">Quốc tịch của bố</label>
                <input type="text" name="quoc_tich_bo" class="form-control" value="{{$hoc_sinh->quoc_tich_bo}}">
              </div>
            </div>
            @if(!empty($hoc_sinh->di_bus))
              <div class="filter-row">
                <h2>Thông tin đưa đón</h2>
                <div class="search-item d-inline-block w-25">
                  <label for="tuyen_xe">Tuyến xe</label>
                  <select name="tuyen_xe" class="form-select" required>
                    <option value="huy">Không đăng ký</option>
                    @foreach ($tuyen_xes as $tuyen_xe)
                    <option value="{{ $tuyen_xe->id }}" {{$hoc_sinh->id_tuyen_xe==$tuyen_xe->id?"selected":""}}>{{$tuyen_xe->ten_tuyen_xe}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="diem_don">Điểm đón</label>
                  <input type="text" name="diem_don" class="form-control"  placeholder="Nhập người đưa đón" value="{{$hoc_sinh->diem_don}}">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="so_km">Số KM</label>
                  <input type="text" name="so_km" class="form-control"  placeholder="Nhập người đưa đón" value="{{$hoc_sinh->so_km}}">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="nguoi_dua_don">Người đưa đón</label>
                  <input type="text" name="nguoi_dua_don" class="form-control"  placeholder="Nhập người đưa đón" value="{{$hoc_sinh->nguoi_dua_don}}">
                </div>
                <div class="search-item d-inline-block w-25">
                  <label for="lien_he_khan">Liên hệ khẩn</label>
                  <input type="text" name="lien_he_khan" class="form-control"  placeholder="Nhập liên hệ khẩn" value="{{$hoc_sinh->lien_he_khan}}">
                </div>
              </div>
            @endIf
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Lưu
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_hs')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách học sinh
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
   
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  </script>
@include('components/bao_loi')
</body>
</html>