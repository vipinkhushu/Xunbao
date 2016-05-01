<?php
require('inc/twitteroauth.php'); // path to twitteroauth library

$consumerkey='4ibaJD4bkjhptJlot5OLEdiPf';
$consumersecret='zqlNkG9fDiV0KTGyFlaHvJquvizXuZdajNDpXQ2NQzKQ0vKxDF';
$accesstoken='156933880-0RAFzC5o88mS5fFLlvAoqZ7zFrOnlGbaWUgOLtbq';
$accesstokensecret='Fj1omKWGGUgAuZfOEdZmQ7WBmZe7rOu4ODbapMMw0m0tu';

$twitter = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=Vipinkhushu&count=10');
echo '<pre>' . print_r( $tweets, 1 ) . '</pre>';

?>