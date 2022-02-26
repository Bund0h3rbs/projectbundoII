@extends('template.template-admin')

@section('content')

<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
              <i class="fas fa-shopping-cart"></i>
            </span>
          <div class="info-box-content">
            <span class="info-box-text">Total Pesanan Bulan Ini</span>
            <span class="info-box-number">
              98 <small>Pesanan</small>
            </span>

          </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1">
              <i class="fas fa-shipping-fast"></i>
            </span>
          <div class="info-box-content">
            <span class="info-box-text">Pesanan Diproses</span>
            <span class="info-box-number">
              56  <small>Pesanan</small>
            </span>
          </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1">
              <i class="fas fa-ban"></i>
            </span>

          <div class="info-box-content">
            <span class="info-box-text">Pesanan Gagal</span>
            <span class="info-box-number">
              0 <small>Pesanan</small>
            </span>
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">
              <i class="fas fa-chart-area"></i>
              Grafik Penjualan Bulanan</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Sales: 1 Jan, 2021 - {{ date('d-M') }}, {{ date('Y') }}</strong>
              </p>

              <div class="chart">
                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
              </div>
            </div>

            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion</strong>
              </p>

              <div class="progress-group">
                Target Product to Cart
                <span class="float-right"><b>500</b>/1000</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 50%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Complete Purchase
                <span class="float-right"><b>310</b>/400</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 75%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Monthly Order
                <span class="float-right"><b>350</b>/500</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-orange" style="width: 65%"></div>
                </div>
              </div>
              <div class="progress-group">
                Cancel Order
                <span class="float-right"><b>5</b>/500</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: 1%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                <h5 class="description-header">Rp. 350.000.000</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>

            </div>

            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                <h5 class="description-header">Rp. 500.000.000</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
            </div>

            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                <h5 class="description-header">Rp. 50.000.000</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
            </div>

            <div class="col-sm-3 col-6">
              <div class="description-block">
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                <h5 class="description-header">500</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

</div>

<div class="row text-sm">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-shipping-fast"></i>
            Pesanan Terbaru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Item</th>
                <th>Status</th>
                <th>Popularity</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="badge badge-success">Shipped</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="badge badge-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="badge badge-info">Processing</span></td>
                <td>
                  <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="badge badge-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="badge badge-success">Shipped</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="javascript:;" class="btn btn-secondary float-right">
              View All Orders</a>
        </div>
        <!-- /.card-footer -->
      </div>


    </div>
</div>

<script>
$(function () {
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

    var salesChartData = {
    labels: ['Jan', 'Feb', 'Mar', 'APr', 'May', 'Jun', 'Jul','Ags','Sept','Okt','Nov','Des'],
    datasets: [
        {
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [100,150,90,100,90,300,250,100,250,200,200,150]
        },
        {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [80,100,400,300,200,100,350,250,400,250,350,200]
        }
    ]
    }

    var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
        display: false
    },
    scales: {
        xAxes: [{
        gridLines: {
            display: false
        }
        }],
        yAxes: [{
        gridLines: {
            display: false
        }
        }]
    }
    }

    var salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
    }
)

})
</script>
@endsection
