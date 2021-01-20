<?  
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
$utm_source = "direct";
$utm_medium = "none";

if(isset($_SERVER["HTTP_REFERER"])){
	$utm_medium = "Referral";
	//$utm_source = $_SERVER["HTTP_REFERER"];
	$utm_source = parse_url($_SERVER["HTTP_REFERER"], PHP_URL_HOST);
}

if(isset($_POST['dosub'])){
$docref = $_SERVER['HTTP_REFERER'];
if(!(preg_match("/popeyeads.net/i",$docref) || preg_match("/yeesshh.com/i",$docref))){ die(); }
require_once 'config.php';
require_once 'function.php';
$success = 0;
$country = $_SERVER['GEOIP_COUNTRY_CODE'];
if($country=='MA'){ die("Access for users from Morocco has been temporarily restricted due to multiple abuses"); }
if($country=='DZ'){ die("Access for users from Algeria has been temporarily restricted due to multiple abuses"); }
if($country=='EG'){ die("Access for users from Egypt has been temporarily restricted due to multiple abuses"); }

function safe_string($value){
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

$mes = '';
$username=htmlspecialchars($_REQUEST['reg_username'],ENT_QUOTES);
$email=htmlspecialchars($_REQUEST['reg_email'],ENT_QUOTES);
$password=safe_string($_REQUEST['reg_password']);
$password2=safe_string($_REQUEST['reg_password2']);
$country=htmlspecialchars($_REQUEST['country'],ENT_QUOTES);
$im_type = htmlspecialchars($_REQUEST['im_type'],ENT_QUOTES);
$im_id = htmlspecialchars($_REQUEST['im_id'],ENT_QUOTES);
$ip = $_SERVER['REMOTE_ADDR'];
$ref = $_COOKIE['ref'];


// if($ref=='mostafidoun') { $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> You are not allowed to create an account with myDSP</div>'; }


$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);


if($username=='') { $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Username can not be left blank</div>'; }


if ( preg_match('/\s/',$username) ) { $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Space not allowed</div>'; }
if(strlen($username)>'32' && $error!='1'){ $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Username must be between 5 and 32 characters</div>'; }
if(strlen($username)<'5' && $error!='1'){ $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Username must be between 5 and 32 characters</div>'; }
if($password=='' && $error!='1') { $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password can not be left blank</div>'; }
if($password2=='' && $error!='1') { $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> You have to retype your password</div>'; }
if($country=='' && $error!='1') { $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> You have to select your country</div>'; }

if(strlen($password)>'32' && $error!='1'){ $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password must be between 8 and 32 characters</div>'; }
if(strlen($password)<'5' && $error!='1'){ $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password must be between 8 and 32 characters</div>'; }
if($password!=$password2 && $error!='1'){ $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password does not match</div>'; }
if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 && $error!='1') {
     $error='1'; $mes.= '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>';
}
$testuser = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `username`='$username'"));
if($testuser[id]!='' && $error!='1') { $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> This username is already taken.</div>'; }
if($email=='' && $error!='1') { $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Email can not be left blank</div>'; }
if((!(email_is_valid($email))) && $error!='1') { $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Invalid email address</div>'; }
$testemail = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `email`='$email'"));
if($testemail[id]!='' && $error!='1') { $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> There is an account already registered with this email address.</div>'; }

if($im_type == ''  || $im_id == '' && $error != '1'){
	$error='1'; 
	$mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> You have to select messenger type and enter your nick.</div>';

}
$usernameExp = explode(' ', (preg_replace('/[^A-Za-z0-9 -]+/', ' ', $username)));

$Firstname = strtolower($usernameExp[0]);
$lastname = strtolower($usernameExp[1]);

$passwordCheckForUsername = strtolower(preg_replace('/[^A-Za-z0-9 -]+/', ' ', $password));
if (stripos($passwordCheckForUsername,$Firstname) !== false || stripos($passwordCheckForUsername,$lastname) !== false) {
     $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Password can not contain Username or email.</div>';
}


$testip = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `ip`='$ip'"));
// if($testip[id]!='' && $error!='1' && stripos($email, "@yeesshh") === false) { $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Creating multiple accounts is forbidden.</div>'; }

if(preg_match('/107.167.105/i',$ip)) {  $error='1'; $mes = '<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Creating multiple accounts is forbidden.</div>'; }

	$reg_date = date("Y-m-d"); 
	if($error!='1'){ 
			// $user = base64_encode($username);
			// if($remember=='1') { $rtime = time()+86400; } else { $rtime = time()+86400; }
			// setcookie("PuTlogged",$user,$rtime,"/");
			// $reg_date = time(); 

		$token = '';

			// $data['name'] = $username;
			// $data['email'] = $email;
			// $data['login'] = $username;
			// $data['type'] = "REMOTE";
			// $data['read_only'] = false;
			// $data['password'] = $password;
			// $data['password_repeat'] = $password2;
			$gclid=safe_string($_REQUEST['gclid']) ? : '';
			if($gclid){
				$gclid = "&gclid=".$gclid;
			}
			$utm_term=safe_string($_REQUEST['utm_term']) ? : '';
			if($utm_term){
				$utm_term = "&utm_term=".$utm_term;
			}
			$utm_source=safe_string($_REQUEST['utm_source']) ? : '';
			if($utm_source){
				$utm_source = "&utm_source=".$utm_source;
			}			
			$utm_medium=safe_string($_REQUEST['utm_medium']) ? : '';
			if($utm_medium){
				$utm_medium = "&utm_medium=".$utm_medium;
			}
			$utm_campaign=safe_string($_REQUEST['utm_campaign']) ? : '';
			if($utm_campaign){
				$utm_campaign = "&utm_campaign=".$utm_campaign;
			}
			$hsa_cam=safe_string($_REQUEST['hsa_cam']) ? : '';
			if($hsa_cam){
				$hsa_cam = "&hsa_cam=".$hsa_cam;
			}
			$hsa_grp=safe_string($_REQUEST['hsa_grp']) ? : '';
			if($hsa_grp){
				$hsa_grp = "&hsa_grp=".$hsa_grp;
			}
			$hsa_mt=safe_string($_REQUEST['hsa_mt']) ? : '';
			if($hsa_mt){
				$hsa_mt = "&hsa_mt=".$hsa_mt;
			}
			$hsa_src=safe_string($_REQUEST['hsa_src']) ? : '';
			if($hsa_src){
				$hsa_src = "&hsa_src=".$hsa_src;
			}
			$hsa_ad=safe_string($_REQUEST['hsa_ad']) ? : '';
			if($hsa_ad){
				$hsa_ad = "&hsa_ad=".$hsa_ad;
			}
			$hsa_acc=safe_string($_REQUEST['hsa_acc']) ? : '';
			if($hsa_acc){
				$hsa_acc = "&hsa_acc=".$hsa_acc;
			}
			$hsa_net=safe_string($_REQUEST['hsa_net']) ? : '';
			if($hsa_net){
				$hsa_net = "&hsa_net=".$hsa_net;
			}
			$hsa_kw=safe_string($_REQUEST['hsa_kw']) ? : '';
			if($hsa_kw){
				$hsa_kw = "&hsa_kw=".$hsa_kw;
			}
			$hsa_tgt=safe_string($_REQUEST['hsa_tgt']) ? : '';
			if($hsa_tgt){
				$hsa_tgt = "&hsa_tgt=".$hsa_tgt;
			}
			$hsa_ver=safe_string($_REQUEST['hsa_ver']) ? : '';
			if($hsa_ver){
				$hsa_ver = "&hsa_ver=".$hsa_ver;
			}	
			$hubspotutk=safe_string($_REQUEST['hubspotutk']) ? : '';
			if($hubspotutk){
				$hubspotutk = "&hubspotutk=".$hubspotutk;
			}						
			
			$AuthToken = bin2hex(openssl_random_pseudo_bytes(64));
			$token_url = '<a href= "https://platform.yeesshh.com/account_confirm.php?token='.$AuthToken.$gclid.$utm_term.$utm_source.$utm_medium.$utm_campaign.$hsa_cam.$hsa_grp.$hsa_mt.$hsa_src.$hsa_ad.$hsa_acc.$hsa_net.$hsa_kw.$hsa_tgt.$hsa_ver.$hubspotutk.'">Confirm Account</a>';

			mysql_query("INSERT INTO `users` (`username`,`password`,`email`,`ref`,`ip`,`reg_date`,`status`) VALUES('$username','$password','$email','$ref','$ip','$reg_date','Unverified')");
			$userID = mysql_insert_id();

			mysql_query("INSERT INTO `users_profile` (`username`,`country`,`im_type`,`im_id`) VALUES('$username','$country' ,'$im_type', '$im_id')");
			// mysql_query("INSERT INTO `users_profile_copy` (`username`,`country`,`im_type`,`im_id`) VALUES('$username','$country' ,'$im_type', '$im_id')");
			$emailQueueData=array();
			$email_content = getEmailContent('advertiser_confirmation');


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
			// 		    'Bcc: fabricio@yeesshh.com' . "\r\n" .
			// 		    'Bcc: swt.test2018@gmail.com' . "\r\n" .
			// 		    'X-Mailer: PHP/' . phpversion();
			// mail($email,'Advertiser Registration',$text,$headers);

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


			mysql_query("INSERT INTO `user_verify` (`user_id`,`token`) VALUES('$userID','$AuthToken')");


			mysql_query("INSERT INTO `notifications` (`username`,`title`,`description`,`type`,`date`,`status`) VALUES('$username','Registration','You have successfully registered your account with myDSP','success','$reg_date','1')");
			
			$hubspotutk=safe_string($_REQUEST['hubspotutk']) ? : '';

			setcookie("hubspotutk",$hubspotutk,time()+2592000,"/",".yeesshh.com");


			$fp =  fopen(__DIR__.'/logs/hubspot_strange_bug.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : BEFORE CREATE HUBSPOT ACCOUNT".PHP_EOL);
            fwrite($fp, "userID :".print_r($userID,true).PHP_EOL );
            fclose($fp);


			/***********/
			if(!empty($userID)){

				$checkCreateUpdateHubspotAccount = checkCreateUpdateHubspotAccountSignup($userID);
			    $c_u_json = json_encode($checkCreateUpdateHubspotAccount);

			    $fp =  fopen(__DIR__.'/logs/hubspot_strange_bug.log', 'a');
	            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
	            fwrite($fp, "FUNCTION NAME : AFTER checkCreateUpdateHubspotAccountSignup ".PHP_EOL);
	            fwrite($fp, "DATA RETURN :".print_r($checkCreateUpdateHubspotAccount,true).PHP_EOL );
	            fclose($fp);

			    if(isset($checkCreateUpdateHubspotAccount[vid]) && !empty($checkCreateUpdateHubspotAccount[vid])){
			        $checkCreateUpdateHubspotAccount[vid];
			    }else{
			      	$checkCreateUpdateHubspotAccount[vid] = 0;
			    }	    

			    // if($hubspotutk){

			    	$fp =  fopen(__DIR__.'/logs/hubspot_strange_bug.log', 'a');
		            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
		            fwrite($fp, "FUNCTION NAME : BEFORE  hubspotutk ".PHP_EOL);
		            fwrite($fp, "USERID  :".print_r($userID,true).PHP_EOL );
		            fwrite($fp, "hubspotutk :".print_r($hubspotutk,true).PHP_EOL );
		            fclose($fp);	

			    	$output = createHubspotAccountutf($userID,$hubspotutk);	

			    	$fp =  fopen(__DIR__.'/logs/hubspot_strange_bug.log', 'a');
		            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
		            fwrite($fp, "FUNCTION NAME : AFTER  hubspotutk ".PHP_EOL);
		            fwrite($fp, "USERID  :".print_r($userID,true).PHP_EOL );
		            fwrite($fp, "output :".print_r($output,true).PHP_EOL );
		            fclose($fp);			
			    // }
			}

			$fp =  fopen(__DIR__.'/logs/hubspot_strange_bug.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : AFTER FULL REGISTERATION ".PHP_EOL);
          	fwrite($fp, PHP_EOL ."______________________ !! _____________________________".PHP_EOL );
          	fwrite($fp, PHP_EOL ."______________________ !! _____________________________".PHP_EOL );
            fclose($fp);	

			/**********/
			
			$success = 1;

			   // $mes = '<div class="alert alert-success sucessdiv"><h4><i class="fa fa-success"></i> Success!</h4> Acount registered successfully. Please verify your account from email link.</div>'; 
			// header('location: account_just_registered.php');
	}
}

$page_title = 'Platform Yeesshh Registration';
$page_description = 'Get a mydsp.yeesshh.com account.';

require_once 'config.php';
if($_REQUEST['r']!=''){ $r=$_REQUEST['r']; $rtime = time()+86400; setcookie("ref",$r,$rtime,"/",".popundertotal.com"); }
$uri = $_SERVER['REQUEST_URI']; $uri = explode("/",$uri); $uri = $uri[2]=='' ? $uri[1] : $uri[2]; $uri=explode("?",$uri); $uri=$uri[0]; $uri = str_replace(".php","",$uri);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><? if($page_title=='') { echo 'Premium Pop-Under Ad Network'; } else { echo $page_title; } ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <? if($page_description!=''){ ?>
  <meta itemprop="description" content="<?=$page_description;?>">
  <? } ?>
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Work+Sans:wght@600;700&display=swap" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97850161-1"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Start of HubSpot Embed Code -->
	<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4458590.js"></script>
	<!-- End of HubSpot Embed Code -->
<script>



        $(document).ready(function() {

                var allcookies = document.cookie;              
                         // Get all the cookies pairs in an array
                cookiearray = allcookies.split(';');
                         
                // Now take key value pair out of this array
                for(var i=0; i<cookiearray.length; i++) {
                  name = cookiearray[i].split('=')[0];
                    value = cookiearray[i].split('=')[1];
                    if(name.trim() == 'hubspotutk' ){
                    	console.log(value);
                      $('#hubspotutk').val(value);
                    }
                }
        });

	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	
	// Global configs
	gtag('config', 'UA-97850161-1', {send_page_view: false, campaign: {
	source: '<?php echo $utm_source;?>', // utm_source
	medium: '<?php echo $utm_medium;?>' // utm medium
	}});	

	// Global configs
	gtag('config', 'UA-97850161-3', {send_page_view: false, campaign: {
	source: '<?php echo $utm_source;?>', // utm_source
	medium: '<?php echo $utm_medium;?>' // utm medium
	}});	

	gtag('event', 'page_view', {
	  page_title: 'Signup Visited',
	  page_location: '/signup/visited',
	  page_path: '/signup/visited',
	  send_to: ['UA-97850161-1','UA-97850161-3']
	});
	
	
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Ads: 471447742-->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-471447742"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-471447742');
</script>  
<!-- Event snippet for Sign up - Completed conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
		function gtag_report_conversion(url) {
			console.log("inside grc");
						var callback = function () {
					 
							if (typeof(url) != 'undefined') {     
								window.location = url;
							}
						};
						gtag('event', 'conversion', {
								'send_to': 'AW-471447742/OeRHCKe0s-sBEL7x5uAB',
								'transaction_id': '',
								'event_callback': callback
						});
						return false;
		}

</script>

</head>
<body itemscope itemtype="https://schema.org/WebPage" style="">
<style>
	html, body{
   height: 100%;
}
	 .one-line { border-radius:1px; box-shadow:0px 0px 0px #fff; padding: 6px 12px 6px 12px; height:auto; border: 1px solid #e0e0e0; font-size:14px;box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075); }
	 .registerform label {
	    font-weight: 300;
	    display: block;
	    margin: 0;
	    font-size: 14px;
	    color: #000;
	}
	 p { font-size:14px !important;color:#838181; font-weight:400; }
	 h9 { color:#646464; font-weight:bold;line-height:20px;margin-bottom:10px; font-size:16px;font-weight: 600; display:block;}
	 .or span { position:absolute; padding:5px 10px;background:#fff; margin-top:-15px; margin-left:-20px;}
	 .btn { border-radius:0px; }
	 body {
        font-family: 'Roboto', sans-serif;
	    font-size: 16px;
	    line-height: 20px;
	    background-image: url(images/bg_register.jpg);
	    background-size: cover;
	    background-position: center center;
	    background-repeat: no-repeat;
	}	
	h1, h2, h3, h4, h5, h6 {
	    font-family: 'Work Sans', sans-serif;
	    font-weight: 600;
	    color: #000;
	    letter-spacing: 0;
	}
	h4 {
	    font-size: 26px;
	    line-height: 30px;
	    margin-bottom: 20px;
	}
	 html { background:transparent !important; }
     .or p{
	 	margin-bottom: 0px;
	 }
	 .registermain {
	    padding: 59px 20px;
	    min-height: 100vh;
	    display: flex;
	    align-items: center;
	}
	 .error{
	 	color:red;
	 	margin-top: 3px;
	 }
	 .errorBorder{
	 	border: solid 2px #FF0000;  
	 }
	.formdiv{
		max-width: 600px;
		background: #fff;
		border-radius: 15px;
		padding: 30px 40px;
		margin: 0 auto; 
	}
	.logo-div {
		display: inline-block;
		width: 100%;
		max-width: 200px;
		margin-bottom: 15px;
	}
	.crtbtn{
		border-radius: 3px;
		background-color: #4bb9e6;
		border-color: #4bb9e6;
		color: #FFFFFF;
		padding: 7px 12px;
		font-size: 14px;
		width: 100%;
		font-family: 'Roboto Condensed', sans-serif;
		border: 1px solid #fff;
	}
	.crtbtn:hover{
		border-radius: 3px;
		background-color: #1fa7df;
		border-color: #1ea1d6;
		color: #FFFFFF;
		padding: 7px 12px;
		font-size: 14px;
		width: 100%;
		border: 1px solid #fff;
	}
	.crtbtnwht {
    background: #fff;
    border: none;
    color: #000000;
    font-size: 15px;
    padding: 0;
    width: 100%;
    border:none;
    text-decoration: underline;
}
	.crtbtnwht:active{
		outline: 0!important;
	}
	.crtbtnwht:focus{
		box-shadow:inset 0 3px 5px rgba(0, 0, 0, 0.125);
		outline: 0!important;
	}
	input:internal-autofill-selected {
		background-color: rgb(232, 240, 254) !important;
		background-image: none !important;
		color: rgb(0, 0, 0) !important;
	}
form.formdiv {
    /*display: none;*/
}
.sucouter {
    height: 88vh;
    position: relative;
}
.sucessdiv {
    background-color: #fff;
    width: 41%;
    margin: auto;
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
.sucessdiv h3 {
    font-size: 24px;
    font-weight: 600;
}
.sucessdiv a i {
    padding-right: 8px;
    display: inline-block;
}
.sucessdiv a {
    border: 1px solid #c1c1c1 !important;
    color: #333;
    float: left;
    padding: 6px 45px;
    text-align: left !important;
}
.suceesinr p {
       font-size: 15px !important;
    color: #000 !important;
    font-weight: 500 !important;
        padding: 10px 0px;

}
.registerform input[type="text"],
.registerform input[type="email"],
.registerform input[type="password"],
.registerform select {
    height: 32px;
    background-color: #f2f2f2;
    border-radius: 6px;
    font-style: inherit;
    width: 100%;
    border: none;
    font-weight: 300;
    font-size: 14px;
    padding: 0 10px;
    color: #c2c2c2;
    box-shadow: none;
}
input:focus{
	box-shadow: none;
	outline: none;
}
.registerform select {
    background-image: url(./images/black-half.png);
    background-repeat: no-repeat;
    background-position: right 10px center;
    -webkit-appearance: none;
    appearance: none;
}
.registerform input:focus,
.registerform select:focus {
    color: #000;
}
.registerform .checkboxstyle {
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 12px;
  line-height: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
}
.checkboxstyle strong{
	font-weight: 500;
}
.checkboxstyle input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 17px;
    width: 17px;
    border: 1px solid #1c86d3;
    border-radius: 3px;
}
.checkboxstyle input:checked ~ .checkmark {
  background-color: #2196F3;
}
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
.checkboxstyle input:checked ~ .checkmark:after {
  display: block;
}
.checkboxstyle .checkmark:after {
    left: 5px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.checkboxstyle strong a {
    color: #000;
}
.registerform .btn.crtbtn {
    font-size: 18px;
    font-weight: 600;
    font-family: 'Work Sans', sans-serif;
    padding: 9px 33px;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
    background: #ffbe00;
    color: #fff;
    display: inline-block;
    border-radius: 4px;
    cursor: pointer;
    border: none;
}
.registerform .btns ul {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}
.registerform .btns ul li:last-child {
    margin-left: 10px;
}
.registerform .btns ul li a{
	color: #000;
}
li{
	list-style: none;
}
.registerform .row{
	margin: 0 -7px;
}
.registerform .row > div {
    padding: 0 7px;
}
.registerform .btn.crtbtn:focus {
    outline: none;
}
.alert h4 {
    margin-top: 0;
    color: inherit;
    font-size: 14px;
    display: inline-block;
    margin: 0 2px 0 0px;
    line-height: 20px;
}
.alert {
    padding: 10px;		    
	font-size: 14px;
	line-height: 20px;
}

.form-group{
	position: relative;
}
.form-group .fa-eye{
	font-size: 16px;
	position: absolute;
	top: 28px;
	right: 10px;
}
.form-group input[type="password"]{
      padding-right: 35px;
}

@media(max-width: 575px){
.formdiv {
    padding: 30px 20px;
}
.registerform .btns ul {
    flex-direction: column;
}
.registerform .btns ul li:first-child{
    margin-bottom: 10px;
}
}
</style>
 <div class="sucouter" style="<?php if($success == 0){ echo 'display: none;'; }?>">
 <div class="sucessdiv clearfix">
 	<div class="suceesinr text-center">
   <h3>Hooray,</h3>
   <p> you are nearly in! Check your inbox and validate your email</p>
   <?php if($success == 1){ 
			//Call events
			echo "<script>
					gtag('event', 'page_view', {
					  page_title: 'Signup Submitted',
					  page_location: '/signup/submitted',
					  page_path: '/signup/submitted',
					  send_to: ['UA-97850161-1','UA-97850161-3']
					});	
					$('.regi').prop('disabled',false); 
					gtag_report_conversion();	
				/*					
				gtag('event', 'Signup Started', {'send_to': ['UA-97850161-5','UA-97850161-1','UA-97850161-3'],'event_category' : 'User Acquisition','event_label' : 'Single Signup'});				
				ga('send', 'event', 'User Acquisition', 'Signup Started', 'Single Signup');
				ga('myYeesshh.send', 'event', 'User Acquisition', 'Signup Started', 'Single Signup');
				ga('pushEureekkaa.send', 'event', 'User Acquisition', 'Signup Started', 'Single Signup');
				*/
				</script>"; 
		}?>

</div>
   <!-- <a href="register.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> -->
 </div>
</div>

<div class="registermain" style="<?php if($success == 1){ echo 'display: none;'; }?>">	

<div class="container new" id="contentcontainer">

<div class="row registerform" >
 
		<form role="form" method="post" class="formdiv" id="myForm">
			<fieldset>
				<div class="text-center">
					<a href="/login.php"><img src="images/yeesshh-logo.png" alt="logo-image" class="logo-div" /></a>
					<h4>Create an Advertiser Account</h4>
			    </div>
				<?=$mes;?>
				<div class="form-group" style="position:relative;">
				<label>Username</label>
                    <input type="text" name="reg_username" id="reg_username" class="form-control one-line" placeholder="Enter an username" autocomplete="nope" value="<?=$_POST['reg_username'];?>">
				</div>
				<div class="form-group" style="position:relative;">
				<label>Email address</label>
                    <input type="text" name="reg_email" id="reg_email" class="form-control one-line" placeholder="Type your email" autocomplete=off value="<?=$_POST['reg_email'];?>">
				</div>
				<div class="form-group" style="position:relative;">
				<label>Country</label>           
                    <select name="country" id="country" class="form-control">
				          <option value="" disabled="" selected="" hidden="">
				            Country*
				          </option>
				        
				          <option value="af">Afghanistan</option>
				        
				          <option value="ax">Aland Islands</option>
				        
				          <option value="al">Albania</option>
				        
				          <option value="dz">Algeria</option>
				        
				          <option value="as">American Samoa</option>
				        
				          <option value="ad">Andorra</option>
				        
				          <option value="ao">Angola</option>
				        
				          <option value="ai">Anguilla</option>
				        
				          <option value="ag">Antigua and Barbuda</option>
				        
				          <option value="ar">Argentina</option>
				        
				          <option value="am">Armenia</option>
				        
				          <option value="aw">Aruba</option>
				        
				          <option value="au">Australia</option>
				        
				          <option value="at">Austria</option>
				        
				          <option value="az">Azerbaijan</option>
				        
				          <option value="bs">Bahamas</option>
				        
				          <option value="bh">Bahrain</option>
				        
				          <option value="bd">Bangladesh</option>
				        
				          <option value="bb">Barbados</option>
				        
				          <option value="by">Belarus</option>
				        
				          <option value="be">Belgium</option>
				        
				          <option value="bz">Belize</option>
				        
				          <option value="bj">Benin</option>
				        
				          <option value="bm">Bermuda</option>
				        
				          <option value="bt">Bhutan</option>
				        
				          <option value="bo">Bolivia</option>
				        
				          <option value="ba">Bosnia and Herzegovina</option>
				        
				          <option value="bw">Botswana</option>
				        
				          <option value="bv">Bouvet Island</option>
				        
				          <option value="br">Brazil</option>
				        
				          <option value="io">British Indian Ocean Territory</option>
				        
				          <option value="bn">Brunei Darussalam</option>
				        
				          <option value="bg">Bulgaria</option>
				        
				          <option value="bf">Burkina Faso</option>
				        
				          <option value="bi">Burundi</option>
				        
				          <option value="kh">Cambodia</option>
				        
				          <option value="cm">Cameroon</option>
				        
				          <option value="ca">Canada</option>
				        
				          <option value="cv">Cape Verde</option>
				        
				          <option value="ky">Cayman Islands</option>
				        
				          <option value="cf">Central African Republic</option>
				        
				          <option value="td">Chad</option>
				        
				          <option value="cl">Chile</option>
				        
				          <option value="cn">China</option>
				        
				          <option value="cx">Christmas Island</option>
				        
				          <option value="cc">Cocos (Keeling) Islands</option>
				        
				          <option value="co">Colombia</option>
				        
				          <option value="km">Comoros</option>
				        
				          <option value="ck">Cook Islands</option>
				        
				          <option value="cr">Costa Rica</option>
				        
				          <option value="ci">Cote D'Ivoire</option>
				        
				          <option value="hr">Croatia</option>
				        
				          <option value="cw">Curacao</option>
				        
				          <option value="cy">Cyprus</option>
				        
				          <option value="cz">Czech Republic</option>
				        
				          <option value="dk">Denmark</option>
				        
				          <option value="dj">Djibouti</option>
				        
				          <option value="dm">Dominica</option>
				        
				          <option value="do">Dominican Republic</option>
				        
				          <option value="tp">East Timor</option>
				        
				          <option value="ec">Ecuador</option>
				        
				          <option value="eg">Egypt</option>
				        
				          <option value="sv">El Salvador</option>
				        
				          <option value="gq">Equatorial Guinea</option>
				        
				          <option value="er">Eritrea</option>
				        
				          <option value="ee">Estonia</option>
				        
				          <option value="et">Ethiopia</option>
				        
				          <option value="fk">Falkland Islands (Malvinas)</option>
				        
				          <option value="fo">Faroe Islands</option>
				        
				          <option value="fj">Fiji</option>
				        
				          <option value="fi">Finland</option>
				        
				          <option value="fr">France</option>
				        
				          <option value="fx">France, Metropolitan</option>
				        
				          <option value="gf">French Guiana</option>
				        
				          <option value="pf">French Polynesia</option>
				        
				          <option value="tf">French Southern Territories</option>
				        
				          <option value="ga">Gabon</option>
				        
				          <option value="gm">Gambia</option>
				        
				          <option value="ge">Georgia</option>
				        
				          <option value="de">Germany</option>
				        
				          <option value="gh">Ghana</option>
				        
				          <option value="gi">Gibraltar</option>
				        
				          <option value="gr">Greece</option>
				        
				          <option value="gl">Greenland</option>
				        
				          <option value="gd">Grenada</option>
				        
				          <option value="gp">Guadeloupe</option>
				        
				          <option value="gu">Guam</option>
				        
				          <option value="gt">Guatemala</option>
				        
				          <option value="gg">Guernsey</option>
				        
				          <option value="gn">Guinea</option>
				        
				          <option value="gw">Guinea-Bissau</option>
				        
				          <option value="gy">Guyana</option>
				        
				          <option value="ht">Haiti</option>
				        
				          <option value="hm">Heard Island and McDonald Islands</option>
				        
				          <option value="va">Holy See (Vatican City State)</option>
				        
				          <option value="hn">Honduras</option>
				        
				          <option value="hk">Hong Kong</option>
				        
				          <option value="hu">Hungary</option>
				        
				          <option value="is">Iceland</option>
				        
				          <option value="in">India</option>
				        
				          <option value="id">Indonesia</option>
				        
				          <option value="iq">Iraq</option>
				        
				          <option value="ie">Ireland</option>
				        
				          <option value="im">Isle of Man</option>
				        
				          <option value="il">Israel</option>
				        
				          <option value="it">Italy</option>
				        
				          <option value="jm">Jamaica</option>
				        
				          <option value="jp">Japan</option>
				        
				          <option value="je">Jersey</option>
				        
				          <option value="jo">Jordan</option>
				        
				          <option value="kz">Kazakstan</option>
				        
				          <option value="ke">Kenya</option>
				        
				          <option value="ki">Kiribati</option>
				        
				          <option value="kr">Korea, Republic of</option>
				        
				          <option value="xk">Kosovo</option>
				        
				          <option value="kw">Kuwait</option>
				        
				          <option value="kg">Kyrgyzstan</option>
				        
				          <option value="la">Lao People's Democratic Republic</option>
				        
				          <option value="lo">Laos</option>
				        
				          <option value="lv">Latvia</option>
				        
				          <option value="lb">Lebanon</option>
				        
				          <option value="ls">Lesotho</option>
				        
				          <option value="ly">Libya</option>
				        
				          <option value="li">Liechtenstein</option>
				        
				          <option value="lt">Lithuania</option>
				        
				          <option value="lu">Luxembourg</option>
				        
				          <option value="mo">Macau</option>
				        
				          <option value="mk">Macedonia</option>
				        
				          <option value="mg">Madagascar</option>
				        
				          <option value="mw">Malawi</option>
				        
				          <option value="my">Malaysia</option>
				        
				          <option value="mv">Maldives</option>
				        
				          <option value="ml">Mali</option>
				        
				          <option value="mt">Malta</option>
				        
				          <option value="mh">Marshall Islands</option>
				        
				          <option value="mq">Martinique</option>
				        
				          <option value="mr">Mauritania</option>
				        
				          <option value="mu">Mauritius</option>
				        
				          <option value="yt">Mayotte</option>
				        
				          <option value="mx">Mexico</option>
				        
				          <option value="fm">Micronesia, Federated States of</option>
				        
				          <option value="md">Moldova, Republic of</option>
				        
				          <option value="mc">Monaco</option>
				        
				          <option value="mn">Mongolia</option>
				        
				          <option value="me">Montenegro</option>
				        
				          <option value="ms">Montserrat</option>
				        
				          <option value="ma">Morocco</option>
				        
				          <option value="mz">Mozambique</option>
				        
				          <option value="mm">Myanmar (Burma)</option>
				        
				          <option value="na">Namibia</option>
				        
				          <option value="nr">Nauru</option>
				        
				          <option value="np">Nepal</option>
				        
				          <option value="nl">Netherlands</option>
				        
				          <option value="an">Netherlands Antilles</option>
				        
				          <option value="nc">New Caledonia</option>
				        
				          <option value="nz">New Zealand</option>
				        
				          <option value="ni">Nicaragua</option>
				        
				          <option value="ne">Niger</option>
				        
				          <option value="ng">Nigeria</option>
				        
				          <option value="nu">Niue</option>
				        
				          <option value="nf">Norfolk Island</option>
				        
				          <option value="mp">Northern Mariana Islands</option>
				        
				          <option value="no">Norway</option>
				        
				          <option value="om">Oman</option>
				        
				          <option value="ap">Other Asia/Pacific</option>
				        
				          <option value="eu">Other Europe</option>
				        
				          <option value="pk">Pakistan</option>
				        
				          <option value="pw">Palau</option>
				        
				          <option value="ps">Palestinian Territory</option>
				        
				          <option value="pa">Panama</option>
				        
				          <option value="pg">Papua New Guinea</option>
				        
				          <option value="py">Paraguay</option>
				        
				          <option value="pe">Peru</option>
				        
				          <option value="ph">Philippines</option>
				        
				          <option value="pn">Pitcairn Islands</option>
				        
				          <option value="pl">Poland</option>
				        
				          <option value="pt">Portugal</option>
				        
				          <option value="pr">Puerto Rico</option>
				        
				          <option value="qa">Qatar</option>
				        
				          <option value="re">Reunion</option>
				        
				          <option value="ro">Romania</option>
				        
				          <option value="ru">Russian Federation</option>
				        
				          <option value="rw">Rwanda</option>
				        
				          <option value="sh">Saint Helena</option>
				        
				          <option value="kn">Saint Kitts and Nevis</option>
				        
				          <option value="lc">Saint Lucia</option>
				        
				          <option value="pm">Saint Pierre and Miquelon</option>
				        
				          <option value="vc">Saint Vincent and the Grenadines</option>
				        
				          <option value="ws">Samoa</option>
				        
				          <option value="sm">San Marino</option>
				        
				          <option value="st">Sao Tome and Principe</option>
				        
				          <option value="sa">Saudi Arabia</option>
				        
				          <option value="sn">Senegal</option>
				        
				          <option value="rs">Serbia</option>
				        
				          <option value="sc">Seychelles</option>
				        
				          <option value="sl">Sierra Leone</option>
				        
				          <option value="sg">Singapore</option>
				        
				          <option value="sk">Slovakia</option>
				        
				          <option value="si">Slovenia</option>
				        
				          <option value="sb">Solomon Islands</option>
				        
				          <option value="so">Somalia</option>
				        
				          <option value="za">South Africa</option>
				        
				          <option value="gs">South Georgia and the South Sandwich Islands</option>
				        
				          <option value="es">Spain</option>
				        
				          <option value="lk">Sri Lanka</option>
				        
				          <option value="sr">Suriname</option>
				        
				          <option value="sj">Svalbard and Jan Mayen</option>
				        
				          <option value="sz">Swaziland</option>
				        
				          <option value="se">Sweden</option>
				        
				          <option value="ch">Switzerland</option>
				        
				          <option value="tw">Taiwan</option>
				        
				          <option value="tj">Tajikistan</option>
				        
				          <option value="tz">Tanzania, United Republic of</option>
				        
				          <option value="th">Thailand</option>
				        
				          <option value="tl">Timor-Leste</option>
				        
				          <option value="tg">Togo</option>
				        
				          <option value="tk">Tokelau</option>
				        
				          <option value="to">Tonga</option>
				        
				          <option value="tt">Trinidad and Tobago</option>
				        
				          <option value="tn">Tunisia</option>
				        
				          <option value="tr">Turkey</option>
				        
				          <option value="tm">Turkmenistan</option>
				        
				          <option value="tc">Turks and Caicos Islands</option>
				        
				          <option value="tv">Tuvalu</option>
				        
				          <option value="ug">Uganda</option>
				        
				          <option value="ua">Ukraine</option>
				        
				          <option value="ae">United Arab Emirates</option>
				        
				          <option value="gb">United Kingdom</option>
				        
				          <option value="us">United States</option>
				        
				          <option value="uy">Uruguay</option>
				        
				          <option value="uz">Uzbekistan</option>
				        
				          <option value="vu">Vanuatu</option>
				        
				          <option value="ve">Venezuela</option>
				        
				          <option value="vn">Vietnam</option>
				        
				          <option value="vg">Virgin Islands, British</option>
				        
				          <option value="vi">Virgin Islands, U.S.</option>
				        
				          <option value="wf">Wallis and Futuna</option>
				        
				          <option value="eh">Western Sahara</option>
				        
				          <option value="ye">Yemen</option>
				        
				          <option value="zm">Zambia</option>
				        
				        </select>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" style="position:relative;">
							<label>Password</label>
			                   <input type="password" name="reg_password" id="password" class="form-control one-line" placeholder="Enter a password" autocomplete="new-password">
			                   <!-- <p class="noticePass">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p> -->
			                   <i class="far fa-eye" id="togglePassword"></i>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group" style="position:relative;">
							<label>Repeat Password </label>           
		                    <input type="password" name="reg_password2" id="password2" class="form-control one-line" placeholder="Repeat Password" autocomplete="new-password">
		                    <i class="far fa-eye" id="togglePassword1"></i>
						</div>
					</div>
				</div>		
				
				<div class="form-group" style="position:relative;">
					<div class="row">
						<div class="col-md-6">
							<label>Messenger</label>
		                	<select name="im_type" id="messenger" class="form-control">
		                		<option <? if($_REQUEST['im_type']=='Telegram'){ echo 'selected'; } ?>value="Telegram">Telegram</option>
		                		<option  <? if($_REQUEST['im_type']=='Wechat'){ echo 'selected'; } ?> value="Wechat">Wechat</option>
		                		<option <? if($_REQUEST['im_type']=='Facebook'){ echo 'selected'; } ?> value="Facebook">Facebook</option>
		                		<option <? if($_REQUEST['im_type']=='Whatspp'){ echo 'selected'; } ?> value="WhatsApp">WhatsApp</option>
		                		<option selected <? if($_REQUEST['im_type']=='Skype'){ echo 'selected'; } ?> value="Skype">Skype</option>
		                		<option <? if($_REQUEST['im_type']=='Yahoo'){ echo 'selected'; } ?> value="Yahoo">Yahoo</option>
		                		<option <? if($_REQUEST['im_type']=='Icq'){ echo 'selected'; } ?> value="Icq">ICQ</option>
		                		<option <? if($_REQUEST['im_type']=='Qq'){ echo 'selected'; } ?> value="Qq">QQ</option>
		                		<option <? if($_REQUEST['im_type']=='MSN'){ echo 'selected'; } ?> value="MSN">MSN</option>
		                		<option <? if($_REQUEST['im_type']=='AIM'){ echo 'selected'; } ?> value="AIM">AIM</option>
		                		<option <? if($_REQUEST['im_type']=='Other'){ echo 'selected'; } ?> value="Other">Other</option>
		                	</select>	   
		                </div>
		                <div class="col-md-6">
		                	<label for="" id="nickLabel">Nickname in messenger</label>
		                	<input type="text" name="im_id" id="messengerNickname" placeholder="nickname*" class="form-control">
		                </div>	
	                </div>	
                </div>
                <div class="form-group">
					<label class="checkboxstyle">I agree to Yeesshh's <strong><a href="https://www.yeesshh.com/yeesshh-user-agreement/" target="_blank">Terms of Use</a></strong> and the receive emails &amp; updates. I acknowledge that i have read Yeesshh's <strong><a href="https://www.yeesshh.com/legal/" target="_blank">Privacy Policy</a></strong>.
					  <input type="checkbox" id="term_condation">
					  <span class="checkmark"></span>
					</label>
				</div>
				<div class="form-group btns">
					<ul>
						<li>
							<input type="hidden" name="dosub" value=1>
							 <button type="submit" name="dosub" class="btn crtbtn btn-lg regi">Register</button>
						</li>
						<li><div class="or" align=center><p class="text-muted text-center"><a href="/login.php">Already have an account?</a></p></div></li>
					</ul>
				</div>
				
				<!-- <div class="form-group">				
				<span style="display:block;">
                   By registering an advertiser account with Yeesshh, you agree with our <a href="https://www.yeesshh.com/yeesshh-user-agreement/">Terms of service</a> and <a href="https://www.yeesshh.com/legal/">Privacy Policy</a>
				</span>
				</div> -->
			                
			                
			                
			                
			                
			</fieldset>

			                            <input type="hidden" name="gclid" id="gclid" value="<?php echo @$_GET['gclid'];  ?>">
                                        <input type="hidden" name="utm_term" id="utm_term" value="<?php echo @$_GET['utm_term'];  ?>">
                                        <input type="hidden" name="utm_source" id="utm_source" value="<?php echo @$_GET['utm_source'];  ?>">
                                        <input type="hidden" name="utm_medium" id="utm_medium" value="<?php echo @$_GET['utm_medium'];  ?>">
                                        <input type="hidden" name="utm_campaign" id="utm_campaign" value="<?php echo @$_GET['utm_campaign'];  ?>">
                                        <input type="hidden" name="hsa_cam" id="hsa_cam" value="<?php echo @$_GET['hsa_cam'];  ?>">
                                        <input type="hidden" name="hsa_grp" id="hsa_grp" value="<?php echo @$_GET['hsa_grp'];  ?>">
                                        <input type="hidden" name="hsa_mt" id="hsa_mt" value="<?php echo @$_GET['hsa_mt'];  ?>">
                                        <input type="hidden" name="hsa_src" id="hsa_src" value="<?php echo @$_GET['hsa_src'];  ?>">
                                        <input type="hidden" name="hsa_ad" id="hsa_ad" value="<?php echo @$_GET['hsa_ad'];  ?>">
                                        <input type="hidden" name="hsa_acc" id="hsa_acc" value="<?php echo @$_GET['hsa_acc'];  ?>">
                                        <input type="hidden" name="hsa_net" id="hsa_net" value="<?php echo @$_GET['hsa_net'];  ?>">
                                        <input type="hidden" name="hsa_kw" id="hsa_kw" value="<?php echo @$_GET['hsa_kw'];  ?>">
                                        <input type="hidden" name="hsa_tgt" id="hsa_tgt" value="<?php echo @$_GET['hsa_tgt'];  ?>">
                                        <input type="hidden" name="hsa_ver" id="hsa_ver" value="<?php echo @$_GET['hsa_ver'];  ?>">
                                        <input type="hidden" name="hubspotutk" id="hubspotutk" value="<?php echo @$_GET['hubspotutk'];  ?>">
			
		</form>


</div>


</div>

</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>
	
<script type="text/javascript">

		const togglePassword = document.querySelector('#togglePassword');
		const togglePassword1 = document.querySelector('#togglePassword1');
		const password = document.querySelector('#password');
		const password1 = document.querySelector('#password2');
		togglePassword.addEventListener('click', function (e) {
		    // toggle the type attribute
		    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		    password.setAttribute('type', type);
		    // toggle the eye slash icon
		    this.classList.toggle('fa-eye-slash');
		});
		togglePassword1.addEventListener('click', function (e) {
		    // toggle the type attribute
		    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
		    password1.setAttribute('type', type);
		    // toggle the eye slash icon
		    this.classList.toggle('fa-eye-slash');
		});

        $(document).ready(function() {

                var allcookies = document.cookie;              
                         // Get all the cookies pairs in an array
                cookiearray = allcookies.split(';');
                         
                // Now take key value pair out of this array
                for(var i=0; i<cookiearray.length; i++) {
                  name = cookiearray[i].split('=')[0];
                    value = cookiearray[i].split('=')[1];
                    if(name.trim() == 'hubspotutk' ){
                    	console.log(value);
                      $('#hubspotutk').val(value);
                    }
                }          	

        	$("#messenger").on('change',function(){
        		if($(this).val() == 'Other'){
        			$("#nickLabel").text("Messenger/nickname")
        			$("#messengerNickname").attr("placeholder", "telegram: nickname");
        		}else{
        			$("#nickLabel").text("Nickname in messenger")
        			$("#messengerNickname").attr("placeholder", "nickname*");
        		}
        	});
        	var email = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	var regex =  /^\S+$/;
		      

        	$('.regi').on('click',function(e){
        		e.preventDefault();
        		$(".regi").prop('disabled',true);
        		$('.error').remove();
        		$('.errorBorder').removeClass('errorBorder');
        		var error = 0;
        		var password = 0;
        		if(!$('#reg_username').val().match(regex)){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#reg_username').after('<p class="error">Space not allowed</p>')
        			$('#reg_username').addClass('errorBorder');
        			return false;

        		}else if($('#reg_username').val()	== '' && ($("#reg_username").val().length < 5 ) || ($("#reg_username").val().length > 32 ) ){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#reg_username').after('<p class="error">Username must be between 5 and 32 characters</p>')
        			$('#reg_username').addClass('errorBorder');
        			return false;
        		}
        		if($('#reg_email').val() == ''){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#reg_email').after('<p class="error">Email can not be left blank.</p>');
        			$('#reg_email').addClass('errorBorder');
        		}else if(!$('#reg_email').val().match(email)){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#reg_email').after('<p class="error">Please enter valid email.</p>');
        			$('#reg_email').addClass('errorBorder');
        			return false;
        		}
        		
        		if($('#country').val() == '' || $('#country').val() == null){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#country').after('<p class="error">Please select country.</p>')
        			$('#country').addClass('errorBorder');
        		}
        		if($('#password').val() == '' ){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			password = 1;
        			$('#password').after('<p class="error">Password can not be left blank.</p>')
        			$('#password').addClass('errorBorder');
        			$('.noticePass').hide();
        			return false;
        		}

        		if($('#password').val() != $('#password2').val() ){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#password2').after('<p class="error">Password and confirm password should be same.</p>')
        			$('#password2').addClass('errorBorder');
        			$('.noticePass').hide();
        			return false;
        		}

        		if($('#messenger').val() == '' ||  $('#messengerNickname').val() == '' ){
        			$(".regi").prop('disabled',false); 
        			error = 1;
        			$('#messengerNickname').after('<p class="error">You have to select messenger type and enter your nick.</p>')
        			$('#messengerNickname').addClass('errorBorder');
        			return false;
        			
        		}

        		if($('#term_condation').prop("checked") == false){
        			$(".regi").prop('disabled',false); 
               
		            	error = 1;
		    			$('#term_condation').after('<p class="error">Please Check the terms and Conditions.</p>')
		    			$('#term_condation').addClass('errorBorder');
		    			return false;
		            
		            }

        		var number = /([0-9])/;
	            var alphabets = /([a-zA-Z])/;
	            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
 
                if ( $('#password').val().length < 8 ||  ( !$('#password').val().match(number) || !$('#password').val().match(alphabets) || !$('#password').val().match(special_characters) )) {
                	$(".regi").prop('disabled',false); 
                    error = 1;
                    if(!password){
                    	$('.noticePass').hide();
    				$('#password').after('<p class="error">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>')
    				$('#password').addClass('errorBorder');
                	}
                	return false;
                }


                if(!error){
                	 $('form#myForm').submit();

                }
				
				
        	});


           $("form").bind("keypress", function(e) {
              if (e.keyCode == 13) {
                 return false;
              }
           });
           $("#modalbody").height($(window).height()*0.7);
        });
        $(window).resize(function(){
           $("#modalbody").height($(window).height()*0.7);
           $("#demo-canvas").height($("#contentcontainer").height());
        });
</script>


    <!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->

    <script src="js/canvasbg.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            // Init CanvasBG and assign a starting location
            CanvasBG.init({
                Loc: {
                    x: $("#contentcontainer").height() / 2,
                    y: $("#contentcontainer").height() / 2
                }
            });

        });
    </script>




