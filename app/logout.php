<?php 
// Set the location of the Facebook PHP SDK - this should point to directory containing autoload.php
define( 'FACEBOOK_SDK_V4_SRC_DIR', 'Facebook/' );

// include required files from Facebook SDK
require_once( 'Facebook/autoload.php' );

// start the session
session_start();


$fb = new Facebook\Facebook([
  'app_id' => '1612177639056622',
  'app_secret' => 'b94f4cf527c23d802717b35206043b74',
  'default_graph_version' => 'v2.2',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name', '{access-token}');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];
// OR
// echo 'Name: ' . $user->getName();
?>