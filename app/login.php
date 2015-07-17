<?php
define('APP_ID', '1612177639056622');
define('APP_SECRET', 'b94f4cf527c23d802717b35206043b74');
define('REDIRECT_URL','http://localhost/locdot/locdot/app/login.php');

?>
<!DOCTYPE html>
 
<html>
 <head>
 <title>Facebook Login Sample</title>
 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 <style>
 body{
 width:100%;
 margin:0;
 }
 .facebooklogin{
 font-size:100%;
 font-family:arial;
 display:block;
 width:200px;
 height:20px;
 background-color:#142dac;
 color: #FFFFFF;
 text-decoration:none;
 padding:20px;
 border-radius:5px;
 margin:0 auto;
 text-align:center;
 }
 
 .facebooklogin:hover{
 background-color:#4158cc;
 }
 
 .user{
 font-size:100%;
 font-family:arial;
 display:block;
 width:100%;
 background-color:#142dac;
 color: #FFFFFF;
 text-decoration:none;
 border-radius:5px;
 }
 
 .wrapper{
 width:60%;
 margin:0 auto;
 padding:20px;
 }
 
 
 
 .tg  {border-collapse:collapse;border-spacing:0; width:100%;}
 .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
 .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
 
 </style>
 </head>
 
 <body>
 <?php
 
 /*
 Author: Belal Khan
 website: www.simplifiedcoding.net
 */
 
 //INCLUDING LIBRARIES 
 require_once('lib/Facebook/FacebookSession.php');
 require_once('lib/Facebook/FacebookRequest.php');
 require_once('lib/Facebook/FacebookResponse.php');
 require_once('lib/Facebook/FacebookSDKException.php');
 require_once('lib/Facebook/FacebookRequestException.php');
 require_once('lib/Facebook/FacebookRedirectLoginHelper.php');
 require_once('lib/Facebook/FacebookAuthorizationException.php');
 require_once('lib/Facebook/FacebookAuthorizationException.php');
 require_once('lib/Facebook/GraphObject.php');
 require_once('lib/Facebook/GraphUser.php');
 require_once('lib/Facebook/GraphSessionInfo.php');
 require_once('lib/Facebook/Entities/AccessToken.php');
 require_once('lib/Facebook/HttpClients/FacebookCurl.php');
 require_once('lib/Facebook/HttpClients/FacebookHttpable.php');
 require_once('lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
 
 //USING NAMESPACES
 use Facebook\FacebookSession;
 use Facebook\FacebookRedirectLoginHelper;
 use Facebook\FacebookRequest;
 use Facebook\FacebookResponse;
 use Facebook\FacebookSDKException;
 use Facebook\FacebookRequestException;
 use Facebook\FacebookAuthorizationException;
 use Facebook\GraphObject;
 use Facebook\GraphUser;
 use Facebook\GraphSessionInfo;
 use Facebook\HttpClients\FacebookHttpable;
 use Facebook\HttpClients\FacebookCurlHttpClient;
 use Facebook\HttpClients\FacebookCurl;
 
 //STARTING SESSION
 session_start();
 
 
 
 FacebookSession::setDefaultApplication(APP_ID,APP_SECRET);
 
 $helper = new FacebookRedirectLoginHelper(REDIRECT_URL);
 
 $sess = $helper->getSessionFromRedirect();
 
 
 if(isset($_REQUEST['logout'])){
 unset($_SESSION['token']);
 }
 
 if(isset($_SESSION['token'])){
 $sess = new FacebookSession($_SESSION['token']);
 }
 
 $logout = 'http://localhost/locdot/locdot/app/login.php?logout=true';
 
 if(isset($sess)){
 $_SESSION['token']=$sess->getToken();
 
 $request  = new FacebookRequest($sess, 'GET', '/me');
 $response = $request->execute();
 $graph = $response->getGraphObject(GraphUser::className());
 $name = $graph->getName();
 $id = $graph->getId();
 $img = 'https://graph.facebook.com/'.$id.'/picture?width=300';
 $email = $graph->getProperty('email');
 $birthday = $graph->getProperty('birthday');
 $sex = $graph->getProperty('gender');
 ?> 
 <div class='user'>
 <div class='wrapper'>
 <table class="tg">
   <tr>
 <th class="tg-031e" rowspan="5"><img src='<?php echo $img;?>' /></th>
 <th class="tg-031e" ><?php  ?></th>
 <th class="tg-031e"><?php  echo $name; ?></th>
   </tr>
   <tr>
 <td class="tg-031e">User ID</td>
 <td class="tg-031e"><?php echo $id; ?></td>
   </tr>
   <tr>
 <td class="tg-031e">Email</td>
 <td class="tg-031e"><?php echo $email; ?></td>
   </tr>
   <tr>
 <td class="tg-031e">Gender</td>
 <td class="tg-031e"><?php echo $sex; ?></td>
   </tr>
   <tr>
 <td class="tg-031e">Date of Birth</td>
 <td class="tg-031e"><?php echo $birthday; ?></td>
   </tr>
 </table>
 </div>
 </div>
 <br />
 <?php echo "<a href='index.php?sess=".$_SESSION['token']."'>Login</a>"; ?>
 <a class="facebooklogin" href='<?php echo $logout; ?>'>
            <i class="fa fa-facebook"></i> Logout
 </a>
 
 <?php
 }else{
 ?>
 <a class="facebooklogin" href='<?php echo $helper->getLoginUrl(array('scope'=>'email,user_birthday'));?>'>
            <i class="fa fa-facebook"></i> Sign in with Facebook
 </a>
 <?php
 }
 
 ?>
 </body>
</html>