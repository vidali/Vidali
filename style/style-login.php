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
a{ color:<?php echo $COLOR_TEXT_LINK;?>; text-decoration: none}
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
	background: rgb(175,210,100);
	font-family: verdana,arial,sans-serif;
	font-size: 16px;
	color:#000;
	padding: 0px;
	margin: 0px;
}

/*====================HEADER====================*/
#line{
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(0,0,0)), color-stop(1, rgb(61,61,61)));
	background-image: gradient( linear, left bottom, left top, color-stop(0, rgb(0,0,0)), color-stop(1, rgb(61,61,61)));
	background-image: -moz-linear-gradient( center bottom, rgb(0,0,0) 0%, rgb(61,61,61) 100%);
	background-image: -o-linear-gradient(top, rgb(0,0,0), rgb(61,61,61));
	background-image: linear-gradient(top, rgb(0,0,0), rgb(61,61,61));
	min-height:100px;
	width: 100%;
	border-bottom: 5px solid #434343;
}

header{
	color: #FFF;
	<?php echo $HEIGHT_HEADER;?>;
}

#vdl-form ul{
	font-size: 12px;
	list-style: none;
	padding: 0px;
	margin: 0px;
}
#vdl-form ul li{
	margin: 0px 5px 0px 5px;
	float: left;
	color: #111;
}

label{
	font-size: 12px;
	display: inline-block;
	min-width: 100px;
}
/*====================CONTENT====================*/
#line-cont{
background: rgb(175,210,100);
}
	
#info{
	display: block;
	text-align: center;
	padding-top: 50px;
	height: 465px;
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
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(0,0,0)), color-stop(1, rgb(61,61,61)));
	background-image: -moz-linear-gradient( center bottom, rgb(0,0,0) 0%, rgb(61,61,61) 100%);
	background-image: -o-linear-gradient(top, rgb(0,0,0),rgb(61,61,61));
	background-image: linear-gradient(top, rgb(0,0,0), rgb(61,61,61));
	min-height:40px;
	width: 100%;
	position: absolute;
	bottom: 0px;
}

#about{
	padding-top: 10px;
}

footer{
	color: #FFF;
	font-size: 14px;
	height: 40px;
}
