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

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/locdot/locdot/app/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>