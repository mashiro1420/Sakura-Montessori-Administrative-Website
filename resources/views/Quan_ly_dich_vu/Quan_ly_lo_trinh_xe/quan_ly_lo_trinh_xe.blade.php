<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý lộ trình xe</title>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Quản lý lộ trình xe</h2>
          </div>

          <!-- Search and Filter Section -->
          <!-- < class="search-container"> -->
          <form class="search-container" action="{{url('ql_lt')}}" method="get">
            @csrf
            <div class="filter-row">
              <div class="search-item d-inline-block w-25">
                <label for="tuyen_xe_search">Tuyến xe</label>
                <select name="tuyen_xe_search" class="form-select">
                  <option value="">Tất cả tuyến xe</option>
                  @foreach($tuyen_xes as $tuyen_xe)
                    <option value="{{$tuyen_xe->id}}"{{ !empty($tuyen_xe_search)&&$tuyen_xe_search == $tuyen_xe->id?"selected":""}}>{{$tuyen_xe->ten_tuyen_xe}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="lai_xe_search">Lái xe</label>
                <select name="lai_xe_search" class="form-select">
                  <option value="">Tất cả lái xe</option>
                  @foreach($lai_xes as $lai_xe)
                    <option value="{{$lai_xe->id}}" {{ !empty($lai_xe_search)&&$lai_xe_search == $lai_xe->id?"selected":""}}>{{$lai_xe->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="ngay">Ngày</label>
                <div class="d-flex">
                  <span style="font-size: 14pt">Từ</span>
                  <input type="date" name="tu_ngay_search" class="form-control" value="{{!empty($tu_ngay_search)?$tu_ngay_search:''}}">
                  <span style="font-size: 14pt">đến</span>
                  <input type="date" name="den_ngay_search" class="form-control" value="{{!empty($den_ngay_search)?$den_ngay_search:''}}">
                </div>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="monitor_search">Giám sát viên</label>
                <select name="monitor_search" class="form-select">
                  <option value="">Tất cả giám sát viên</option>
                  @foreach($monitors as $monitor)
                    <option value="{{$monitor->id}}" {{ !empty($monitor_search)&&$monitor_search == $monitor->id?"selected":""}}>{{$monitor->ho_ten}}</option>
                  @endforeach
                </select>
              </div>
              <div class="search-item d-inline-block w-25">
                <label for="bien_so_xe_search">Biển số xe</label>
                <input type="text" name="bien_so_xe_search" class="form-control" placeholder="Tìm kiếm theo biển số xe" value="{{!empty($bien_so_xe_search)?$bien_so_xe_search:''}}">
              </div>
            <div class="action-buttons">
              <div>
                <button class="btn btn-primary">
                  <i class="fa-solid fa-search me-1"></i> Tìm kiếm
                </button>
                <button type="button" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-primary" href="{{route('them_lt')}}">
                  <i class="fa-solid fa-plus me-1"></i> Thêm lộ trình xe mới
                </a>
                {{-- <button class="btn btn-outline-secondary ms-2">
                  <a href="{{route('export_hs',[
                      'tk_ho_ten'=>!empty($tk_ho_ten)?$tk_ho_ten:"",
                      'tk_gioi_tinh'=>!empty($tk_gioi_tinh)?$tk_gioi_tinh:"",
                      'tk_quoc_tich'=>!empty($tk_quoc_tich)?$tk_quoc_tich:"",
                      'tk_ngay_nhap_hoc'=>!empty($tk_ngay_nhap_hoc)?$tk_ngay_nhap_hoc:"",
                      'tk_ngay_thoi_hoc'=>!empty($tk_ngay_thoi_hoc)?$tk_ngay_thoi_hoc:"",
                      'tk_trang_thai'=>!empty($tk_trang_thai)?$tk_trang_thai:""])}}">
                    <i class="fa-solid fa-file-export me-1"></i> Xuất Excel
                  </a>
                </button> --}}
              </div>
            </div>
          </form>
          <!-- Table Section -->
          <div class="data-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tuyến xe</th>
                  <th>Ngày</th>
                  <th>Lái xe</th>
                  <th>Monitor</th>
                  <th>Biển số xe</th>
                  <th>Danh sách</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lo_trinh_xes as $lo_trinh_xe)
                <tr>
                  <td>{{$lo_trinh_xe->id}}</td>
                  <td>{{$lo_trinh_xe->ten_tuyen_xe}}</td>
                  <td>{{$lo_trinh_xe->ngay}}</td>
                  <td>{{$lo_trinh_xe->ten_lai_xe}}</td>
                  <td>{{$lo_trinh_xe->ten_monitor}}</td>
                  <td>{{$lo_trinh_xe->bien_so_xe}}</td>
                  <td>
                    @if(!empty($lo_trinh_xe->danh_sach))
                      <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#fileModal"
                              data-file="{{ asset('DS_diem_danh/'.$lo_trinh_xe->ngay.'/'.$lo_trinh_xe->danh_sach) }}"
                              data-filename="{{ $lo_trinh_xe->danh_sach }}">
                        <i class="fas fa-eye"></i> Hiển thị
                      </button>
                    @else
                      <span class="text-muted">Không có file</span>
                    @endif
                  </td>
                  <td class="action-column">
                    <a class="action-button" title="Chỉnh sửa" href="{{route('sua_lt',['id' => $lo_trinh_xe->id])}}"><i class="fa-solid fa-edit"></i></a>
                    <a class="action-button" title="Điểm danh xe bus" href="{{route('diem_danh_bus',['id' => $lo_trinh_xe->id])}}"><i class="fa-solid fa-user-check"></i></a>
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
   <!-- Modal xem file -->
  <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel">Xem file</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
        </div>
        <div class="modal-body d-flex justify-content-center align-items-center" style="min-height: 70vh;">
          <div id="fileViewerContainer" class="w-100 text-center">
            <iframe id="fileViewerIframe" src="" width="100%" height="600px" frameborder="0" style="display: none;"></iframe>
            <img id="fileViewerImage" src="" class="img-fluid d-block mx-auto" style="max-height: 600px; display: none;" />
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
    window.location.href = '{{ url("ql_lt") }}';
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
  const fileModal = document.getElementById('fileModal');
  const fileViewerIframe = document.getElementById('fileViewerIframe');
  const fileViewerImage = document.getElementById('fileViewerImage');

  fileModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const fileUrl = button.getAttribute('data-file');
    const filename = button.getAttribute('data-filename') || '';
    const extension = filename.split('.').pop().toLowerCase();

    // Reset
    fileViewerIframe.style.display = 'none';
    fileViewerImage.style.display = 'none';
    fileViewerIframe.src = '';
    fileViewerImage.src = '';

    // Xác định loại file
    const isImage = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(extension);
    const isPDF = extension === 'pdf';
    const isDoc = ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'].includes(extension);
    const isText = extension === 'txt';

    if (isImage) {
      fileViewerImage.src = fileUrl;
      fileViewerImage.style.display = 'block';
    } else if (isPDF) {
      fileViewerIframe.src = fileUrl;
      fileViewerIframe.style.display = 'block';
    } else if (isDoc || isText) {
      // Dùng Google Docs Viewer cho file mềm
      fileViewerIframe.src = `https://docs.google.com/gview?url=${fileUrl}&embedded=true`;
      fileViewerIframe.style.display = 'block';
    } else {
      fileViewerIframe.src = fileUrl;
      fileViewerIframe.style.display = 'block';
    }
  });

  fileModal.addEventListener('hidden.bs.modal', function () {
    fileViewerIframe.src = '';
    fileViewerImage.src = '';
  });
</script>
@include('components/bao_loi')
</body>
</html>