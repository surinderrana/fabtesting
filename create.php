<?php

	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
    error_reporting(0);
	ini_set('display_errors', 0);


header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
	header("Access-Control-Allow-Headers: Origin");
	// header('Access-Control-Allow-Origin: https://www.yeesshh.com')
	include_once '../../classes/dbclass.php';
    include_once '../functions.php';
    
	
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);


	$dbclass = new DBClass();
	$connection = $dbclass->getConnection();
	$data = json_decode(file_get_contents("php://input"));


	function safe_string($value){
		$search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
		$replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

		return str_replace($search, $replace, $value);
	}

function email_validation($str) { 
    return (!preg_match( 
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
} 
	// print_r($data);exit;

	if($data){

			$success = 0;
			$error = 0;
			$country = @$_SERVER['GEOIP_COUNTRY_CODE'];
			if($country=='MA'){ die("Access for users from Morocco has been temporarily restricted due to multiple abuses"); }
			if($country=='DZ'){ die("Access for users from Algeria has been temporarily restricted due to multiple abuses"); }
			if($country=='EG'){ die("Access for users from Egypt has been temporarily restricted due to multiple abuses"); }



			$mes = '';
			$username=htmlspecialchars($data->reg_username,ENT_QUOTES);
			$email=htmlspecialchars($data->reg_email,ENT_QUOTES);
			$password=safe_string($data->reg_password);
			$country=htmlspecialchars($data->country,ENT_QUOTES);
			$im_type = htmlspecialchars($data->im_type,ENT_QUOTES);
			$im_id = htmlspecialchars($data->im_id,ENT_QUOTES);
			$gclid = safe_string($data->gclid,ENT_QUOTES);
			$utm_term = safe_string($data->utm_term,ENT_QUOTES);
			$utm_source = safe_string($data->utm_source,ENT_QUOTES);
			$utm_medium = safe_string($data->utm_medium,ENT_QUOTES);
			$utm_campaign = safe_string($data->utm_campaign,ENT_QUOTES);
			$hsa_cam = safe_string($data->hsa_cam,ENT_QUOTES);
			$hsa_grp = safe_string($data->hsa_grp,ENT_QUOTES);
			$hsa_mt = safe_string($data->hsa_mt,ENT_QUOTES);
			$hsa_src = safe_string($data->hsa_src,ENT_QUOTES);
			$hsa_ad = safe_string($data->hsa_ad,ENT_QUOTES);
			$hsa_acc = safe_string($data->hsa_acc,ENT_QUOTES);
			$hsa_net = safe_string($data->hsa_net,ENT_QUOTES);
			$hsa_kw = safe_string($data->hsa_kw,ENT_QUOTES);
			$hsa_tgt = safe_string($data->hsa_tgt,ENT_QUOTES);
			$hsa_ver = safe_string($data->hsa_ver,ENT_QUOTES);
			$hubspotutk = safe_string($data->hubspotutk,ENT_QUOTES);
			$ip = $_SERVER['REMOTE_ADDR'];
			$ref = @$_COOKIE['ref'];

			if($gclid){
				$gclid = "&gclid=".$gclid;
			}
			if($utm_term){
				$utm_term = "&utm_term=".$utm_term;
			}
			if($utm_source){
				$utm_source = "&utm_source=".$utm_source;
			}			
			if($utm_medium){
				$utm_medium = "&utm_medium=".$utm_medium;
			}
			if($utm_campaign){
				$utm_campaign = "&utm_campaign=".$utm_campaign;
			}
			if($hsa_cam){
				$hsa_cam = "&hsa_cam=".$hsa_cam;
			}
			if($hsa_grp){
				$hsa_grp = "&hsa_grp=".$hsa_grp;
			}
			if($hsa_mt){
				$hsa_mt = "&hsa_mt=".$hsa_mt;
			}
			if($hsa_src){
				$hsa_src = "&hsa_src=".$hsa_src;
			}
			if($hsa_ad){
				$hsa_ad = "&hsa_ad=".$hsa_ad;
			}
			if($hsa_acc){
				$hsa_acc = "&hsa_acc=".$hsa_acc;
			}
			if($hsa_net){
				$hsa_net = "&hsa_net=".$hsa_net;
			}
			if($hsa_kw){
				$hsa_kw = "&hsa_kw=".$hsa_kw;
			}
			if($hsa_tgt){
				$hsa_tgt = "&hsa_tgt=".$hsa_tgt;
			}
			if($hsa_ver){
				$hsa_ver = "&hsa_ver=".$hsa_ver;
			}
			if($hubspotutk){
				$hubspotutk = "&hubspotutk=".$hubspotutk;
			}																		
																		

			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);

			$api_key = @$_SERVER['HTTP_API_KEY'];
			

			$errors = new stdClass;
			$errors->status  = 100;
			$errors->message  = array();
		 	


			if($username=='') { $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Username can not be left blank</div>'; }


			if ( preg_match('/\s/',$username) ) { $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Space not allowed</div>'; }
			if(strlen($username)>'32' && $error!='1'){ $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Username must be between 5 and 32 characters</div>'; }
			if(strlen($username)<'5' && $error!='1'){ $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Username must be between 5 and 32 characters</div>'; }
			if($password=='' && $error!='1') { $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password can not be left blank</div>'; }
			if($country=='' && $error!='1') { $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> You have to select your country</div>'; }

			if(strlen($password)>'32' && $error!='1'){ $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password must be between 8 and 32 characters</div>'; }
			if(strlen($password)<'5' && $error!='1'){ $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password must be between 8 and 32 characters</div>'; }
			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 && $error!='1') {
			     $errors->message[].= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>';
			}
			// $testuser = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `username`='$username'"));

			$userssql = "SELECT * FROM `users` WHERE `username`='$username'";
	    	$result   = $connection->query($userssql);
	        $testuser = $result->fetch_object();

			if($testuser->id!='' && $error!='1') { $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> This username is already taken.</div>'; }
			if($email=='' && $error!='1') { $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Email can not be left blank</div>'; }
			if((!(email_validation($email))) && $error!='1') { $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Invalid email address</div>'; }
			$usersemailsql = "SELECT * FROM `users` WHERE `email`='$email'";
	    	$result   = $connection->query($usersemailsql);
	        $testemail = $result->fetch_object();

			//$testemail = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `email`='$email'"));
			if($testemail->id !='' && $error!='1') { $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> There is an account already registered with this email address.</div>'; }

			if($im_type == ''  || $im_id == '' && $error != '1'){
				$error='1'; 
				$mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> You have to select messenger type and enter your nick.</div>';

			}
			$usernameExp = explode(' ', (preg_replace('/[^A-Za-z0-9 -]+/', ' ', $username)));

			$Firstname = strtolower($usernameExp[0]);
			$lastname = strtolower($usernameExp[1]);

			$passwordCheckForUsername = strtolower(preg_replace('/[^A-Za-z0-9 -]+/', ' ', $password));
			if (stripos($passwordCheckForUsername,$Firstname) !== false || stripos($passwordCheckForUsername,$lastname) !== false) {
			     $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password can not contain Username or email.</div>';
			}


			$testIpsql = "SELECT * FROM `users` WHERE `ip`='$ip'";
	    	$result   = $connection->query($testIpsql);
	        $testip = $result->fetch_object();

			// $testip = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `ip`='$ip'"));
			// if($testip->id !='' && $error!='1' && stripos($email, "@yeesshh") === false) { $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Creating multiple accounts is forbidden.</div>'; }
			
			if(preg_match('/107.167.105/i',$ip)) {  $errors->message[] = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Creating multiple accounts is forbidden.</div>'; }

			$reg_date = date("Y-m-d"); 


			 if($errors->message){
		    	echo json_encode($errors); exit;
		    }else{


				$AuthToken = bin2hex(openssl_random_pseudo_bytes(64));

				$user_sql = "INSERT INTO `users` (`username`,`password`,`email`,`ref`,`ip`,`reg_date`,`status`) VALUES('$username','$password','$email','$ref','$ip','$reg_date','Unverified')";
		       	$check = $connection->query($user_sql);
		        $user_id = $connection->insert_id;

		        $user_profile_sql = "INSERT INTO `users_profile` (`username`,`country`,`im_type`,`im_id`) VALUES('$username','$country' ,'$im_type', '$im_id')";
		       	$check = $connection->query($user_profile_sql);
		       
		       	$emailQueueData=array();
				$email_content = getEmailContent('advertiser_confirmation');

				if($email_content){

					$e_subject = $email_content["e_subject"] ? $email_content["e_subject"] : '';
				    $e_content = $email_content["e_content"];
				    $e_from = $email_content["e_from"] ? $email_content["e_from"] : '';
				    $e_from_name = $email_content["e_from_name"];
				    $e_bcc = $email_content["e_bcc"];
				    $e_from_name = $email_content["e_from_name"] ? $email_content["e_from_name"] : '';
				    $e_reply_to = $email_content["e_reply_to"] ? $email_content["e_reply_to"] : '';

			        $e_content = str_replace('{USERNAME}',$username,$e_content);
			        $e_content = str_replace('{TOKEN_URL}',$token_url,$e_content);


					$emailQueueData['eq_username'] = $username;
					$emailQueueData['eq_slug'] = 'advertiser_confirmation';
					$emailQueueData['eq_subject'] = $e_subject;
					$emailQueueData['eq_content'] = $e_content;
					$emailQueueData['eq_to_email'] = $email;
					$emailQueueData['eq_from_email'] = $e_from;
					$emailQueueData['eq_from_name'] = $e_from_name;
					$emailQueueData['eq_bcc_email'] = $e_bcc;
					$emailQueueData['eq_reply_to_email'] = $e_reply_to;

					addDataToEailQueue($emailQueueData);
				
				}


				// $text = '
				// Hey <b>'.$username.'</b>:<br>
				// Thank you for registering with Yeesshh.<br>
				// To confirm your signup, please click the link below: URL.<br>
				// Link <a href= "https://platform.yeesshh.com/account_confirm.php?token='.$AuthToken.$gclid.$utm_term.$utm_source.$utm_medium.$utm_campaign.$hsa_cam.$hsa_grp.$hsa_mt.$hsa_src.$hsa_ad.$hsa_acc.$hsa_net.$hsa_kw.$hsa_tgt.$hsa_ver.$hubspotutk.'">Confirm Account</a><br>
				// <br>
				// <br>
				// ----------------------<br>
				// For security reasons, we advise you to delete this email after successfully confirming your account.
				// ';
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// $headers .= 'From: platform.yeesshh.com<noreply@yeesshh.com>' . "\r\n" .
				// 		    'Reply-To: noreply@yeesshh.com' . "\r\n" .
				// 		    'Bcc: dennis@yeesshh.com' . "\r\n" .
				// 	    	'Bcc: fabricio@yeesshh.com' . "\r\n" .
				// 	    	'Bcc: swt.test2018@gmail.com' . "\r\n" .
				// 		    'X-Mailer: PHP/' . phpversion();
				// mail($email,'Advertiser Registration',$text,$headers);
				//mail("swt.test2018@gmail.com",'Advertiser Registration',$text,$headers);

				$user_verify_sql = "INSERT INTO `user_verify` (`user_id`,`token`) VALUES('$user_id','$AuthToken')";
		       	$check = $connection->query($user_verify_sql);
		     

				$user_notification_sql = "INSERT INTO `notifications` (`username`,`title`,`description`,`type`,`date`,`status`) VALUES('$username','Registration','You have successfully registered your account with myDSP','success','$reg_date','1')";
		       	$check = $connection->query($user_notification_sql);
		    

				/***********/

				if($user_id){

					$hubspotutk = safe_string($data->hubspotutk,ENT_QUOTES);

					checkCreateUpdateHubspotAccountSignup($user_id);    

			        createHubspotAccountutf($user_id,$hubspotutk);

				}
				/***********/		     				

				
				$response = new stdClass;
				$response->status  = 200;
				$response->message = "<h3>Hooray,</h3><p> you are nearly in! Check your inbox and validate your email</p>";
				
			}

			echo json_encode($response); exit;
				



		 	$api_key = @$_SERVER['HTTP_API_KEY'];
	}else{
		$response = new stdClass;
				$response->status  = 100;
				$response->message = "Invalid Request!";
	}
	echo json_encode($response); exit;
	?>