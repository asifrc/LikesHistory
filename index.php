<?php //Bismillah
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


$(document).ready( function() {
	$("#dvMain").tabs();
});
</script>
</head>
<body>
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
		<div id="all">All</div>
		<div id="photo">Photo</div>
		<div id="status">Status</div>
		<div id="post">Post</div>
</div>
Bismillah
</body>