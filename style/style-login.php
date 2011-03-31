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

h1{ font-size:18px; margin:0px; }
h2{ font-size:16px; margin:0px; }
h3{ font-size:14px; margin:0px; }
h4{ font-size:12px; margin:0px; }
h5{ font-size:10px; margin:0px; }
h6{ font-size:8px; }

@font-face {
	font-family: caviar-dreams;	/* required */
	src: url(caviar-dreams.ttf);	/* source: http://www.dafont.com/caviar-dreams.font?l[]=10&l[]=1 Author: nymphont@yahoo.com*/
}

/*====================BODY====================*/
body{
	background: <?php echo $COLOR_BACKGROUND;?>;
	font-family: caviar-dreams,\'Droid Sans\',verdana,arial,sans-serif;
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
	text-shadow: 1px 1px 2px #7A7A7A;
	<?php echo $HEIGHT_HEADER;?>;
}

#login-form{
	min-height: 100px;
}

#login-form ul{
		list-style: none;
}
#login-form ul li{
	margin: 0px 5px 0px 5px;
	float: left;
}

/*====================CONTENT====================*/
#line-cont{
background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0, rgb(250,250,250)),
    color-stop(0.78, rgb(158,200,84))
);
background-image: -moz-linear-gradient(
    center bottom,
    rgb(250,250,250) 0%,
    rgb(158,200,84) 78%
);
	min-height:200px;
	height: auto;
	width: 100%;
}
	
#info{
	display: block;
	text-align: center;
	padding-top: 50px;
}

#line-login{

	min-height:95px;
	width: 100%;
	height: 140px;
}

/*====================FOOTER====================*/

#line-footer{
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(0,0,0)), color-stop(1, rgb(61,61,61)));
	background-image: -moz-linear-gradient( center bottom, rgb(0,0,0) 0%, rgb(61,61,61) 100%);
	min-height:40px;
	width: 100%;
	position: absolute;
	bottom: 0px;
}

footer{
	text-align: center;
	color: #FFF;
	font-size: 14px;
	height: 40px;
}
/*====================OTHERS====================*/

textarea{
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	background-color: #f6f7f9;
	padding:5px;
	font-size: 14px;
	resize: none;
}
input[type=text]{
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	width:auto;
	height: 100%;  
	padding:2px;
	font-size: 10px;
	border: 0px;
}

label{
	width: 100px;
	text-align: left;
}
input[type=password]{
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	height: 100%;  
	padding:2px;
	font-size: 10px;
	border: 0px;
}

input[type=checkbox]{
	border: 0px;
}


input[type=submit]{
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border: 1px solid #6B6B6B;
	background: #333;
	color: #fff;
  	width: 100px;
	height: 100%;  
	padding: 2px;
	font-size: 10px;
}
