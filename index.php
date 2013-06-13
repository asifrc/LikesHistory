<?php //Bismillah
?>
<head>
<title>LikesHistory</title>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.min.css">
<style type="text/css">
body
{
	/*background-color: #E9EAED;*/
}
.maintitle
{
	color: #5c9ccc;
}
.ui-widget { font-family: Verdana,Arial,sans-serif; font-size: 8pt; }
#all
{
	display: inline-block;
	position: relative;
	overflow: visible;
}
.boxes
{
	box-shadow: 3px 3px 10px #888888;
	width: 300px;
	min-height: 150px;
	float: left;
	padding: 5px;
	margin: 5px;
}
.boxes:hover
{
	box-shadow: 3px 3px 20px #888888;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript">
asif = {};
//GetBox
function getBox(id,type)
{
	FB.api('/'+id, function(resp) {
		var elem = '<div class="boxes status">';
		elem += '<h3>'+resp.from.name+'</h3>';
		elem += '<i>'+resp.updated_time+'</i><br>';
		elem += '<p>'+resp.message+'</p>';
		$(elem).appendTo('#all').hide().fadeIn();
	});
}
//Load Likes
function loadLikes()
{
	var cats = 'photo,album,event,group,note,link,video,application,status,check-in, review, comment, post';
	cats = 'all';
	var fql = "Select object_id, object_type from like where user_id=me() and object_type='status'";
	fql = encodeURIComponent(fql);
	FB.api("/fql?q="+fql,function(response) {
		//Put everything into boxes
		for (var i=0; i<response.data.length; i++)
		{
			getBox(response.data[i].object_id, response.data[i].object_type);
		}
	});
}


//DEV
function loginCheck()
{
	if (FB.getUserID()=="")
	{
		FB.login(function(response) {
				if (response.authResponse) {
					console.log('Welcome!  Fetching your information.... ');
					FB.api('/me', function(response) {
					console.log('Good to see you, ' + response.name + '.');
					});
					loadLikes();
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
	$.getScript('//connect.facebook.net/en_UK/all.js', function(){
		window.fbAsyncInit = function() {
			FB.init({
				appId: '169481549893709',
				channelUrl: '//www.asifrc.com/channel.php',
			});  

			loginCheck();//DEV
		};
	});
});

</script>
</head>
<body>
<div id="fb-root"></div>
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
			
		</div>
		<div id="photo">Photo</div>
		<div id="status">Status</div>
		<div id="post">Post</div>
</div>
Bismillah
<button onclick="loadLikes();">Load Likes</button>
</body>