<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý danh mục khóa học</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý danh mục khóa học</h2>
          </div>

          <!-- Search and Filter Section -->
          <!-- < class="search-container"> -->
          <form class="search-container" action="{{url('ql_dm_khoa_hoc')}}" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="ten_khoa_hoc_search">Tên khóa học</label>
                <input type="text" id="ten_khoa_hoc_search" name = "tk_ten_khoa_hoc" {{!empty($tk_ten_khoa_hoc)?"value=$tk_ten_khoa_hoc":""}} class="form-control" placeholder="Tìm kiếm tên khóa học">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="status-filter">Trạng thái</label>
                <select id="status-filter" name = "tk_trang_thai" class="form-select">
                  <option value="">Tất cả trạng thái</option>
                  <option value="1"{{!empty($tk_trang_thai)&&$tk_trang_thai=="booked"?"selected":""}}>Mở</option>
                  <option value="0"{{!empty($tk_trang_thai)&&$tk_trang_thai=="empty"?"selected":""}}>Khóa</option>
                </select>
              </div>
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
                <a class="btn btn-primary" href="{{route('ql_them_khoa_hoc')}}">
                  <i class="fa-solid fa-plus me-1"></i> Thêm khóa học mới
                </a>
              </div>
            </div>
          </form>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên khóa học</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($khoa_hocs as $khoa_hoc)
                <tr>
                  <td>{{$khoa_hoc->id}}</td>
                  <td>{{$khoa_hoc->ten_khoa_hoc}}</td>
                  <td>
                    @if($khoa_hoc->trang_thai == 1)
                      Mở
                    @else
                      Khóa
                    @endif
                  </td>
                  <td class="action-column">
                    <a class="action-button" title="Chỉnh sửa" href="{{route('ql_sua_khoa_hoc',['id' => $khoa_hoc->id])}}"><i class="fa-solid fa-edit"></i></a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  // Ẩn hiện sidebar
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  // Nút làm mới phần tìm kiếm
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
  // Phần phân trang
  const rows = document.querySelectorAll('.table tbody tr'); // tất cả các dòng của bảng
  const itemsPerPage = 5; // Số phần tử mỗi trang
  const maxPageLinks = 5; // Số link page item hiển thị tối đa

  // Tính toán số trang tổng cộng
  const totalItems = rows.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  const paginationContainer = document.querySelector('.pagination');

  // Hàm tạo pagination
  function createPagination(currentPage) {
    let pageItems = [];

    if (totalPages <= maxPageLinks) {
      // Nếu tổng số trang nhỏ hơn hoặc bằng 5, hiển thị tất cả các trang
      for (let i = 1; i <= totalPages; i++) {
        pageItems.push(i);
      }
    } else {
      // Nếu số trang lớn hơn 5, xử lý các trang xung quanh trang hiện tại
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

  // Hàm thay đổi trang
  function changePage(pageNumber) {
    if (pageNumber >= 1 && pageNumber <= totalPages) {
      createPagination(pageNumber);
      displayPageData(pageNumber);
    }
  }

  // Hàm hiển thị dữ liệu cho trang hiện tại
  function displayPageData(currentPage) {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = currentPage * itemsPerPage;

    // Ẩn tất cả các dòng dữ liệu
    rows.forEach(row => {
      row.style.display = 'none';
    });

    // Hiển thị các dòng dữ liệu cho trang hiện tại
    for (let i = startIndex; i < endIndex && i < totalItems; i++) {
      rows[i].style.display = '';
    }
  }

  // Khởi tạo trang ban đầu
  createPagination(1);
  displayPageData(1);
  </script>
  <script>
    document.getElementById('import-button').addEventListener('click', function() {
      document.getElementById('file-input').click(); // Mở file picker khi nhấn nút
    });

    document.getElementById('file-input').addEventListener('change', function() {
      document.getElementById('import-form').submit(); // Tự động submit form khi chọn file
    });
  </script>
</body>
</html>