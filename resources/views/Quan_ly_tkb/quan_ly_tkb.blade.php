<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý thời khóa biểu</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý thời khóa biểu</h2>
          </div>
          <form class="search-container" action="" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tuan_search">Tuần</label>
                <select id="position-filter" name = "tuan_search" class="form-select select2">
                  <option value="" disable selected>Tất cả các tuần</option>
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}" {{ !empty($tuan_search)&&$tuan_search == $tuan->id?"selected":""}}>Tuần thứ {{$tuan->tuan}} từ {{$tuan->tu_ngay}} đến {{$tuan->den_ngay}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="phan_lop_search">Lớp</label>
                <select id="position-filter" name = "phan_lop_search" class="form-select">
                  <option value="" disable selected>Tất cả các lớp</option>
                  @foreach($phan_lops as $phan_lop)
                    <option value="{{$phan_lop->id}}" {{ !empty($phan_lop_search)&&$phan_lop_search == $phan_lop->id?"selected":""}}>{{$phan_lop->ten_lop.' - '.$phan_lop->ten_ky}}</option>
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
                {{-- <div>
                    <a class="btn btn-primary" href="{{route('them_tkb')}}">
                    <i class="fa-solid fa-plus me-1"></i> Thêm thời khóa biểu mới
                    </a>
                </div> --}}
            </div>
          </form>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kỳ</th>
                    <th>Tuần</th>
                    <th>Lớp</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tkbs as $tkb)
                    <tr>
                    <td>{{ $tkb->ten_ky }}</td>
                    <td>{{ $tkb->tuan }}</td>
                    <td>{{ $tkb->ten_lop }}</td>
                    <td>{{ $tkb->trang_thai==0?"Trống":($tkb->trang_thai==1?"Đang hoạt động":"Đã qua") }}</td>
                    <td class="action-column">
                      @if($tkb->trang_thai==2)
                      <a class="action-button" href="{{route('xem_tkb',['id' => $tkb->id])}}" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>                      
                      @else
                      <a class="action-button" href="{{ route('them_tkb',['id' =>$tkb->id]) }}"><i class="fa-solid fa-edit"></i></a>
                      @endIf
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
  <script>
    document.getElementById('import-button').addEventListener('click', function() {
      document.getElementById('file-input').click();  
    });

    document.getElementById('file-input').addEventListener('change', function() {
      document.getElementById('import-form').submit();  
    });
  </script>
    <script>
      $(document).ready(function () {
        $('.select2').select2({
          placeholder: "Tất cả các tuần", 
          allowClear: true
        });
      });
    </script>
@include('components/bao_loi')
</body>
</html>