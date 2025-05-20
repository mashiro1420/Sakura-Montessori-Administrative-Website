<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Điểm danh trên lớp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
</head>
<body>
@include('components/navbar')
  <!-- Title & Filter -->
<!-- Main Content -->
<div class="container content-container">
  <!-- Page Header -->
  <div class="page-header">
    <h2 class="page-title">Điểm danh trên lớp</h2>
    <p class="text-muted mt-2">Danh sách học sinh trên lớp</p>
  </div>
  
  <!-- Search Panel -->
  <div class="search-panel">
    <form class="row g-3" action="{{ route('ph_diem_danh_tren_lop') }}" method="get">
      @csrf
      <div class="col-md-3">
        <label for="search_from" class="form-label small text-muted">Từ ngày</label>
        <input type="date" name="search_from" class="form-control border-start-0" value="{{ !empty($search_from)?$search_from:'' }}">
      </div>
      <div class="col-md-3">
        <label for="search_to" class="form-label small text-muted">Đến ngày</label>
        <input type="date" name="search_to" class="form-control border-start-0" value="{{ !empty($search_to)?$search_to:'' }}">
      </div>
      <div class="col-md-3">
        <label for="search_status" class="form-label small text-muted">Trạng thái</label>
        <select id="search_status" name = "search_status" class="form-select">
          <option value="">Tất cả trạng thái</option>
          <option value="0" {{!empty($search_status)&&$search_status=="missing"?"selected":""}}>Vắng mặt</option>
          <option value="1" {{!empty($search_status)&&$search_status=="present"?"selected":""}}>Có mặt</option>
        </select>
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
  
  <!-- Table -->
  <div class="table-container">
    <input type="hidden" name="ds_id_hoc_sinh" id="ds_id_hoc_sinh">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <tr>
              <th>Học sinh</th>
              <th>Lớp</th>
              <th>Ngày</th>
              <th>Trạng thái</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach($diem_danhs as $diem_danh)
          <tr>
            <td>{{$diem_danh->ho_ten}}</td>
            <td>{{$diem_danh->ten_lop}}</td>
            <td>{{$diem_danh->ngay}}</td>
            <td>{{$diem_danh->trang_thai==1?"Có mặt":"Vắng mặt"}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    <!-- Pagination -->
    <div class="pagination-container">
      <nav aria-label="Page navigation">
        <ul class="pagination"></ul>
      </nav>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
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
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.hoc-sinh-checkbox');
        const hiddenInput = document.getElementById('ds_id_hoc_sinh');
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
</html>
