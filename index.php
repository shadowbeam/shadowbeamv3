<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shadowbeam v3.0</title>

  <!-- Bootstrap -->
  <link href="css/font.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.php" rel="stylesheet">

  <link rel="stylesheet" href="http://i.icomoon.io/public/temp/b68054dcac/ShadowbeamV3/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <div class="sidebar">
       <div class="controlbar" role="navigation">
        <div class="top">
          <a class="btn"  data-toggle="open-nav">
            <span class="glyphicon glyphicon-align-justify"></span>
          </a>
        </div>   
        <div class="bottom">
          <a class="btn nav-up"><span class="glyphicon glyphicon-arrow-up"></span></a>
          <a class="btn nav-down"><span class="glyphicon glyphicon-arrow-down"></span></a>
        </div>
      </div><!-- /.controlbar -->

      <div id="navbar" class="navbar" role="navigation">
        <a href="#section-home" class="list-group-item active"><span class="glyphicon glyphicon-home"></span>Home</a>
        <a href="#section-projects" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span>Projects</a>
        <a href="#section-running" class="list-group-item"><span class="glyphicon glyphicon-time"></span>Running</a>
        <a href="#section-music" class="list-group-item"><span class="glyphicon glyphicon-music"></span>Music</a>
        <a href="#section-gigs" class="list-group-item"><span class="glyphicon glyphicon-volume-up"></span>Gigs</a>
        <a href="#section-photos" class="list-group-item"><span class="glyphicon glyphicon-camera"></span>Photos</a>
        <a href="#section-contact" class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>Contact</a>
      </div><!-- /.navbar -->

    </div><!-- /.sidebar -->


    <section id="section-home" class='section'>

      <div class="jumbotron full-width">
        <h1>Allan Watson</h1>
        <p>Computer Science (MEng). Runner. Web Designer. </p>

        <img id="keyboard" class="outline" src="img/keyboard2.png"/>
        <img id="iphone" class="outline hidden-xs" src="img/iphone.png"/>
        <img id="pad" class="outline hidden-sm hidden-xs" src="img/pad.png"/>
        <img id="pen" class="outline hidden-sm hidden-xs" src="img/pen.png"/>
        <img id="usb" class="outline " src="img/usb.png"/>
        <img id="mouse" class="outline" src="img/mouse.png"/>


      </div>

      <div class="social">

        <div class="col-xs-6 col-sm-2">
          <a href="https://www.facebook.com/watson.allan"><span class='icon-facebook'></span></a>
        </div>

        <div class="col-xs-6 col-sm-2 pull-right">     
         <a id="more-social-btn" href="#"><span class='icon-plus'></span></a>
       </div>

       <div class="col-xs-6 col-sm-2">     
         <a href="https://www.linkedin.com/profile/view?id=52957269"><span class='icon-linkedin'></span></a>
       </div>






      <div class="col-xs-6 col-sm-2"> 
        <a href="#"><span class='icon-github'></span></a>
      </div>

           <div class="col-xs-6 col-sm-2">
        <a href="https://twitter.com/shadowbeam_"><span class='icon-twitter'></span></a>
      </div>

       <div class="col-xs-6 col-sm-2"> 
        <a href="https://secure-nikeplus.nike.com/plus/profile/shadowbeam/"><span class='icon-nike'></span></a>
      </div>

      <div class="col-xs-6 col-sm-2">       
        <a href="https://plus.google.com/u/0/110066024819374028528/posts"><span class='icon-googleplus'></span></a>
      </div>

      <div class="col-xs-6 col-sm-2">    
        <a href="http://www.last.fm/user/shadowbeam"><span class='icon-lastfm'></span></a>
      </div>

      <div class="col-xs-6 col-sm-2">    
        <a href="https://play.spotify.com/user/shadowbeam"><span class='icon-spotify'></span></a>
      </div>

      <div class="col-xs-6 col-sm-2"> 
        <a href="https://www.songkick.com/users/shadowbeam"><span class='icon-songkick'></span></a>
      </div>

      <div class="col-xs-6 col-sm-2"> 
        <a href="http://www.instagram.com/shadowbeam"><span class='icon-instagram'></span></a>
      </div>






    </div>



  </section><!--/section-->



  <section id="section-projects" class='section'>



    <div class="jumbotron full-width">
      <h1>Projects</h1>
      <p>Portfolio of designs, projects and websites I've worked on.</p>
    </div>
    <div id="project-previews" class="row">

     <?php $files = glob('img/preview/*.{jpg,png,gif}', GLOB_BRACE);
     foreach($files as $file) {?>

     <div class="col-6 col-sm-6 col-lg-4">

      <div class="preview">
        <div class="bar"></div>
        <div class="content">
          <img src="<?php echo $file; ?>"/>
          <div class="button">
            <a class="btn" href="#">Website Name</a></div>          </div>

          </div>

        </div><!--/span-->

        <?php }?>




      </section><!--/section-->

      <section id="section-running" class='section one-page'>
        <div class="jumbotron full-width">
          <h1>Running!</h1>
          <p>I enjoy keeping fit by running with my iPhone and nike+</p>
        </div>

        <div id="map"></div>

      </section>

      <section id="section-music" class='section'>
        <div class="jumbotron full-width">
          <h1>Music</h1>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus</p>
        </div>

      </section>

      <section id="section-gigs" class='section'>
        <div class="jumbotron full-width">
          <h1>Gigs</h1>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus</p>
        </div>

      </section>




      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

      <script src="js/offcanvas.js"></script>
      <script src="js/special-scroll.js"></script>
      <script src="http://maps.google.com/maps/api/js?key=AIzaSyBBW7JQh1bIBEgmF1a7vaa4F8VXIAYvdto&sensor=true"></script>
      <script src="js/nike.js"></script>



    </body>
    </html>