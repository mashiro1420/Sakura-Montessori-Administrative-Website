<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý phân lớp</title>
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
          <div class="page-header">
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý phân lớp</h2>
          </div>
          <div class="search-container">
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="gv_cn">Giáo viên chủ nhiệm</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ho_ten_cn }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_viet">Giáo viên Việt</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ho_ten_vn }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_nuoc_ngoai">Giáo viên nước ngoài</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ho_ten_nn }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lop">Lớp</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_lop }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoi">Khối</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_khoi }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="phong_hoc">Phòng học</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_phong_hoc }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="he_dao_tao">Hệ đào tạo</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_he_dao_tao }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoa_hoc">Khóa học</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_khoa_hoc }}" readonly>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky">Kỳ</label>
                <input type="text" class="form-control" value="{{ $phan_lop->ten_ky }}" readonly>
              </div>
            </div>
            <div class="action-buttons">
              <form action="{{ url('xl_diem_danh') }}" method="post">
                @csrf
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-search me-1"></i> Nộp điểm danh
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-primary" href="#">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
                </a>
                <button class="btn btn-outline-secondary ms-2">
                  <a href="{{route('export_nv',[
                      'gv_cn'=>!empty($gv_cn)?$gv_cn:"",
                      'tk_gioi_tinh'=>!empty($tk_gioi_tinh)?$tk_gioi_tinh:"",
                      'tk_noi_sinh'=>!empty($tk_noi_sinh)?$tk_noi_sinh:"",
                      'tk_gv_cn'=>!empty($tk_gv_cn)?$tk_gv_cn:"",
                      'tk_trang_thai'=>!empty($tk_trang_thai)?$tk_trang_thai:""])}}">
                    <i class="fa-solid fa-file-export me-1"></i> Xuất Excel
                  </a>
                </button>
              </div>
            </div>
          </div>
          <!-- Table Section -->
          <div class="data-container">
            <input type="text" name="ds_id_hoc_sinh" id="ds_id_hoc_sinh">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Học sinh</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hoc_sinhs as $hoc_sinh)
                <tr>
                  <td>{{$hoc_sinh->hoc_sinh_id}}</td>
                  <td>{{$hoc_sinh->ho_ten}}</td>
                  <td>{{$hoc_sinh->trang_thai==1?"Có mặt":"Vắng mặt"}}</td>
                  <td class="action-column">
                    <input type="checkbox" class="hoc-sinh-checkbox" data-id="{{ $hoc_sinh->id }}">
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </form>
          <!-- Pagination -->
          <div class="pagination-container">
            <nav>
              <ul class="pagination mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
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
   
  const rows = document.querySelectorAll('.table tbody tr');  
  const itemsPerPage = 5;  
  const maxPageLinks = 5;  

   
  const totalItems = rows.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  const paginationContainer = document.querySelector('.pagination');

   
  function createPagination(currentPage) {
    let pageItems = [];

    if (totalPages <= maxPageLinks) {
       
      for (let i = 1; i <= totalPages; i++) {
        pageItems.push(i);
      }
    } else {
       
      if (currentPage <= 3) {
        pageItems = [1, 2, 3, 4, 5];
      } else if (currentPage >= totalPages - 2) {
        pageItems = [totalPages - 4, totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
      } else {
        pageItems = [currentPage - 2, currentPage - 1, currentPage, currentPage + 1, currentPage + 2];
      }
    }

    let paginationHTML = '';
    if (currentPage > 1) {
      paginationHTML += `<li class="page-item"><a class="page-link" href="#" aria-label="Previous" onclick="changePage(${currentPage - 1})">&laquo;</a></li>`;
    }

    if (pageItems[0] > 1) {
      paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">...</a></li>`;
    }

    pageItems.forEach(page => {
      paginationHTML += `<li class="page-item ${page === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" onclick="changePage(${page})">${page}</a>
                          </li>`;
    });

    if (pageItems[pageItems.length - 1] < totalPages) {
      paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">...</a></li>`;
    }

    if (currentPage < totalPages) {
      paginationHTML += `<li class="page-item"><a class="page-link" href="#" aria-label="Next" onclick="changePage(${currentPage + 1})">&raquo;</a></li>`;
    }

    paginationContainer.innerHTML = paginationHTML;
  }

 
  function changePage(pageNumber) {
    if (pageNumber >= 1 && pageNumber <= totalPages) {
      createPagination(pageNumber);
      displayPageData(pageNumber);
    }
  }

 
  function displayPageData(currentPage) {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = currentPage * itemsPerPage;

 
    rows.forEach(row => {
      row.style.display = 'none';
    });

 
    for (let i = startIndex; i < endIndex && i < totalItems; i++) {
      rows[i].style.display = '';
    }
  }

 
  createPagination(1);
  displayPageData(1);
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
          const checkboxes = document.querySelectorAll('.hoc-sinh-checkbox');
          const hiddenInput = document.getElementById('ds_id_hoc_sinh');
          let selectedIds = [];
  
          checkboxes.forEach(checkbox => {
              checkbox.addEventListener('change', function () {
                  const id = this.getAttribute('data-id');
                  if (this.checked) {
                      if (!selectedIds.includes(id)) {
                          selectedIds.push(id);
                      }
                  } else {
                      selectedIds = selectedIds.filter(item => item !== id);
                  }
                  hiddenInput.value = selectedIds.join(',');
              });
          });
      });
    </script>
@include('components/bao_loi')
</body>
</html>