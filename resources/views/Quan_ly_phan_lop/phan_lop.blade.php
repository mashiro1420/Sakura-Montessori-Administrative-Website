<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phân lớp</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
</head>
<style>
  .choices-multiple {
    min-width: 250px;
  }
  .choices__list--dropdown {
    max-height: 200px;
    overflow-y: auto;
  }
</style>
<body>
  <div class="wrapper">
    @include('components/sidebar')
    <!-- Main content -->
    <div class="main p-4">
      <div class="content" id="content" style="margin-left: 70px;">
        <div class="container-fluid">
          <!-- Page Header -->
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Phân lớp</h2>
          </div>
          <!-- Form to add new employee -->
          <div class="search-item">
              <label for="status-filter">Tải file danh sách học sinh</label>
              <form action="{{ route('import_lop') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <input type="file" name="file" id="file-input" class="d-none" required>
                <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button">Import Excel</button>
              </form>
            </div>

          <form class="search-container" action="{{ url('xl_phan_lop') }}" method="post">
          @csrf
            <div class="filter-row">
              <input type="text" name="id" value="{{ $phan_lop->id }}" hidden>
              <div class="search-item d-inline-block w-50">
                    <select name="hoc_sinhs[]" class="form-select choices-multiple" multiple>
                        @foreach($hoc_sinhs as $hs)
                            <option value="{{ $hs->id }}">
                            {{ $hs->id }} - {{ $hs->ho_ten }}
                            </option>
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
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
  <script>
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  // Nút làm mới phần Phân lớp
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
    <script>
      document.getElementById('import-button').addEventListener('click', function() {
        document.getElementById('file-input').click();  
      });
  
      document.getElementById('file-input').addEventListener('change', function() {
        document.getElementById('import-form').submit();  
      });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.choices-multiple').forEach(function(selectEl) {
        if (!selectEl.classList.contains('choices-initialized')) {
            new Choices(selectEl, {
            removeItemButton: true,
            placeholderValue: 'Chọn học sinh...',
            searchEnabled: true,
            shouldSort: false
            });
            selectEl.classList.add('choices-initialized');
        }
        });
    });
    </script>

@include('components/bao_loi')
</body>
</html>