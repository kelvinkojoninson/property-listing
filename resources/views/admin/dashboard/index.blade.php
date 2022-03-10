@extends('layouts.layout')
@section('page-name', 'Dashboard')
@section('page-content')
@php
    use Carbon\Carbon;
    $date = Carbon::now();

    $weekNumber = $date->weekOfYear;
    $years = range(1900, strftime('%Y', time()));
    @endphp
<div class="container">
	<!--begin::Dashboard-->
	<!--begin::Row-->
	<div class="row">
		<div class="col-xl-4">
			<!--begin::Tiles Widget 1-->
			<div class="card card-custom gutter-b card-stretch">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<div class="card-title">
						<div class="card-label">
							<div class="font-weight-bolder">Weekly Sales Stats</div>
							<div class="font-size-sm text-muted mt-2">9 Sales</div>
							
							{{-- <div class="font-size-sm text-muted mt-2">{{ number_format($weekSales) }} Sales</div> --}}
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body d-flex flex-column">
					<!--begin::Chart-->
					<div id="weeklySalesChart" class="chart-shadow" style="height:425px;">
					</div>
					<div class="col d-none">
						<label for="">Year</label>
						<select name="year" id="year" class="form-control select2">
							@foreach ($years as $year)
								<option value="{{ $year }}"
									{{ gmdate('Y') == $year ? 'selected' : '' }}>
									{{ $year }}
								</option>
							@endforeach
						</select>
					</div>
					<div class="col d-none">
						<label for="">Week</label>
						<select name="week" id="week" class="form-control select2">
							@for ($i = 1; $i <= 53; $i++)
								<option value="{{ $i }}"
									{{ $i == $weekNumber ? 'selected' : '' }}>Week
									{{ $i }}
								</option>
							@endfor
						</select>
					</div>
					<!--end::Chart-->
				   
				</div>
				<!--end::Body-->
			</div>
			<!--end::Tiles Widget 1-->
		</div>
		<div class="col-xl-5">
			<div class="row">
				<div class="col-xl-6">
					<!--begin::Tiles Widget 2-->
					<div class="card card-custom bg-danger gutter-b" style="height: 130px">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column p-0">
							<!--begin::Stats-->
							<div class="flex-grow-1 card-spacer-x pt-6">
								<div class="text-inverse-danger font-weight-bold">Pending Orders</div>
								<div class="text-inverse-danger font-weight-bolder font-size-h3">
									9</div>
							</div>
							<!--end::Stats-->
							<!--begin::Chart-->
							<div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px">
							</div>
							<!--end::Chart-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 2-->
					<!--begin::Tiles Widget 3-->
					<div class="card card-custom bgi-no-repeat bgi-no-repeat bgi-size-cover gutter-b"
						style="height: 130px; background-image: url({{ asset('assets/media/bg/bg-9.jpg') }})">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<!--begin::Title-->
							<a class="text-dark-75 text-hover-primary font-weight-bolder font-size-h3">Orders In
								Transit</a>
							<div class="text-dark-75 font-weight-bolder font-size-h3">
								5</div>
							<!--end::Title-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 3-->
				</div>
				<div class="col-xl-6">
					<!--begin::Tiles Widget 4-->
					<div class="card card-custom gutter-b" style="height: 130px">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<!--begin::Stats-->
							<div class="flex-grow-1">
								<div class="text-dark-50 font-weight-bold">Today's Sales</div>
								<div class="font-weight-bolder font-size-h3">777</div>
							</div>
							<!--end::Stats-->
							<!--begin::Progress-->
							<div class="progress progress-xs">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 75%;"
									aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<!--end::Progress-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 4-->
					<!--begin::Tiles Widget 5-->
					<div class="card card-custom bg-info gutter-b" style="height: 130px">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column p-0">
							<!--begin::Stats-->
							<div class="flex-grow-1 card-spacer-x pt-6">
								<div class="text-inverse-info font-weight-bold">Delivered Orders</div>
								<div class="text-inverse-info font-weight-bolder font-size-h3">
									656</div>
							</div>
							<!--end::Stats-->
							<!--begin::Chart-->
							<div id="kt_tiles_widget_5_chart" class="card-rounded-bottom" style="height: 50px">
							</div>
							<!--end::Chart-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 5-->
				</div>
			</div>
			<!--begin::Mixed Widget 20-->
			<div class="card card-custom bgi-no-repeat gutter-b"
				style="height: 175px; background-color: #4AB58E; background-position: calc(100% + 1rem) bottom; background-size: 25% auto; background-image: url({{ asset('assets/media/svg/humans/custom-1.svg') }})">
				<!--begin::Body-->
				<div class="card-body d-flex align-items-center">
					<div class="py-2">
						<h3 class="text-white font-weight-bolder mb-3">67+ Registered Customers</h3>
						<p class="text-white font-size-lg">Get to know your customers
							<br />preferences, and prescriptions
						</p>
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 20-->
		</div>
		<div class="col-xl-3">
			<!--begin::Tiles Widget 7-->
			<div class="card card-custom bgi-no-repeat gutter-b card-stretch"
				style="background-color: #1B283F; background-position: 0 calc(100% + 0.5rem); background-size: 100% auto; background-image: url({{ asset('assets/media/svg/patterns/rhone.svg') }})">
				<!--begin::Body-->
				<div class="card-body">
					<div class="p-4">
						<h3 class="text-white font-weight-bolder my-7">CRM & Sales Reports</h3>
						<p class="text-muted font-size-lg mb-7">Generate CRM & Sales Reports
							<br />to track for-profit business,
							<br />customer transactions
							<br />and stock management
						</p>
						<a href='{{ config('app.url') }}/reports'
							class="btn btn-danger font-weight-bold px-6 py-3">Browse Reports</a>
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Tiles Widget 7-->
		</div>
	</div>
	<!--end::Row-->
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row">
		<div class="col-xl-12">
			<!--begin::Mixed Widget 10-->
			<div class="card card-custom card-stretch gutter-b">
				<!--begin::Body-->
				<div class="card-body d-flex flex-column">
					<div class="flex-grow-1 pb-5">
						<!--begin::Info-->
						<div class="d-flex align-items-center pr-2 mb-6">
							<span class="text-muted font-weight-bold font-size-lg flex-grow-1">Locator</span>
							<div class="symbol symbol-50">
								<span class="symbol-label bg-light-light">
									<img src="{{ asset('assets/media/svg/misc/015-telegram.svg') }}"
										class="h-50 align-self-center" alt="" />
								</span>
							</div>
						</div>
						<!--end::Info-->
						<!--begin::Desc-->
						<div class="row">
							<div class="col-md-4 col-sm-6 col-xs-12">
								{{-- <select id="shop" class="select2 form-control">
									<option value="All">All</option>
									@foreach ($pharmacies as $pharmacy)
										<option value="{{ $pharmacy->shopcode }}">
											{{ $pharmacy->shopname }}
										</option>
									@endforeach
								</select> --}}
							</div>
						</div>
						<div id="map" class="mt-3" style="height:580px; width:100%"></div>
						<!--end::Desc-->
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 10-->
		</div>
	</div>
	<!--end::Row-->
	<!--end::Row-->
