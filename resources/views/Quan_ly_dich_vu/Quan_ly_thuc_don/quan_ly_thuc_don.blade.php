<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý thực đơn</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý thực đơn</h2>
          </div>

          <!-- Search and Filter Section -->
          <form class="search-container" action="{{url('ql_lt')}}" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="lai_xe">Tuần</label>
                <select id="position-filter" name = "tuan" class="form-select">
                  <option value="" disable selected>Tất cả các tuần</option>
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}">Tuần thứ {{$tuan->tuan}} năm {{$tuan->nam}}</option>
                  @endforeach
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
                <a class="btn btn-primary" href="{{route('them_td')}}">
                  <i class="fa-solid fa-plus me-1"></i> Thêm thực đơn mới
                </a>
                <button class="btn btn-outline-secondary ms-2">
                  <a href="{{route('export_hs',[
                      'tk_ho_ten'=>!empty($tk_ho_ten)?$tk_ho_ten:"",
                      'tk_gioi_tinh'=>!empty($tk_gioi_tinh)?$tk_gioi_tinh:"",
                      'tk_quoc_tich'=>!empty($tk_quoc_tich)?$tk_quoc_tich:"",
                      'tk_ngay_nhap_hoc'=>!empty($tk_ngay_nhap_hoc)?$tk_ngay_nhap_hoc:"",
                      'tk_ngay_thoi_hoc'=>!empty($tk_ngay_thoi_hoc)?$tk_ngay_thoi_hoc:"",
                      'tk_trang_thai'=>!empty($tk_trang_thai)?$tk_trang_thai:""])}}">
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
                  <th>ID</th>
                  <th>Tuần</th>
                  <th>Thứ</th>
                  <th>Bữa sáng 1</th>
                  <th>Bữa sáng 2</th>
                  <th>Món chính</th>
                  <th>Rau</th>
                  <th>Canh</th>
                  <th>Cơm</th>
                  <th>Cháo</th>
                  <th>Bữa chiều 1</th>
                  <th>Bữa chiều 2</th>
                  <th>Bữa nhẹ</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($thuc_dons as $thuc_don)
                <tr>
                  <td>{{$thuc_don->id}}</td>
                  <td>{{$thuc_don->tuyen_xe}}</td>
                  <td>{{$thuc_don->ngay}}</td>
                  <td>{{$thuc_don->ho_ten}}</td>
                  <td>{{$thuc_don->ho_ten}}</td>
                  <td>{{$thuc_don->bien_so_xe}}</td>
                  <td>{{$thuc_don->danh_sach}}</td>
                  <td class="action-column">
                    <a class="action-button" title="Chỉnh sửa" href="{{route('sua_lt',['id' => $thuc_don->id])}}"><i class="fa-solid fa-edit"></i></a>
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
@include('components/bao_loi')
</body>
</html>