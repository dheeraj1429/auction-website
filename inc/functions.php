<?php
//alertify...
function toast($side){
	if(isset($_SESSION['toast'])){
		if(!isset($_SESSION['toast']['duration'])){
			$_SESSION['toast']['duration']=3; //In seconds...
		}

		if(isset($_SESSION['toast']['type'])){
			$type = $_SESSION['toast']['type'];
		}else{
			$type = "";
		}

		if($_SESSION['toast']['msg'] != ""){
			if($side==1){
				if($type=='alert'){
					$toastMsg ="<script>ps_alertify('".$_SESSION['toast']['msg']."');</script>";
				}elseif($type=='success'){
					$toastMsg ="<script>alertify.success('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}elseif($type=='error'){
					$toastMsg ="<script>alertify.error('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}elseif($type=='warning'){
					$toastMsg ="<script>alertify.warning('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}else{
					$toastMsg ="<script>alertify.message('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}
			}else{
				$toastMsg = "<script> Materialize.toast('".$_SESSION['toast']['msg']."',3000);</script>";
			}

			$_SESSION['toast']['msg'] = "";
			unset($_SESSION['toast']['type']);
			unset($_SESSION['toast']['duration']);
			return $toastMsg;
		}
	}
}

function auctionType($id){
	$auctionType = array(
		1=>'POPULAR AUCTIONS',
		2=>'DEALS OF THE DAY',
		3=>'FEATURED AUCTIONS',
	);

	if($id==0){
		return $auctionType;
	}else{
		return $auctionType[$id];
	}
}

function ak_secure_string($param){
	//remove vulnerable params...
	$param = str_replace('"', "\"", str_replace("'", '\'', str_replace('</script>', '', str_replace('<script>', '', $param))));

	return $param;
}

function getGeneral($param){
	if($param != NULL)
		return $_SESSION['general'][$param];
	else
		return "Null";
}

function getSocialLinks($param){
	if($param != NULL)
		return $_SESSION['general'][$param];
	else
		return "#";
}

function getUserData($param){
	if($param != NULL)
		return $_SESSION['user'][$param];
	else
		return "Null";
}

function star_rating($rating){
	if($rating==0){
		$stars = '<i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating<1){
		$stars = '<i class="fas fa-star-half-o" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif ($rating==1) {
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating>1 && $rating <2){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star-half-o" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating==2){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating>2 && $rating<3){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star-half-o" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';

	}elseif($rating==3){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating>3 && $rating<4){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star-half-o" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating==4){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true" style="color:#ccc;"></i>';
	}elseif($rating>4 && $rating <5){
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star-half-o" aria-hidden="true"></i>';
	}else{
		$stars = '<i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>
	            <i class="fas fa-star" aria-hidden="true"></i>';
	}
	return $stars;
}

function getUsersJoined($auction_id){
	global $conn,$tblPrefix;

	$queryA = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(user_id) as usersJoined FROM `".$tblPrefix."auction_participant` WHERE id = $auction_id"))['usersJoined'];
	 
	return $queryA;
}

function auctionCard ($type,$limit,$category){
	global $conn,$tblPrefix;
	$condition = "";
	if($type == 2){
		$condition .= "type = 2";
	}else if($type == 3){
		$condition .= "type = 3";
	}else if($type == 1){
		$condition .= "type = 1";
	}

	if($category != Null){
		$condition .= " AND categrory =".$category;
	}

	if($limit != 0 ) {
		$condition .= " LIMIT " . $limit;
	}

	$queryCards = mysqli_query($conn,"SELECT `id`, `name`, `image`, `store_price`, `starting_price`, `starting_from`, `capacity` FROM `".$tblPrefix."auctions` WHERE status = 2 AND $condition ");
	
	while($cards=mysqli_fetch_assoc($queryCards)){
		$usersJoined = getUsersJoined($cards['id']);
		$totalUsers = $cards['capacity'];
		// $percentage = ($usersJoined * $totalUsers) / 100;
		$percentage = 50;

		echo '<div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-3 ">
		<!-- Popular cards -->
		<div class="popular_auction_card_div text-center py-3">

		  <!-- Auction Products badge-->
		  <div class="Auction_products_badge">
			<p class="text-white">Trend</p>
		  </div>
		  <!-- Auction Products badge-->

		  <!-- Products Images -->
		  <img src="./assets/img/auction/'.$cards['image'].'" alt="'.$cards['name'].'" class="img-fluid">
		  <!-- Products Images -->
		  <!-- Products Content -->
		  <div class="Auction_products_content mt-3">
			<h2>'.$cards['name'].'</h2>
			<p class="my-3 light_para">Auction house filled at:</p>

			<!-- Product Input Progress bar -->
			<div class="progress auction_progress_bar mt-2 mb-4">
			  <div class="progress-bar" role="progressbar" style="width: '.$percentage.'%;" aria-valuenow="'.$percentage.'" aria-valuemin="0"
				aria-valuemax="100">'.$percentage.'%</div>
			</div>
			<!-- Product Input Progress bar -->

			<!-- Auction Price div -->
			<div class="auction_price_div py-2 d-flex justify-content-around align-items-center">
			  <!-- Store price -->
			  <div class="auction_price_inner_div">
				<p class="light_para">Store price</p>
				<h3>$'.$cards['store_price'].'</h3>
			  </div>
			  <!-- Start Price -->
			  <div class="auction_price_inner_div">
				<p class="light_para">Starting price</p>
				<h3>$'.$cards['starting_price'].'</h3>
			  </div>
			</div>
			<!-- Auction Price div -->

			<!-- Subcribe button -->
			<div class="mt-4 mb-5">
			  <button class="Subcribe_button">Subscribe for $'.$cards['starting_price'].'</button>
			</div>
			<!-- Subcribe button -->

			<!-- Shecdule time div -->
			<div class="Shedule_div py-2">
			  <h3 class="text-white mb-3"> Scheduled on '.date("d/m/Y h:i:s a",strtotime($cards['starting_from'])).' </h3>
			</div>
			<!-- Shecdule time div -->
		  </div>
		  <!-- Products Content -->
		</div>
		<!-- Popular cards -->
	  </div>';
	}
	
}