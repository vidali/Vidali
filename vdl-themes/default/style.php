<?php
	header("Content-type: text/css; charset: UTF-8");
	$COLOR_1= "rgb(61,61,61)";
	$COLOR_2= "rgb(0,0,0)";
	$COLOR_3= "rgb(0,0,0)";
	$COLOR_BACKGROUND="rgb(0,0,0)";
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
header #box1 a { color: <?php echo $COLOR_TEXT_HEADER;?>; text-decoration: none}
#button a { color: <?php echo $COLOR_TEXT_HEADER;?>; text-decoration: none}

h1{ font-size:18px; margin:0px; }
h2{ font-size:16px; margin:0px; }
h3{ font-size:14px; margin:0px; }
h4{ font-size:12px; margin:0px; color: #6a6a6a}
h5{ font-size:10px; margin:0px; }
h6{ font-size:8px; margin:0px; }

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

#globo {
	position:fixed;
	width: 400px;
	height: 100px;
	padding:15px;
	bottom: 0px;
	right: 145px;
	margin:1em 0 3em;
	border:5px solid #5a8f00;
	color:#333;
	background:#fff;
	opacity: 0; 
	border-radius:10px;	
}

#globo:before {
	content:"";
	display:block;
	position:absolute;
	bottom:-40px; 
	left:350px;
	width:0;
	height:0;
	border:20px solid transparent;
	border-top-color:#5a8f00;
}

#globo:after {
	content:"";
	display:block;
	position:absolute;
	bottom:-26px; 
	left:357px;
	width:0;
	height:0;
	border:13px solid transparent;
	border-top-color:#fff;
}

#taskbar{
	padding-top: 5px;
	position: fixed;
	height: 25px;
	background: rgba(250,250,250,0.75);
	bottom: 0px;
	right: 0px;
	margin: 0px;
	border-top: 1px solid #000;
	border-left: 1px solid #000;
	text-decoration: none;
	border-radius: 5px 0px 0px 0px;
	-moz-border-radius: 5px 0px 0px 0px;
	-webkit-border-radius: 5px 0px 0px 0px;
}

/*====================HEADER====================*/
#line{
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(0,0,0)), color-stop(1, rgb(61,61,61)));
	background-image: -moz-linear-gradient( center bottom, rgb(0,0,0) 0%, rgb(61,61,61) 100%);
	min-height:40px;
	width: 100%;
}


header{
	color: #FFF;
	text-shadow: 1px 1px 2px #7A7A7A;
	<?php echo $HEIGHT_HEADER;?>;
	border-bottom: 5px solid rgb(158,200,84);
}

header #logo a { color: <?php echo $COLOR_TEXT_HEADER;?>; text-decoration: none}
#logo{
	padding: 5px 0px 5px 0px;
	height: 30px;
	color: #FFF;
	font-size: 20px;
}

#box1{
	padding: 5px 0px 5px 0px;
	height: 30px;
}

#menu ul{
	margin: 0px;
	padding: 0px;
/*	margin:0 5px 0 5px;
	min-height: 45px;*/
}

#menu ul li{
	background: rgb(138,180,64);
	text-align: center;
	min-width:60px;
	height: 20px;
	float:right;
	margin: 0px;
	padding: 10px 5px 10px 5px;
	display:block;
	background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0, rgb(158,200,84)),
    color-stop(0.78, rgb(250,250,250))
	);
	background-image: -moz-linear-gradient(
    center bottom,
    rgb(158,200,84) 0%,
    rgb(250,250,250) 78%
	);
/*	border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;*/
	}



#menu ul li.active{
	background: rgb(158,200,84);	
}



#menu ul li:hover{
	text-align: center;
	min-width:60px;
	height: 20px;
	float:right;
	margin: 0px;
	padding: 10px 5px 10px 5px;
	display:block;
	background: rgb(158,200,84);
}

/*====================CONTENT====================*/
/*--->Contenido dentro del <section>*/
#container-line{
	min-height: 780px;
	background: rgb(250,250,250);
	display: block;
	padding-top: 10px;
	padding-bottom: 10px;
}

#page_name{
	display: block;
	margin-top: 5px;
	margin-bottom: 5px;
	font-size: 24px;
}


#note{
	display: block;
	margin: 10px;
	padding: 5px;
	border-top:1px solid #DDD;
	border-bottom:1px solid #DDD;
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
}

#note .title-note
{
	text-shadow: 1px 1px 1px #999;
	font-weight: bold;
	font-size: 20px;
	margin: 0px 0px 8px 0px;
	padding: 10px;
}

.resume
{
	color:  #333;
	margin: 0px 0px 8px 0px;
	padding-left: 10px;
}

.cont
{
	font-size: 14px;
	margin: 0px 0px 8px 0px;
	padding-left: 10px;
}


