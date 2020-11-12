<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Page Not Found!</title>

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
    	<div class="logo-area">
    		<!-- http://dryicesolutions.net/projects/rbcl/application/resources/site/img/rbs_logo11.png -->
    		<img src="<?=base_url();?>application/resources/site/img/rbs_logo11.png">
    	</div>
        <h1>404</h1>
        <h3 class="font-bold">Page Not Found</h3>

        <div class="error-desc">
            Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
           <br><br>
           <div class="but-area">
			 <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="icon-plus-sign"></i> GoTo HoMe PaGe!</a>
			</div>
        </div>
    </div>
<style type="text/css">
img {
    max-width: 100%;
}
.logo-area {
    width: 50%;
    margin: 0 auto;
}
	body{
		background: #E66836;
		margin:0;
		padding: 0;
		color: #fff;
	}
.gray-bg {
    width: 80%;
    margin: 0 auto;
        margin-top: 0px;
    margin-top: 0px;
    box-shadow: 0px 0px 16px 3px rgba(33, 33, 33, 0.35);
    margin-top: 42px;
    text-align: center;
    font-family: arial;
}
.gray-bg h1 {
    font-size: 13rem;
    color: white;
    font-family: arial;
    margin: 0;
    font-weight: bold;
    text-shadow: 13px 11px 11px rgba(5, 4, 4, 0.32);
}
.middle-box.text-center.animated.fadeInDown {
    padding: 63px;
    width: 577px;
    margin: 0 auto;
}
.but-area {
    margin: 0 auto;
    width: 42%;
    margin: 0 auto;
        margin-bottom: 0px;
    text-align: center;
    margin-bottom: 30px;
}
.btn.btn-primary {
    padding: 14px 20px;
    background: #0d4671;
    color: #fff;
    text-transform: uppercase;
    font-family: arial;
    font-weight: bold;
    text-decoration: none;
    margin: 11px auto;
    /*width: 60%;*/
    float: left;
}
</style>
</body>

</html>
