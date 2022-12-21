<?php
/**
 * File for functions
 *
 * PHP Version 8.1.10
 *
 * @category Challenge2
 * @package  Challenge2
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     no link
 */

/**
 * Setter for descriptionName property
 * 
 * @param $suffix    gets the value of either followers or repositories.
 * @param $user_name gets the value of user.              
 *
 * @return object corresponding to the productType.
 */
function fetch_data($suffix, $user_name)
{
    $response = []; //array of two values. $response[0] - successfully fetched - true/unsuccessfully - false;  $response[1] - either data if true, or error message if false
    $endpoint = "https://api.github.com/users/";
    $url = $endpoint . $user_name . $suffix . '?per_page=1000';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'PHP-BITOID-CHALLENGE2'); //no idea why it needs useragent
    $json_response = curl_exec($curl);

    if ($json_response===false) {
        $response[0] = false;
        $response[1] = curl_error($curl);
    } else { 
        $response[1] = json_decode($json_response);
        if (is_object($response[1])) { 
            if (property_exists($response[1], 'message')) {
                $response[0] = false;
                $response[1] = $response[1]->message;
            }
        } else { //data is fetched successfully
            $response[0] = true;
        }
    }
    curl_close($curl);
    return $response;
}
