<?php

function fetch_data($suffix, $user_name){
    $response = []; //return two item- array $response[0] - successfully fetched - true/unsuccessfully - false;  $response[1] - either data if true, or error message if false
    $endpoint = "https://api.github.com/users/";
    $url = $endpoint . $user_name . $suffix;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'PHP-BITOID-CHALLENGE2'); //no idea why it needs useragent
    $json_response = curl_exec($curl); 
    if($json_response===false)//check if response has error (internet connection etc)
    {
      $response[0] = false;
      $response[1] = curl_error($curl);
    }else
    { //if connected successfully
      $response[1] = json_decode($json_response);
      if(is_object($response[1])) //if the user was not found 
      {
        if(property_exists($response[1], 'message'))//(in this case object is returned with message attribute containing the error message)
        {
          $response[0] = false;
          $response[1] = $response[1]->message;
        }

      }else{ //data is fetched successfully
        $response[0] = true;
      }

    }
    curl_close($curl);
    return $response;
}
?>