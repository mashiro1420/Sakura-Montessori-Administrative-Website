<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bảng giá dịch vụ</title>
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
    <h2 class="page-title">Bảng giá dịch vụ</h2>
    <p class="text-muted mt-2">Danh sách các dịch vụ và mức giá áp dụng tại trường</p>
  </div>
  
  <!-- Search Panel -->
  <div class="search-panel">
    <div class="row g-3">
      <div class="col-md-4">
        <label for="search_ngay_tao" class="form-label small text-muted">Ngày tạo</label>
        <input type="date" id="search_ngay_tao" name="search_ngay_tao" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="search_ngay_thanh_toan" class="form-label small text-muted">Ngày thanh toán</label>
        <input type="date" id="search_ngay_thanh_toan" name="search_ngay_thanh_toan" class="form-control">
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
    </div>
  </div>
  
  <!-- Table -->
  <div class="table-container">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th width="20%">Ngày tạo</th>
            <th width="20%">Ngày thanh toán</th>
            <th width="20%">Tổng dịch vụ</th>
            <th width="20%">Phát triển</th>
            <th width="20%">Tổng tiền</th>
          </tr>
        </thead>
        <tbody class="service-table-body">
          @for ($i = 0; $i < 12; $i++)
          <tr>
            <td>2024-05-01</td>
            <td>2024-05-10</td>
            <td>{{ number_format(rand(200000, 500000)) }} VND</td>
            <td>{{ number_format(rand(100000, 200000)) }} VND</td>
            <td>{{ number_format(rand(300000, 700000)) }} VND</td>
          </tr>
          @endfor
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
    document.querySelector('.btn-secondary').addEventListener('click', function () {
      document.getElementById('search_ngay_tao').value = '';
      document.getElementById('search_ngay_thanh_toan').value = '';
    });
  </script>
  @include('components/bao_loi')
</html>
