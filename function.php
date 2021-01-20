<?php
 // ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
// LIVE
  function checkCreateUpdateHubspotAccount($id){

        $user = GetUserDataByIdHub($id);

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output =  httpGet($url);

        if(@$output->total){ 
            $finalOutput = updateHubspotAccount($output, $user);   
            return $finalOutput;
        }else{ 
            $finalOutput = createHubspotAccount($user);
            return $finalOutput;
        }
    }

   function checkCreateUpdateHubspotAccountDelete($id){

        $user = GetUserDataByIdHub($id);

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output =  httpGet($url);

        if(@$output->total){ 
            $finalOutput = updateHubspotAccountDelete($output, $user);   
            return $finalOutput;
        }
    } 

    // LIVE
    function checkCreateUpdateHubspotAccountSignup($id){

        $user = GetUserDataByIdHub($id);

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output =  httpGet($url);

        if(@$output->total){ 
            $finalOutput = updateHubspotAccountSignup($output, $user);   
            return $finalOutput;
        }else{ 
            $finalOutput = createHubspotAccountSignup($user);
            return $finalOutput;
        }
    }


    // CREATE HUBSPOT ACCOUNT
    function createHubspotAccountSignup($user){
        // $hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
        // $hutk = array('hutk' => $hubspotutk );

        $userCountry = getCountry($user["country"]);

        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
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
                        )
                )
            );

        $url = "https://api.hubapi.com/contacts/v1/contact?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $output->vid
           );
        }        
    } 

    function updateHubspotAccountDelete($output, $user){

        $platformsData = GetUserPlatformDataByIdHub($user["id"]);


        $userCountry = getCountry($user["country"]);

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
                        'value' => @$user["l_name"] . ' - DELETED'
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
                        )
                )
            );


        $vid = $output->contacts[0]->vid;
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $vid
           );
        }
    }

        // CREATE HUBSPOT ACCOUNT
    function updateHubspotAccountSignup($output, $user){

        $platformsData = GetUserPlatformDataByIdHub($user["id"]);


        $userCountry = getCountry($user["country"]);

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
                        )
                )
            );


        $vid = $output->contacts[0]->vid;
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $vid
           );
        }
    }

