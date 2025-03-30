<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý tài khoản</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý tài khoản</h2>
          </div>

          <!-- Search and Filter Section -->
          <!-- < class="search-container"> -->
          <form class="search-container" action="{{url('ql_tk')}}" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tai_khoan_search">Tài khoản</label>
                <input type="text" id="tai_khoan_search" name = "tk_tai_khoan" {{!empty($tk_tai_khoan)?"value=$tk_tai_khoan":""}} class="form-control" placeholder="Tìm kiếm theo tài khoản">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ma_hoc_sinh_search">Mã học sinh</label>
                <input type="text" id="ma_hoc_sinh_search" name = "tk_ma_hoc_sinh" {{!empty($tk_ma_hoc_sinh)?"value=$tk_ma_hoc_sinh":""}} class="form-control" placeholder="Tìm kiếm theo mã học sinh">
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ma_nhan_vien_search">Mã nhân viên</label>
                <input type="text" id="ma_nhan_vien_search" name = "tk_nhan_vien" {{!empty($tk_nhan_vien)?"value=$tk_nhan_vien":""}} class="form-control" placeholder="Tìm kiếm theo mã nhân viên">
              </div>
              <div class="search-item d-inline-block w-25">
                  <label for="quyen_filter">Quyền</label>
                  <select id="quyen_filter" name="tk_quyen" class="form-select">
                      <option value="">Tất cả</option>
                      @foreach($quyens as $quyen)
                          <option value="{{ $quyen->id }}" 
                              {{ !empty($request->tk_quyen) && $request->tk_quyen == $quyen->id ? 'selected' : '' }}>
                              {{ $quyen->ten_quyen }}  <!-- Giả sử bạn có trường `ten_quyen` trong bảng `dm_quyen` -->
                          </option>
                      @endforeach
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
                <a class="btn btn-primary" href="{{route('them_hs')}}">
                  <i class="fa-solid fa-plus me-1"></i> Thêm học sinh mới
                </a>
                <button class="btn btn-outline-secondary ms-2">
                  <a href="{{route('export_tk',[
                      'tk_tai_khoan'=>!empty($tk_tai_khoan)?$tk_tai_khoan:"",
                      'tk_gioi_tinh'=>!empty($tk_ma_hoc_sinh)?$tk_ma_hoc_sinh:"",
                      'tk_noi_sinh'=>!empty($tk_nhan_vien)?$tk_nhan_vien:"",
                      'tk_chuc_vu'=>!empty($tk_quyen)?$tk_quyen:""])}}">
                    <i class="fa-solid fa-file-export me-1"></i> Xuất Excel
                  </a>
                </button>
              </div>
            </div>
          </form>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tài khoản</th>
                  <th>Mã học sinh</th>
                  <th>Mã nhân viên</th>
                  <th>Quyền</th>
                  {{-- <th>Thao tác</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($tai_khoans as $tai_khoan)
                <tr>
                  <td>{{$tai_khoan->tai_khoan}}</td>
                  <td>{{$tai_khoan->id_hoc_sinh}}</td>
                  <td>{{$tai_khoan->id_nhan_vien}}</td>
                  <td>
                  <form action="{{ route('xl_quyen') }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn thay đổi quyền không?')">
                      @csrf
                      <input type="hidden" name="tai_khoan" value="{{$tai_khoan->tai_khoan}}">
                      <select name="id_quyen" class="form-control">
                          @foreach($quyens as $quyen)
                              <option value="{{$quyen->id}}" {{ $tai_khoan->id_quyen == $quyen->id ? 'selected' : '' }}>
                                  {{$quyen->ten_quyen}}
                              </option>
                          @endforeach
                      </select>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Đổi quyền</button>
                    </form>
                  </td>
                  {{-- <td class="action-column">
                    <a class="action-button" href="{{route('chi_tiet_nv',['id' => $hoc_sinh->id])}}" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
                    <a class="action-button" title="Chỉnh sửa" href="{{route('cai_dat_tk',['id' => $tai_khoan->id])}}"><i class="fa-solid fa-edit"></i></a>
                  </td> --}}
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