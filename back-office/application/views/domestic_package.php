<?php
	/*****************Initial*****************/
	$filestorage = 'http://travelshop-center.tk:80/';
	/**********Catch resubmission form*********/
	if(!isset($_GET["redi"])){
		header('Location: domestic-package?redi=s');
	}
  /*****************Session*****************/
  $lang = 'EN';
  if($this->session->userdata('lang') != ''){
  	$lang = $this->session->userdata('lang');
  }
	/*************Normal Package**************/
	if(isset($price_range)){
		$last_pr = count($price_range)-1;
		for($i=0;$i<=$last_pr;$i++){
			$booking_timerange[$i] = json_decode($price_range[$i],true);
			$last_btr[$i] = count($booking_timerange[$i])-1;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PB Agency Office</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/style.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.4/numeral.min.js"></script>
	<script src="<?=base_url()?>assets/js/date.format.js"></script>
</head>
<body class="">
	<header>
		<div class="header-bar">
			<div class="logo">
				<div class="burger">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<img src="assets/images/logo.png" alt="">
			</div>
			<div class="menu">
				<ul>
					<li><a class="current" href="#">Tour Management</a></li>
					<li><a href="#">Tour Operation</a></li>
					<li><a href="#">Dashboard</a></li>
					<li><span>Admin</span>
						<ul class="">
							<li><a href="profile.html">
								View Profile
							</a></li>
							<li><a href="member-account.html">
								Account Setting
							</a></li>
							<li><a href="login.html">
								Logout
							</a></li>
						</ul>
					</li>

				</ul>
				<p class="menu-btn">MENU</p>
			</div>
		</div>
	</header>
	<div class="body-wrapper">
		<aside>
			<h2>Myanmar Center</h2>
			<div class="title-line">
				<h3>Tour</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-std-main.html">
					<li>Standard Tours</li>
				</a>
				<a href="tm-mc-easy-main.html">
					<li>Easy Packages</li>
				</a>
				<a href="tm-mc-promotion-main.html">
					<li>Promotion</li>
				</a>
				<a href="tm-mc-locationdata.html">
					<li>Location Data</li>
				</a>
				<a href="tm-mc-locationimages.html">
					<li>Location Images</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Shop Travel</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-hotel-main.html">
					<li>Hotel</li>
				</a>
				<a href="tm-vehicle-main.html">
					<li>Vehicle</li>
				</a>
				<a href="tm-meal-main.html">
					<li>Meal</li>
				</a>
				<a href="tm-ticket-main.html">
					<li>Ticket</li>
				</a>
				<a href="tm-guide-main.html">
					<li>Guide</li>
				</a>
				<a href="tm-other-main.html">
					<li>Others</li>
				</a>
			</ul>
			<h2 class="top-mg">Supermarket Tours</h2>
			<div class="title-line">
				<h3>Domestic Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-domestic-easy-main.html">
					<li>Private Group Tours</li>
				</a>
				<a href="domestic-package">
					<li class="current">Join Group Tours</li>
				</a>
				<a href="tm-domestic-locationdata.html">
					<li>Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Outbound Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-outbound-easy-main.html">
					<li>Private Group Tours</li>
				</a>
				<a href="outbound-package">
					<li>Join Group Tours</li>
				</a>
				<a href="tm-outbound-locationdata.html">
					<li>Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Tour Agency</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-touragency-main.html">
					<li>Tour Agency Management</li>
				</a>
			</ul>
		</aside>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-sm-8 col-xs-12">
							<h1>Join Group Tour Packages</h1>
							<p>Domestic | Supermarket Tours</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<a href="tm-domestic-series-new.html" class="btn">New Packages</a>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-md-5 col-sm-7">
							<div class="input-inline">
								<div class="digi-box">
									<p id="c_package"><?=$c_package?>&nbsp;Packages</p>
								</div>
								<div class="input-box">
									<label class="filter">Region</label>
									<select name="region">
										<option>All Region</option>
		              <?php
		                if(isset($region)){
		                foreach($region->result_array() as $row){
		                	echo "<option value=".$row['geography_nameEN'].">".$row['geography_nameEN']."</option>";
		                }
		                }
		                ?>
		              </select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-5">
							<div class="input-box">
								<label class="filter">Province</label>
								<select name="province">
									<option>All Province</option>
	              <?php
	                if(isset($province)){
	                	foreach($province->result_array() as $row){
	                		echo "<option value=".$row['province_nameEN'].">".$row['province_nameEN']."</option>";
	                	}
	                }
	                ?>
	              </select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper top-mg">
				<div class="row text-center tour-package">
					<?php
            if(isset($package)){
            	$i = 0;
            	foreach($package->result_array() as $row){
            ?>
					<div class="col-md-4 col-sm-6">
						<div class="tour-box">
							<div class="img">
								<img src="<?=$filestorage.$row['img_source'];?>" alt="">
								<div class="img-des">
									<p>Start at <?=number_format($row['tour_startPrice'])?> <?=$row['tour_currency']?><br>
										<?php
                      $est_date = explode(",",$row['tour_dayNight']);
                    ?>
									<span><?=$est_date[0];?> Day <?=$est_date[1];?> Night</span></p>
								</div>
							</div>
							<div class="description">
								<p class="date"><?=date_format(date_create($booking_timerange[$i][0]['from']),"j F Y");?> - <?=date_format(date_create($booking_timerange[$i][$last_btr[$i]]['to']),"j F Y");?></p>
								<div class="btn-wrapper">
									<a href="disable-package?tour=<?=$row['tour_nameSlug']?>" class="btn gray">Delete</a>
									<a href="#" class="btn"> Edit </a>
								</div>
							</div>
						</div>
					</div>
					<?php
					$i++;
						}
					}
					?>
				</div>
			</div>
		</main>
	</div>
	<input id="isTourCountry" type="hidden" value="thailand">
	<input id="isTourType" type="hidden" value="sp">
</body>
<script src="assets/js/script.js"></script>
<script>
$base_url = 'http://travelshop-center.tk:80/';

$('select').change(function(){
	filter();
});

function filter(){
	/**********Initial variable***********/
	$type = $('#isTourType').val();
	$region = '';
	$province = '';
	$continent = '';
	$country = $('#isTourCountry').val();
	if($('select[name="region"]').val() != null && $('select[name="region"]').val() != 'All Region'){
		$region = $('select[name="region"]').val();
	}
	if($('select[name="province"]').val() != null && $('select[name="province"]').val() != 'All Province'){
		$province = $('select[name="province"]').val();
	}
	if($('select[name="continent"]').val() != null && $('select[name="continent"]').val() != 'All Continent'){
		$continent = $('select[name="continent"]').val();
	}
	if($('select[name="country"]').val() != null && $('select[name="country"]').val() != 'All Country'){
		$country = $('select[name="country"]').val();
	}

	$('#c_package').html("0&nbsp;Packages");

	$result = getPackage($base_url, $type, $region, $province, $continent, $country);

	$('.tour-package').html('');
	$('.tour-package').html($result['list_package']);

	function getPackage($base_url, $type, $region, $province, $continent, $country){
		$result = '';
		$.ajax({
			type: 'POST',
			async : false,
			url:'/filter-tour',
			data:{
				'type': $type,
				'region': $region,
				'province': $province,
				'continent': $continent,
				'country': $country
				},
			dataType: 'json',
			success:function(data){
				$result = listPackage($base_url,data);
			}
		});
		return $result;
	}

	function listPackage($base_url, data){
		$result = new Array();
		$result['list_package'] = '';
		if($.trim(data['package'])){
			$result = new Array();
			$result['list_package'] = '';
			$('#c_package').html(data['package'].length+"&nbsp;Packages");
			for($i=0;$i<data['package'].length;$i++){
				$date_range = JSON.parse(data['package'][$i].tour_priceRange);
				$last_btr = $date_range.length-1;
				$open_booking = new Date($date_range[0].from);
				$close_booking = new Date($date_range[$last_btr].to);
				$result['list_package'] += '<div class="col-md-4 col-sm-6"><div class="tour-box"><div class="img">';
				$result['list_package'] += '<img src="'+$base_url+data['package'][$i].img_source+'" alt="tour image cover">';
				$result['list_package'] += '<div class="img-des">';
				$result['list_package'] += '<p>Start at '+numeral(data['package'][$i].tour_startPrice).format('0,0')+' '+data['package'][$i].tour_currency+'<br>';
				$est_dayNight = data['package'][$i].tour_dayNight.split(",");
				$result['list_package'] += '<span>'+$est_dayNight[0]+' Day '+$est_dayNight[1]+' Night</span></p>';
				$result['list_package'] += '</div></div>';
				$result['list_package'] += '<div class="description">';
				$result['list_package'] += '<p class="date">'+$open_booking.format("d mmmm yyyy")+' - '+$close_booking.format("d mmmm yyyy")+'</p>';
				$result['list_package'] += '<div class="btn-wrapper">';
				$result['list_package'] += '<a href="'+data['package'][$i].tour_nameSlug+'" class="btn gray">Delete</a>';
				$result['list_package'] += '<a href="#" class="btn"> Edit </a>';
				$result['list_package'] += '</div></div></div></div>';
			}
		}
		return $result;
	}
}
</script>
</html>