// create hubspot by form
    // CREATE HUBSPOT ACCOUNT
     function createHubspotAccountutf($id, $hubspotutk){
        $user = GetUserDataByIdHub($id);
		/*$hubspotutk = "";*/
		
		if(isset($_REQUEST['hubspotutk']) && $_REQUEST['hubspotutk'] != ""){
			$hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
		}elseif(isset($_COOKIE['hubspotutk']) && $_COOKIE['hubspotutk'] != ""){
			$hubspotutk = htmlspecialchars(@$_COOKIE['hubspotutk'],ENT_QUOTES);
		}
		
        //$hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
        $comments =  new stdClass;
        $comments->name = 'email';
        $comments->value =  $user["email"];
/*        $hutdata = new stdClass;
        $hutdata->hutk = $hubspotutk;*/
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
        $output = httpPost($url,$data);
        
        $fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
        fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
        fwrite($fp, "FUNCTION NAME : createHubspotAccountutf".PHP_EOL);
        fwrite($fp, "data :".print_r($data,true).PHP_EOL );
        fwrite($fp, "OUTPUT :".print_r($output,true).PHP_EOL );
        fwrite($fp, "status_code :".print_r($status_code,true).PHP_EOL );
        fwrite($fp, "curl_errors :".print_r($curl_errors,true).PHP_EOL );
        fclose($fp);

        if(@$output){
           return $output;
        }
    } 


    // CREATE HUBSPOT ACCOUNT
    function createHubspotAccount($user){
        $hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
        $hutk = array('hutk' => $hubspotutk );
        
        $userCountry = getCountry($user["country"]);

        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
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
                    )
                )
            );

        $url = "https://api.hubapi.com/contacts/v1/contact?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);
		


        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $output->vid
           );
        }        
    } 


        // CREATE HUBSPOT ACCOUNT
    function updateHubspotAccount($output, $user){

        $products = explode(';',$output->contacts[0]->properties->product_bought->value);

         //print_r(implode(';', $products));exit;
        $platformsData = GetUserPlatformDataByIdHub($user["id"]);

        if(@$platformsData["my.yeesshh"]){
            $platformsDataYeesshh = 'ADK'.@$platformsData["my.yeesshh"].' - ';
        }        
        if(@$platformsData["eureekkaa"]){
            $platformsDataEureekkaa = '- ERK'.@$platformsData["eureekkaa"];
        }

        $userCountry = getCountry($user["country"]);

        if(!in_array('MyDSP (ADN)', $products)){ 
            if(count($products) < 1){
                
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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                          
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"] . @$platformsDataEureekkaa
                        ),                                                                                                          
                        array(
                            'property' => 'product_bought',
                            'value' => 'MyDSP (ADN)'
                        )
                    )
                );


            }else{


                $products[] = 'MyDSP (ADN)';

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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                         
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"] . @$platformsDataEureekkaa
                        ),                                                                                         
                        array(
                            'property' => 'product_bought',
                            'value' => implode(';', $products)
                        )
                    )
                );

            }
        }else{
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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                         
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"] . @$platformsDataEureekkaa
                        ),                                                                                         
                        array(
                            'property' => 'product_bought',
                            'value' => implode(';', $products)
                        )
                    )
                );
        }

        $vid = $output->contacts[0]->vid;
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $vid
           );
        }
    }

    // CREATE HUBSPOT ACCOUNT
    function updateHubspotAccountBalance($output,$status){


        if(is_array($status)){

            $data = array(
                'properties' => array(
                    array(
                        'property' => 'campaign_cap',
                        'value' => $status['message']
                    )
                )
            );

        }else if ($status == 'low' || $status == 'exceeded'){
            $data = array(
                    'properties' => array(
                        array(
                            'property' => 'current_balance',
                            'value' => $status
                        )
                    )
                );
        }else if($status == 'opportunity'){
            $data = array(
                    'properties' => array(
                        array(
                            'property' => 'lifecyclestage',
                            'value' => 'opportunity'
                        )
                    )
                );
        }
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output;
        }
    }

    function checkCreateUpdateBalanceHubspot($id,$status){

        $user = GetUserDataByIdHub($id);

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        //$output =  httpGet($url);
        $output =  httpGet_v2($url);

			//////////////////////////////////////////////
			$fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : BEFORE3-updateHubspotAccountBalance".PHP_EOL);
            fwrite($fp, "OUTPUT :".print_r($output,true).PHP_EOL );
            fwrite($fp, "MESSAGE :".$output->message .PHP_EOL );
            fclose($fp);			
			//////////////////////////////////////////////


		if(@$output->message == "You have reached your daily limit."){
			//exiting to avoid loops
			return "";
		}elseif(@$output->total){
            $finalOutput = updateHubspotAccountBalance($output,$status);   
            return $finalOutput;
        }else{
            $finalOutput = createHubspotAccount($user);
			//////////////////////////////////////////////
			$fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : BEFORE8-updateHubspotAccountBalance".PHP_EOL);
            fwrite($fp, "FINAL OUTPUT :".print_r($finalOutput,true).PHP_EOL );
            fwrite($fp, "MESSAGE :".@$finalOutput["status"]->message .PHP_EOL );
            fclose($fp);			
			//////////////////////////////////////////////	
			if(@$finalOutput["status"]->message == "Property values were not valid"){
				$finalOutput = "";
			//////////////////////////////////////////////
			$fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : EXITING-updateHubspotAccountBalance".PHP_EOL);
            fwrite($fp, "FINAL OUTPUT :".print_r($finalOutput,true).PHP_EOL );
            fwrite($fp, "MESSAGE :".@$finalOutput["status"]->message .PHP_EOL );
            fclose($fp);			
			//////////////////////////////////////////////					
			}else{
				sleep(10);
				checkCreateUpdateBalanceHubspot($id,$status);
			}
            return $finalOutput;
			
        }
    }
	
   //CURL FUNCTIONS STARTS HERE
    function httpGet_v2($url)
    {
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
        $output=curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $curl_errors = curl_error($ch);
        curl_close($ch);


         if($status_code == 200 ){
            $result = json_decode($output);
            unset($output);
        }elseif( $status_code == 204){
            return true;
        }else{
            $result = json_decode($output);
            $fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : httpGet2".PHP_EOL);
            fwrite($fp, "OUTPUT :".print_r($output,true).PHP_EOL );
            fwrite($fp, "status_code :".print_r($status_code,true).PHP_EOL );
            fwrite($fp, "curl_errors :".print_r($curl_errors,true).PHP_EOL );
            fclose($fp);
			unset($output);
        }
       

        return $result;
    }

	
   //CURL FUNCTIONS STARTS HERE
    function httpGet($url)
    {
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
        $output=curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $curl_errors = curl_error($ch);
        curl_close($ch);


         if($status_code == 200 ){
            $result = json_decode($output);
            unset($output);
        }elseif( $status_code == 204){
            return true;
        }else{
            $result = '';
            $fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : httpGet".PHP_EOL);
            fwrite($fp, "OUTPUT :".print_r($output,true).PHP_EOL );
            fwrite($fp, "status_code :".print_r($status_code,true).PHP_EOL );
            fwrite($fp, "curl_errors :".print_r($curl_errors,true).PHP_EOL );
            fclose($fp);
        }
       

        return $result;
    }

    function httpPost($url,$data){

        $post_json = json_encode($data);

            $fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d h:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : httpPost".PHP_EOL );
            fwrite($fp, "SENDING DATA :".print_r($post_json,true).PHP_EOL );
            fwrite($fp, "DATA :".print_r($data,true).PHP_EOL );
            fwrite($fp, "URL :".print_r($url,true).PHP_EOL );
            fwrite($fp, "CALLER3 :".print_r(debug_backtrace(), true).PHP_EOL );
            fclose($fp);

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $url);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       
        $output = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);

            $fp =  fopen(__DIR__.'/logs/hubspot_tracking.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d H:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : httpPost".PHP_EOL );
            fwrite($fp, "OUTPUT :".print_r($output,true).PHP_EOL );
            fwrite($fp, "DATA :".print_r($data,true).PHP_EOL );
            fwrite($fp, "status_code :".print_r($status_code,true).PHP_EOL );
            fwrite($fp, "curl_errors :".print_r($curl_errors,true).PHP_EOL );
            fclose($fp);

         //print_r($output);exit;
        @curl_close($ch);

        if($status_code == 200 ){
            return json_decode($output);
        }elseif( $status_code == 204){
            return true;
        }else{
            $fp =  fopen(__DIR__.'/logs/hubspot.log', 'a');
            fwrite($fp, PHP_EOL ."______________________".date('Y-m-d H:i:s')."_____________________________".PHP_EOL );
            fwrite($fp, "FUNCTION NAME : httpPost".PHP_EOL );
            fwrite($fp, "OUTPUT :".print_r($output,true).PHP_EOL );
            fwrite($fp, "DATA :".print_r($data,true).PHP_EOL );
            fwrite($fp, "status_code :".print_r($status_code,true).PHP_EOL );
            fwrite($fp, "curl_errors :".print_r($curl_errors,true).PHP_EOL );
            fclose($fp);
            return json_decode($output);
        }
    }


       

    function httpPut($url,$data){

        $post_json = json_encode($data);

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
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

        if($status_code == 200){
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
            echo "output  "; print_r($output);
            echo "status_code  "; print_r($status_code);
            echo "curl_errors  "; print_r($curl_errors);
            return json_decode($output);
            exit;
        }

    }


    function GetUserPlatformDataByIdHub($id)
    {
        $sql = "SELECT * FROM `user_platform_mapping` where mydsp_user_id='$id'  ";
        $records = mysql_query($sql);
        $platIds = array();
        while ($row = mysql_fetch_assoc($records)) {
            $platIds[$row['platform_name']] = $row['platform_user_id'];
        }

    if($platIds){
        return $platIds;
    }
    else
        return false;
    }


    function GetUserDataByIdHub($id)
    {
    
        $sql = "SELECT `users`.*,`users`.username as UNAME , `users_profile`.`country`, `users_profile`.`f_name`, `users_profile`.`l_name`, `users_profile`.`im_type`, `users_profile`.`im_id` FROM `users`, `users_profile` where `users_profile`.`username`=`users`.`username` and `users`.`id`='$id' limit 1 ";

        $records = mysql_fetch_assoc(mysql_query($sql));     

       if($records){
         // $records["password"]="";
        return $records;
        }
        else{
        return false;    
        }
        
    }

