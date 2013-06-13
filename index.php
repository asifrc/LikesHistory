<?php //Bismillah
/*
//SAMPLE CODE from http://developers.facebook.com/docs/appsonfacebook/tutorial/#channels

$app_id = "169481549893709";

$canvas_page = "http://apps.facebook.com/likeshistory/";

$auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
	. $app_id . "&redirect_uri=" . urlencode($canvas_page);

$signed_request = $_REQUEST["signed_request"];

list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

if (empty($data["user_id"])) {
	echo("<script> top.location.href='" . $auth_url . "'</script>");
} else {
	echo ("Welcome User: " . $data["user_id"]);
	print_r($data);
} 
//END SAMPLE
*/
?>
<head>
<title>LikesHistory</title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.min.css">
<style type="text/css">
.maintitle
{
	color: #5c9ccc;
}
.ui-widget { font-family: Verdana,Arial,sans-serif; font-size: 8pt; }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript">
function getStatus(cbConnected, cbNoAuth, cbOther)
{
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected')
		{
			//Connected
			console.log('connected');
			//cbConnected(response);
		}
		else if (response.status === 'not_authorized')
		{
			//Logged in to Facebook, but has not authenticated
			console.log('connected');
			//cbNoAuth(response);
		}
		else
		{
			//Not logged in to Facebook.
			console.log('connected');
			//cbOther(response);
		}
	});
}
function fun()
{
	if (FB.getUserID()=="")
	{
		FB.login(function(response) {
				if (response.authResponse) {
					console.log('Welcome!  Fetching your information.... ');
					FB.api('/me', function(response) {
					console.log('Good to see you, ' + response.name + '.');
					});
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			}, {scope: 'user_likes, read_stream'}
		);
	}
}




//Document Ready
$(document).ready( function() {
	$("#dvMain").tabs();
	fun();
});

</script>
</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
	FB._https = true;
    FB.init({
      appId      : '169481549893709',                        // App ID from the app dashboard
      //channelUrl : 'http://www.asifrc.com/channel.php', // Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<h1 class="maintitle">Likes History</h1>
<div id="dvMain">
	<ul>
		<li><a href="#all">All</a></li>
		<li><a href="#photo">Photo</a></li>
		<li><a href="#status">Status</a></li>
		<li><a href="#post">Post</a></li>
	</ul>
		<?php
//		photo, album, event, group, note, link, video, application, status, check-in, review, comment, post
		?>
		<div id="all">
			<h3>All</h3>
			<button id="btn" onclick="fun();">Click Me</button>
		</div>
		<div id="photo">Photo</div>
		<div id="status">Status</div>
		<div id="post">Post</div>
</div>
Bismillah
</body>