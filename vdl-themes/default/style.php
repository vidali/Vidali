<?php
	header("Content-type: text/css; charset: UTF-8");
/* 
 * ¿Como funciona este css?
 * Este CSS es un CSS dinámico usando PHP, por lo que todos los cambios
 * que tengan similitudes en varios elementos (como los colores, por ej.)
 * se podrán aplicar con variables, de manera que el cambio es más rapido
 * y solo con cambiar la información en la variable correspondiente.
 * En algunos lados aún hay que aplicar estos cambios, se necesita reducir
 * sobretodo el uso de elementos repetidos.
 * */
	$COLOR_1= "rgb(61,61,61)";
	$COLOR_2= "rgb(0,0,0)";
	$COLOR_3= "rgb(158,200,84)";
	$COLOR_BACKGROUND="rgb(250,250,250)";
	$COLOR_BOX = "rgb(244,244,244)";
	$COLOR_BORDER = "rgb(67,67,67)";
	$COLOR_TEXT="rgb(0,0,0)";
	$COLOR_TEXT_LINK="rgb(0,0,0)";
	$COLOR_TEXT_HEADER="rgb(255,255,255)";
	$COLOR_TEXT_HEADER_LINK="rgb(255,255,255)";
	$ELEMENTAL_0 = "margin=0; padding=0;";
	$HEIGHT_HEADER="height=50px;";
	$HEIGHT_CONTENT="min-height=400px;";
	$HEIGHT_FOOTER="min-height=150px;";
?>

/*====================TEXT====================*/
a{ color: #000; text-decoration: none}
#menu a{ color: #f8f9f9; text-decoration: none}
a:hover { color: #000; text-decoration: underline}

h1{ font-size:18px; margin:0px; color: #222;}
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
	font-family: caviar-dreams,Helvetica,arial,sans-serif;
	font-size: 14px;
	color:#000;
	padding: 0px;
	margin: 0px;
}

#globo {
	position:fixed;
	width: 400px;
	height: 100px;
	padding: 10px;
	bottom: 10px;
	left: 330px;
	margin:1em 0 3em;
	border: 3px solid #5a8f00;
	color:#333;
	background:#fff;
	opacity: 0; 
	border-radius:10px;	
}

#globo:before {
	content:"";
	display:block;
	position:absolute;
	bottom:-22px; 
	left:30px;
	width:0;
	height:0;
	border:10px solid transparent;
	border-top-color:#5a8f00;
}

#globo:after {
	content:"";
	display:block;
	position:absolute;
	bottom:-20px; 
	left:27px;
	width:0;
	height:0;
	border:13px solid transparent;
	border-top-color:#fff;
}
/*
#taskbar{
	position: fixed;
	height: 35px;
	background: rgba(158,158,158,0.1);
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
*/
/*====================HEADER====================*/
#line{
	background-color: #94978E;
	min-height:40px;
	width: 100%;
}


header{
	color: #CDCDCD;
	text-shadow: 1px 1px 0px #333;
	<?php echo $HEIGHT_HEADER;?>;
	border-bottom: 2px solid #5A5A5A;
}

header #logo a { color: <?php echo $COLOR_TEXT_HEADER;?>; text-decoration: none}
#logo{
	padding: 0px;
	height: 40px;
	color: #f8f9f9;
	font-size: 16px;
}

#box1{
	padding: 5px 0px 5px 0px;
	height: 25px;
}

#menu ul{
	margin: 0px;
	padding: 0px;
}

#menu ul li{
	background: #2D2D2D;
	text-align: center;
	min-width:60px;
	height: 15px;
	float:right;
	margin-left: 1px;
	border-top: 5px solid #5A5A5A;	
	padding: 10px 5px 10px 5px;
	display:block;
}

#menu ul li.active{
	border-top: 5px solid #AFD250;	
}

#menu ul li:hover{
	text-align: center;
	min-width:60px;
	height: 15px;
	float:right;
	margin: 0px;
	padding: 10px 5px 10px 5px;
	display:block;
	margin-left: 1px;
	border-top: 5px solid #AFD250;	
}

/*====================CONTENT====================*/
/*--->Contenido dentro del <section>*/
#container-line{
	min-height: 775px;
	background: rgb(250,250,250);
	display: block;
	padding-top: 20px;
	padding-bottom: 30px;
}

#page_name{
	display: block;
	margin-bottom: 20px;
	font-size: 24px;
	color: #6a6a6a;
}

/*=========HOME========*/
.basic{
	height: 100px;
	display: block;
	margin-bottom: 10px;
}

.stream{
	height: 600px;
	display: block;
	min-height: 400px;
}

#home_titles{
	border: 1px solid rgb(158,200,84);
	margin: 0px;
	padding: 0px;
	min-height: 20px;
	border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
}

.home_breadcumbs{
	border: 1px solid rgb(158,200,84);
	margin: 0px;
	padding: 0px;
	min-height: 20px;
}

.home_update{
	border: 1px solid rgb(158,200,84);
	margin: 0px;
	padding: 0px;
	min-height: 100px;
}

#pr_thumb{
	box-shadow: 3px 3px 5px #888;
	-moz-box-shadow: 3px 3px 5px #888;
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

/*=========NOTES========*/

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

/*=========Network========*/

#net{
	margin-top: 10px;
	margin-bottom: 10px;
}

#net_photo{
	float: left;
}

#net_id{
	float: left;
	border-bottom: 1px solid #DADADA;
	padding-left: 10px;
	width: 515px;
}

#net_info{
	color: #6a6a6a;
	float: right;
	width: 515px;
}

#net_id_p{
	float: left;
	border-bottom: 1px solid #DADADA;
	padding-left: 10px;
}

#net_info_p{
	color: #6a6a6a;
	float: left;
	min-width: 150px;
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
	margin-bottom: 20px;
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
}

.upd_tb{
	height: 100%;
}

.id_sender{
	font-size: 10px;
	color: #505050;
/*	border-bottom:1px solid #DDD;*/
}

.upd-msg{
	color: #333;
	font-size: 20px;
}

.upd-info{
	float: right;
	color: #A9A9A9;
	font-size: 10px;
}

.reply{
	float: right;
}

.reply a{
	background-color: #f5f5f5;
	color: #A9A9A9;
	font-size: 12px;
}

.reply a:hover{
	background-color: #f5f5f5;
	color: rgb(158,200,84);
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


/*====================FOOTER====================*/

#line-footer{
	background-color: #2D2D2D;
	width: 100%;
	bottom: 0px;
	position: fixed;
}

#about{
	padding-top: 10px;
}

footer{
	color: #fff;
	font-size: 14px;
	height: 40px;
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

#info-box{
	padding: 20px;
	min-height: 600px;
}

#reg_button{
	text-align: center;
	font_size: 20px;
	color: #fff;
	padding: 5px 10px 5px 10px;
	background: #333;
	border: 1px solid #666;
}
/*====================ACTUALIZA ESTADO====================*/


#pulsa{
	cursor:pointer;
}