function creatToken()
{
    $cookie_file_path = "tmp/cookies.txt";
    $agent            = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0";
    $headers[] = "Accept: */*";
    $headers[] = "Connection: Keep-Alive";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_HEADER,  0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
    curl_setopt($ch, CURLOPT_URL,'https://login.yeesshh.com/admin/auth?login=dev2_yeesshh&password=e6hSmIw8Z19C');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);

    return trim($server_output);
}

function creatTokenEurreekka()
{
$cookie_file_path = "tmp/cookies.txt";
$agent            = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0";
$headers[] = "Accept: */*";
$headers[] = "Connection: Keep-Alive";
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
curl_setopt($ch, CURLOPT_HEADER,  0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
curl_setopt($ch, CURLOPT_URL,'https://login.eureekkaa.com/admin/auth?login=dev3_yeesshh&password=9n1d7GZw99L8');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_outputEureekka = curl_exec($ch);
curl_close ($ch);

return trim($server_outputEureekka);
}


    function checkCreateUpdateHubspotAccountEurreekka($id){

        $user = GetUserDataByIdHub($id);

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output =  httpGet($url);
        

        if(@$output->total){
            $finalOutput = updateHubspotAccountEurreekka($output, $user);   
            return $finalOutput;
        }else{ 
            $finalOutput = createHubspotAccountEurreekka($user);
            return $finalOutput;
        }
    }


    // CREATE HUBSPOT ACCOUNT
    function createHubspotAccountEurreekka($user){
        $hubspotutk = htmlspecialchars(@$_REQUEST['hubspotutk'],ENT_QUOTES);
        $hutk = array('hutk' => $hubspotutk );

        $userCountry = getCountry($user["country"]);

        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
        if(@$platformsData["my.yeesshh"]){
            $platformsDataYeesshh = 'ADK'.@$platformsData["my.yeesshh"].' - ';
        }        
        if(@$platformsData["eureekkaa"]){
            $platformsDataEureekkaa = '- ERK'.@$platformsData["eureekkaa"];
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
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"]. @$platformsDataEureekkaa
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
                    )                   
                )
            );

        
        $url = "https://api.hubapi.com/contacts/v1/contact?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $output->vid
           );
        }

    } 


        // CREATE HUBSPOT ACCOUNT
    function updateHubspotAccountEurreekka($output, $user){


        $products = explode(';',$output->contacts[0]->properties->product_bought->value);
        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
        // print_r(implode(';', $products));exit;
        if(@$platformsData["my.yeesshh"]){
            $platformsDataYeesshh = 'ADK'.@$platformsData["my.yeesshh"].' - ';
        }        
        if(@$platformsData["eureekkaa"]){
            $platformsDataEureekkaa = '- ERK'.@$platformsData["eureekkaa"];
        }

        $userCountry = getCountry($user["country"]);

        if(!in_array('Push.Eureekkaa', $products)){
            if(count($products) < 1){
                
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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                         
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"]. @$platformsDataEureekkaa
                        ),                                               
                        array(
                            'property' => 'product_bought',
                            'value' => 'Push.Eureekkaa'
                        )
                    )
                );


            }else{



                $products[] = 'Push.Eureekkaa';

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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                           
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"]. @$platformsDataEureekkaa
                        ),                                               
                        array(
                            'property' => 'product_bought',
                            'value' => implode(';', $products)
                        )
                    )
                );

            }
        }


        // print_r($data);exit;

        $vid = $output->contacts[0]->vid;
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $vid
           );
        }
    }




  function checkCreateUpdateHubspotAccountYeesshh($id){

        $user = GetUserDataByIdHub($id);

        $url  = "https://api.hubapi.com/contacts/v1/search/query?q=".$user["email"]."&hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output =  httpGet($url);




        if(@$output->total){ 
            $finalOutput = updateHubspotAccountYeesshh($output, $user);   
            return $finalOutput;
        }else{ 
            $finalOutput = createHubspotAccountYeesshh($user);
            return $finalOutput;
        }
    }


    // CREATE HUBSPOT ACCOUNT
    function createHubspotAccountYeesshh($user){

        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
        $userCountry = getCountry($user["country"]);
        if(@$platformsData["my.yeesshh"]){
            $platformsDataYeesshh = 'ADK'.@$platformsData["my.yeesshh"].' - ';
        }        
        if(@$platformsData["eureekkaa"]){
            $platformsDataEureekkaa = '- ERK'.@$platformsData["eureekkaa"];
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
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"]. @$platformsDataEureekkaa
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
                    )                  
                )
            );


        $url = "https://api.hubapi.com/contacts/v1/contact?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $output->vid
           );
        }

    } 


        // CREATE HUBSPOT ACCOUNT
    function updateHubspotAccountYeesshh($output, $user){

        $products = explode(';',$output->contacts[0]->properties->product_bought->value);
        $platformsData = GetUserPlatformDataByIdHub($user["id"]);
        // print_r(implode(';', $products));exit;
        if(@$platformsData["my.yeesshh"]){
            $platformsDataYeesshh = 'ADK'.@$platformsData["my.yeesshh"].' - ';
        }        
        if(@$platformsData["eureekkaa"]){
            $platformsDataEureekkaa = '- ERK'.@$platformsData["eureekkaa"];
        }

        $userCountry = getCountry($user["country"]);

        if(!in_array('My.Yeesshh (ADK)', $products)){
            if(count($products) < 1){
                
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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                           
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"]. @$platformsDataEureekkaa
                        ),                                              
                        array(
                            'property' => 'product_bought',
                            'value' => 'My.Yeesshh (ADK)'
                        )
                    )
                );


            }else{

                

                $products[] = 'My.Yeesshh (ADK)';

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
                                'property' => 'country',
                                'value' => @$userCountry
                        ),                         
                        array(
                            'property' => 'client_platfrom_id',
                            'value' => @$platformsDataYeesshh.' myDSP'.$user["id"]. @$platformsDataEureekkaa
                        ),                       
                        array(
                            'property' => 'product_bought',
                            'value' => implode(';', $products)
                        )
                    )
                );

            }
        }



        $vid = $output->contacts[0]->vid;
        $url = "https://api.hubapi.com/contacts/v1/contact/vid/".$output->contacts[0]->vid."/profile?hapikey=add59d28-aa68-4430-93de-1424fdac34af";
        $output = httpPost($url,$data);

        if(@$output){
           return $output = array(
                'status' => $output,
                'vid' => $vid
           );
        }
    }


    function addDataToEailQueue($emailQueueData){


        $eq_username = $emailQueueData['eq_username'];
        $eq_slug = $emailQueueData['eq_slug'];
        $eq_subject = $emailQueueData['eq_subject'];
        $eq_content = mysql_real_escape_string($emailQueueData['eq_content']);
        $eq_to_email = $emailQueueData['eq_to_email'];
        $eq_from_email = $emailQueueData['eq_from_email'];
        $eq_from_name = $emailQueueData['eq_from_name'];
        $eq_bcc_email = $emailQueueData['eq_bcc_email'];
        $eq_reply_to_email = $emailQueueData['eq_reply_to_email'];

        mysql_query("INSERT INTO `email_queue` (`eq_username`, `eq_slug`, `eq_subject`, `eq_content`, `eq_to_email`, `eq_from_email`, `eq_from_name`, `eq_bcc_email`, `eq_reply_to_email`, `eq_status`) VALUES ('$eq_username','$eq_slug','$eq_subject','$eq_content','$eq_to_email','$eq_from_email','$eq_from_name','$eq_bcc_email','$eq_reply_to_email', 0)");

        if ($last_id = mysql_insert_id()) {
            return $last_id;
        }else{
            return "INSERT INTO `email_queue` (`eq_username`, `eq_slug`, `eq_subject`, `eq_content`, `eq_to_email`, `eq_from_email`, `eq_from_name`, `eq_bcc_email`, `eq_reply_to_email`, `eq_status`) VALUES ('$eq_username','$eq_slug','$eq_subject','$eq_content','$eq_to_email','$eq_from_email','$eq_from_name','$eq_bcc_email','$eq_reply_to_email', 0)";
        }

    }

    function checkEmailInLast72($username,$event){

        $timeToCheck = date('Y-m-d H:i',strtotime('-3 days'));

        $sql = "SELECT * FROM `log_emails_sent` WHERE  `event` = '$event' AND `username` = '$username' AND `datesent` >= '$timeToCheck' LIMIT 1";
        if ($records = mysql_query($sql)) {
            $records = mysql_fetch_assoc($records);
            return $records;
        }else{
            return false;
        }  
    }

    function checkEmailOnce($username,$event){

        $timeToCheck = date('Y-m-d H:i',strtotime('-3 days'));

        $sql = "SELECT * FROM `log_emails_sent` WHERE  `event` = '$event' AND `username` = '$username' LIMIT 1";
        if ($records = mysql_query($sql)) {
            $records = mysql_fetch_assoc($records);
            return $records;
        }else{
            return false;
        }  
    }

    function getEmailContent($email_slug){
        $sql = "SELECT * FROM `transactional_email_content` WHERE `e_slug`='$email_slug' LIMIT 1";

        if ($records = mysql_query($sql)) {
            $records = mysql_fetch_assoc($records);
            return $records;
        }else{
            return false;
        }
      
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
                                            
                    if($country == "gm"){ return "Gambia"; }
                                            
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