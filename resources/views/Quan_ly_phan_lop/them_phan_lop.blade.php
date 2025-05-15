<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm phân lớp</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  
  <!-- Thứ tự quan trọng: jQuery trước, sau đó là Select2 CSS, sau đó là Bootstrap CSS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
  
  <!-- Thêm style để sửa xung đột Bootstrap với Select2 -->
  <style>
    .select2-container .select2-selection--single {
      height: 38px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 38px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 36px !important;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    @include('components/sidebar')
    <div class="main p-4">
      <div class="content" id="content" style="margin-left: 70px;">
        <div class="container-fluid">
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Thêm phân lớp</h2>
          </div>
          <div class="search-item">
              <label for="status-filter">Thêm nhiều phân lớp</label>
              <form action="{{ url('/import_nv') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <input type="file" name="file" id="file-input" class="d-none" required>
                <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button">Import Excel</button>
              </form>
            </div>
          <form class="search-container" action="{{url('xl_tao_lop')}}" method="post">
          @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="gv_cn">Giáo viên chủ nhiệm</label>
                <select id="gv_cn" name="gv_cn" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($gv_cns as $gv_cn)
                    <option value="{{$gv_cn->id}}">{{$gv_cn->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_viet">Giáo viên Việt</label>
                <select id="gv_viet" name="gv_viet" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($gv_viets as $gv_viet)
                    <option value="{{$gv_viet->id}}">{{$gv_viet->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_nuoc_ngoai">Giáo viên nước ngoài</label>
                <select id="gv_nuoc_ngoai" name="gv_nuoc_ngoai" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($gv_nuoc_ngoais as $gv_nuoc_ngoai)
                    <option value="{{$gv_nuoc_ngoai->id}}">{{$gv_nuoc_ngoai->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lop">Lớp</label>
                <select id="lop" name="lop" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($lops as $lop)
                    <option value="{{$lop->id}}">{{$lop->ten_lop}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoi">Khối</label>
                <select id="khoi" name="khoi" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($khois as $khoi)
                      <option value="{{ $khoi->id }}">
                          {{ $khoi->ten_khoi }}
                      </option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="phong_hoc">Phòng học</label>
                <select id="phong_hoc" name="phong_hoc" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($phong_hocs as $phong_hoc)
                      <option value="{{ $phong_hoc->id }}">
                          {{ $phong_hoc->ten_phong_hoc }}
                      </option>
                  @endforeach
                </select> 
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="he_dao_tao">Hệ đào tạo</label>
                <select id="he_dao_tao" name="he_dao_tao" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($he_dao_taos as $he_dao_tao)
                    <option value="{{$he_dao_tao->id}}" {{!empty($pl_he_dao_tao)&&$pl_he_dao_tao==$pl_he_dao_tao->id?"selected":""}}>{{$he_dao_tao->ten_he_dao_tao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoa_hoc">Khóa học</label>
                <select id="khoa_hoc" name="khoa_hoc" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($khoa_hocs as $khoa_hoc)
                    <option value="{{$khoa_hoc->id}}">{{$khoa_hoc->ten_khoa_hoc}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky">Kỳ</label>
                <select id="ky" name="ky" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($kys as $ky)
                    <option value="{{$ky->id}}">{{$ky->ten_ky}}</option>
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
              </div>
              <div>
                <a class="btn btn-outline-secondary ms-2" href="{{url('ql_phan_lop')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách phân lớp
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
  
  // Nút làm mới phần thêm phân lớp
  document.getElementById('reset-btn').addEventListener('click', function () {
    $('.select2-elem').val(null).trigger('change');
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
    $(document).ready(function() {
      // Khởi tạo Select2 cho tất cả các select
      $('.select2-elem').select2({
        allowClear: true,
        width: '100%',
        placeholder: "Chọn hoặc tìm kiếm",
        dropdownCssClass: 'select2-dropdown'
      });
    });
  </script>
  
@include('components/bao_loi')

</body>
</html>