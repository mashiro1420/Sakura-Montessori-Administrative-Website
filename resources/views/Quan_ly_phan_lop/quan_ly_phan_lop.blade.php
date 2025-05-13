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

          <!-- Search and Filter Section -->
          <!-- < class="search-container"> -->
          <form class="search-container" action="{{url('ql_phan_lop')}}" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="gv_cn_search">Giáo viên chủ nhiệm</label>
                <select id="position-filter" name = "gv_cn" class="form-select">
                  <option value="">Tất cả giáo viên</option>
                  @foreach($gv_cns as $gv_cn)
                    <option value="{{$gv_cn->id}}" {{!empty($gv_cn)&&$gv_cn==$gv_cn->id?"selected":""}}>{{$gv_cn->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_viet_search">Giáo viên Việt</label>
                <select id="position-filter" name = "gv_viet" class="form-select">
                  <option value="">Tất cả giáo viên</option>
                  @foreach($gv_viets as $gv_viet)
                    <option value="{{$gv_viet->id}}" {{!empty($gv_viet)&&$gv_viet==$gv_viet->id?"selected":""}}>{{$gv_viet->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="gv_nuoc_ngoai_search">Giáo viên nước ngoài</label>
                <select id="position-filter" name = "gv_nuoc_ngoai" class="form-select">
                  <option value="">Tất cả giáo viên</option>
                  @foreach($gv_nuoc_ngoais as $gv_nuoc_ngoai)
                    <option value="{{$gv_nuoc_ngoai->id}}" {{!empty($gv_nuoc_ngoai)&&$gv_nuoc_ngoai==$gv_nuoc_ngoai->id?"selected":""}}>{{$gv_nuoc_ngoai->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="lop_search">Lớp</label>
                <select id="position-filter" name = "lop" class="form-select">
                  <option value="">Tất cả các lớp</option>
                  @foreach($lops as $lop)
                    <option value="{{$lop->id}}" {{!empty($lop)&&$lop==$gv_cn->id?"selected":""}}>{{$lop->ten_lop}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoi_search">Khối</label>
                <select id="position-filter" name="khoi" class="form-select">
                  <option value="">Tất cả các khối</option>
                  @foreach($khois as $khoi)
                      <option value="{{ $khoi->id }}" {{ isset($pl_khoi) && $pl_khoi == $khoi->id ? "selected" : "" }}>
                          {{ $khoi->ten_khoi }}
                      </option>
                  @endforeach
                </select>              
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="phong_hoc_search">Phòng học </label>
                <select id="position-filter" name="phong_hoc" class="form-select">
                  <option value="">Tất cả các phòng học</option>
                  @foreach($phong_hocs as $phong_hoc)
                      <option value="{{ $phong_hoc->id }}" {{ isset($pl_phong_hoc) && $pl_phong_hoc == $phong_hoc->id ? "selected" : "" }}>
                          {{ $phong_hoc->ten_phong_hoc }}
                      </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="he_dao_tao_search">Hệ đào tạo </label>
                <select id="position-filter" name = "he_dao_tao" class="form-select">
                  <option value="">Tất cả các hệ đào tạo</option>
                  @foreach($he_dao_taos as $he_dao_tao)
                    <option value="{{$he_dao_tao->id}}" {{!empty($pl_he_dao_tao)&&$pl_he_dao_tao==$pl_he_dao_tao->id?"selected":""}}>{{$he_dao_tao->ten_he_dao_tao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="khoa_hoc_search">Khóa học</label>
                <select id="position-filter" name = "khoa_hoc" class="form-select">
                  <option value="">Tất cả các khóa học</option>
                  @foreach($khoa_hocs as $khoa_hoc)
                    <option value="{{$khoa_hoc->id}}" {{!empty($pl_khoa_hoc)&&$pl_khoa_hoc==$pl_khoa_hoc->id?"selected":""}}>{{$khoa_hoc->ten_khoa_hoc}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ky_search">Kỳ</label>
                <select id="position-filter" name = "ky" class="form-select">
                  <option value="">Tất cả các kỳ học</option>
                  @foreach($kys as $ky)
                    <option value="{{$ky->id}}" {{!empty($pl_ky)&&$pl_ky==$pl_ky->id?"selected":""}}>{{$ky->ten_ky}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            {{-- <div class="search-item">
              <label for="status-filter">Thêm nhiều phân lớp</label>
              <form action="{{ url('/import_nv') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="btn btn-outline-secondary ms-2" required>
                <button type="submit">Import Excel</button>
              </form>
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
                <a class="btn btn-primary" href="{{route('them_phan_lop')}}">
                  <i class="fa-solid fa-plus me-1"></i> Thêm phân lớp mới
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
          </form>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Giáo viên chủ nhiệm</th>
                  <th>Giáo viên nước ngoài</th>
                  <th>Giáo viên người Việt</th>
                  <th>Phòng học</th>
                  <th>Lớp</th>
                  <th>Khối</th>
                  <th>Hệ đào tạo</th>
                  <th>Khóa học</th>
                  <th>Kỳ</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($phan_lops as $phan_lop)
                <tr>
                  <td>{{$phan_lop->id}}</td>
                  <td>{{$phan_lop->ho_ten}}</td>
                  <td>{{$phan_lop->ho_ten}}</td>
                  <td>{{$phan_lop->ho_ten}}</td>
                  <td>{{$phan_lop->ten_phong_hoc}}</td>
                  <td>{{$phan_lop->ten_lop}}</td>
                  <td>{{$phan_lop->ten_khoi}}</td>
                  <td>{{$phan_lop->ten_he_dao_tao}}</td>
                  <td>{{$phan_lop->ten_khoa_hoc}}</td>
                  <td>{{$phan_lop->ten_ky}}</td>
                  <td class="action-column">
                    <a class="action-button" href="{{route('phan_lop',['id' => $phan_lop->id])}}" title="Phân lớp"><i class="fa-solid fa-person-circle-plus"></i></a>
                    <a class="action-button" title="Chỉnh sửa" href="{{route('sua_nv',['id' => $phan_lop->id])}}"><i class="fa-solid fa-edit"></i></a>
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
@include('components/bao_loi')
</body>
</html>