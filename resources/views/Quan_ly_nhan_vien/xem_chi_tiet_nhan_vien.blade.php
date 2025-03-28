<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xem chi tiết nhân viên</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Xem chi tiết nhân viên</h2>
            <div class="action-buttons">
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_nv')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách nhân viên
                </a>
              </div>
            </div>
          </div>
          <!-- Form to update employee -->
          <div class="search-container">
            <h2>Thông tin cá nhân</h2>
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="id">Mã nhân viên</label>
                <input type="text" id="id" name="id" value="{{ $chi_tiet->id }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" id="ho_ten" name="ho_ten" value="{{ $chi_tiet->ho_ten }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gioi_tinh">Giới tính</label>
                <select id="gioi_tinh" name="gioi_tinh" class="form-select" readonly>
                  <option value="Nam" {{ $chi_tiet->gioi_tinh=='Nam'?"selected":"" }}>Nam</option>
                  <option value="Nữ" {{ $chi_tiet->gioi_tinh=='Nữ'?"selected":"" }}>Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" id="noi_sinh" name="noi_sinh" value="{{ $chi_tiet->ho_ten }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" id="ngay_sinh" name="ngay_sinh" value="{{ $chi_tiet->ngay_sinh }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_vao_lam">Ngày vào làm</label>
                <input type="date" id="ngay_vao_lam" name="ngay_vao_lam" value="{{ $chi_tiet->ngay_vao_lam }}" class="form-control">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_nghi_viec">Ngày nghỉ việc</label>
                <input type="date" id="ngay_nghi_viec" name="ngay_nghi_viec" value="{{ $chi_tiet->ngay_nghi_viec }}" class="form-control">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="tham_nien">Thâm niên</label>
                <input type="text" id="tham_nien" name="tham_nien" value="{{ $chi_tiet->tham_nien }}" class="form-control">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="cmnd">Số căn cước công dân</label>
                <input type="text" id="cmnd" name="cmnd" value="{{ $chi_tiet->cmnd }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay_cap">Ngày cấp</label>
                <input type="date" id="ngay_cap" name="ngay_cap" value="{{ $chi_tiet->ngay_cap }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="noi_cap">Nơi cấp</label>
                <input type="text" id="noi_cap" name="noi_cap" value="{{ $chi_tiet->noi_cap }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="quoc_tich">Quốc tịch</label>
                <input type="text" id="quoc_tich" name="quoc_tich" value="{{ $chi_tiet->quoc_tich }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="dan_toc">Dân tộc</label>
                <input type="text" id="dan_toc" name="dan_toc" value="{{ $chi_tiet->dan_toc }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ton_giao">Tôn giáo</label>
                <input type="text" id="ton_giao" name="ton_giao" value="{{ $chi_tiet->ton_giao }}" class="form-control" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="chuc_vu">Chức vụ</label>
                <input type="text" id="chuc_vu" name="chuc_vu" class="form-control" value="{{ $chi_tiet->ChucVu->ten_chuc_vu }}" readonly>
              </div>
            </div>
          </div>
          <div class="search-container mt-4">
            <h2>Thông tin bằng cấp</h2>
            <div class="search-item d-inline-block w-25">
              <label for="chuyen_nganh">Chuyên ngành</label>
              <input type="text" id="chuyen_nganh" name="chuyen_nganh" class="form-control" value="{{ $bang_cap->id_chuyen_nganh }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="trinh_do_hoc_van">Trình độ học vấn</label>
              <input type="text" id="trinh_do_hoc_van" name="trinh_do_hoc_van" class="form-control" value="{{ $bang_cap->trinh_do_hoc_van }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="trinh_do_hoc_van">Trình độ học vấn</label>
              <input type="text" id="trinh_do_hoc_van" name="trinh_do_hoc_van" class="form-control" value="{{ $bang_cap->trinh_do_hoc_van }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="trinh_do_chuyen_mon">Trình độ chuyên môn</label>
              <input type="text" id="trinh_do_hoc_van" name="trinh_do_chuyen_mon" class="form-control" value="{{ $bang_cap->trinh_do_chuyen_mon }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="trinh_do_chinh">Trình độ chính</label>
              <input type="text" id="trinh_do_chinh" name="trinh_do_chinh" class="form-control" value="{{ $bang_cap->trinh_do_chinh }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="truong_dao_tao">Trường đào tạo</label>
              <input type="text" id="truong_dao_tao" name="truong_dao_tao" class="form-control" value="{{ $bang_cap->truong_dao_tao }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="chuyen_nganh">Chuyên ngành</label>
              <input type="text" id="chuyen_nganh" name="chuyen_nganh" class="form-control" value="{{ $bang_cap->chuyen_nganh }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="xep_loai">Xếp loại</label>
              <input type="text" id="xep_loai" name="xep_loai" class="form-control" value="{{ $bang_cap->xep_loai }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="hinh_thuc_dao_tao">Hình thức đào tạo</label>
              <input type="text" id="hinh_thuc_dao_tao" name="hinh_thuc_dao_tao" class="form-control" value="{{ $bang_cap->hinh_thuc_dao_tao }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="nam_tot_nghiep">Năm tốt nghiệp</label>
              <input type="text" id="nam_tot_nghiep" name="nam_tot_nghiep" class="form-control" value="{{ $bang_cap->nam_tot_nghiep }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="chung_chi">Chứng chỉ</label>
              <input type="text" id="chung_chi" name="chung_chi" class="form-control" value="{{ $bang_cap->chung_chi }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="montessori">Montessori</label>
              <input type="text" id="montessori" name="montessori" class="form-control" value="{{ $bang_cap->montessori }}" readonly>
            </div>
          </div>
          <div class="search-container mt-4">
            <h2>Thông tin dân sự</h2>
            <div class="search-item d-inline-block w-25">
              <label for="so_bhxh">Số bảo hiểm xã hội</label>
              <input type="text" id="so_bhxh" name="so_bhxh" class="form-control" value="{{ $dan_su->so_bhxh }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="thang_tham_gia_bhxh">Tháng tham gia bảo hiểm xã hội</label>
              <input type="text" id="thang_tham_gia_bhxh" name="thang_tham_gia_bhxh" class="form-control" value="{{ $dan_su->thang_tham_gia_bhxh }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ma_so_thue">Mã số thuế</label>
              <input type="text" id="ma_so_thue" name="ma_so_thue" class="form-control" value="{{ $dan_su->ma_so_thue }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="thuong_tru">Thường trú</label>
              <input type="text" id="thuong_tru" name="thuong_tru" class="form-control" value="{{ $dan_su->thuong_tru }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="tam_tru">Tạm trú</label>
              <input type="text" id="tam_tru" name="tam_tru" class="form-control" value="{{ $dan_su->tam_tru }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="khai_sinh">Khai sinh</label>
              <input type="text" id="khai_sinh" name="khai_sinh" class="form-control" value="{{ $dan_su->khai_sinh }}" readonly>
            </div>
          </div>
          <div class="search-container mt-4">
            <h2>Thông tin hôn nhân</h2>
            <div class="search-item d-inline-block w-25">
              <label for="tinh_trang_hon_nhan">Tình trạng hôn nhân</label>
              <input type="text" id="tinh_trang_hon_nhan" name="tinh_trang_hon_nhan" class="form-control" value="{{ $hon_nhan->tinh_trang_hon_nhan }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="so_con">Số con</label>
              <input type="text" id="so_con" name="so_con" class="form-control" value="{{ $hon_nhan->so_con }}" readonly>
            </div>
          </div>
          <div class="search-container mt-4">
            <h2>Thông tin hợp đồng</h2>
            <div class="search-item d-inline-block w-25">
              <label for="loai_hop_dong">Loại hợp đồng</label>
              <input type="text" id="loai_hop_dong" name="loai_hop_dong" class="form-control" value="{{ $hop_dong->loai_hop_dong }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="so_hop_dong">Số hợp đồng</label>
              <input type="text" id="so_hop_dong" name="so_hop_dong" class="form-control" value="{{ $hop_dong->so_hop_dong }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngay_ky">Ngày ký</label>
              <input type="text" id="ngay_ky" name="ngay_ky" class="form-control" value="{{ $hop_dong->ngay_ky }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngay_ket_thuc">Ngày kết thúc</label>
              <input type="text" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control" value="{{ $hop_dong->ngay_ket_thuc }}" readonly>
            </div>
          </div>
          <div class="search-container mt-4">
            <h2>Thông tin liên hệ</h2>
            <div class="search-item d-inline-block w-25">
              <label for="sdt_rieng">Số điện thoại riêng</label>
              <input type="text" id="sdt_rieng" name="sdt_rieng" class="form-control" value="{{ $lien_he->sdt_rieng }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="sdt_noi_bo">Số điện thoại nội bộ</label>
              <input type="text" id="sdt_noi_bo" name="sdt_noi_bo" class="form-control" value="{{ $lien_he->sdt_noi_bo }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="email_rieng">Email riêng</label>
              <input type="text" id="email_rieng" name="email_rieng" class="form-control" value="{{ $lien_he->email_rieng }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="email_noi_bo">Email nội bộ</label>
              <input type="text" id="email_noi_bo" name="email_noi_bo" class="form-control" value="{{ $lien_he->email_noi_bo }}" readonly>
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