<?php
/**
 * Template Name: Push Redirect
 * 
 *
*/

$manualpaid="";
if(isset($_GET['utm_medium']) && isset($_GET['utm_source']) && isset($_GET['utm_campaign']) && isset($_GET['gclid'])){
      $manualpaid = "manualpaid";
      $manualpaidvalue = $_GET['utm_campaign'];
      $time = time() + (60*60*24*30);
      setcookie($manualpaid, $manualpaidvalue , $time , "/", ".yeesshh.com");
      $manualpaid = $manualpaidvalue;
}

$cookiename = "lp_visited";
/* Set time interval of 24 hours */
$time = time() + (60 * 60 * 24);
setcookie($cookiename, "push", $time , "/", ".yeesshh.com");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Landing</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4458590.js"></script>
  <!-- End of HubSpot Embed Code -->
<!-- Global site tag (gtag.js) - Google Ads: 471447742-->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-471447742"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-471447742');
</script>  
<!-- Event snippet for Sign Up - Submitted conversion page
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

<style type="text/css">    
    .form-group .fa-eye{
        font-size: 16px;
        position: absolute;
        top: 28px;
        right: 18px;
    }
    .form-group input[type="password"]{
      padding-right: 35px;
    }
</style> 
</head>
<body>

    <!-- Start Main Banner -->
    <div class="mainbnr">
        
        <!-- Start Header -->
        <header class="mainhead">
            <div class="container d-flex flex-wrap justify-content-between align-items-center">                
                <div class="topleft">
                    <div class="logo">    
                        <a href="index.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 47.66"><defs><style>.cls-1{fill:#ffc000;}.cls-2{fill:#2ec4d5;}</style></defs><title>logo_yeesshh</title><g id="Capa_2" data-name="Capa 2"><g id="Header"><g id="logo_yeesshh"><path class="cls-1" d="M9.25,38.45l.62-1.51L1.54,16a7.92,7.92,0,0,1-.77-2.63,3.14,3.14,0,0,1,.44-1.61,3.35,3.35,0,0,1,1.23-1.19,3.26,3.26,0,0,1,1.63-.45A2.66,2.66,0,0,1,6.28,11a8.72,8.72,0,0,1,1.31,2.67l5.73,16.67,5.44-15.5a26.29,26.29,0,0,1,1.16-3A3.52,3.52,0,0,1,21,10.44a3.09,3.09,0,0,1,1.64-.37,2.92,2.92,0,0,1,1.48.41,2.88,2.88,0,0,1,1.09,1.1,3,3,0,0,1,.39,1.47c-.07.31-.18.76-.33,1.34s-.33,1.16-.54,1.76L15.93,39.27a27,27,0,0,1-2.24,4.79,7.18,7.18,0,0,1-2.89,2.66A10.48,10.48,0,0,1,6,47.66,11.75,11.75,0,0,1,1.49,47,2.35,2.35,0,0,1,0,44.65a2.32,2.32,0,0,1,.71-1.8,3.05,3.05,0,0,1,2.09-.63,3.84,3.84,0,0,1,1.07.15A5,5,0,0,0,5,42.52a4.05,4.05,0,0,0,1.83-.35A3.21,3.21,0,0,0,8,41,18.81,18.81,0,0,0,9.25,38.45Z"/><path class="cls-2" d="M48.77,25.5H35.52a9.07,9.07,0,0,0,.93,4.07,6.26,6.26,0,0,0,5.72,3.55,8.12,8.12,0,0,0,2.22-.29,7.1,7.1,0,0,0,2-.89,15.75,15.75,0,0,0,1.74-1.3c.53-.47,1.21-1.09,2.06-1.89a2.18,2.18,0,0,1,1.48-.44,2.45,2.45,0,0,1,1.69.57A2,2,0,0,1,54,30.49a4.36,4.36,0,0,1-.72,2.14A8.59,8.59,0,0,1,51.07,35a12.62,12.62,0,0,1-3.65,1.88,15.89,15.89,0,0,1-5.05.74q-6.52,0-10.15-3.72T28.6,23.79a16.73,16.73,0,0,1,.9-5.57,12.18,12.18,0,0,1,2.6-4.4A11.32,11.32,0,0,1,36.32,11a15.18,15.18,0,0,1,5.55-1,13.19,13.19,0,0,1,6.82,1.68A11,11,0,0,1,52.94,16a11.4,11.4,0,0,1,1.41,5.4c0,1.71-.48,2.81-1.46,3.31A9.06,9.06,0,0,1,48.77,25.5ZM35.52,21.66H47.8a8.22,8.22,0,0,0-1.87-5.2,5.6,5.6,0,0,0-4.28-1.72,5.43,5.43,0,0,0-4.15,1.74A8.73,8.73,0,0,0,35.52,21.66Z"/><path class="cls-2" d="M79,25.5H65.71a9.07,9.07,0,0,0,.93,4.07,6.26,6.26,0,0,0,5.72,3.55,8.12,8.12,0,0,0,2.22-.29,7.1,7.1,0,0,0,2-.89,15.75,15.75,0,0,0,1.74-1.3c.53-.47,1.21-1.09,2.06-1.89a2.19,2.19,0,0,1,1.49-.44,2.44,2.44,0,0,1,1.68.57,2,2,0,0,1,.65,1.61,4.36,4.36,0,0,1-.72,2.14A8.59,8.59,0,0,1,81.26,35a12.62,12.62,0,0,1-3.65,1.88,15.89,15.89,0,0,1-5,.74q-6.53,0-10.14-3.72t-3.63-10.1a16.73,16.73,0,0,1,.9-5.57,12.18,12.18,0,0,1,2.6-4.4A11.32,11.32,0,0,1,66.51,11a15.18,15.18,0,0,1,5.55-1,13.19,13.19,0,0,1,6.82,1.68A11,11,0,0,1,83.13,16a11.4,11.4,0,0,1,1.41,5.4c0,1.71-.48,2.81-1.46,3.31A9,9,0,0,1,79,25.5ZM65.71,21.66H78a8.22,8.22,0,0,0-1.88-5.2,5.6,5.6,0,0,0-4.28-1.72,5.43,5.43,0,0,0-4.15,1.74A8.73,8.73,0,0,0,65.71,21.66Z"/><path class="cls-2" d="M112.06,28.75a8.3,8.3,0,0,1-1.37,4.8,8.37,8.37,0,0,1-4,3,18,18,0,0,1-6.49,1,15.72,15.72,0,0,1-6.25-1.12,9,9,0,0,1-3.84-2.79,5.62,5.62,0,0,1-1.24-3.36,2.61,2.61,0,0,1,.79-1.91,2.72,2.72,0,0,1,2-.79,2.34,2.34,0,0,1,1.64.52,5.6,5.6,0,0,1,1.09,1.46,7.28,7.28,0,0,0,2.49,2.7,7.49,7.49,0,0,0,4,.9,5.65,5.65,0,0,0,3.33-.91,2.54,2.54,0,0,0,1.31-2.07,2.81,2.81,0,0,0-1.35-2.6,16.82,16.82,0,0,0-4.46-1.57A36.6,36.6,0,0,1,94,24.25a9.41,9.41,0,0,1-3.51-2.52,5.74,5.74,0,0,1-1.32-3.84A6.8,6.8,0,0,1,90.35,14a8.3,8.3,0,0,1,3.58-2.89,13.74,13.74,0,0,1,5.72-1.08,18.56,18.56,0,0,1,4.73.55,11.9,11.9,0,0,1,3.5,1.46,7.31,7.31,0,0,1,2.13,2,4,4,0,0,1,.73,2.19,2.52,2.52,0,0,1-.78,1.91,3.07,3.07,0,0,1-2.22.74,2.71,2.71,0,0,1-1.78-.59,12.09,12.09,0,0,1-1.67-1.79A6.22,6.22,0,0,0,102.48,15a5.79,5.79,0,0,0-2.83-.59,5.55,5.55,0,0,0-3.05.78,2.28,2.28,0,0,0-1.22,2,2.11,2.11,0,0,0,.9,1.75A7.46,7.46,0,0,0,98.68,20c1,.29,2.4.66,4.17,1.09A22.21,22.21,0,0,1,108,22.92a8.58,8.58,0,0,1,3,2.52A5.63,5.63,0,0,1,112.06,28.75Z"/><path class="cls-2" d="M139.59,28.75a8.29,8.29,0,0,1-1.36,4.8,8.37,8.37,0,0,1-4,3,18,18,0,0,1-6.49,1,15.72,15.72,0,0,1-6.25-1.12,9.05,9.05,0,0,1-3.85-2.79,5.68,5.68,0,0,1-1.24-3.36,2.61,2.61,0,0,1,.8-1.91,2.72,2.72,0,0,1,2-.79,2.34,2.34,0,0,1,1.64.52,5.6,5.6,0,0,1,1.09,1.46,7.28,7.28,0,0,0,2.49,2.7,7.49,7.49,0,0,0,4,.9,5.67,5.67,0,0,0,3.33-.91A2.54,2.54,0,0,0,133,30.24a2.8,2.8,0,0,0-1.36-2.6,16.59,16.59,0,0,0-4.45-1.57,36.6,36.6,0,0,1-5.69-1.82A9.33,9.33,0,0,1,118,21.73a5.74,5.74,0,0,1-1.32-3.84A6.8,6.8,0,0,1,117.89,14a8.3,8.3,0,0,1,3.58-2.89,13.74,13.74,0,0,1,5.72-1.08,18.56,18.56,0,0,1,4.73.55,11.9,11.9,0,0,1,3.5,1.46,7.31,7.31,0,0,1,2.13,2,4.08,4.08,0,0,1,.73,2.19,2.52,2.52,0,0,1-.78,1.91,3.07,3.07,0,0,1-2.22.74,2.71,2.71,0,0,1-1.78-.59,12.09,12.09,0,0,1-1.67-1.79A6.22,6.22,0,0,0,130,15a5.81,5.81,0,0,0-2.83-.59,5.55,5.55,0,0,0-3,.78,2.28,2.28,0,0,0-1.22,2,2.11,2.11,0,0,0,.9,1.75,7.46,7.46,0,0,0,2.4,1.13c1,.29,2.4.66,4.17,1.09a22.21,22.21,0,0,1,5.15,1.83,8.45,8.45,0,0,1,3,2.52A5.56,5.56,0,0,1,139.59,28.75Z"/><path class="cls-2" d="M152,4.12v10a14.51,14.51,0,0,1,2.52-2.35,9,9,0,0,1,2.71-1.31,11.78,11.78,0,0,1,3.2-.43A9.48,9.48,0,0,1,165,11.16a7.82,7.82,0,0,1,3.14,3.18,7.82,7.82,0,0,1,1,2.71,22.31,22.31,0,0,1,.24,3.47v13a4.5,4.5,0,0,1-.93,3.08,3.15,3.15,0,0,1-2.46,1c-2.24,0-3.35-1.37-3.35-4.12V22.05a10.58,10.58,0,0,0-1-5c-.65-1.16-1.87-1.74-3.67-1.74a5.5,5.5,0,0,0-3.27,1,6.2,6.2,0,0,0-2.17,2.81,18.18,18.18,0,0,0-.54,5.38v9a4.53,4.53,0,0,1-.91,3.06,3.12,3.12,0,0,1-2.52,1.06q-3.35,0-3.34-4.12V4.12A4.67,4.67,0,0,1,146.05,1a3.08,3.08,0,0,1,2.47-1A3.16,3.16,0,0,1,151,1,4.55,4.55,0,0,1,152,4.12Z"/><path class="cls-1" d="M182.63,4.12v10a14.51,14.51,0,0,1,2.52-2.35,9.13,9.13,0,0,1,2.72-1.31,11.73,11.73,0,0,1,3.2-.43,9.51,9.51,0,0,1,4.58,1.09,7.88,7.88,0,0,1,3.14,3.18,7.81,7.81,0,0,1,1,2.71,21.07,21.07,0,0,1,.25,3.47v13a4.5,4.5,0,0,1-.93,3.08,3.16,3.16,0,0,1-2.47,1q-3.34,0-3.35-4.12V22.05a10.46,10.46,0,0,0-1-5c-.64-1.16-1.86-1.74-3.67-1.74a5.49,5.49,0,0,0-3.26,1,6.13,6.13,0,0,0-2.17,2.81,18.09,18.09,0,0,0-.55,5.38v9a4.58,4.58,0,0,1-.9,3.06,3.13,3.13,0,0,1-2.52,1.06q-3.35,0-3.35-4.12V4.12A4.61,4.61,0,0,1,176.74,1a3.07,3.07,0,0,1,2.47-1,3.18,3.18,0,0,1,2.52,1A4.6,4.6,0,0,1,182.63,4.12Z"/></g></g></g></svg>
                        </a>       
                    </div>
                </div>
                <div class="topright clrwhite">
                    <ul class="d-flex justify-content-end align-items-center">                        
                        <li><a href="https://www.yeesshh.com/volumes-and-bids-desktop/">CPC Rates</a></li>
                        <li><a href="https://platform.yeesshh.com/advertiser_signup.php" class="btn btnyellow subahrefadvsig">Sign up </a></li>
                    </ul>
                    <div class="hmburg">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>            
        </header>
        <!-- End Header -->

        <!-- Start Banner Content -->
        <div class="bnrcont">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 bnrcontlt">
                        <div class="bnrinfo clrwhite pt60">
                            <h1>High-Performance Push Notifications Traffic for your Ads</h1>
                            <p>Get a Meaningful Digital engagement through High-quality Push Ads Service</p>
                            <img class="pt20" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/icons-browsers.png" alt="Icons">                            
                        </div>
                    </div>
                    <div class="col-md-6 bnrcontrt">
                        <div class="registerform">
                            <form id="rgisterform" method="post">
                                <h3>Create an Advertiser Account</h3>
                                <div class="errorList">
                                </div>
                                <div class="sucesssShow"></div>
                                <div class="fieldslist">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="reg_username" id="reg_username" placeholder="Enter a User Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="reg_email" id="reg_email" placeholder="Type your email">
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select id="country" name="country">
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
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="reg_password" id="password" placeholder="Enter Password">
                                                    <i class="far fa-eye" id="togglePassword"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Repeat Password</label>
                                                    <input type="password" name="reg_password2" id="password2" placeholder="Repeat Password">
                                                    <i class="far fa-eye" id="togglePassword1"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Messenger</label>
                                                    <select  name="im_type" id="messenger">
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
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Nickname</label>
                                                    <input name="im_id" id="messengerNickname"  type="email" placeholder="Nickname*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
											                       <label class="checkboxstyle">I agree to Yeesshh's <strong><a href="https://www.yeesshh.com/yeesshh-user-agreement/" target="_blank">Terms of Use</a></strong> and the receive emails & updates. I acknowledge that i have read Yeesshh's <strong><a href="https://www.yeesshh.com/legal/" target="_blank">Privacy Policy</a></strong>.
                                              <input type="checkbox"  id="term_condation">
                                              <span class="checkmark"></span>
                                            </label>
                                        </div>  
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
                                        <input type="hidden" name="hubspotutk" id="hubspotutk" value="">
                                        <input type="hidden" name="manualpaid" id="manualpaid" value="<?php echo $manualpaid;?>">

                                        <div class="form-group btns">
                                            <ul class="d-flex flex-wrap align-items-center">
                                                <!--<li><input type="submit" value="Register" class="cmnylwbtn"></li>-->
                                                <button type="button" value="Register" class="cmnylwbtn regsubmit">Register</button>
                                                <li><a href="https://mydsp.yeesshh.com/login.php">I´m already a member</a></li>
                                            </ul>
                                        </div>      
                                    </div>                       
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        </div> 

        <!-- End Banner Content -->

    </div>
    <!-- End Main Banner -->

    <!-- Start Ads -->
    <div class="pushads">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="pushadsbox text-center bgwhite posrel">                        
                        <h2>What are Push Ads</h2>  
                        <p>A vanguard format, which allows incredible exposure regardless of the device or platform. Generating visibility through dynamic alert type ads. High performance and undisputed visibility for users even when they are not in the internet.</p>      
                        <img class="downarw" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/godown_ico.png" alt="Icons">
                    </div>
                </div>
            </div>
        </div>            
    </div>
    <!-- End Ads -->


    <!-- Start Advertise -->
    <div class="advertise pt90 pb60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="sectitle text-center">
                        <h2>Why Advertise with Yeesshh?</h2>
                        <p>We offer a wide range of benefits and tools that together with a dedicated service guarantee the success of any ads</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center text-center">
                <div class="col-md-3 advertiseboxcol pb30">
                    <div class="advertisebox d-flex flex-column align-items-center justify-content-center">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/competitive-bids.svg" alt="">
                        <h4>Competitive Bids</h4>                        
                        <p>See your delivery and the live tracking updated every 100 seconds. Monitor how we adapt bids to your performance. And access it from one location, on any screen.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 advertiseboxcol pb30">
                            <div class="advertisebox d-flex flex-column align-items-center justify-content-center">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/content-filtering.svg" alt="">
                                <h4>Content filtering</h4>
                                <p>Each traffic is disclosed to you, and is accepted by a manual validation of your creative. You get only what you want, where you want.</p>
                            </div>
                        </div>
                        <div class="col-md-6 advertiseboxcol pb30">
                            <div class="advertisebox d-flex flex-column align-items-center justify-content-center">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/targeting.svg" alt="">
                                <h4>Targeting</h4>
                                <p>By geo (down to zip code), carrier, OS, device, vertical, keyword, browser, behavioral or contextual, time related with any frequency. Name it</p>
                            </div>
                        </div>
                        <div class="col-md-6 advertiseboxcol pb30">
                            <div class="advertisebox d-flex flex-column align-items-center justify-content-center">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/auto-blocker.svg" alt="">
                                <h4>Auto Blocker</h4>
                                <p>We identify automatically non converting source and block them on the go 24/24. It is empiric and deadly efficient. You keep only converting sources.</p>
                            </div>
                        </div>
                        <div class="col-md-6 advertiseboxcol pb30">
                            <div class="advertisebox d-flex flex-column align-items-center justify-content-center">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/close-relations.svg" alt="">
                                <h4>Close Relations</h4>
                                <p>We have names and faces, forget about generic emails. And we most probably speak your language, and are easy to deal with. Ask our partners.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 advertiseboxcol pb30">
                    <div class="advertisebox d-flex flex-column align-items-center justify-content-center">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/massive-traffic.svg" alt="">
                        <h4>Massive Traffic</h4>
                        <p>We are specialized in managing volumes. Exposure to 700m+ users everyday, worlwide through mobile and desktop display.</p>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <!-- End Advertise -->

    <!-- Start We Are Where -->
    <div class="wearewhere bgltgray pt50 pb30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h2>We are everywhere</h2>
                    <p>Our services cross the market barrier offering you the opportunity to advertise on any Business and Industry</p>
                </div>
                <div class="col-md-7">
                    <div class="whereicons text-center">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/video-games.png" alt="Video Games">
                                    <p>Video Games</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/dating.png" alt="Dating">
                                    <p>Dating</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/ecommerce.png" alt="Ecommerce">
                                    <p>Ecommerce</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/sweeptakes.png" alt="Sweepstakes">
                                    <p>Sweepstakes</p>
                                </div>
                            </div>                        
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/crpto.png" alt="Crypto">
                                    <p>Crypto</p>
                                </div>
                            </div>                        
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/news.png" alt="News">
                                    <p>News</p>
                                </div>
                            </div>                        
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/finance.png" alt="Finance">
                                    <p>Finance</p>
                                </div>
                            </div>                        
                            <div class="col-md-3 col-6">
                                <div class="whereicon pb10">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/tech.png" alt="Tech">
                                    <p>Tech</p>
                                </div>
                            </div>                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End We Are Where -->

    <!-- Start Device Service -->
    <div class="devicesrvc text-center pt60 pb50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <p><strong>We have Worldwide Traffic</strong></p>
                    <h2 class="mb10">Cross Device Service</h2>
                    <p>Now, more than ever, it is essential to have exposure on all digital devices on the market.</p>
                    <div class="row pt20">
                        <div class="col-md-6 devicesrvcboxcol pb20">
                            <div class="devicesrvcbox bgwhite">
                                <img class="pb20" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/mobile.jpg" alt="Mobile">
                                <h3 class="mb0">Traffic Mobiles</h3>                                
                            </div>                        
                        </div>
                        <div class="col-md-6 devicesrvcboxcol pb20">
                            <div class="devicesrvcbox bgwhite">
                                <img class="pb20" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/desktop.jpg" alt="Desktop">
                                <h3 class="mb0">Traffic Desktop</h3>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>            
        </div>
    </div>    
    <!-- Endf Device Service -->    

    <!-- Start High Reach -->
    <div class="highreach clrwhite text-center ptb80">
        <div class="container">
            <div class="clientlogos d-flex flex-wrap align-items-center justify-content-center pb50">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/bet365.png" alt="Bet365">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/freenet.png" alt="Freenet">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/admaven.png" alt="Admaven">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/adcash.png" alt="Adcash">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/gameloft.png" alt="Gameloft">                                  
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">                    
                    <h2>High Performance Ads now on your reach!</h2>
                    <a href="#" class="btn btnyellow">Push Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End High Reach -->

    <!-- Start Mobile Menu -->
    <div class="mblmenu">
        <img class="clsmenu" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/close.png" alt="Close">
        <h3>Menu</h3>
        <ul>
            <li><a href="https://www.yeesshh.com/volumes-and-bids-desktop/">CPC Rates</a></li>
            <li><a href="https://platform.yeesshh.com/advertiser_signup.php" class="subahrefadvsig">Sign Up</a></li>
            <li><a href="https://www.yeesshh.com/contact/">Contact Us</a></li>
            <li><a href="https://www.yeesshh.com/legal/">Legal</a></li>
            <li><a href="https://knowledge.yeesshh.com/">FAQ</a></li>
        </ul>
    </div>
    <!-- End Mobile Menu -->

    <!-- Start Footer -->
    <footer class="mainfoot">
        <div class="container">
            <div class="topfoot pt40">
                <div class="row">
                    <div class="col-md-5 foot1col">
                        <div class="cmnfoot foot1 pb30">
                            <div class="footlogo">
                                <a href="index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 47.66"><defs><style>.cls-1{fill:#ffc000;}.cls-2{fill:#2ec4d5;}</style></defs><title>logo_yeesshh</title><g id="Capa_2" data-name="Capa 2"><g id="Header"><g id="logo_yeesshh"><path class="cls-1" d="M9.25,38.45l.62-1.51L1.54,16a7.92,7.92,0,0,1-.77-2.63,3.14,3.14,0,0,1,.44-1.61,3.35,3.35,0,0,1,1.23-1.19,3.26,3.26,0,0,1,1.63-.45A2.66,2.66,0,0,1,6.28,11a8.72,8.72,0,0,1,1.31,2.67l5.73,16.67,5.44-15.5a26.29,26.29,0,0,1,1.16-3A3.52,3.52,0,0,1,21,10.44a3.09,3.09,0,0,1,1.64-.37,2.92,2.92,0,0,1,1.48.41,2.88,2.88,0,0,1,1.09,1.1,3,3,0,0,1,.39,1.47c-.07.31-.18.76-.33,1.34s-.33,1.16-.54,1.76L15.93,39.27a27,27,0,0,1-2.24,4.79,7.18,7.18,0,0,1-2.89,2.66A10.48,10.48,0,0,1,6,47.66,11.75,11.75,0,0,1,1.49,47,2.35,2.35,0,0,1,0,44.65a2.32,2.32,0,0,1,.71-1.8,3.05,3.05,0,0,1,2.09-.63,3.84,3.84,0,0,1,1.07.15A5,5,0,0,0,5,42.52a4.05,4.05,0,0,0,1.83-.35A3.21,3.21,0,0,0,8,41,18.81,18.81,0,0,0,9.25,38.45Z"/><path class="cls-2" d="M48.77,25.5H35.52a9.07,9.07,0,0,0,.93,4.07,6.26,6.26,0,0,0,5.72,3.55,8.12,8.12,0,0,0,2.22-.29,7.1,7.1,0,0,0,2-.89,15.75,15.75,0,0,0,1.74-1.3c.53-.47,1.21-1.09,2.06-1.89a2.18,2.18,0,0,1,1.48-.44,2.45,2.45,0,0,1,1.69.57A2,2,0,0,1,54,30.49a4.36,4.36,0,0,1-.72,2.14A8.59,8.59,0,0,1,51.07,35a12.62,12.62,0,0,1-3.65,1.88,15.89,15.89,0,0,1-5.05.74q-6.52,0-10.15-3.72T28.6,23.79a16.73,16.73,0,0,1,.9-5.57,12.18,12.18,0,0,1,2.6-4.4A11.32,11.32,0,0,1,36.32,11a15.18,15.18,0,0,1,5.55-1,13.19,13.19,0,0,1,6.82,1.68A11,11,0,0,1,52.94,16a11.4,11.4,0,0,1,1.41,5.4c0,1.71-.48,2.81-1.46,3.31A9.06,9.06,0,0,1,48.77,25.5ZM35.52,21.66H47.8a8.22,8.22,0,0,0-1.87-5.2,5.6,5.6,0,0,0-4.28-1.72,5.43,5.43,0,0,0-4.15,1.74A8.73,8.73,0,0,0,35.52,21.66Z"/><path class="cls-2" d="M79,25.5H65.71a9.07,9.07,0,0,0,.93,4.07,6.26,6.26,0,0,0,5.72,3.55,8.12,8.12,0,0,0,2.22-.29,7.1,7.1,0,0,0,2-.89,15.75,15.75,0,0,0,1.74-1.3c.53-.47,1.21-1.09,2.06-1.89a2.19,2.19,0,0,1,1.49-.44,2.44,2.44,0,0,1,1.68.57,2,2,0,0,1,.65,1.61,4.36,4.36,0,0,1-.72,2.14A8.59,8.59,0,0,1,81.26,35a12.62,12.62,0,0,1-3.65,1.88,15.89,15.89,0,0,1-5,.74q-6.53,0-10.14-3.72t-3.63-10.1a16.73,16.73,0,0,1,.9-5.57,12.18,12.18,0,0,1,2.6-4.4A11.32,11.32,0,0,1,66.51,11a15.18,15.18,0,0,1,5.55-1,13.19,13.19,0,0,1,6.82,1.68A11,11,0,0,1,83.13,16a11.4,11.4,0,0,1,1.41,5.4c0,1.71-.48,2.81-1.46,3.31A9,9,0,0,1,79,25.5ZM65.71,21.66H78a8.22,8.22,0,0,0-1.88-5.2,5.6,5.6,0,0,0-4.28-1.72,5.43,5.43,0,0,0-4.15,1.74A8.73,8.73,0,0,0,65.71,21.66Z"/><path class="cls-2" d="M112.06,28.75a8.3,8.3,0,0,1-1.37,4.8,8.37,8.37,0,0,1-4,3,18,18,0,0,1-6.49,1,15.72,15.72,0,0,1-6.25-1.12,9,9,0,0,1-3.84-2.79,5.62,5.62,0,0,1-1.24-3.36,2.61,2.61,0,0,1,.79-1.91,2.72,2.72,0,0,1,2-.79,2.34,2.34,0,0,1,1.64.52,5.6,5.6,0,0,1,1.09,1.46,7.28,7.28,0,0,0,2.49,2.7,7.49,7.49,0,0,0,4,.9,5.65,5.65,0,0,0,3.33-.91,2.54,2.54,0,0,0,1.31-2.07,2.81,2.81,0,0,0-1.35-2.6,16.82,16.82,0,0,0-4.46-1.57A36.6,36.6,0,0,1,94,24.25a9.41,9.41,0,0,1-3.51-2.52,5.74,5.74,0,0,1-1.32-3.84A6.8,6.8,0,0,1,90.35,14a8.3,8.3,0,0,1,3.58-2.89,13.74,13.74,0,0,1,5.72-1.08,18.56,18.56,0,0,1,4.73.55,11.9,11.9,0,0,1,3.5,1.46,7.31,7.31,0,0,1,2.13,2,4,4,0,0,1,.73,2.19,2.52,2.52,0,0,1-.78,1.91,3.07,3.07,0,0,1-2.22.74,2.71,2.71,0,0,1-1.78-.59,12.09,12.09,0,0,1-1.67-1.79A6.22,6.22,0,0,0,102.48,15a5.79,5.79,0,0,0-2.83-.59,5.55,5.55,0,0,0-3.05.78,2.28,2.28,0,0,0-1.22,2,2.11,2.11,0,0,0,.9,1.75A7.46,7.46,0,0,0,98.68,20c1,.29,2.4.66,4.17,1.09A22.21,22.21,0,0,1,108,22.92a8.58,8.58,0,0,1,3,2.52A5.63,5.63,0,0,1,112.06,28.75Z"/><path class="cls-2" d="M139.59,28.75a8.29,8.29,0,0,1-1.36,4.8,8.37,8.37,0,0,1-4,3,18,18,0,0,1-6.49,1,15.72,15.72,0,0,1-6.25-1.12,9.05,9.05,0,0,1-3.85-2.79,5.68,5.68,0,0,1-1.24-3.36,2.61,2.61,0,0,1,.8-1.91,2.72,2.72,0,0,1,2-.79,2.34,2.34,0,0,1,1.64.52,5.6,5.6,0,0,1,1.09,1.46,7.28,7.28,0,0,0,2.49,2.7,7.49,7.49,0,0,0,4,.9,5.67,5.67,0,0,0,3.33-.91A2.54,2.54,0,0,0,133,30.24a2.8,2.8,0,0,0-1.36-2.6,16.59,16.59,0,0,0-4.45-1.57,36.6,36.6,0,0,1-5.69-1.82A9.33,9.33,0,0,1,118,21.73a5.74,5.74,0,0,1-1.32-3.84A6.8,6.8,0,0,1,117.89,14a8.3,8.3,0,0,1,3.58-2.89,13.74,13.74,0,0,1,5.72-1.08,18.56,18.56,0,0,1,4.73.55,11.9,11.9,0,0,1,3.5,1.46,7.31,7.31,0,0,1,2.13,2,4.08,4.08,0,0,1,.73,2.19,2.52,2.52,0,0,1-.78,1.91,3.07,3.07,0,0,1-2.22.74,2.71,2.71,0,0,1-1.78-.59,12.09,12.09,0,0,1-1.67-1.79A6.22,6.22,0,0,0,130,15a5.81,5.81,0,0,0-2.83-.59,5.55,5.55,0,0,0-3,.78,2.28,2.28,0,0,0-1.22,2,2.11,2.11,0,0,0,.9,1.75,7.46,7.46,0,0,0,2.4,1.13c1,.29,2.4.66,4.17,1.09a22.21,22.21,0,0,1,5.15,1.83,8.45,8.45,0,0,1,3,2.52A5.56,5.56,0,0,1,139.59,28.75Z"/><path class="cls-2" d="M152,4.12v10a14.51,14.51,0,0,1,2.52-2.35,9,9,0,0,1,2.71-1.31,11.78,11.78,0,0,1,3.2-.43A9.48,9.48,0,0,1,165,11.16a7.82,7.82,0,0,1,3.14,3.18,7.82,7.82,0,0,1,1,2.71,22.31,22.31,0,0,1,.24,3.47v13a4.5,4.5,0,0,1-.93,3.08,3.15,3.15,0,0,1-2.46,1c-2.24,0-3.35-1.37-3.35-4.12V22.05a10.58,10.58,0,0,0-1-5c-.65-1.16-1.87-1.74-3.67-1.74a5.5,5.5,0,0,0-3.27,1,6.2,6.2,0,0,0-2.17,2.81,18.18,18.18,0,0,0-.54,5.38v9a4.53,4.53,0,0,1-.91,3.06,3.12,3.12,0,0,1-2.52,1.06q-3.35,0-3.34-4.12V4.12A4.67,4.67,0,0,1,146.05,1a3.08,3.08,0,0,1,2.47-1A3.16,3.16,0,0,1,151,1,4.55,4.55,0,0,1,152,4.12Z"/><path class="cls-1" d="M182.63,4.12v10a14.51,14.51,0,0,1,2.52-2.35,9.13,9.13,0,0,1,2.72-1.31,11.73,11.73,0,0,1,3.2-.43,9.51,9.51,0,0,1,4.58,1.09,7.88,7.88,0,0,1,3.14,3.18,7.81,7.81,0,0,1,1,2.71,21.07,21.07,0,0,1,.25,3.47v13a4.5,4.5,0,0,1-.93,3.08,3.16,3.16,0,0,1-2.47,1q-3.34,0-3.35-4.12V22.05a10.46,10.46,0,0,0-1-5c-.64-1.16-1.86-1.74-3.67-1.74a5.49,5.49,0,0,0-3.26,1,6.13,6.13,0,0,0-2.17,2.81,18.09,18.09,0,0,0-.55,5.38v9a4.58,4.58,0,0,1-.9,3.06,3.13,3.13,0,0,1-2.52,1.06q-3.35,0-3.35-4.12V4.12A4.61,4.61,0,0,1,176.74,1a3.07,3.07,0,0,1,2.47-1,3.18,3.18,0,0,1,2.52,1A4.6,4.6,0,0,1,182.63,4.12Z"/></g></g></g></svg>
                            </a> 
                            <p>Powerful service with high quality standards to drive the maximum your Online advertising.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 foot2col">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cmnfoot foot2 pb30">
                                    <h6>Support</h6>
                                    <ul class="menu">
                                        <li><a href="https://www.yeesshh.com/contact/">Contact us</a></li>
                                        <li><a href="https://www.yeesshh.com/legal/">Legal</a></li>
                                        <li><a href="https://knowledge.yeesshh.com/">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cmnfoot foot3 pb30">
                                    <h6>Proud member of</h6>
                                    <ul class="menu">
                                        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/partners-1.png" alt="Partners"></li>
                                        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/partners-2.png" alt="Partners"></li>
                                        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/images/partners-3.png" alt="Partners"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 foot3col">
                        <div class="cmnfoot foot4 d-flex justify-content-center pb30">
                            <ul>
                                <li><a href="https://www.linkedin.com/company/yeesshh/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.instagram.com/yeesshh_barcelona/?hl=en"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/yeesshh/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/Yeesshh1"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright text-center ptb30">
            <div class="container">
                <p>© Copyright Yeesshh.com 2020</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/push/assets/js/custom.js"></script>



<?php

$page_location = "/push-notifications-traffic-eureekkaa";

if(isset($_GET["gclid"])){
	$page_location = $_SERVER["REQUEST_URI"];
}
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97850161-1"></script>
<script>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  
  // Global configs
  gtag('config', 'UA-97850161-1', {send_page_view: false}); 

  // Global configs
  //gtag('config', 'UA-97850161-3', {send_page_view: false}); 

  gtag('event', 'page_view', {
    page_title: 'Signup Visited PUSH LP',
    page_location: '<?php echo $page_location;?>',
    page_path: '/push-notifications-traffic-eureekkaa',
    send_to: ['UA-97850161-1','UA-97850161-3']
  });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<?php
$page_location = "/signup/submitted";

if(isset($_GET["gclid"])){
	$page_location = $_SERVER["REQUEST_URI"];
}
?>
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
                     $('#hubspotutk').val(value);
                  }
              }

          gclid = $('#gclid').val();
                    utm_term = $('#utm_term').val();
                    utm_source = $('#utm_source').val();
                    utm_medium = $('#utm_medium').val();
                    utm_campaign = $('#utm_campaign').val();
                    hsa_cam = $('#hsa_cam').val();
                    hsa_grp = $('#hsa_grp').val();
                    hsa_mt = $('#hsa_mt').val();
                    hsa_src = $('#hsa_src').val();
                    hsa_ad = $('#hsa_ad').val();
                    hsa_acc = $('#hsa_acc').val();
                    hsa_net = $('#hsa_net').val();
                    hsa_kw = $('#hsa_kw').val();
                    hsa_tgt = $('#hsa_tgt').val();
                    hsa_ver = $('#hsa_ver').val();
                    hubspotutk = $('#hubspotutk').val();              
                    manualpaid = $('#manualpaid').val(); 
              var adv_sign_url = "https://platform.yeesshh.com/advertiser_signup.php?gclid="+gclid+"&utm_term="+utm_term+"&utm_source="+utm_source+"&utm_medium="+utm_medium+"&utm_campaign="+utm_campaign+"&hsa_cam="+hsa_cam+"&hsa_grp="+hsa_grp+"&hsa_mt="+hsa_mt+"&hsa_src="+hsa_src+"&hsa_ad="+hsa_ad+"&hsa_acc="+hsa_acc+"&hsa_net="+hsa_net+"&hsa_kw="+hsa_kw+"&hsa_tgt="+hsa_tgt+"&hsa_ver="+hsa_ver+"&manualpaid="+manualpaid+"&hubspotutk="+hubspotutk+"";

