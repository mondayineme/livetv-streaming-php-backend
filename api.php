<?php 
	session_start();
	header('Content-Type: application/json');
	require('db.php');
	if(isset($_GET['id'])){
		$q = "select * from users where id=".$_GET["id"];
		$keyData = $conn->query($q) or die($conn->error);
		$i = $keyData->fetch_assoc();
	}else {
		echo json_encode(array('error' => "Invalid Request", ));
		die();
	}
	


	if(isset($_GET['key']) && $_GET['key']==$i['api_key']){
		require 'db.php';

		if(isset($_GET['cat'])){
			// retrive all the channels present in given category 
			$query = "select * from channels where category = '".$conn->real_escape_string($_GET['cat'])."' order by id desc";
			$data = $conn->query($query) or die($conn->error);

			while($row = $data->fetch_assoc()){
					$datas[] = $row; 
					//echo $row['courseId'];
				}

			  	//print json_encode($datas);
				// from https://stackoverflow.com/questions/41972084/php-json-encode-not-working

		  	$show_json = json_encode($datas , JSON_FORCE_OBJECT);

			if ( json_last_error_msg()=="Malformed UTF-8 characters, possibly incorrectly encoded" ) {
			    $show_json = json_encode($datas, JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
			if ( $show_json !== false ) {
			    echo($show_json);
			} else {
			    die("json_encode fail: " . json_last_error_msg());
			}

		}

		if(isset($_GET['channels'])){
			// retrive all the channels present in given category 
			$query = "select * from channels order by id desc";
			$data = $conn->query($query) or die($conn->error);

			while($row = $data->fetch_assoc()){
					$datas[] = $row; 
					//echo $row['courseId'];
				}

			  	//print json_encode($datas);
				// from https://stackoverflow.com/questions/41972084/php-json-encode-not-working

		  	$show_json = json_encode($datas , JSON_FORCE_OBJECT);

			if ( json_last_error_msg()=="Malformed UTF-8 characters, possibly incorrectly encoded" ) {
			    $show_json = json_encode($datas, JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
			if ( $show_json !== false ) {
			    echo($show_json);
			} else {
			    die("json_encode fail: " . json_last_error_msg());
			}

		}

		if(isset($_GET['categories'])){
			$query = "select * from categories order by id desc";
			$data = $conn->query($query) or die($conn->error);
			$datas = array();
			while($row = $data->fetch_assoc()){
					$datas[] = $row; 
					//echo $row['courseId'];
				}

			  	//print json_encode($datas);
				// from https://stackoverflow.com/questions/41972084/php-json-encode-not-working

		  	$show_json = json_encode($datas , JSON_FORCE_OBJECT);

			if ( json_last_error_msg()=="Malformed UTF-8 characters, possibly incorrectly encoded" ) {
			    $show_json = json_encode($datas, JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
			if ( $show_json !== false ) {
			    echo($show_json);
			} else {
			    die("json_encode fail: " . json_last_error_msg());
			}
		}

	}else {
		echo json_encode(array('error' => "Invalid Key", ));
	}