</div>
<!-- Charting library -->
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

<script>
	// var year = $("#year").val();
	// var week = $("#week").val();
	
	// const weeklySalesChart = new Chartisan({
	// 	el: '#weeklySalesChart',
	// 	url: "@chart('weeklySales')" + '?week=' + week + '&year=' + year,
	// 	hooks: new ChartisanHooks()
	// 		.legend()
	// 		.tooltip()
	// 		.colors()
	// 		.legend({ position: 'bottom' })
	// 		.datasets('line')
	// });

	// const pharmacyChart = new Chartisan({
	// 	el: '#pharmacyChart',
	// 	url: "@chart('pharmacies')",
	// 	hooks: new ChartisanHooks()
	// 		.legend()
	// 		.tooltip()
	// 		.colors()
	// 		.datasets(['line', 'line'])
	// });

	// var shop1 = $("#shop1").val();
	// const productsChart = new Chartisan({
	// 	el: '#productsChart',
	// 	url: "@chart('products')" + '?shopcode=' + shop1,
	// 	hooks: new ChartisanHooks()
	// 		.tooltip()
	// 		.colors()
	// 		.datasets('pie')
	// 		.axis(false)
	// });

	// $("#shop1").on("change", function() {
	// 	productsChart.update({
	// 		url: "@chart('products')" + '?shopcode=' + this.value,
	// 	});
	// })

	// var shopStock = $("#stock-shop").val();
	// const stockChart = new Chartisan({
	// 	el: '#stockChart',
	// 	url: "@chart('stock')" + '?shopcode=' + shopStock,
	// 	hooks: new ChartisanHooks()
	// 		.tooltip()
	// 		.colors()
	// 		.datasets('bar')
	// });

	// $("#stock-shop").on("change", function() {
	// 	stockChart.update({
	// 		url: "@chart('stock')" + '?shopcode=' + this.value,
	// 	});
	// })

	let map;

	function initMap() {
		map = new google.maps.Map(document.getElementById("map"), {
			zoom: 7,
			gestureHandling: "cooperative",
			center: new google.maps.LatLng(5.5913754, -0.2497706),
			mapTypeId: "terrain",
		});

		// var shopcode = $("#shop").val();
		// $.ajax({
		// 	type: "GET",
		// 	url: `${APP_URL}/api/shops/branches/${shopcode}`,
		// 	error: function(jqXHR, textStatus, errorThrown) {
		// 		console.log("An error occured while fetching branches, please contact admin");
		// 		return;
		// 	},
		// 	success: function(results) {
		// 		results.data.forEach(result => {
		// 			const latLng = new google.maps.LatLng(result.latitude, result.longitude);

		// 			let picture = Boolean(result.picture) ? result.picture : "placeholder.png";

		// 			// let char = (result.branchname).charAt(0);
		// 			const contentString =
		// 				`<img src='${picture}' width='100%' height='130'/><br>
		// 						<strong>${result.shopname}</strong><br>
		// 						${result.branchname}<hr>
		// 						${result.streetname}<br>
		// 						${result.town}, ${result.country}<br>
		// 						${result.phone}<br>
		// 						${result.email}<hr>
		// 						${result.longitude}, ${result.latitude}`;

		// 			const infowindow = new google.maps.InfoWindow({
		// 				content: contentString,
		// 			});

		// 			const marker = new google.maps.Marker({
		// 				position: latLng,
		// 				map: map,
		// 				animation: google.maps.Animation.DROP,
		// 				// icon: `https://cdn.mapmarker.io/api/v1/font-awesome/v5/pin?text=${char}&size=50&background=D94B43&color=FFF&hoffset=-1`
		// 			});

		// 			marker.addListener("click", () => {
		// 				infowindow.open(map, marker);
		// 			});
		// 		});
		// 	}
		// });
	}

	// $('#shop').change(function() {
	// 	initMap();
	// })

	$("#reload-map").on("click", function() {
		initMap();
	})

</script>
<script
	src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly"
	async></script>
@endsection