var tracking_url = "https://<?php echo $_SERVER['HTTP_HOST']; ?>/signup/submitted/?gclid="+gclid+"&utm_term="+utm_term+"&utm_source="+utm_source+"&utm_medium="+utm_medium+"&utm_campaign="+utm_campaign+"&hsa_cam="+hsa_cam+"&hsa_grp="+hsa_grp+"&hsa_mt="+hsa_mt+"&hsa_src="+hsa_src+"&hsa_ad="+hsa_ad+"&hsa_acc="+hsa_acc+"&hsa_net="+hsa_net+"&hsa_kw="+hsa_kw+"&hsa_tgt="+hsa_tgt+"&hsa_ver="+hsa_ver+"&hubspotutk="+hubspotutk+"";

        $('a.subahrefadvsig').attr('href', adv_sign_url); 

      setTimeout(function() {
       
                var allcookies = document.cookie;              
                         // Get all the cookies pairs in an array
                cookiearray = allcookies.split(';');
                         
                // Now take key value pair out of this array
                for(var i=0; i<cookiearray.length; i++) {
                  name = cookiearray[i].split('=')[0];
                    value = cookiearray[i].split('=')[1];
                    if(name.trim() == 'hubspotutk' ){
                      $('#hubspotutk').val(value);
                    }
                }
      }, 10000);    

            var email = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var regex =  /^\S+$/;

            $('.sucesssShow').hide();
               

            $('.regsubmit').on('click',function(e){

              e.preventDefault();
              $(".regsubmit").prop('disabled',true);
                $('.error').remove();
                $('.errorBorder').removeClass('errorBorder');
                var error = 0;
                var password = 0;
                if(!$('#reg_username').val().match(regex)){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#reg_username').after('<p class="error">Space not allowed</p>')
                    $('#reg_username').addClass('errorBorder');
                    return false;

                }else if($('#reg_username').val()   == '' && ($("#reg_username").val().length < 5 ) || ($("#reg_username").val().length > 32 ) ){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#reg_username').after('<p class="error">Username must be between 5 and 32 characters</p>')
                    $('#reg_username').addClass('errorBorder');
                    return false;
                }
                if($('#reg_email').val() == ''){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#reg_email').after('<p class="error">Email can not be left blank.</p>');
                    $('#reg_email').addClass('errorBorder');
                    return false;
                }else if(!$('#reg_email').val().match(email)){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#reg_email').after('<p class="error">Please enter valid email.</p>');
                    $('#reg_email').addClass('errorBorder');
                    return false;
                }
                
                if($('#country').val() == '' || $('#country').val() == null){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#country').after('<p class="error">Please select country.</p>')
                    $('#country').addClass('errorBorder');
                    return false;
                }
                if($('#password').val() == '' ){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    password = 1;
                    $('#password').after('<p class="error">Password can not be left blank.</p>')
                    $('#password').addClass('errorBorder');
                    $('.noticePass').hide();
                    return false;
                }

                if($('#password').val() != $('#password2').val() ){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#password2').after('<p class="error">Password and confirm password should be same.</p>')
                    $('#password2').addClass('errorBorder');
                    $('.noticePass').hide();
                    return false;
                }

                if($('#messenger').val() == '' ||  $('#messengerNickname').val() == '' ){
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    $('#messengerNickname').after('<p class="error">You have to select messenger type and enter your nick.</p>')
                    $('#messengerNickname').addClass('errorBorder');
                    return false;
                    
                }

                var number = /([0-9])/;
                var alphabets = /([a-zA-Z])/;
                var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
 
                if ( $('#password').val().length < 8 ||  ( !$('#password').val().match(number) || !$('#password').val().match(alphabets) || !$('#password').val().match(special_characters) )) {
                  $(".regsubmit").prop('disabled',false);
                    error = 1;
                    if(!password){
                        $('.noticePass').hide();
                    $('#password').after('<p class="error">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>')
                    $('#password').addClass('errorBorder');
                    }
                    return false;
                }
            if($('#term_condation').prop("checked") == false){
               $(".regsubmit").prop('disabled',false);
                error = 1;
                $('#term_condation').after('<p class="error">Please check the terms and conditions.</p>')
                $('#term_condation').addClass('errorBorder');
                return false;
            
            }
            


             if(!error){
                    
                    form = $("#rgisterform");
                    var myObject = new Object();
                    myObject.reg_username = $('#reg_username').val();
                    myObject.reg_email = $('#reg_email').val();
                    myObject.reg_password = $('#password').val();
                    myObject.country =  $('#country').val();
                    myObject.im_type = $('#messenger').val();
                    myObject.im_id = $('#messengerNickname').val();
                    myObject.gclid = $('#gclid').val();
                    myObject.utm_term = $('#utm_term').val();
                    myObject.utm_source = $('#utm_source').val();
                    myObject.utm_medium = $('#utm_medium').val();
                    myObject.utm_campaign = $('#utm_campaign').val();
                    myObject.hsa_cam = $('#hsa_cam').val();
                    myObject.hsa_grp = $('#hsa_grp').val();
                    myObject.hsa_mt = $('#hsa_mt').val();
                    myObject.hsa_src = $('#hsa_src').val();
                    myObject.hsa_ad = $('#hsa_ad').val();
                    myObject.hsa_acc = $('#hsa_acc').val();
                    myObject.hsa_net = $('#hsa_net').val();
                    myObject.hsa_kw = $('#hsa_kw').val();
                    myObject.hsa_tgt = $('#hsa_tgt').val();
                    myObject.hsa_ver = $('#hsa_ver').val();
                    myObject.hubspotutk = $('#hubspotutk').val();
                    myObject.manualpaid = $('#manualpaid').val();
                    var myString = JSON.stringify(myObject);

                     $.ajax({
                       type: "POST",
                       url: 'https://api.mydsp.yeesshh.com/user/create',
                       data:myString,
                       crossDomain: true,
                       async: true,
                       cache: false,
                        success: function(data)
                       {
                           if(data.status == 100){
                                $('.errorList').empty();
                                $.each(data.message, function (key, val) {
                                    $('.errorList').append(val);
                                });
                                $(".regsubmit").prop('disabled',false);
                           }else if(data.status == 200){

                              $(".regsubmit").prop('disabled',false);

                                gtag('event', 'page_view', {
                                  page_title: 'Signup Submitted',
                                  page_location: '<?php echo $page_location;?>',
                                  page_path: '/signup/submitted',
                                  send_to: ['UA-97850161-1','UA-97850161-3']
                                }); 


                                $('.fieldslist').hide();
                                $('.sucesssShow').empty();
                                $('.sucesssShow').show();
                                $('.errorList').empty();
                                $('.sucesssShow').append(data.message);

                                gtag_report_conversion();

                            
                           }else{
                            $(".regsubmit").prop('disabled',false);
                                $('.errorList').empty();
                                $('.errorList').append('<div class="alert alert-warning"><h4><i class="fa fa-warning"></i> Error!</h4> Something went wrong,Please try again.</div>');
                           }
                       }
                     });
                }
                
            });

        }); 


</script>


</body>
</html>