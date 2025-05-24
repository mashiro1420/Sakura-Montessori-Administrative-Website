<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Báo cáo thống kê</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="{{ asset('/imgs/favicon-skr.png') }}">
  <link rel="stylesheet" href="{{ asset('css/main/main.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
            <h2><i class="fa-solid fa-chalkboard-user"></i> Báo cáo thống kê</h2>
          </div>
          <!-- Table Section -->
          <div class="data-container d-flex flex-wrap">
            <div class="data-container col-md-4">
              <label for="">Thống kê số lượng học sinh theo tháng</label>
                <canvas id="studentsPerMonth"></canvas>
            </div>

            <div class="data-container col-md-4">
                <label for="">Thống kê số lượng học sinh theo năm</label>
                <canvas id="studentsPerYear"></canvas>
            </div>

            <div class="data-container col-md-4">
                <label for="">Thống kê số lượng giáo viên theo tháng</label>
                <canvas id="teachersPerMonth"></canvas>
            </div>

            <div class="data-container col-md-4">
                <label for="">Thống kê số lượng giáo viên theo năm học</label>
                <canvas id="teachersPerYear"></canvas>
            </div>

            <div class="data-container col-md-4">
                <label for="">Thống kê học sinh đi xe buýt và không đi xe buýt</label>
                <canvas id="busVsNonBusStudents"></canvas>
            </div>

            <div class="data-container col-md-4">
                <label for="">Thống kê số tiền thu được theo từng học kỳ</label>
                <canvas id="tuitionPerSemester"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script>
    const months = @json($months);
    const years = @json($years);
    const hs_thang = @json($hs_thang);
    const hs_nam = @json($hs_nam);
    const nv_thang = @json($nv_thang);
    const nv_nam = @json($nv_nam);
    const di_bus = @json($di_bus);
    const doanh_thu = @json($doanh_thu);
    const chartConfigs = {
        studentsPerMonth: {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Số học sinh',
                    data: hs_thang,
                    backgroundColor: 'rgba(59, 125, 221, 0.7)'
                }]
            }
        },
        studentsPerYear: {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Số học sinh',
                    data: hs_nam,
                    borderColor: 'rgba(59, 125, 221, 1)',
                    fill: false
                }]
            }
        },
        teachersPerMonth: {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Số giáo viên',
                    data: nv_thang,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            }
        },
        teachersPerYear: {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Số giáo viên',
                    data: nv_nam,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                }]
            }
        },
        busVsNonBusStudents: {
            type: 'pie',
            data: {
                labels: ['Đi xe buýt', 'Không đi xe buýt'],
                datasets: [{
                    data: di_bus,
                    backgroundColor: ['rgba(255, 206, 86, 0.7)', 'rgba(255, 99, 132, 0.7)']
                }]
            }
        },
        tuitionPerSemester: {
            type: 'bar',
            data: {
                labels: ['Kỳ 1', 'Kỳ 2','Tổng cả năm'],
                datasets: [{
                    label: 'Số tiền thu được (triệu VND)',
                    data: doanh_thu,
                    backgroundColor: 'rgba(153, 102, 255, 0.7)'
                }]
            }
        }
    };

    Object.entries(chartConfigs).forEach(([id, config]) => {
        new Chart(document.getElementById(id), config);
    });
  </script>
  <script>
  const hamBurger = document.querySelector(".toggle-btn");
  hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
  });
  </script>
</body>

</html>