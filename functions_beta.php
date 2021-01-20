<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
function AuthenticateRequest($user_id,$token)
    {
        global $connection;
        $sql = "SELECT * FROM `advertiser_tokens`  WHERE `advertiser_id`= '$user_id' AND `token`= '$token' limit 1;";
        $result   = $connection->query($sql);
        $records = $result->fetch_assoc();

        // print_r($sql);exit;
    if($records)
    return true;
    else return false;
    }

    function AuthenticateRequestAdmin($token)
    {
        global $connection;
        $sql = "SELECT * FROM `advertiser_tokens`  WHERE `token_name`= 'admin' AND `token`= '$token' limit 1;";
          // print_r($sql);exit;
        $result   = $connection->query($sql);
        $records = $result->fetch_assoc();

         // print_r($sql);exit;
    if($records)
    return true;
    else return false;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    function GetUserData($email)
    {
        global $connection;
        $sql = "SELECT `users`.*,users_profile.* FROM `users`,users_profile where users.username=users_profile.username and users.email='$email' limit 1 ";
        $result   = $connection->query($sql);
        $records = $result->fetch_assoc();
        if(count($records)>5){
           $records["password"]="";
        return $records;
        }
        else
        return false;
    }

    // CREATE HUBSPOT DEAL



  // CURL FUNCTIONS STARTS HERE
  
  if(function_exists( "httpGet" ) === false){
	  //echo "does not exist";
	  function httpGet($url){        
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
        $output=curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        curl_close($ch);

        $result = json_decode($output);
        // print_r($output);exit;
        //unset($output);
        if($result){
            return $result;
        }else{
            return $output;
        }
    }
  }
  
    /*function httpGetx($url)
    {

        
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
        $output=curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        curl_close($ch);

        $result = json_decode($output);
        // print_r($output);exit;
        //unset($output);
        if($result){
            return $result;
        }else{
            return $output;
        }
    }*/

	if(function_exists( "httpPost" ) === false){
		function httpPost($url,$data){

			$post_json = json_encode($data);

			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_POST, true);
			@curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
			@curl_setopt($ch, CURLOPT_URL, $url);
			@curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   
			$output = @curl_exec($ch);
			$status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$curl_errors = curl_error($ch);

			// echo "output  "; print_r($output);
			// echo "status_code  "; print_r($status_code);
			// echo "curl_errors  "; print_r($curl_errors);

			// exit;
		   
			@curl_close($ch);

			if($status_code == 200 || $status_code == 204){
				return json_decode($output);
			}else{

				$myfile = fopen("tmp/debug.log", "a");
				fwrite($myfile, "---------------------------inside hubspot( ----------------------------------\n\r");
				fwrite($myfile, print_r($output,true));
				fwrite($myfile, print_r($status_code,true));
				fwrite($myfile, print_r($curl_errors,true));
				fwrite($myfile, "\n\r");
				fwrite($myfile, "#######################################################RECORD ENDS HERE #######################################################\n\r");
				fclose($myfile);
				// echo "output  "; print_r($output);
				// echo "status_code  "; print_r($status_code);
				// echo "curl_errors  "; print_r($curl_errors);
                return json_decode($output);
			}

		}
	}


     function createHubspotAccountutf($id, $hubspotutk){
        $user = GetUserDataByIdHub($id);
        
        if(isset($_REQUEST['hubspotutk']) && $_REQUEST['hubspotutk'] != ""){
            $hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
        }elseif(isset($_COOKIE['hubspotutk']) && $_COOKIE['hubspotutk'] != ""){
            $hubspotutk = htmlspecialchars(@$_COOKIE['hubspotutk'],ENT_QUOTES);
        }

        
        $comments =  new stdClass;
        $comments->name = 'email';
        $comments->value =  $user["email"];

        $data = array(
                'fields' => array(
                    $comments,
                       ),
                     "context" =>
                          array(
                            'hutk' => $hubspotutk
                        ),
            );

        $url = "https://api.hsforms.com/submissions/v3/integration/submit/4458590/34c23c08-7913-45e4-b93a-741cb591100e";
        httpPost($url,$data);
        return true;
    } 


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    function GetUserDataById($id)
    {
        global $connection;
        $sql = "SELECT `users`.*,`users`.username as UNAME , users_profile.f_name ,users_profile.l_name FROM `users`,users_profile where users_profile.username=users.username and users.id='$id' limit 1 ";
        $result   = $connection->query($sql);
        $records = $result->fetch_assoc();
   if(count($records)>5){
     $records["password"]="";
    return $records;
    }
    else
    return false;
    }

    
    


    function jt_add_column_headers( $post ) {
    $cols = array();
    foreach ( array_keys( (array) $post ) as $column ) {
        if ( ! in_array( $column, array(
            '_links',
            'guid',
            'content',
        ) ) )   {
            $cols[] = $column;
        }
    }


    if ( isset( $post['_links'] ) ) {
        foreach ( $post['_links'] as $column => $col_value ) {

            if ( in_array( $column, array(
                'self',
                'collection',
                'author',
                'replies',
                'version-history',
                'http://v2.wp-api.org/attachment',
            ) ) )   {
                continue;
            }

            foreach ( $col_value as $val ) {
                if ( isset( $val['href'] ) ) {
                    $cols[] = isset( $val['taxonomy'] ) ? $val['taxonomy'] : $val['href'];
                }
            }
        }
    }

    error_log( '$cols: '. print_r( $cols, true ) );

    return $cols;
}

