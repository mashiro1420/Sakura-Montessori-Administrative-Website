<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/Quan_ly_nhan_vien/Quan_ly_nhan_vien.css') }}">
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý nhân viên</h2>
          </div>

          <!-- Search and Filter Section -->
          <div class="search-container">
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="name-search">Họ và tên</label>
                <input type="text" id="name-search" class="form-control" placeholder="Tìm kiếm theo họ tên">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gender-filter">Giới tính</label>
                <select id="gender-filter" class="form-select">
                  <option value="">Tất cả</option>
                  <option value="male">Nam</option>
                  <option value="female">Nữ</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="birthplace-search">Nơi sinh</label>
                <input type="text" id="birthplace-search" class="form-control" placeholder="Tìm kiếm theo nơi sinh">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="seniority-search">Thâm niên</label>
                <input type="text" id="seniority-search" class="form-control" placeholder="Tìm kiếm theo thâm niên">
              </div>
            </div>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="position-filter">Chức vụ</label>
                <select id="position-filter" class="form-select">
                  <option value="">Tất cả chức vụ</option>
                  <option value="1">Hiệu trưởng</option>
                  <option value="2">Hiệu phó</option>
                  <option value="3">Giáo viên</option>
                  <option value="4">Kế toán trưởng</option>
                  <option value="5">Nhân viên kế toán</option>
                  <option value="6">Trưởng phòng nhân sự</option>
                  <option value="7">Nhân viên nhân sự</option>
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="status-filter">Trạng thái</label>
                <select id="status-filter" class="form-select">
                  <option value="">Tất cả trạng thái</option>
                  <option value="active">Đang làm việc</option>
                  <option value="inactive">Đã nghỉ việc</option>
                </select>
              </div>
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
                <a class="btn btn-primary" href="../quan_ly_nhan_vien/them_nhan_vien/index.html">
                  <i class="fa-solid fa-plus me-1"></i> Thêm nhân viên mới
                </a>
                <button class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-file-export me-1"></i> Xuất Excel
                </button>
              </div>
            </div>
          </div>

          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Họ tên</th>
                  <th>Giới tính</th>
                  <th>Nơi sinh</th>
                  <th>Ngày sinh</th>
                  <th>Ngày vào làm</th>
                  <th>Thâm niên</th>
                  <th>Chức vụ</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Nguyễn Văn A</td>
                  <td>Nam</td>
                  <td>Hà Nội</td>
                  <td>01/01/1990</td>
                  <td>10/10/2010</td>
                  <td>12 năm</td>
                  <td>Quản lý</td>
                  <td><span class="status-inactive">Đã nghỉ việc</span></td>
                  <td class="action-column">
                    <button class="action-button" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></button>
                    <button class="action-button" title="Chỉnh sửa"><i class="fa-solid fa-edit"></i></button>
                    <button class="action-button delete" title="Xóa"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Nguyễn Thị B</td>
                  <td>Nữ</td>
                  <td>Hà Nội</td>
                  <td>15/05/1992</td>
                  <td>01/03/2015</td>
                  <td>7 năm</td>
                  <td>Giáo viên</td>
                  <td><span class="status-active">Đang làm việc</span></td>
                  <td class="action-column">
                    <button class="action-button" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></button>
                    <button class="action-button" title="Chỉnh sửa"><i class="fa-solid fa-edit"></i></button>
                    <button class="action-button delete" title="Xóa"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Trần Văn C</td>
                  <td>Nam</td>
                  <td>Hải Phòng</td>
                  <td>22/08/1988</td>
                  <td>05/09/2012</td>
                  <td>10 năm</td>
                  <td>Kế toán trưởng</td>
                  <td><span class="status-active">Đang làm việc</span></td>
                  <td class="action-column">
                    <button class="action-button" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></button>
                    <button class="action-button" title="Chỉnh sửa"><i class="fa-solid fa-edit"></i></button>
                    <button class="action-button delete" title="Xóa"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
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
</body>
</html>