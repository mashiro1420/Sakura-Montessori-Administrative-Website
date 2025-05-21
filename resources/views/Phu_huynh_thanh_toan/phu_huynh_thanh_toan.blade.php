<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tra cứu học phí</title>
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
    <h2 class="page-title">Tra cứu học phí</h2>
    <p class="text-muted mt-2">Học phí hiện tại và lịch sử học phí của học sinh</p>
  </div>
  <div class="search-panel">
    @if(!empty($thanh_toan_hien_tai))
    <div class="row g-3">
      <h3>Học phí {{ $quang_hoc_phi }}</h3>
      <div class="col-md-3">
        <label for="search_from" class="form-label small text-muted">Tổng tiền dịch vụ</label>
        <input type="text" name="search_from" class="form-control border-start-0" value="{{ number_format($thanh_toan_hien_tai->tong_dich_vu)}}" readonly>
      </div>
      <div class="col-md-3">
        <label for="search_from" class="form-label small text-muted">Tổng học phí</label>
        <input type="text" name="search_from" class="form-control border-start-0" value="{{ number_format($thanh_toan_hien_tai->tong_hoc_phi)}}" readonly>
      </div>
      <div class="col-md-3">
        <label for="search_from" class="form-label small text-muted">Phí phát triển nhà trường</label>
        <input type="text" name="search_from" class="form-control border-start-0" value="{{ number_format($thanh_toan_hien_tai->phat_trien)}}" readonly>
      </div>
      <div class="col-md-3">
        <label for="search_from" class="form-label small text-muted">Phí học môn năng khiếu</label>
        <input type="text" name="search_from" class="form-control border-start-0" value="{{ number_format($thanh_toan_hien_tai->tien_nang_khieu)}}" readonly>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-3">
        <label for="search_from" class="form-label small text-muted">Tổng số tiền</label>
        <input type="text" name="search_from" class="form-control border-start-0" value="{{ number_format($thanh_toan_hien_tai->tong_so_tien)}}" readonly>
      </div>
    </div>
    @else
      <div class="text-center" style="color: var(--primary-color);">
        <h4>Học phí đã được đóng</h4>
      </div>
    @endIf
  </div>
  <!-- Search Panel -->
  
  
  <!-- Table -->
  <div class="table-container">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th width="10%">Loại học phí</th>
            <th width="20%">Kỳ đóng học</th>
            <th width="10%">Ngày thanh toán</th>
            <th width="10%">Tổng học phí</th>
            <th width="10%">Tổng dịch vụ</th>
            <th width="10%">Phí phát triển</th>
            <th width="10%">Tiền học năng khiếu</th>
            <th width="10%">Tổng tiền</th>
          </tr>
        </thead>
        <tbody class="service-table-body">
          @foreach ($thanh_toans as $thanh_toan)
          @php
            if($thanh_toan->loai_hoc_phi == 0){
                $quang_hoc_phi_bang = $thanh_toan->ten_ky;
            }
            elseif($thanh_toan->loai_hoc_phi == 1){
                if($thanh_toan->ky ==1) $quang_hoc_phi_bang = 'Năm học '.$thanh_toan->nam_hoc.' - '.($thanh_toan->nam_hoc+1);
                else $quang_hoc_phi_bang = 'Năm học '.($thanh_toan->nam_hoc-1).' - '.$thanh_toan->nam_hoc;
            }
            else {
              $parts = explode('-',$thanh_toan->ngay_tao);
              $quang_hoc_phi_bang = 'Tháng '.$parts[1].' năm '.$parts[0];
            }
          @endphp
          <tr>
            <td>{{ $thanh_toan->loai_hoc_phi==0?'Học phí kỳ':($thanh_toan->loai_hoc_phi==1?'Học phí năm':'Học phí tháng') }}</td>
            <td>{{ $quang_hoc_phi_bang }}</td>
            <td>{{ $thanh_toan->ngay_thanh_toan }}</td>
            <td>{{ number_format($thanh_toan->tong_hoc_phi) }} VND</td>
            <td>{{ number_format($thanh_toan->tong_dich_vu) }} VND</td>
            <td>{{ number_format($thanh_toan->phat_trien) }} VND</td>
            <td>{{ number_format($thanh_toan->tien_nang_khieu) }} VND</td>
            <td>{{ number_format($thanh_toan->tong_so_tien) }} VND</td>
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
    document.querySelector('.btn-secondary').addEventListener('click', function () {
      document.getElementById('search_ngay_tao').value = '';
      document.getElementById('search_ngay_thanh_toan').value = '';
    });
  </script>
  @include('components/bao_loi')
</html>
