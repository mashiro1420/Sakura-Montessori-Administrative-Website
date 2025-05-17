<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Điểm danh xe bus</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Điểm danh xe bus</h2>
          </div>
        <div class="search-container">
          <!-- Search and Filter Section -->
          <!-- < class="search-container"> -->
          <div class="filter-row">
            <div class="search-item d-inline-block w-25">
              <label for="tuyen_xe">Tuyến xe</label>
              <input type="text" name="tuyen_xe" class="form-control" value="{{ $lo_trinh->ten_tuyen_xe }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="lai_xe">Lái xe</label>
              <input type="text" name="lai_xe" class="form-control" value="{{ $lo_trinh->ho_ten_lai_xe }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="monitor">Giám sát viên</label>
              <input type="text" name="monitor" class="form-control" value="{{ $lo_trinh->ho_ten_monitor }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="ngay">Ngày</label>
              <input type="date" name="ngay" class="form-control" value="{{ $lo_trinh->ngay }}" readonly>
            </div>
            <div class="search-item d-inline-block w-25">
              <label for="bien_so_xe">Biển số xe</label>
              <input type="text" name="bien_so_xe" class="form-control" value="{{ $lo_trinh->bien_so_xe }}" readonly>
            </div>
          </div>
          <form  action="{{ url('xl_diem_danh_bus') }}" method="post">
              @csrf
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-search me-1"></i> Nộp điểm danh
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-primary" href="{{route('ql_lt')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
                </a>
              </div>
            </div>
          </div>
            <!-- Table Section -->
            <div class="data-container">
              <input type="text" name="ds_diem_danh" id="ds_diem_danh" hidden>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Học sinh</th>
                    <th>Điểm đón</th>
                    <th>Người đưa đón</th>
                    <th>Số liên hệ khẩn</th>
                    <th>Trạng thái</th>
                    <th>Điểm danh</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($hoc_sinhs as $hoc_sinh)
                  <tr>
                    <td>{{$hoc_sinh->hs_id}}</td>
                    <td>{{$hoc_sinh->ho_ten}}</td>
                    <td>{{$hoc_sinh->diem_don}}</td>
                    <td>{{$hoc_sinh->nguoi_dua_don}}</td>
                    <td>{{$hoc_sinh->lien_he_khan}}</td>
                    <td>{{$hoc_sinh->trang_thai==1?"Có mặt":"Vắng mặt"}}</td>
                    <td class="action-column">
                    <input type="checkbox" class="hoc-sinh-checkbox" data-id="{{ $hoc_sinh->hs_id }}" {{ $hoc_sinh->trang_thai==1?"checked":"" }}>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.hoc-sinh-checkbox');
        const hiddenInput = document.getElementById('ds_diem_danh');
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

  </script>
@include('components/bao_loi')
</body>
</html>