function jt_assign_value( $value ) {
    if ( isset( $value['rendered'] ) ) {
        $value = $value['rendered'];
    } elseif ( is_scalar( $value ) ) {
        $value = $value;
    } else {
        $value = 'needs-parsing';
    }

    return $value;
}

    function GetUserDataByIdHub($id)
    {
        global $connection;
        //GetUserDataByIdHub
        //$dbclass = new DBClass();
        //$connection = $dbclass->getConnection();       
        $sql = "SELECT `users`.*,`users`.username as UNAME , `users_profile`.`country`, `users_profile`.`f_name`, `users_profile`.`l_name`, `users_profile`.`im_type`, `users_profile`.`im_id` FROM `users`, `users_profile` where `users_profile`.`username`=`users`.`username` and `users`.`id`='$id' limit 1 ";

        //$records = mysql_fetch_assoc(mysql_query($sql));     
        $result   = $connection->query($sql);
        $records = $result->fetch_object();

        if($records){
            // $records["password"]="";
            return (array) $records;
        }else{
            return false;
        }
    }


    function getEmailContent($email_slug){
         global $connection;
        $sql = "SELECT * FROM `transactional_email_content` WHERE `e_slug`='$email_slug' LIMIT 1";
        $result   = $connection->query($sql);
        $records = $result->fetch_assoc();
        if ($records ) {
            
            return $records;
        }else{
            return false;
        }
    }

    function addDataToEailQueue($emailQueueData){

        global $connection;
        $eq_username = $emailQueueData['eq_username'];
        $eq_slug = $emailQueueData['eq_slug'];
        $eq_subject = $emailQueueData['eq_subject'];
        $eq_content = $connection->real_escape_string($emailQueueData['eq_content']);
        $eq_to_email = $emailQueueData['eq_to_email'];
        $eq_from_email = $emailQueueData['eq_from_email'];
        $eq_from_name = $emailQueueData['eq_from_name'];
        $eq_bcc_email = $emailQueueData['eq_bcc_email'];
        $eq_cc_email = $emailQueueData['eq_cc_email'];
        $eq_reply_to_email = $emailQueueData['eq_reply_to_email'];
        $eq_platform = $emailQueueData['eq_platform'] ? : 'myDSP';

        $sql = "INSERT INTO `email_queue` (`eq_username`,`eq_platform`, `eq_slug`, `eq_subject`, `eq_content`, `eq_to_email`, `eq_from_email`, `eq_from_name`, `eq_bcc_email`, `eq_cc_email` , `eq_reply_to_email`, `eq_status`) VALUES ('$eq_username','$eq_platform','$eq_slug','$eq_subject','$eq_content','$eq_to_email','$eq_from_email','$eq_from_name','$eq_bcc_email','$eq_cc_email','$eq_reply_to_email', 0)";
        $result   = $connection->query($sql);
        $lastID= $connection->insert_id;
        if ($lastID ) {
            return $lastID;
        }else{
            return "INSERT INTO `email_queue` (`eq_username`, `eq_slug`, `eq_subject`, `eq_content`, `eq_to_email`, `eq_from_email`, `eq_from_name`, `eq_bcc_email`, `eq_reply_to_email`, `eq_status`) VALUES ('$eq_username','$eq_slug','$eq_subject','$eq_content','$eq_to_email','$eq_from_email','$eq_from_name','$eq_bcc_email','$eq_reply_to_email', 0)";
        }
    }


  function checkCreateUpdateHubspotAccountSignup($id,$manualpaid,$hubspotutk){


  		$myfile = fopen("../../logs/hubspot_strange_bug.log", "a");
		fwrite($myfile, "---------------------------inside checkCreateUpdateHubspotAccountSignup( ----------------------------------\n\r");
		fwrite($myfile, print_r($id,true));
		fwrite($myfile, print_r($manualpaid,true));
		fwrite($myfile, print_r($hubspotutk,true));
		fclose($myfile);

        
        $user = GetUserDataByIdHub($id);
     /*   if(isset($_REQUEST['hubspotutk']) && $_REQUEST['hubspotutk'] != ""){
            $hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
        }elseif(isset($_COOKIE['hubspotutk']) && $_COOKIE['hubspotutk'] != ""){
            $hubspotutk = htmlspecialchars(@$_COOKIE['hubspotutk'],ENT_QUOTES);
        }*/

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output =  httpGet($url);

        if(@$output->total){ 
            $finalOutput = updateHubspotAccountSignup($output,$user,$manualpaid,$hubspotutk);   
            return true; exit;
        }else{ 
            $finalOutput = createHubspotAccountSignup($user,$manualpaid,$hubspotutk);
            return true; exit;
        }
    }


    // CREATE HUBSPOT ACCOUNT
    function createHubspotAccountSignup($user,$manualpaid,$hubspotutk){
                
        $userCountry = getCountry($user["country"]);
        if((isset($manualpaid)) || (isset($hubspotutk))){
            $manual_original_source_val = "Paid Search";
            $manual_original_source_drilldown_val = $manualpaid;
        }else{
             $manual_original_source_val = "Offline sources";
             $manual_original_source_drilldown_val = "API";
        }
        $data = array(
                'properties' => array(
                    array(
                        'property' => 'email',
                        'value' => $user["email"]
                    ),
                    array(
                        'property' => 'firstname',
                        'value' => @$user["f_name"]
                    ),
                    array(
                        'property' => 'lastname',
                        'value' => @$user["l_name"]
                    ),
                    array(
                            'property' => 'skype',
                            'value' => @$user["im_type"].":".@$user["im_id"]
                    ),
                    array(
                            'property' => 'client_platfrom_id',
                            'value' => 'myDSP'.$user["id"]
                    ), 
                    array(
                            'property' => 'country',
                            'value' => @$userCountry
                    ),                                          
                    array(
                        'property' => 'contact_type',
                        'value' => 'Advertiser'
                    ),
                    array(
                        'property' => 'credit_rate',
                        'value' => 'Approved'
                    ),
                    array(
                        'property' => 'lifecyclestage',
                        'value' => 'salesqualifiedlead'
                    ),
                    array(
                            'property' => 'product_bought',
                            'value' => ''
                        ),
                    array(
                            'property' => 'manual_original_source',
                            'value' => @$manual_original_source_val
                        ),
                     array(
                            'property' => 'manual_original_source_drilldown',
                            'value' => @$manual_original_source_drilldown_val
                        )
                )
            );

        $url = "https://api.hubapi.com/contacts/v1/contact?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $finalwords = httpPost($url,$data);
        return true;       
    } 


        // CREATE HUBSPOT ACCOUNT
    function updateHubspotAccountSignup($output,$user,$manualpaid,$hubspotutk){

        $userCountry = getCountry($user["country"]);

        if((isset($manualpaid)) || (isset($hubspotutk))){
            $manual_original_source_val = "Paid Search";
            $manual_original_source_drilldown_val = $manualpaid;
        }else{
             $manual_original_source_val = "Offline sources";
             $manual_original_source_drilldown_val = "API";
        }
        $data = array(
                'properties' => array(
                    array(
                        'property' => 'email',
                        'value' => $user["email"]
                    ),
                    array(
                        'property' => 'firstname',
                        'value' => @$user["f_name"]
                    ),
                    array(
                        'property' => 'lastname',
                        'value' => @$user["l_name"]
                    ),
                    array(
                            'property' => 'skype',
                            'value' => @$user["im_type"].":".@$user["im_id"]
                    ),
                    array(
                            'property' => 'client_platfrom_id',
                            'value' => 'myDSP'.$user["id"]
                    ), 
                    array(
                            'property' => 'country',
                            'value' => @$userCountry
                    ),                                          
                    array(
                        'property' => 'contact_type',
                        'value' => 'Advertiser'
                    ),
                    array(
                        'property' => 'credit_rate',
                        'value' => 'Approved'
                    ),
                    array(
                        'property' => 'lifecyclestage',
                        'value' => 'salesqualifiedlead'
                    ),
                    array(
                            'property' => 'product_bought',
                            'value' => ''
                        ),
                    array(
                            'property' => 'manual_original_source',
                            'value' => @$manual_original_source_val
                        ),
                     array(
                            'property' => 'manual_original_source_drilldown',
                            'value' => @$manual_original_source_drilldown_val
                        )
                )
            );

         $vid = $output->contacts[0]->vid;
       
 
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        

         httpPost($url,$data);
        return true;
    }






        function getCountry($country){

                    if($country == "af"){ return "Afghanistan"; }
                                            
                    if($country == "ax"){ return "Aland Islands"; }
                                            
                    if($country == "al"){ return "Albania"; }
                                            
                    if($country == "dz"){ return "Algeria"; }
                                            
                    if($country == "as"){ return "American Samoa"; }
                                            
                    if($country == "ad"){ return "Andorra"; }
                                            
                    if($country == "ao"){ return "Angola"; }
                                            
                    if($country == "ai"){ return "Anguilla"; }
                                            
                    if($country == "ag"){ return "Antigua and Barbuda"; }
                                            
                    if($country == "ar"){ return "Argentina"; }
                                            
                    if($country == "am"){ return "Armenia"; }
                                            
                    if($country == "aw"){ return "Aruba"; }
                                            
                    if($country == "au"){ return "Australia"; }
                                            
                    if($country == "at"){ return "Austria"; }
                                            
                    if($country == "az"){ return "Azerbaijan"; }
                                            
                    if($country == "bs"){ return "Bahamas"; }
                                            
                    if($country == "bh"){ return "Bahrain"; }
                                            
                    if($country == "bd"){ return "Bangladesh"; }
                                            
                    if($country == "bb"){ return "Barbados"; }
                                            
                    if($country == "by"){ return "Belarus"; }
                                            
                    if($country == "be"){ return "Belgium"; }
                                            
                    if($country == "bz"){ return "Belize"; }
                                            
                    if($country == "bj"){ return "Benin"; }
                                            
                    if($country == "bm"){ return "Bermuda"; }
                                            
                    if($country == "bt"){ return "Bhutan"; }
                                            
                    if($country == "bo"){ return "Bolivia"; }
                                            
                    if($country == "ba"){ return "Bosnia and Herzegovina"; }
                                            
                    if($country == "bw"){ return "Botswana"; }
                                            
                    if($country == "bv"){ return "Bouvet Island"; }
                                            
                    if($country == "br"){ return "Brazil"; }
                                            
                    if($country == "io"){ return "British Indian Ocean Territory"; }
                                            
                    if($country == "bn"){ return "Brunei Darussalam"; }
                                            
                    if($country == "bg"){ return "Bulgaria"; }
                                            
                    if($country == "bf"){ return "Burkina Faso"; }
                                            
                    if($country == "bi"){ return "Burundi"; }
                                            
                    if($country == "kh"){ return "Cambodia"; }
                                            
                    if($country == "cm"){ return "Cameroon"; }
                                            
                    if($country == "ca"){ return "Canada"; }
                                            
                    if($country == "cv"){ return "Cape Verde"; }
                                            
                    if($country == "kyf"){ return "Cayman Islands"; }
                                            
                    if($country == "cf"){ return "Central African Republic"; }
                                            
                    if($country == "td"){ return "Chad"; }
                                            
                    if($country == "cl"){ return "Chile"; }
                                            
                    if($country == "cn"){ return "China"; }
                                            
                    if($country == "cx"){ return "Christmas Island"; }
                                          
                    if($country == "cc"){ return "Cocos (Keeling) Islands"; }
                                            
                    if($country == "co"){ return "Colombia"; }
                                            
                    if($country == "km"){ return "Comoros"; }
                                            
                    if($country == "ck"){ return "Cook Islands"; }
                                            
                    if($country == "cr"){ return "Costa Rica"; }
                                            
                    if($country == "ci"){ return "Cote D Ivoire"; }
                                            
                    if($country == "hr"){ return "Croatia"; }
                                            
                    if($country == "cw"){ return "Curacao"; }
                                            
                    if($country == "cy"){ return "Cyprus"; }
                                            
                    if($country == "cz"){ return "Czech Republic"; }
                                            
                    if($country == "dk"){ return "Denmark"; }
                                            
                    if($country == "dj"){ return "Djibouti"; }
                                            
                    if($country == "dm"){ return "Dominica"; }
                                            
                    if($country == "do"){ return "Dominican Republic"; }

                    if($country == "tp"){ return "East Timor"; }
                                            
                    if($country == "ec"){ return "Ecuador"; }
                                            
                    if($country == "eg"){ return "Egypt"; }
                                            
                    if($country == "sv"){ return "El Salvador"; }
                                            
                    if($country == "gq"){ return "Equatorial Guinea"; }
                                       
                    if($country == "er"){ return "Eritrea"; }
                                            
                    if($country == "ee"){ return "Estonia"; }
                                            
                    if($country == "et"){ return "Ethiopia"; }
                                            
                    if($country == "fk"){ return "Falkland Islands (Malvinas)"; }
                                            
                    if($country == "fo"){ return "Faroe Islands"; }
                                            
                    if($country == "fj"){ return "Fiji"; }
                                            
                    if($country == "fi"){ return "Finland"; }
                                            
                    if($country == "fr"){ return "France"; }
                                            
                    if($country == "fx"){ return "France, Metropolitan"; }
                                            
                    if($country == "gf"){ return "French Guiana"; }
                                            
                    if($country == "pf"){ return "French Polynesia"; }
                                        
                    if($country == "tf"){ return "French Southern Territories"; }
                                            
                    if($country == "ga"){ return "Gabon"; }
                                            
                    if($country == "af"){ return "Gambia"; }
                                            
                    if($country == "ge"){ return "Georgia"; }
                                            
                    if($country == "de"){ return "Germany"; }
                                            
                    if($country == "gh"){ return "Ghana"; }
                                            
                    if($country == "gi"){ return "Gibraltar"; }
                                            
                    if($country == "gr"){ return "Greece"; }
                                            
                    if($country == "gl"){ return "Greenland"; }
                                            
                    if($country == "gd"){ return "Grenada"; }
                                            
                    if($country == "gp"){ return "Guadeloupe"; }
                                            
                    if($country == "gu"){ return "Guam"; }
                                            
                    if($country == "gt"){ return "Guatemala"; }
                                            
                    if($country == "gg"){ return "Guernsey"; }
                                            
                    if($country == "gn"){ return "Guinea"; }
                                            
                    if($country == "gw"){ return "Guinea-Bissau"; }
                                            
                    if($country == "gy"){ return "Guyana"; }
                                            
                    if($country == "ht"){ return "Haiti"; }
                                            
                    if($country == "hm"){ return "Heard Island and McDonald Islands"; }
                                            
                    if($country == "va"){ return "Holy See (Vatican City State)"; }
                                            
                    if($country == "hn"){ return "Honduras"; }
                                            
                    if($country == "hk"){ return "Hong Kong"; }
                                            
                    if($country == "hu"){ return "Hungary"; }
                                            
                    if($country == "is"){ return "Iceland"; }
                                            
                    if($country == "in"){ return "India"; }
                                            
                    if($country == "id"){ return "Indonesia"; }
                                            
                    if($country == "iq"){ return "Iraq"; }
                                            
                    if($country == "ie"){ return "Ireland"; }
                                            
                    if($country == "im"){ return "Isle of Man"; }
                                            
                    if($country == "il"){ return "Israel"; }
                                            
                    if($country == "it"){ return "Italy"; }
                                            
                    if($country == "jm"){ return "Jamaica"; }
                                            
                    if($country == "jp"){ return "Japan"; }
                                            
                    if($country == "je"){ return "Jersey"; }
                                            
                    if($country == "jo"){ return "Jordan"; }
                                            
                    if($country == "kz"){ return "Kazakstan"; }
                                            
                    if($country == "ke"){ return "Kenya"; }
                                            
                    if($country == "ki"){ return "Kiribati"; }
                                            
                    if($country == "kr"){ return "Korea, Republic of"; }
                                            
                    if($country == "xk"){ return "Kosovo"; }
                                            
                    if($country == "kw"){ return "Kuwait"; }
                                            
                    if($country == "kg"){ return "Kyrgyzstan"; }
                                            
                    if($country == "la"){ return "Lao Peoples Democratic Republic"; }
                                            
                    if($country == "lo"){ return "Laos"; }
                                            
                    if($country == "lv"){ return "Latvia"; }
                                            
                    if($country == "lb"){ return "Lebanon"; }
                                            
                    if($country == "ls"){ return "Lesotho"; }
                                            
                    if($country == "ly"){ return "Libya"; }
                                            
                    if($country == "li"){ return "Liechtenstein"; }
                                            
                    if($country == "lt"){ return "Lithuania"; }
                                            
                    if($country == "lu"){ return "Luxembourg"; }
                                            
                    if($country == "mo"){ return "Macau"; }
                                            
                    if($country == "mk"){ return "Macedonia"; }
                                            
                    if($country == "mg"){ return "Madagascar"; }
                                            
                    if($country == "mw"){ return "Malawi"; }
                                            
                    if($country == "my"){ return "Malaysia"; }
                                            
                    if($country == "mv"){ return "Maldives"; }
                                            
                    if($country == "ml"){ return "Mali"; }
                                            
                    if($country == "mt"){ return "Malta"; }
                                            
                    if($country == "mh"){ return "Marshall Islands"; }
                                            
                    if($country == "mq"){ return "Martinique"; }
                                            
                    if($country == "mr"){ return "Mauritania"; }
                                            
                    if($country == "mu"){ return "Mauritius"; }
                                            
                    if($country == "yt"){ return "Mayotte"; }
                                            
                    if($country == "mx"){ return "Mexico"; }
                                            
                    if($country == "fm"){ return "Micronesia, Federated States of"; }
                                            
                    if($country == "md"){ return "Moldova, Republic of"; }
                                            
                    if($country == "mc"){ return "Monaco"; }
                                            
                    if($country == "mn"){ return "Mongolia"; }
                                            
                    if($country == "me"){ return "Montenegro"; }
                                            
                    if($country == "ms"){ return "Montserrat"; }
                                            
                    if($country == "ma"){ return "Morocco"; }
                                            
                    if($country == "mz"){ return "Mozambique"; }
                                            
                    if($country == "mm"){ return "Myanmar (Burma)"; }
                                            
                    if($country == "na"){ return "Namibia"; }
                                            
                    if($country == "nr"){ return "Nauru"; }
                                            
                    if($country == "np"){ return "Nepal"; }
                                            
                    if($country == "nl"){ return "Netherlands"; }
                                            
                    if($country == "an"){ return "Netherlands Antilles"; }
                                            
                    if($country == "nc"){ return "New Caledonia"; }
                                            
                    if($country == "nz"){ return "New Zealand"; }
                                            
                    if($country == "ni"){ return "Nicaragua"; }
                                            
                    if($country == "ne"){ return "Niger"; }
                                            
                    if($country == "ng"){ return "Nigeria"; }
                                            
                    if($country == "nu"){ return "Niue"; }
                                            
                    if($country == "nf"){ return "Norfolk Island"; }
                                            
                    if($country == "mp"){ return "Northern Mariana Islands"; }
                                            
                    if($country == "no"){ return "Norway"; }
                                            
                    if($country == "om"){ return "Oman"; }
                                            
                    if($country == "ap"){ return "Other Asia/Pacific"; }
                                            
                    if($country == "eu"){ return "Other Europe"; }
                                            
                    if($country == "pk"){ return "Pakistan"; }
                                            
                    if($country == "pw"){ return "Palau"; }
                                            
                    if($country == "ps"){ return "Palestinian Territory"; }
                                            
                    if($country == "pa"){ return "Panama"; }
                                            
                    if($country == "pg"){ return "Papua New Guinea"; }
                                            
                    if($country == "py"){ return "Paraguay"; }
                                            
                    if($country == "pe"){ return "Peru"; }
                                            
                    if($country == "ph"){ return "Philippines"; }
                                            
                    if($country == "pn"){ return "Pitcairn Islands"; }
                                            
                    if($country == "pl"){ return "Poland"; }
                                            
                    if($country == "pt"){ return "Portugal"; }
                                            
                    if($country == "pr"){ return "Puerto Rico"; }
                                            
                    if($country == "qa"){ return "Qatar"; }
                                            
                    if($country == "re"){ return "Reunion"; }
                                            
                    if($country == "ro"){ return "Romania"; }
                                            
                    if($country == "ru"){ return "Russian Federation"; }
                                            
                    if($country == "rw"){ return "Rwanda"; }
                                            
                    if($country == "sh"){ return "Saint Helena"; }
                                            
                    if($country == "kn"){ return "Saint Kitts and Nevis"; }
                                            
                    if($country == "lc"){ return "Saint Lucilc"; }
                                            
                    if($country == "pm"){ return "Saint Pierre and Miquelon"; }
                                            
                    if($country == "vc"){ return "Saint Vincent and the Grenadines"; }
                                            
                    if($country == "ws"){ return "Samoa"; }
                                            
                    if($country == "sm"){ return "San Marino"; }
                                            
                    if($country == "st"){ return "Sao Tome and Principe"; }
                                            
                    if($country == "sa"){ return "Saudi Arabia"; }
                                            
                    if($country == "sn"){ return "Senegal"; }
                                            
                    if($country == "rs"){ return "Serbia"; }
                                            
                    if($country == "sc"){ return "Seychelles"; }
                                            
                    if($country == "sl"){ return "Sierra Leone"; }
                                            
                    if($country == "sg"){ return "Singapore"; }
                                            
                    if($country == "sk"){ return "Slovakia"; }
                                            
                    if($country == "si"){ return "Slovenia"; }
                                            
                    if($country == "sb"){ return "Solomon Islands"; }
                                            
                    if($country == "so"){ return "Somalia"; }
                                            
                    if($country == "za"){ return "South Africa"; }
                                            
                    if($country == "gs"){ return "South Georgia and the South Sandwich Islands"; }
                                            
                    if($country == "es"){ return "Spain"; }
                                            
                    if($country == "lk"){ return "Sri Lanka"; }
                                            
                    if($country == "sr"){ return "Suriname"; }
                                            
                    if($country == "sj"){ return "Svalbard and Jan Mayen"; }
                                            
                    if($country == "sz"){ return "Swaziland"; }
                                            
                    if($country == "se"){ return "Sweden"; }
                                            
                    if($country == "ch"){ return "Switzerland"; }
                                            
                    if($country == "tw"){ return "Taiwan"; }
                                            
                    if($country == "tj"){ return "Tajikistan"; }
                                            
                    if($country == "tz"){ return "Tanzania, United Republic of"; }
                                            
                    if($country == "th"){ return "Thailand"; }
                                            
                    if($country == "tl"){ return "Timor-Leste"; }
                                            
                    if($country == "tg"){ return "Togo"; }
                                            
                    if($country == "tk"){ return "Tokelau"; }
                                            
                    if($country == "to"){ return "Tonga"; }
                                            
                    if($country == "tt"){ return "Trinidad and Tobago"; }
                                            
                    if($country == "tn"){ return "Tunisia"; }
                                            
                    if($country == "tr"){ return "Turkey"; }
                                            
                    if($country == "tm"){ return "Turkmenistan"; }
                                            
                    if($country == "tc"){ return "Turks and Caicos Islands"; }
                                            
                    if($country == "tv"){ return "Tuvalu"; }
                                            
                    if($country == "ug"){ return "Uganda"; }
                                            
                    if($country == "ua"){ return "Ukraine"; }
                                            
                    if($country == "ae"){ return "United Arab Emirates"; }
                                            
                    if($country == "gb"){ return "United Kingdom"; }
                                            
                    if($country == "us"){ return "United States"; }
                                            
                    if($country == "uy"){ return "Uruguay"; }
                                            
                    if($country == "uz"){ return "Uzbekistan"; }
                                            
                    if($country == "vu"){ return "Vanuatu"; }
                                            
                    if($country == "ve"){ return "Venezuela"; }
                                            
                    if($country == "vn"){ return "Vietnam"; }
                                            
                    if($country == "vg"){ return "Virgin Islands, British"; }
                                            
                    if($country == "vi"){ return "Virgin Islands, U.S."; }
                                            
                    if($country == "wf"){ return "Wallis and Futuna"; }
                                            
                    if($country == "eh"){ return "Western Sahara"; }
                                            
                    if($country == "ye"){ return "Yemen"; }
                                            
                    if($country == "zm"){ return "Zambia"; }

        }
?>