<?php

$user_name = $_POST['user_name'];
$repos = $_POST['repos'] ?? null; //repository checkbox value
$followers = $_POST['followers'] ?? null; //follower checkbox value
//validations if user emty if both unchecked
if (empty($user_name)) {
    $errors [0] = 'please, enter username';
}
if (empty($repos)&&empty($followers)) {
    $errors[1] = 'please, choose at least one feature';
}

if (empty($errors)) {
    if ($repos==="on") { //API request for repositories
        $suffix_repos = REPOS;
        $response = fetch_data($suffix_repos, $user_name);
        if ($response[0]) {
            $response_repos = $response[1];
        } else {
            $errors[2] = $response[1];
        }
    }
    if ($followers==="on") {
        $suffix_followers = FOLLOWERS;
        $response = fetch_data($suffix_followers, $user_name);
        if ($response[0]) {
            $response_followers = $response[1];
        } else {
            $errors[3] = $response[1];
        }

    }
    
}
