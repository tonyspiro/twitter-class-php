<?php

require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library

/*
////////////////////////////////////
////							////
////		Configure!!			////
////							////
////////////////////////////////////
*/
$query = "\$aapl";
$count = 100;

define(CONSUMER_KEY, 		"");
define(CONSUMER_SECRET, 	"");
define(ACCESS_TOKEN, 		"");
define(ACCESS_TOKEN_SECRET, "");


/// Twitter Class
class Twitter {
	
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
	
	function search($query, $count){
		
		$consumerkey = CONSUMER_KEY;
		$consumersecret = CONSUMER_SECRET;
		$accesstoken = ACCESS_TOKEN;
		$accesstokensecret = ACCESS_TOKEN_SECRET;
		  
		$connection = $this->getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
		 
		$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=" . $query . "&count=" . $count);
		
		return $tweets;
	}
}

$twitter = new Twitter;

$data = $twitter->search($query, $count);


/*
	To display all data
	
	var_dump($data);
	
*/	 


/*
	To display all Twitter statuses
*/	 
foreach($data->statuses as $tweet){
	echo $tweet->text . "<br />";
}
?>