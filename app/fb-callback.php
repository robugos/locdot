<?php

// Set the location of the Facebook PHP SDK - this should point to directory containing autoload.php
define( 'FACEBOOK_SDK_V4_SRC_DIR', 'Facebook/' );

// include required files from Facebook SDK
require_once( 'Facebook/autoload.php' );
require_once('Facebook/GraphSessionInfo.php');
// start the session
session_start();

$config = new Facebook\Facebook([
  'app_id' => '1612177639056622',
  'app_secret' => 'b94f4cf527c23d802717b35206043b74',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $config->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
echo '<h3>Access Token</h3>';
echo $accessToken->getValue();

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $config->getOAuth2Client();

$response = $config->get('/me?fields=id,name', $accessToken->getValue());
$user = $response->getGraphUser();

echo '<br>Name: ' . $user['name'] . '<br>';
echo 'ID: ' . $user['id'];

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)

//$tokenMetadata->validateAppId($config['app_id']);

// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;


// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

?>
<div id="fb-root"></div>
<script type="text/javascript" src="https://connect.facebook.net/zh_TW/all.js"></script>
<script type="text/javascript">
FB.init({appId: '1612177639056622', status: true, cookie: true, xfbml: true});
FB.getLoginStatus(function(response) {
    onStatus(response);
});

function onStatus(response) {
    if (response.session) {
        var timestamp = new Date().getTime();
        var expires = response['session']['expires'] * 1000;
        if(expires - timestamp >= 0){
            setTimeout(function(){window.location.reload();}, expires - timestamp);
        }
    }
}
</script>