.info
{
	padding: 2px 5px 2px 5px;
}

div.clear {
  clear: both;
}

/*=========Profile========*/

#info-pr{
   margin: 10px;
}

.basic_photo{
	margin: 0px;
	padding: 0px;
	min-height: 220px;
	max-height: 220px;
	margin-bottom: 10px;
	box-shadow: 3px 3px 5px #888;
	-moz-box-shadow: 3px 3px 5px #888;
}

.basic3{
	display: block;
	margin: 0px;
	padding: 0px;
	min-height: 210px;
}


.basic_tb{
	display: block;
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	margin: 0px;
	padding: 0px;
	min-height: 100px;
	text-align: center;
}

.pr_titles{
	border-bottom: 1px solid rgb(158,200,84);
	margin: 0px;
	padding: 0px;
	min-height: 20px;
	padding-left: 10px;
}

.upd_tb{
	height: 100%;
}

.id_sender{
	font-size: 12px;
	border-bottom:1px solid #DDD;
}

.upd-msg{
	color: #333;
	font-size: 20px;
}

.upd-info{
	float: right;
	color: #A9A9A9;
	font-size: 12px;
}

#last-upd{
	display: block;
	float: left;
	width: 100%;
	margin: 10px 5px 10px 5px;
	padding: 5px;
	min-height: 40px;
	font-size: 16px;
	background-color: #f5f5f5;
}

#upd{
	display: block;
	width: 100%;
	float: left;
	min-height: 50px;
	max-height: 200px;
	margin: 10px 5px 10px 5px;
	padding: 5px;
}

#upd .upd-msg{
	color: #444;
	font-size: 16px;
}

/*=========HOME========*/
.basic{
	height: 100px;
	display: block;
	margin-bottom: 10px;
}

.basic2{
	height: 650px;
	display: block;
	margin: 0px;
	padding: 0px;
	min-height: 400px;
	border-bottom: 1px solid rgb(158,200,84);
}

.home_titles{
	border-bottom: 1px solid rgb(158,200,84);
	margin: 0px;
	padding: 0px;
	padding-left: 10px;
	min-height: 20px;
	background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0, rgb(158,200,84)),
    color-stop(0.78, rgb(250,250,250))
	);
	background-image: -moz-linear-gradient(
    center bottom,
    rgb(158,200,84) 0%,
    rgb(250,250,250) 78%
	);
	border-radius: 7px 7px 0px 0px;
	-moz-border-radius: 7px 7px 0px 0px;
	-webkit-border-radius: 7px 7px 0px 0px;

}

#pr_thumb{
	box-shadow: 3px 3px 5px #888;
	-moz-box-shadow: 3px 3px 5px #888;
	margin-left: 10px;
	padding: 0px;
	max-width: 100px;
	max-height: 100px;
	float: left;
}

#pr_card{
	margin: 5px;
	padding: 5px;
	max-width: 200px;
	min-height: 80px;
	max-height: 80px;
	float: left;
	border-left: 1px solid #AFAFAF;
}

/*====================FOOTER====================*/
#line-footer{
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(0,0,0)), color-stop(1, rgb(61,61,61)));
	background-image: -moz-linear-gradient( center bottom, rgb(0,0,0) 0%, rgb(61,61,61) 100%);
	min-height:60px;
	width: 100%;
	bottom: 0px;
}

footer{
	text-align: center;
	color: #FFF;
	font-size: 12px;
	height: 60px;
	margin-bottom: 0px;
	display: block;
}
/*====================OTHERS====================*/
#button{
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border: 1px solid #6B6B6B;
	background: #333;
	color: #fff;
	max-width: 50px;
	height: 100%;  
	padding: 2px;
	font-size: 12px;
	padding-left: 10px;
	padding-right: 10px;
	text-align: center;
	float: left;
	margin: 0px 10px 0px 10px;
}
#task-bar{
	position: fixed;
	height: 25px;
	min-width:1024;
	width:100%;
	background-color: #9A9A9A;
	bottom:0px;
	left:0px;
}

#vdl-form{
	width: 100%;
	padding: 20px 5px 20px 5px;
}

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
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	background-color: #f6f7f9;
	width:auto;
	height: 100%;  
	padding:2px;
	font-size: 14px;
	background-color:#DEDEDE
}

input[type=password]{
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	background-color: #f6f7f9;
	height: 100%;  
	padding:2px;
	font-size: 14px;
}

input[type=submit]{
	border-radius: 2px;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0.45, rgb(222,222,222)), color-stop(1, rgb(255,255,255)));
	background-image: -moz-linear-gradient( center bottom, rgb(222,222,222) 45%, rgb(255,255,255) 100%);
	border: 1px solid #6B6B6B;
  	width: 100px;
	height: 100%;  
	padding: 2px;
	color: #000;
}

/*====================ACTUALIZA ESTADO====================*/




