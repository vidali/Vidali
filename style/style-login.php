<?php
	header("Content-type: text/css; charset: UTF-8");
	$COLOR_1= "rgb(61,61,61)";
	$COLOR_2= "rgb(0,0,0)";
	$COLOR_3= "rgb(0,0,0)";
	$COLOR_BACKGROUND="rgb(250,250,250)";
	$COLOR_BOX = "rgb(244,244,244)";
	$COLOR_BORDER = "rgb(67,67,67)";
	$COLOR_TEXT="rgb(0,0,0)";
	$COLOR_TEXT_LINK="rgb(0,0,0)";
	$COLOR_TEXT_HEADER="rgb(255,255,255)";
	$COLOR_TEXT_HEADER_LINK="rgb(255,255,255)";
	$ELEMENTAL_0 = "margin=0; padding=0;";
	$HEIGHT_HEADER="height=45px;";
	$HEIGHT_CONTENT="min-height=400px;";
	$HEIGHT_FOOTER="min-height=150px;";
?>

/*====================TEXT====================*/
a{ color: #fff; text-decoration: none}
a:hover{ color: #fff; text-decoration: underline}
header .grid_6 a { color: <?php echo $COLOR_TEXT_HEADER;?>; text-decoration: none}
#reg_button a { color: <?php echo $COLOR_TEXT_HEADER;?>; text-decoration: none}
h1{ font-size:18px; margin:0px; }
h2{ font-size:16px; margin:0px; }
h3{ font-size:14px; margin:0px; }
h4{ font-size:12px; margin:0px; }
h5{ font-size:10px; margin:0px; }
h6{ font-size:8px; }

/*====================BODY====================*/
body{
	background-color: #0A0A0A;
	background-image: url("../vdl-media/vdl-images/earth_bg.png");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: right bottom;
	font-family: verdana,arial,sans-serif;
	font-size: 16px;
	color:#fff;
	padding: 0px;
	margin: 0px;
}

/*====================HEADER====================*/
#line{
	min-height:100px;
	width: 100%;
	border-bottom: 2px solid #434343;
	margin-top: 100px; 	
}

header{
	color: #FFF;
	<?php echo $HEIGHT_HEADER;?>;
}


#login-form{
	padding: 5px 10px 5px 10px;
	color: #fff;
}

#logo{
	text-align: center;
}

#links{
	text-align: center;
	height: 100%;
	font-size: 18px;
	color: #FFF;
	text-shadow: 1px 1px 1px #999;
	list-style: none;
	padding: 0px;
	margin: 0px;
}

#links li{
	margin-left: 25px;
	margin-top: 6px;
	padding: 2px 5px 2px 5px;
	float: left;
	background-color:  #aacc7e;
	border: 1px solid #434343;
}



textarea{
	border-radius: 2px;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	padding:5px;
	font-size: 14px;
	resize: none;
	border: 1px solid #afafaf;
}

input[type=text]{
	text-align: center;
	font_size: 20px;
	color: #fff;
	padding: 10px;
	background: #333;
	border: 1px solid #666;
	width: 150px;
	margin:0px;
}

input[type=password]{
	text-align: center;
	font_size: 20px;
	color: #fff;
	padding: 10px;
	background: #333;
	border: 1px solid #666;
	width: 150px;
	margin:0px;
}

input[type=submit]{
	text-align: center;
	font_size: 20px;
	color: #fff;
	padding: 10px;
	background: #333;
	border: 1px solid #666;
	width: 150px;
	margin:0px;
	cursor: pointer;
}


#login-form ul{
	list-style: none;
	padding: 0px;
	margin: 0px;
}

#login-form ul li{
	margin: 0px 5px 0px 5px;
	padding: 0px;
	float: left;
	width: 150px;
}

.sub{
	font-size: 10px;
	color: #f8f9f9;
	display: inline-block;
	min-width: 100px;
}

/*====================CONTENT====================*/

#info{
	display: block;
	text-align: center;
	padding-top: 50px;
	padding-bottom: 50px;
	color: #F8F9F9;
	text-shadow: 1px 1px 0px #333;
}

#line-login{

	min-height:95px;
	width: 100%;
	height: 140px;
}

#reg_button{
	text-align: center;
	font_size: 20px;
	color: #fff;
	padding: 5px 10px 5px 10px;
	background: #333;
	border: 1px solid #666;
}
/*====================FOOTER====================*/

#line-footer{
	min-height:40px;
	width: 100%;
	position: absolute;
	bottom: 0px;
}

#about{
	padding-top: 20px;
	color: #DCDCDC;
	font-size: 10px;
}

footer{
	color: #FFF;
	font-size: 14px;
	height: 40px;
}
