@extends('layouts.dashboard')
@section('content')


  <link rel="stylesheet" href="{{asset('style/template/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('style/template/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('style/template/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('style/template/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('style/template/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('style/template/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
      <div id="user-activity" class="card">
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel">
              <div class="container">
			  <div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</span>
										<p>
											<span class="number">{{ $monthlySales }}</span>
											<span class="title">Penjualan Bulanan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">{{ $annualSales }}</span>
											<span class="title">Penjualan Tahunan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-cart-plus" aria-hidden="true"></i>
										</span>
										<p>
											<span class="number">{{ $allSales }}</span>
											<span class="title">Total Penjualan</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div id="monthly-chart" class="ct-chart"></div>
								</div>
								<div class="col-md-3">
									<div class="weekly-summary text-right">
										<span class="number">Rp{{ number_format($incomeMonthly) }}</span>
										<span class="info-label">Pendapatan Bulanan</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div id="annual-chart" class="ct-chart"></div>
								</div>
								<div class="col-md-3">
									<div class="weekly-summary text-right">
										<span class="number">Rp{{ number_format($incomeAnnual) }}</span>
										<span class="info-label">Pendapatan Tahunan</span>
									</div>
									<div class="weekly-summary text-right">
										<span class="number">Rp{{ number_format($incomeTotal) }}</span>
										<span class="info-label">Total Pendapatan</span>
									</div>
								</div>
							</div>
						</div>	
              </div>
              <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                    Chart di atas akan menampilkan grafik transaksi product selama setahun.
                </p>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
</div>


@endsection


@section('scriptjs')

 <!-- Chart -->
 <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    
    var kredits = ['{{$january}}','{{$february}}','{{$march}}','{{$april}}','{{$may}}','{{$june}}','{{$july}}','{{$august}}','{{$september}}','{{$october}}','{{$november}}','{{$december}}'];
    var debits = [0,0,0,0,0,0,0,0,0,0,0,0];
   Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Aktivitas Transaksi Product'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Nominal Transaksi'
        },
        labels: {
            formatter: function () {
                return this.value + 'K';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        // name: 'Debit',
        // marker: {
        //     symbol: 'square'
        // },
        data: debits,

    // }, {
    //     name: 'Kredit',
    //     marker: {
    //         symbol: 'diamond'
    //     },
        // data: kredits
    }]
});
           
  </script>

@endsection
