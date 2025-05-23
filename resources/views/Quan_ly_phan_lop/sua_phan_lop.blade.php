
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa phân lớp</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
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
            <h2><i class="fa-solid fa-pen-to-square"></i> Sửa phân lớp</h2>
          </div>
          <form class="search-container" action="{{url('xl_sua_phan_lop')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $phan_lop->id }}">
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="gv_cn">Giáo viên chủ nhiệm</label>
                <select id="gv_cn" name="gv_cn" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($gv_cns as $gv_cn)
                    <option value="{{ $gv_cn->id }}" {{ $gv_cn->id == $phan_lop->id_gv_cn ? 'selected' : '' }}>
                      {{ $gv_cn->ho_ten }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="gv_viet">Giáo viên Việt</label>
                <select id="gv_viet" name="gv_viet" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($gv_viets as $gv_viet)
                    <option value="{{ $gv_viet->id }}" {{ $gv_viet->id == $phan_lop->id_gv_viet ? 'selected' : '' }}>
                      {{ $gv_viet->ho_ten }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="gv_nuoc_ngoai">Giáo viên nước ngoài</label>
                <select id="gv_nuoc_ngoai" name="gv_nuoc_ngoai" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($gv_nuoc_ngoais as $gv_nuoc_ngoai)
                    <option value="{{ $gv_nuoc_ngoai->id }}" {{ $gv_nuoc_ngoai->id == $phan_lop->id_gv_nuoc_ngoai ? 'selected' : '' }}>
                      {{ $gv_nuoc_ngoai->ho_ten }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="lop">Lớp</label>
                <select id="lop" name="lop" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($lops as $lop)
                    <option value="{{ $lop->id }}" {{ $lop->id == $phan_lop->id_lop ? 'selected' : '' }}>
                      {{ $lop->ten_lop }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="khoi">Khối</label>
                <select id="khoi" name="khoi" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($khois as $khoi)
                    <option value="{{ $khoi->id }}" {{ $khoi->id == $phan_lop->id_khoi ? 'selected' : '' }}>
                      {{ $khoi->ten_khoi }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="phong_hoc">Phòng học</label>
                <select id="phong_hoc" name="phong_hoc" class="select2-elem form-select" required>
                  <option value="{{ $phan_lop->id_phong_hoc }}">{{ $phan_lop->Lop->ten_lop }}</option>
                  @foreach($phong_hocs as $phong_hoc)
                    <option value="{{ $phong_hoc->id }}" {{ $phong_hoc->id == $phan_lop->id_phong_hoc ? 'selected' : '' }}>
                      {{ $phong_hoc->ten_phong_hoc }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="he_dao_tao">Hệ đào tạo</label>
                <select id="he_dao_tao" name="he_dao_tao" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($he_dao_taos as $he_dao_tao)
                    <option value="{{ $he_dao_tao->id }}" {{ $he_dao_tao->id == $phan_lop->id_he_dao_tao ? 'selected' : '' }}>
                      {{ $he_dao_tao->ten_he_dao_tao }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="search-item d-inline-block w-25">
                <label for="khoa_hoc">Khóa học</label>
                <select id="khoa_hoc" name="khoa_hoc" class="select2-elem form-select" required>
                  <option value="">Chọn hoặc tìm kiếm</option>
                  @foreach($khoa_hocs as $khoa_hoc)
                    <option value="{{ $khoa_hoc->id }}" {{ $khoa_hoc->id == $phan_lop->id_khoa_hoc ? 'selected' : '' }}>
                      {{ $khoa_hoc->ten_khoa_hoc }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky">Kỳ</label>
                <select id="ky" name="ky" class="select2-elem form-select" data-placeholder="Chọn hoặc tìm kiếm" required>
                  <option value="" disabled selected>Chọn hoặc tìm kiếm</option>
                  @foreach($kys as $ky)
                    <option value="{{$ky->id}}" {{ $ky->id == $phan_lop->id_ky ? 'selected' : '' }}>{{$ky->ten_ky}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="action-buttons mt-3">
              <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-save me-1"></i> Lưu thay đổi
              </button>
              <a class="btn btn-outline-secondary ms-2" href="{{url('ql_phan_lop')}}">
                <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.select2-elem').select2({
        allowClear: true,
        width: '100%',
        placeholder: "Chọn hoặc tìm kiếm"
      });
    });
  </script>
  @include('components/bao_loi')
</body>
</html>
