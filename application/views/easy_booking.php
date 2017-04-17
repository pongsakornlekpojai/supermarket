<?php
/*************Clear POST&GET**************/
unset($_POST, $_GET);
/*****************Session*****************/
$lang = 'EN';
if(!empty($this->session->userdata('lang'))){
	$lang = $this->session->userdata('lang');
}
$country = $this->session->userdata('country');
/***************List package**************/
$package = $package->row_array(0);
if(isset($price_range)){
	$booking_timerange = json_decode($price_range,true);
	$last_btr = count($booking_timerange)-1;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUPERMARKET TOURS</title>
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
</head>
<body>
	<header class="readmore outbouce">
    <div class="container-fulid clearfix">
			<div class="header-box">
				<div class="language-box">
					<a class="current" href="#">
						<img src="<?=base_url()?>assets/images/ico-en.png" alt="">
					</a>
					<a href="#">
						<img src="<?=base_url()?>assets/images/ico-th.png" alt="">
					</a>
				</div>
				<div class="contact">
					<h2>Add Line</h2>
					<a href="http://line.me/ti/p/~bankzahaplus"><img src="<?=base_url()?>assets/images/ico-line.png" alt=""></a>
				</div>
				<div class="contact">
					<h2>Contact Us</h2>
					<p><a href="tel:0875012500">02-222-2222</a></p>
				</div>

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<a href="<?=base_url()?><?php if($country == 'thailand'){ echo "thai-tour"; }else{ echo "international-tour"; }?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
				</div>
				<div class="col-sm-10">
					<div class="menu-burger">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<ul class="menu-list">
						<li><a href="<?=base_url()?>thai-tour">THAILAND DOMESTIC TOURS</a></li>
						<li><a href="<?=base_url()?>international-tour">INTERNATIONAL TOURS</a></li>
						<li><a href="<?=base_url()?>about">ABOUT</a></li>
						<?php if(empty($this->session->userdata('firstname'))){?>
							<li><a href="_signin?from=sb" class="btn">Sign In</a></li>
						<?php
						}else{
						?>
							<li class="user-profile">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i> PROFILE
							<ul>
								<li><a href="<?=base_url()?>booking-list">BOOKING LIST</a></li>
								<li><a href="<?=base_url()?>user-edit-profile">EDIT PROFILE</a></li>
								<li><a href="signout">LOG OUT</a></li>
							</ul>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php if($package['country_name'] == 'Thailand'){ ?>
						<h1>THAILAND DOMESTIC TOURS<br>
					<?php }else{ ?>
						<h1>INTERNATIONAL TOURS<br>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</header>
	<div class="title-bar readmore">
		<div class="container">
			<div class="col-sm-6">
        <h1>
        <?php
					if(empty($package['tour_name'.$lang])){
						echo strtoupper($package['tour_name'.$lang]);
					}else{
						if($lang == 'TH'){
							echo strtoupper($package['tour_nameTH']);
						}else{
							echo strtoupper($package['tour_nameEN']);
						}
					}
				?>
      </h1><br>
				<p><?=date_format(date_create($booking_timerange[0]['from']),"j F Y");?> - <?=date_format(date_create($booking_timerange[$last_btr]['to']),"j F Y");?></p>
			</div>
		</div>
	</div>
	<div class="container content">
		<div class="row top-mg">
			<div class="col-xs-12">
				<div class="title-header">
					<h2>BOOKING FORM</h2>
					<div class="line">
						<div class="tab"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row top-mg">
			<div class="col-sm-1 hidden-xs"></div>
			<div class="col-sm-5 no-pd">
				<a href="#" class="choose-step-box current">
					<span class="circle"> 1 </span>
					Select Amount And Room
				</a>
			</div>
			<div class="col-sm-5 no-pd">
				<a href="#" class="choose-step-box">
					<span class="circle"> 2 </span>
					Fill Tourist Infomation
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<h3>Tour Booking</h3>
					<div class="col-md-6">
						<label for="">Select Day Trip</label><br>
						<select name="daytrip">
							<option disabled selected>Select Day Trip</option>
              <?php
  						for($i=0;$i<=$last_btr;$i++){
                //if(date('Y-m-d') <= $booking_timerange[$i]['to']){
  								echo '<option datestart="'.$booking_timerange[$i]['from'].'" datefinish="'.$booking_timerange[$i]['to'].'" price="'.$booking_timerange[$i]['price'].'">';
  								$open_booking = date_format(date_create($booking_timerange[$i]['from']),"d M Y");
  								$close_booking = date_format(date_create($booking_timerange[$i]['to']),"d M Y");
  								echo '<td>'.$open_booking." - ".$close_booking.'</td>';
  								echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($booking_timerange[$i]['price']).' '.$package['tour_currency'].'</td>';
  								echo '</option>';
  							//}
              }
              ?>
						</select>
					</div>
					<div class="col-md-6">
						<label for="">Tourist</label><br>
						<input id="tourist-total-num" type="number" min="1" value="1">
						<span class="unit">people</span>
					</div>
				</div>
        <?php
				if($condition_option->num_rows() > 0){
					echo '<div class="form-group"><h3>Tour package option</h3>';
					foreach($condition_option->result_array() AS $row){
				?>
				<div class="col-md-6">
					<div class="checkbox-box">
						<input type="checkbox" class="tour-option" condition="<?=$row['tc_condition']?>" info="<?=$row['tc_data']?>" price="<?=$row['tc_price']?>"><span><?=$row['tc_data'];?>
				<?php
					if($row['tc_condition'] == 'decrease'){
						echo "<b class='discount'> discount ".number_format($row['tc_price'])." ".$package['tour_currency']."</b>";
					}else{
						echo "<b> add ".number_format($row['tc_price'])." ".$package['tour_currency']."</b>";
					}
				 ?></span>
					</div>
				</div>
				<?php
					}
					echo '</div>';
				}
				?>
				<div class="form-group">
					<h3>Select Hotel</h3>
					<div class="col-md-12">
                  <?php
        					if(isset($condition_hotel)){
                    $temp = json_decode($condition_hotel,true);
                    $count = count($temp)-1;
                    $count2 = count($temp[0]['room'])-1;
                    echo '<table><thead><tr><td>Hotel Name</td><td>Star</td><td>Location</td><td class="roomtype" roomtype="Twin-room">Price / Person</td>';
                    for($i=0;$i<=$count2;$i++){
                      $roomtype = str_replace(' ','-',$temp[0]['room'][$i]['roomtype']);
                      echo '<td class="roomtype" roomtype="'.$roomtype.'">'.$temp[0]['room'][$i]['roomtype'].'</td>';
                    }
                    echo '</thead><tbody>';
                    for($j=0;$j<=$count;$j++){
											if($j==0){
												echo '<tr><td><input type="radio" name="hotel" index="'.$j.'" checked>'.$temp[$j]['name'].'</td>';
											}else{
												echo '<tr><td><input type="radio" name="hotel" index="'.$j.'">'.$temp[$j]['name'].'</td>';
											}
                      echo '<td><span>Star</span> '.$temp[$j]['star'].' Stars</td>';
                      echo '<td><span>Location</span>'.$temp[$j]['location'.$lang].'</td>';
                      echo '<td class="hotel-list hotel-Twin-room-price"></td>';
                      for($k=0;$k<=$count2;$k++){
                        $slug = str_replace(' ','-',$temp[$j]['room'][$k]['roomtype']);
                        echo '<td class="hotel-'.$slug.'-price" '.$slug.'-price="'.$temp[$j]['room'][$k]['price'].'">+'.number_format($temp[$j]['room'][$k]['price']).'</td></tr>';
                      }
                    }
                  }
                  ?>
								</tbody>
							</table>
						</div>
				</div>

				<div class="form-group room">
					<h3>Select Room</h3>
					<div class="form-group">
						<div class="list">
							<div class="amount"><p>Total <span>1</span> / <span id="total-tourist">1</span> person</p></div>
						</div>
            <div id="hotel-room">
            </div>
						<hr>
						<div class="list total-amount">
							<div class="col-sm-5"><label>Total Amount</label></div>
							<div class="col-sm-4"><p class="totalamount">0</p><p>&nbsp;<?=$package['tour_currency']?></p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="btn-wrapper">
			<div class="col-sm-4 col-sm-offset-4">
				<button type="button" class="btn bold booking-infopage">Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<h3>SUPERMARKET Tours</h3>
					<p>by P.B Travel Agency</p>
					<hr>
					<a href="http://www.myanmar-center.in.th/">Myanmar Center</a>
				</div>
				<div class="col-sm-4 col-sm-offset-4 col-xs-12">
					<div class="contact">
						<h2>Add Line</h2>
						<a href="#"><img src="assets/images/ico-line.png" alt=""></a>
					</div>
					<div class="contact">
						<h2>Contact Us</h2>
						<p>02-222-2222</p>
					</div>
				</div>
			</div>
		</div>
		<div class="strap"></div>
    <form id="to-booking-info" action="easy-booking-info" method="post">
			<input name="tour-nameSlug" type="hidden" value="<?=$package['tour_nameSlug']?>" required>
			<input name="booking-detail" type="hidden" value="" required>
		</form>
	</footer>
  <!-- Modal -->
	<div class="modal fade" id="popup" role="dialog">
	  <div class="modal-dialog modal-md">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	      </div>
	      <div class="modal-body text-center">
	        <img src="<?=base_url()?>assets/images/ico-success.png" alt="">
	        <h4>Infomations</h4>
					<p id="alert-warning"></p>
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
  </div>
	<input id="tour-nameSlug" type="hidden" value="<?php echo $package['tour_nameSlug']?>">
  <input id="initial-hotel-price" type="hidden" value="<?=number_format($package['tour_startPrice'])?>">
	<input id="currency" type="hidden" value="<?=$package['tour_currency']?>">
</body>
<script>
  $(document).ready(function(){
    $('.hotel-Twin-room-price').html($('#initial-hotel-price').val());
		$('.room').hide();
  });

  $('select[name="daytrip"]').change(function(){
    $price = $(this).find(':selected').attr('price');
    $('#initial-hotel-price').val($price);
		$('.room').show();
    set_hotel(1);
		route();
  });

  $('#tourist-total-num').change(function(){
    $('#total-tourist').html($(this).val());
		$total = parseInt($(this).val(),10);
    switch(true){
      case ($total == 0 || $total < 0):
        $(this).val(1);
				$('#total-tourist').html(1);
        set_hotel(1);
        $('#alert-warning').html('Invalid number');
        $('#popup').modal('show');
      break;
      case ($total == 100 || $total > 100):
				$(this).val(1);
				$('#total-tourist').html(1);
				set_hotel(1);
				$('#alert-warning').html('Invalid number');
				$('#popup').modal('show');
			break;
    }
		route();
		$count = $('.tourist-num').length;
		$tourist_num = 0;
		for($i=0;$i<$count;$i++){
			$('.tourist-num').eq($i).val(0);
		}
		$('.amount').find('span').eq(0).html(0);
		sum_amount();
  });

  $('input:radio[name=hotel]').change(function(){
		$('.amount').find('span').eq(0).html(1);
		route();
  });

	$('.hotel-list').change(function(){
		sum_amount();
	});

	$('.tour-option').change(function(){
		sum_amount();
	});

	$('.booking-infopage').click(function(){
		if(!check_room()){
			$('#alert-warning').html("Twin room can't stay alone.");
			$('#popup').modal('show');
		}else{
			$daytrip = $('select[name="daytrip"]').find(':selected').attr('price');
			if($daytrip == undefined){
				$('#alert-warning').html('Plese select your interested day trip');
				$('#popup').modal('show');
			}else{
				$tourist_num = parseInt($('.amount').find('span').eq(0).html(),10);
				$total_tourist = parseInt($('#total-tourist').html(),10);
				if($tourist_num != $total_tourist){
					$('#alert-warning').html('Plese select room');
					$('#popup').modal('show');
				}else{
					$b_detail = '{"room":[';
					$count = $('.tourist-num').length-1;
					for($i=0;$i<=$count;$i++){
						$roomtype = $('.roomtype').eq($i).attr('roomtype');
						$tourist_num = $('.tourist-num').eq($i).val();
						if($tourist_num > 0){
							$b_detail += '{"roomtype":"'+$roomtype+'","tourist_num":"'+$tourist_num+'"}';
							if($i != $count){
								$b_detail += ',';
							}
						}
						if($i == $count){
							$b_detail += '],';
						}
					}
					$datestart = $('select[name="daytrip"]').find(':selected').attr('datestart');
					$datefinish = $('select[name="daytrip"]').find(':selected').attr('datefinish');
					$b_detail += '"date":[{"start":"'+$datestart+'","end":"'+$datefinish+'"}],';
					$tour_option = $('input.tour-option:checked');
					if($tour_option.length > 0){
						$b_detail += '"option":[';
						$tour_option.each(function(i){
							$b_detail += '{"condition":"'+$('.tour-option').attr('condition')+'","price":"'+numeral($('.tour-option').attr('price')).format('0')+'"}';
							if(i != $tour_option.length-1){
								$b_detail += ',';
							}
						});
						$b_detail += '],';
					}
					$totaltourist = $('#tourist-total-num').val();
					$b_detail += '"tourist":[{"total_tourist":"'+$totaltourist+'"}],';
					$totalamount = numeral($('.totalamount').html()).format('0');
					$b_detail += '"total_amount":"'+$totalamount+'"';
					$b_detail += '}';
					$('input[name="booking-detail"]').val($b_detail);
					document.forms['to-booking-info'].submit();
				}
			}
		}
	});

	function route(){
		$daytrip = $('select[name="daytrip"]').find(':selected').attr('price');
		$index_hotel = $('input:radio[name=hotel]:checked').attr('index');
		$status_daytrip = false;
		if($daytrip != undefined){
			$status_daytrip = true;
		}
		$status_hotel = false;
		if($index_hotel != undefined){
			$status_hotel = true;
		}
		if($status_daytrip && $status_hotel){
			$slug = $('#tour-nameSlug').val();
			get_room($slug,$index_hotel);
		}
	}

	function get_room($slug,$index_hotel){
		$.ajax({
			type: 'POST',
			async : false,
			url:'/get-hotel-room',
			data:{
				'slug': $slug,
				'index': $index_hotel
				},
			dataType: 'json',
			success:function(data){
				$result = listRoom(data);
				$('#hotel-room').html($result);
				$('.tourist-num').change(function(){
					$tourist_total_num = $('#tourist-total-num').val();
					$tourist_total = 0;
					$count = $('.tourist-num').length;
					for($i=0;$i<$count;$i++){
						$tourist_total += parseInt($('.tourist-num').eq($i).val(),10);
						if($tourist_total>$tourist_total_num){
							$('.tourist-num').eq($i).val(0);
							break;
						}
					}
					set_max($tourist_total_num);
					sum_amount();
				});
				sum_amount();
			}
		});
	}

	function listRoom(data){
		$result = '';
		$twin_price = $('#initial-hotel-price').val();
		$currency = $('#currency').val();
		$ck_people = parseInt($('#tourist-total-num').val(),10);
		if($ck_people > 1){
			$result += '<div class="list">';
			$result += '<div class="col-sm-5"><label>Twin / Tripple room</label></div>';
			$result += '<div class="col-sm-4 col-xs-7"><p>'+numeral($twin_price).format('0,0')+' '+$currency+' / people</p></div>';
			$result += '<div class="col-sm-3 col-xs-5"><input class="tourist-num " roomtype="Twin-room" type="number" value="0" min="0" max="1" price="'+$twin_price+'"><span class="unit">people</span></div>';
			$result += '</div>';
		}
		$twin_price = parseInt($twin_price.replace(',',''),10);
		for($i in data){
			if(data[$i]['roomtype'] == 'Single room'){
				$result += '<div class="list">';
				$n_price = $twin_price+parseInt(data[$i]['price'],10);
				$result += '<div class="col-sm-5"><label>'+data[$i]['roomtype']+'</label></div>';
				$result += '<div class="col-sm-4 col-xs-7"><p>'+numeral($n_price).format('0,0')+' '+$currency+' / prople</p></div>';
				$result += '<div class="col-sm-3 col-xs-5"><input class="tourist-num" roomtype="'+data[$i]['roomtype'].replace(' ','-')+'" type="number" value="1" min="0" max="1" price="'+$n_price+'"><span class="unit">people</span></div>';
				$result += '</div>';
			}else{
				$result += '<div class="list">';
				$n_price = $twin_price+parseInt(data[$i]['price'],10);
				$result += '<div class="col-sm-5"><label>'+data[$i]['roomtype']+'</label></div>';
				$result += '<div class="col-sm-4 col-xs-7"><p>'+numeral($n_price).format('0,0')+' '+$currency+' / prople</p></div>';
				$result += '<div class="col-sm-3 col-xs-5"><input class="tourist-num" roomtype="'+data[$i]['roomtype'].replace(' ','-')+'" type="number" value="0" min="0" max="1" price="'+$n_price+'"><span class="unit">people</span></div>';
				$result += '</div>';
			}
		}
		return $result;
	}

  function set_hotel($temp){
    switch($temp){
      case 1:
        $price = parseInt($('#initial-hotel-price').val().replace(',',''));
        $count_list = $('.hotel-list').length;
        $count_room_type = $('.roomtype').length;
        for($i=0;$i<$count_list;$i++){
          for($j=0;$j<$count_room_type;$j++){
            $roomtype = $('.roomtype').eq($j).attr('roomtype');
            $n_price = parseInt($('.hotel-'+$roomtype+'-price').eq($i).attr($roomtype+'-price'));
            $('.hotel-'+$roomtype+'-price').eq($i).html('+'+numeral($n_price).format('0,0'));
          }
					$('.hotel-Twin-room-price').eq($i).html(numeral($price).format('0,0'));
        }
      break;
    }
  }

	function set_max($tourist_num){
		$max_left = 0;
		$use_left = 0;
		$count = $('.tourist-num').length;
		for($i=0;$i<$count;$i++){
			$use_left += parseInt($('.tourist-num').eq($i).val(),10);
		}
		$max_left = $tourist_num-$use_left;
		for($i=0;$i<$count;$i++){
			$value = parseInt($('.tourist-num').eq($i).val(),10);
			$max = $value+$max_left;
			$('.tourist-num').eq($i).attr('max',$max);
		}
		$('.amount').find('span').eq(0).html($use_left);
	}

	function sum_amount(){
		$total_amount = 0;
		$count = $('.tour-option:checked').length;
		for($i=0;$i<$count;$i++){
			$condition = $('.tour-option:checked').eq($i).attr('condition');
			if($condition == 'increase'){
				$('.tour-option:checked').eq($i).attr('condition');
				$total_amount += parseInt($('.tour-option:checked').eq($i).attr('price'),10);
			}else{
				$total_amount -= parseInt($('.tour-option:checked').eq($i).attr('price'),10);
			}
		}
		$count = $('.tourist-num').length;
		for($i=0;$i<$count;$i++){
			$num = parseInt($('.tourist-num').eq($i).val(),10);
			$price = parseInt($('.tourist-num').eq($i).attr('price'),10);
			$total_amount += $num*$price;
		}
		$('.totalamount').html(numeral($total_amount).format('0,0'));
	}

	function check_room(){
		$twin_room = $('.tourist-num[roomtype=Twin-room]').val();
		$remnant = $twin_room % 2;
		if($remnant == 1){
			$('.tourist-num[roomtype=Twin-room]').val($twin_room-1);
			$single_room = parseInt($('.tourist-num[roomtype=Single-room]').val());
			$('.tourist-num[roomtype=Single-room]').val($single_room+1);
			return false;
		}else{
			return true;
		}
	}
</script>
</html>