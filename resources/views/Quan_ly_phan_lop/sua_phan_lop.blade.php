<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sửa phân lớp</title>
 
  <!-- Icons and Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
 
  <!-- jQuery and Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
 
  <!-- Custom styles -->
<link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}" />
<link rel="stylesheet" href="{{ asset('css/main/main.css') }}" />
 
  <!-- Select2 Custom Style -->
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Sửa phân lớp</h2>
          </div>
          <form class="search-container" action="" method="post">
            @csrf
            <div class="filter-row">
                @foreach([
                ['id' => 'gv_cn', 'label' => 'Giáo viên chủ nhiệm', 'list' => $gv_cns, 'text' => 'ho_ten'],
                ['id' => 'gv_viet', 'label' => 'Giáo viên Việt', 'list' => $gv_viets, 'text' => 'ho_ten'],
                ['id' => 'gv_nuoc_ngoai', 'label' => 'Giáo viên nước ngoài', 'list' => $gv_nuoc_ngoais, 'text' => 'ho_ten'],
                ['id' => 'lop', 'label' => 'Lớp', 'list' => $lops, 'text' => 'ten_lop'],
                ['id' => 'khoi', 'label' => 'Khối', 'list' => $khois, 'text' => 'ten_khoi'],
                ['id' => 'phong_hoc', 'label' => 'Phòng học', 'list' => $phong_hocs, 'text' => 'ten_phong_hoc'],
                ['id' => 'he_dao_tao', 'label' => 'Hệ đào tạo', 'list' => $he_dao_taos, 'text' => 'ten_he_dao_tao'],
                ['id' => 'khoa_hoc', 'label' => 'Khóa học', 'list' => $khoa_hocs, 'text' => 'ten_khoa_hoc'],
                ['id' => 'ky', 'label' => 'Kỳ', 'list' => $kys, 'text' => 'ten_ky']
                ] as $field)
                <div class="search-item d-inline-block w-25">
                    <label for="{{ $field['id'] }}">{{ $field['label'] }}</label>
                    <select id="{{ $field['id'] }}" name="{{ $field['id'] }}" class="select2-elem form-select" required>
                    <option value="" disabled {{ old($field['id']) ? '' : 'selected' }}>Chọn hoặc tìm kiếm</option>
                    @foreach($field['list'] as $item)
                        <option value="{{ $item->id }}" {{ old($field['id']) == $item->id ? 'selected' : '' }}>
                        {{ $item->{$field['text']} }}
                        </option>
                    @endforeach
                    </select>
                </div>
                @endforeach
            </div>
 
            <!-- Nút hành động -->
            <div class="action-buttons mt-3">
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
    // Sidebar toggle
    const hamBurger = document.querySelector(".toggle-btn");
    hamBurger?.addEventListener("click", function () {
      document.querySelector("#sidebar")?.classList.toggle("expand");
    });
 
    // Reset form select2
    document.getElementById('reset-btn')?.addEventListener('click', function () {
      $('.select2-elem').val(null).trigger('change');
    });
 
    // Trigger file input on import
    document.getElementById('import-button')?.addEventListener('click', function () {
      document.getElementById('file-input').click();
    });
 
    document.getElementById('file-input')?.addEventListener('change', function () {
      document.getElementById('import-form').submit();
    });
 
    // Initialize Select2
    $(document).ready(function () {
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