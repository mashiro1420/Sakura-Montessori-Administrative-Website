<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý đăng ký ăn của học sinh</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i>Quản lý đăng ký ăn của học sinh  </h2>
          </div>

          <!-- Search and Filter Section -->
          <form class="search-container" action="" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="ho_ten_search">Họ và tên</label>
                <input type="text" id="ho_ten_search" name = "ho_ten_search" {{!empty($ho_ten_search)?"value=$ho_ten_search":""}} class="form-control" placeholder="Tìm kiếm theo họ tên học sinh">
              </div>
              {{-- <div class="search-item d-inline-block w-25">
                <label for="trang_thai_search">Trạng thái</label>
                <select name="trang_thai_search" class="form-select">
                  <option value="">-- Chọn trạng thái --</option>
                  <option value="1" {{!empty($trang_thai_search) && $trang_thai_search == 1?"selected":""}}>Đã đăng ký</option>
                  <option value="0" {{!empty($trang_thai_search) && $trang_thai_search == 0?"selected":""}}>Chưa đăng ký</option>
                </select>
              </div> --}}
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary">
                  <i class="fa-solid fa-search me-1"></i> Tìm kiếm
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                {{-- <form action="{{ url('import_menu') }}" method="post" enctype="multipart/form-data" id="import-form">
                  @csrf
                  <input type="file" name="file" id="file-input" class="d-none" required>
                  <button type="submit" name="import" class="btn btn-outline-secondary ms-2" id="import-button"><i class="fa-solid fa-file-import me-1"></i>Import Excel</button>
                </form> --}}
                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#dangKyModal">
                  <i class="fa-solid fa-plus me-1"></i> Đăng ký
                </a>
              </div>
            </div>
          </form>
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên học sinh</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hoc_sinhs as $hoc_sinh)
                <tr>
                  <td>{{$hoc_sinh->id}}</td>
                  <td>{{$hoc_sinh->ho_ten}}</td>
                  <td>
                    @if($hoc_sinh->trang_thai == 1)
                      <span class="badge bg-success">Đã đăng ký</span>
                    @else
                      <span class="badge bg-danger">Chưa đăng ký</span>
                    @endif
                  </td>
                  <td class="action-column">
                    <a class="action-button" title="Xóa" href="{{route('xl_huy_an',['id'=>$hoc_sinh->id])}}"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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
  <!-- Modal -->
  <div class="modal fade" id="dangKyModal" tabindex="-1" aria-labelledby="dangKyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{url('xl_dk_an')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="dangKyModalLabel">Đăng ký học sinh</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="hoc_sinh_select" class="form-label">Chọn học sinh</label>
              <select class="lesson-input form-select select2" id="hoc_sinh_select" name="hoc_sinh" required>
                @foreach ($hoc_sinh_mois as $hoc_sinh)
                  <option value="{{ $hoc_sinh->id }}">{{ $hoc_sinh->id }}-{{ $hoc_sinh->ho_ten }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="fileUpload" class="form-label">Tải lên file</label>
              <input type="file" class="form-control" id="fileUpload" name="file" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Gửi đăng ký</button>
          </div>
        </div>
      </form>
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
    $(document).ready(function () {
      $('.select2').select2({
        placeholder: "Chọn học sinh",
        allowClear: true,
        dropdownParent: $('#dangKyModal')
      });
    });
  </script>
@include('components/bao_loi')
</body>
</html>