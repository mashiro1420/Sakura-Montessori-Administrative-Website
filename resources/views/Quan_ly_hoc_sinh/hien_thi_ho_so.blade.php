
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xem hồ sơ học sinh</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('imgs/favicon-skr.png') }}">
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
          <div class="page-header d-flex justify-content-between">
            <h2><i class="fa-solid fa-file-lines"></i> Hồ sơ học sinh</h2> 
            <div>
              <a class="btn btn-outline-secondary ms-2" href="{{url('ql_hs')}}">
                <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách học sinh
              </a>
            </div>
          </div>

          <!-- Student basic info -->
          <div class="search-container mb-4">
            <div class="filter-row">
              <h2>Thông tin học sinh</h2>
              <div class="row">
                <div class="col-md-4">
                  <div class="search-item">
                    <label for="id">Mã học sinh</label>
                    <input type="text" name="id" class="form-control" readonly value="{{$hoc_sinh->id}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="search-item">
                    <label for="ho_ten">Họ và tên</label>
                    <input type="text" name="ho_ten" class="form-control" readonly value="{{$hoc_sinh->ho_ten}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="search-item">
                    <label for="lop">Lớp</label>
                    <input type="text" name="lop" class="form-control" readonly value="{{$phan_lop->ten_lop}}">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Document list -->
          <div class="data-container">
            <h2 class="mb-4">Danh sách giấy tờ</h2>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="5%">STT</th>
                    <th width="15%">ID</th>
                    <th width="25%">Mã học sinh</th>
                    <th width="20%">Tên giấy tờ</th>
                    <th width="15%">Ngày upload</th>
                    <th width="15%">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($giay_to) > 0)
                    @foreach($giay_to as $index => $item)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->id_hoc_sinh }}</td>
                      <td>{{ $item->ten_giay_to }}</td>
                      <td>{{ date('Y-m-d', strtotime($item->ngay_upload)) }}</td>
                      <td>
                        @if(!empty($item->link_giay_to))
                          <a href="{{ asset('Giay_to/'.$item->id_hoc_sinh.'/'.$item->link_giay_to) }}" download class="btn btn-sm btn-success">
                            <i class="fa-solid fa-download"></i> Tải xuống
                          </a>
                        @else
                          <span class="text-muted">Không có file</span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="7" class="text-center">Không có giấy tờ nào</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>

          {{-- <!-- Upload document modal button -->
          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadDocumentModal">
              <i class="fa-solid fa-upload me-1"></i> Thêm giấy tờ mới
            </button>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
{{-- 
  <!-- Upload document modal -->
  <div class="modal fade" id="uploadDocumentModal" tabindex="-1" aria-labelledby="uploadDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="uploadDocumentModalLabel">Thêm giấy tờ mới</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_hoc_sinh" value="{{ $hoc_sinh->id }}">
          
          <div class="mb-3">
            <label for="ten_giay_to" class="form-label">Tên giấy tờ</label>
            <input type="text" class="form-control" id="ten_giay_to" name="ten_giay_to" required>
          </div>
          
          <div class="mb-3">
            <label for="file_giay_to" class="form-label">File giấy tờ</label>
            <input type="file" class="form-control" id="file_giay_to" name="file_giay_to" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Tải lên</button>
        </div>
      </form>
    </div>
  </div> --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar
    const hamBurger = document.querySelector(".toggle-btn");
    hamBurger.addEventListener("click", function () {
      document.querySelector("#sidebar").classList.toggle("expand");
    });

    // Check all functionality
    document.getElementById('check-all').addEventListener('change', function() {
      const checkItems = document.querySelectorAll('.check-item');
      checkItems.forEach(item => {
        item.checked = this.checked;
      });
    });
  </script>
  @include('components/bao_loi')
</body>
</html>