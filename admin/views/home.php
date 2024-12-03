<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Stats Cards -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $soluongdonhang ?></h3>
              <p>Đơn Hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="small-box-footer">Xem Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= formatPrice($doanhthu) . 'đ' ?></h3>
              <p>Doanh Thu</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="small-box-footer">Xem Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $soluongkhachhang ?></h3>
              <p>Khách Hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="small-box-footer">Xem Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $soluongsp ?></h3>
              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="small-box-footer">Xem Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-7">
          <!-- Chart Card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Biểu Đồ Thống Kê
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <!-- Thêm canvas để vẽ biểu đồ -->
              <canvas id="myChart" width="400px" height="200px"></canvas> <!-- Adjusted size -->
            </div>
          </div>
          <!-- /.card -->
          
          <!-- Best-Selling Products Section -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-cogs mr-1"></i>
                Sản Phẩm Bán Chạy
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <!-- Example for displaying best-selling products -->
              <ul>
                
              </ul>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Dữ liệu cho biểu đồ từ PHP
const labels = ['Tháng 12','Tháng 11']; // Thêm cả Tháng 11
const data = {
  labels: labels,
  datasets: [
    {
      label: 'Doanh Thu',
      data: [<?= $thongKeThang12['doanh_thu'] ?>, <?= $thongKeThang11['doanh_thu'] ?>], // Doanh thu trong tháng 12 và tháng 11
      backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền chấm
      borderColor: 'rgb(75, 192, 192)', // Màu viền chấm
      borderWidth: 1, // Độ dày của viền
      pointRadius: 5, // Kích thước chấm
      fill: 'origin', // Điền màu đến gốc
    },
    {
      label: 'Đơn Hàng',
      data: [<?= $thongKeThang12['tong_don_hang'] ?>, <?= $thongKeThang11['tong_don_hang'] ?>], // Số lượng đơn hàng trong tháng 12 và tháng 11
      backgroundColor: 'rgba(153, 102, 255, 0.2)', // Màu nền cho chấm đơn hàng
      borderColor: 'rgb(153, 102, 255)', // Màu viền chấm đơn hàng
      borderWidth: 1, // Độ dày của viền
      pointRadius: 5, // Kích thước chấm
      fill: '+2', // Điền màu đến dataset 2
    }
  ]
};

// Cấu hình biểu đồ
const config = {
  type: 'line', // Biểu đồ dạng line
  data: data,
  options: {
    responsive: true,
    scales: {
      x: {
        title: {
          display: false,
          text: 'Tháng'
        }
      },
      y: {
        title: {
          display: true,
          text: 'Số Lượng'
        },
        min: 0
      }
    }
  }
};

// Tạo biểu đồ Chart.js
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, config);
</script>
