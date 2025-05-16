<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa thời khóa biểu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<body>
  <div class="wrapper">
    @include('components/sidebar')
    <div class="main p-4">
      <div class="content" id="content" style="margin-left: 70px;">
        <div class="container-fluid">
          <div class="page-header">
            <h2><i class="fa-solid fa-pen-to-square"></i> Sửa thời khóa biểu</h2>
          </div>

          <form action="{{ route('tkb.update', $tkb_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-header">
              <div class="col-md-4">
                <label for="phan_lop" class="form-label fw-bold">Lớp:</label>
                <select id="phan_lop" name="phan_lop" class="form-select" required>
                  @foreach($phan_lops as $phan_lop)
                    <option value="{{$phan_lop->id}}" {{ $phan_lop->id == $current_phan_lop ? 'selected' : '' }}>{{$phan_lop->id}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label for="tuan" class="form-label fw-bold">Tuần:</label>
                <select id="tuan" name="tuan" class="form-select" required>
                  @foreach($tuans as $tuan)
                    <option value="{{$tuan->id}}" {{ $tuan->id == $current_tuan ? 'selected' : '' }}>{{$tuan->ten_tuan}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="timetable-container">
              <table class="timetable">
                <thead>
                  <tr>
                    <th style="width: 80px;">Tiết</th>
                    <th class="day-header">Thứ 2</th>
                    <th class="day-header">Thứ 3</th>
                    <th class="day-header">Thứ 4</th>
                    <th class="day-header">Thứ 5</th>
                    <th class="day-header">Thứ 6</th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 1; $i <= 11; $i++)
                    <tr>
                      <td class="period-label">Tiết {{$i}}</td>
                      @for ($d = 2; $d <= 6; $d++)
                        <td>
                          <select name="tkb[{{$i}}][{{$d}}]" class="lesson-input form-control select2">
                            <option value=""></option>
                            @foreach($mon_hocs as $mon_hoc)
                              <option value="{{$mon_hoc->id}}" {{ (isset($tkb_data[$i]["t$d"]) && $tkb_data[$i]["t$d"] == $mon_hoc->id) ? 'selected' : '' }}>
                                {{$mon_hoc->ten_mon_hoc}}
                              </option>
                            @endforeach
                          </select>
                        </td>
                      @endfor
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>

            <div class="action-buttons d-flex justify-content-between">
              <div>
                <button class="btn btn-primary" type="submit">
                  <i class="fa-solid fa-save me-1"></i> Cập nhật thời khóa biểu
                </button>
                <button type="reset" id="reset-btn" class="btn btn-outline-secondary ms-2">
                  <i class="fa-solid fa-rotate me-1"></i> Làm mới
                </button>
              </div>
              <div>
                <a class="btn btn-outline-secondary" href="{{url('ql_tkb')}}">
                  <i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('.select2').select2({
        placeholder: "Chọn môn học",
        allowClear: true
      });
    });
  </script>
</body>
</html>
