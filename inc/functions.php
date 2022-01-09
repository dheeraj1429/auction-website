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
