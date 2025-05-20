<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tuyến xe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
</head>
<body>
@include('components/navbar')
  <!-- Title & Filter -->
  <div class="container content-container">
    <div class="page-header">
      <h2 class="page-title">Tuyến xe</h2>
      <p class="text-muted mt-2">Thông tin tuyến xe hôm nay của con</p>
    </div>
    <div class="search-panel">
      @if(!empty($lo_trinh_hom_nay))
      <div class="row g-3">
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Ngày</label>
          <input type="date" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->ngay}}" readonly>
        </div>
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Tuyến xe</label>
          <input type="text" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->ten_tuyen_xe}}" readonly>
        </div>
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Biển số xe</label>
          <input type="text" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->bien_so_xe}}" readonly>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Tên monitor</label>
          <input type="text" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->ho_ten_monitor}}" readonly>
        </div>
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Số điện thoại monitor</label>
          <input type="text" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->sdt_monitor}}" readonly>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Tên tài xế</label>
          <input type="text" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->ho_ten_lai_xe}}" readonly>
        </div>
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Số điện thoại tài xế</label>
          <input type="text" name="search_from" class="form-control border-start-0" value="{{ $lo_trinh_hom_nay->sdt_lai_xe}}" readonly>
        </div>
      </div>
      @else
        <p>Không có tuyến xe ngày hôm nay</p>
      @endIf
    </div>

    <div class="search-panel">
      <form class="row g-3" action="{{ route('ph_tx') }}" method="get">
        @csrf
        <div class="col-md-3">
          <label for="search_from" class="form-label small text-muted">Từ ngày</label>
          <input type="date" name="search_from" class="form-control border-start-0" value="{{ !empty($search_from)?$search_from:'' }}">
        </div>
        <div class="col-md-3">
          <label for="search_to" class="form-label small text-muted">Đến ngày</label>
          <input type="date" name="search_to" class="form-control border-start-0" value="{{ !empty($search_to)?$search_to:'' }}">
        </div>
        <div class="col-md-3 d-flex align-items-end">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end w-100">
            <button class="btn btn-pink">
              <i class="fas fa-search me-1"></i> Tìm kiếm
            </button>
            <button class="btn btn-secondary">
              <i class="fas fa-sync-alt me-1"></i> Làm mới
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="table-container">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th width="10%">Ngày</th>
              <th width="20%">Tuyến xe</th>
              <th width="20%">Monitor</th>
              <th width="20%">Lái xe</th>
              <th width="20%">Biển số xe</th>
              <th width="10%">Danh sách</th>
            </tr>
          </thead>
          <tbody class="service-table-body">
            @foreach ($lo_trinh_xes as $lo_trinh_xe )
            <tr>
              <td>{{ $lo_trinh_xe->ngay }}</td>
              <td>{{ $lo_trinh_xe->ten_tuyen_xe }}</td>
              <td>{{ $lo_trinh_xe->ho_ten_monitor }}</td>
              <td>{{ $lo_trinh_xe->ho_ten_lai_xe }}</td>
              <td>{{ $lo_trinh_xe->bien_so_xe }}</td>
              <td>{{ $lo_trinh_xe->ngay }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
      {{-- <div class="pagination-container">
        <nav aria-label="Page navigation">
          <ul class="pagination"></ul>
        </nav>
      </div> --}}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
{{-- <script>
    const rows = document.querySelectorAll('.service-table-body tr');  
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
        paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="changePage(${currentPage - 1})">&laquo;</a></li>`;
      }

      if (pageItems[0] > 1) {
        paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">...</a></li>`;
      }

      pageItems.forEach(page => {
        paginationHTML += `<li class="page-item ${page === currentPage ? 'active' : ''}"><a class="page-link" href="#" onclick="changePage(${page})">${page}</a></li>`;
      });

      if (pageItems[pageItems.length - 1] < totalPages) {
        paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">...</a></li>`;
      }

      if (currentPage < totalPages) {
        paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="changePage(${currentPage + 1})">&raquo;</a></li>`;
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

      rows.forEach((row, index) => {
        row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
      });
    }

    createPagination(1);
    displayPageData(1);
</script> --}}

</html>
