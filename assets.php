<?php
function top($title, $pagename) 
{  ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Josh Gordon">

    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append ‘#!watch’ to the browser URL, then refresh the page. -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/favicon.png">
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>

  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
          <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="http://joshgordon.net">Josh Gordon</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li <?php if ($pagename == "home") echo "class=\"active\""; ?>> <a href="index.php">Home</a> </li>
                <li <?php if ($pagename == "links") echo "class=\"active\""; ?>> <a href="links.php">Links</a> </li> 
                <li <?php if ($pagename == "map") echo "class=\"active\""; ?>> <a href="map.php">Map</a> </li> 
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li> <a href="http://blog.joshgordon.net">Blog</a> </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social<strong class="caret"></strong></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="https://www.facebook.com/josh.gordon1">Facebook</a>
                    </li>
                    <li>
                      <a href="https://plus.google.com/+JoshGordon0/">Google+</a>
                    </li>
                    <li>
                      <a href="https://github.com/joshgordon/">Github</a>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>
            
          </nav>

<?php } 

function bottom() {  ?> 
       </div>
      </div>
    </div>
  </body>
</html>

<?php } ?>  
