<?php
header("Content-type: text/css; charset: UTF-8");

$pad = 25;
$pad_str = $pad . 'px';
$navbar_width = 200;
$controlbar_width = 75;
$sidebar_width = $controlbar_width + $navbar_width;
$primary_color = '#11ABC5';

?>

body {
  font-family: "asapregular", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
  background-color: #fff;
}


h1{
  text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.46);
  margin-bottom: 0;
}

a{
  color: <?php echo $primary_color;?>
}

a:hover{
  opacity: 0.75;
  text-decoration: underline;
}

a.active{
  text-shadow: 0 0 25px #11ABC5;
}

.social a{
  font-size: 100px;
}

.social div{
  text-align: center;
}
.social a:hover{
  text-decoration: none;
  opacity: 1;
}

.social a .icon-twitter2:hover{
  color: #00aced;
}
.social a .icon-facebook2:hover{
  color: #3b5998;
}
.social a .icon-googleplus2:hover{
  color: #d34836;
}

.social a .icon-linkedin2:hover{
  color: #007bb6;
}

.btn{
  display: block;
}

.clear{
  clear: both;
}

/**
* @group Main body
*/

body{
  overflow-y: scroll;
  overflow-x: hidden;
  position: absolute;
  top: 0;
  left: 0px;
  max-height: 100%;
  max-width: 100%;
  height: 100%;
  padding-left: 75px;
}

 section{
  padding: 0 <?php echo $pad ?>px;
  min-height: 100%;
}

 section::after{
  content: ".";
  display: block;
  height: 0;
  clear: both;
  visibility: hidden;
}

 section .full-width{
  margin-left: -<?php echo $pad ?>px;
  margin-right: -<?php echo $pad ?>px;
  padding-left: <?php echo $pad * 2 ?>px;
  padding-right: <?php echo $pad * 2 ?>px;
}

/**
* @group Navigation
*/
.sidebar{
  position: fixed;
  top: 0;
  left: 0;
  margin-right: 20px;
  height: 100%;
  z-index: 1024;
  width: <?php echo $controlbar_width;?>px;
}

.sidebar a{
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.77);

}

.controlbar{
  background-color: #232325;
  text-align: center;
  height: 100%;
  width: <?php echo $controlbar_width;?>px;
  z-index: 10001;
  position: absolute;
  padding:<?php echo "$pad_str 0 $pad_str 0" ?>;
}

.controlbar a{
  font-size: 25px;
}

.controlbar .top{}

.controlbar .bottom{
  position: absolute;
  bottom: <?php echo $pad_str ?>;
  width: inherit;
}

.navbar{
  width: <?php echo $navbar_width;?>px;
  height: 100%;
  background-color: #424242;
  padding:<?php echo $pad_str ?>;
  position: absolute;
  left: -125px;
  top: 0px;
  z-index: 1000;
  box-shadow: #000 0px 0px 20px -3px;
}

.navbar a.list-group-item{
  display: block;
  margin: 15px 0 15px 0;
  font-size: 25px;
  opacity: 0.5;
}

.navbar a.list-group-item.active{
  opacity: 1;
}

.navbar a span.glyphicon{
  margin-right: 10px;
}

#section2{
  background-color: navy;
}


/**
* @group Animation
*/
.navbar,
body{
  -webkit-transition: all .25s ease-out;
  -moz-transition: all .25s ease-out;
  transition: all .25s ease-out;
}

/**
* @group Open Sidebar
*/
body.open-nav{
  padding-left: <?php echo $sidebar_width;?>px;
}

body.open-nav .sidebar{
  width:  <?php echo $sidebar_width;?>px;
}

body.open-nav .navbar{
  top: 0;
  left: 75px;
}

/**
* @group Home
*/

section#section-home{
  height: 100%;
}

section#section-home .jumbotron {
  height: 80%;
  position: relative;
  overflow: hidden;
}

section#section-home .jumbotron #keyboard.outline{
  top: -30px;
}


section#section-home .jumbotron #mouse.outline{
  margin-left: 800px;
  margin-top: 115px;
}

section#section-home .jumbotron #usb.outline{
  margin-left: 50px;
  top: 290px;
}

section#section-home .jumbotron #iphone.outline{
  right: 50px;
  top: 100px;
}

section#section-home .jumbotron #pad.outline{
  right: 400px;
  top: 100px;
}

section#section-home .jumbotron #pen.outline{
  right: 300px;
  top: 200px;

}

section#section-home .jumbotron .outline{
  position: absolute;
/*  -webkit-filter: drop-shadow(2px 5px 2px rgba(0,0,0,0.5));
  -moz-filter: drop-shadow(2px 5px 2px rgba(0,0,0,0.5));
  -ms-filter: drop-shadow(2px 5px 2px rgba(0,0,0,0.5));
  -o-filter: drop-shadow(2px 5px 2px rgba(0,0,0,0.5));
  filter: drop-shadow(2px 5px 2px rgba(0,0,0,0.5));*/

}

section#section-home .jumbotron{
  background-color: <?php echo $primary_color;?>
}

/**
* Mobile
*/

@media (max-width:768px) {
  .sidebar{
    height: 50px;
    top: 0;
    padding-left: 0;
    width: 100%;
    margin-left: 0;
  }

  .navbar{
    width: 100%;
    height: auto;
    left: 0;
    top:-500px;
  }

  .controlbar .btn{
    display: inline-block;
  }

  .controlbar{
    height: 50px;
    width: 100%;
    padding: 10px;
  }


  .controlbar .top{
    float: right;
  }

  .controlbar .bottom{
    float: left;
    position: relative;
    width: auto;
    bottom: 0;
  }

  body{
    padding-left: 0;
    padding-top: 50px;
  }


  body.open-nav #main {
    padding-left: 0px;
    padding-top: 500px;
  }

  body.open-nav .navbar {
    top: 50px;
    left: 0;
  }

  body.open-nav .navbar{
    top: 50px;
    left: 0;
  }

  body.open-nav .sidebar{
    width:  100%;
  }




}
