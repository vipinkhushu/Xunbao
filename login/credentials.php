<?php
$host = 'localhost/xunbao/login';  //Recplace it with you website domain e.g. www.vipinkhushu.com and i my case all files are in root directory.
/******Facebook APP Credentials**************/
$appid='***HIDDEN***';
$appsecret='***HIDDEN***';
$incommingurl='http://'.$host.'/token.php';
$postUrl=1;//1=on && 0=off
$postImage=1;//1=on && 0=off
$urlToPost='http://www.vipinkhushu.com/login';
$messageWithUrl='';
$imageToPost='assets/img/facebook-login-button.png';
$messageWithImage='';
/******SQL Server Credentials**************/
$DB_SERVER='localhost';
$DB_USERNAME='root';
$DB_PASSWORD='';
$DB_DATABASE='culmyca';

/******Google APP Credentials**************/
$redirect_url = 'http://'.$host.'/collectUserDataGoogle.php'; // The url of your web site
$client_id = '***HIDDEN***';
$client_secret = '***HIDDEN***';
$api_key = '***HIDDEN***';

/******Twitter APP Credentials**************/
$consumer_key='***HIDDEN***';
$consumer_secret='***HIDDEN***';
$access_token='***HIDDEN***';
$access_secret='***HIDDEN***';
$oauth_callback='http://'.$host.'/collectUserDataTwitter.php';
$messageToPost='Hey! Check Out The Online Assignment Portal For Colleges And Schools http://theasp.tk - via www.vipinkhushu.com';
$screen_name_of_person_to_be_followed='vipinkhushu';
?>