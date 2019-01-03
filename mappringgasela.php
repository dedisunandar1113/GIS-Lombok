<?php
// Create database connection using config file
include_once("admin/config.php");

// Fetch all users data from database
$result = mysqli_query($con, "SELECT * FROM lokasi ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>GIS App Lombok - Extended Template by Bale IT Solutions</title>
        <meta name="author" content="luckynvic@gmail.com">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <link href="ext/customScroll/css/jquery.mCustomScrollbar.css" rel="stylesheet">
        <link href="css/style.default.css" rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    </head>
    <body>
        <nav class="navbar navbar-default nav-fixed-top" role="navigation" id="app-nav-bar" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Lombok GIS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="browse.html">Browse</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Application<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Setting</a>
                            </li>
                            <li>
                                <a href="#">Manage User</a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Point</a>
                            </li>
                            <li>
                                <a href="#">Category</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>

                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Signed in</p></li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="map-canvas" ></div>
        <div class="visible-lg visible-md">
            <div id="search-box">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="searchText">Search</label>
                        <input type="text" class="form-control input-sm" id="searchText" placeholder="Search Location">
                    </div>
                    <button type="submit" class="btn btn-default btn-sm">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </form>
            </div>
            <div id="sidemenu" class="well">
                <div class="btn-group btn-group-justified btn-group-sm">
                    <a class="btn btn-default"> <i class="glyphicon glyphicon-fullscreen"></i> Fit in Window </a>
                    <a class="btn btn-default"> <i class="glyphicon glyphicon-filter"></i> Filter </a>
                </div>
                <div class="divider10"></div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a>Sort By</a>
                    </div>
                </div>
                <div class="list-group point-list-view">
                <?php  
                    while($data = mysqli_fetch_array($result)) {  
                    ?>
                    <a href="mappringgasela.php"class="list-group-item point-item"> <h4 class="list-group-item-heading" ><?php echo $data['nama']; ?></h4>
                    <p class="list-group-item-text">
                        <?php echo $data['kecamatan']; ?>
                    </p> </a>
                    <?php              
                    }
                    ?>
                </div>

            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="ext/customScroll/js/jquery.mCustomScrollbar.min.js"></script>
        <script src="ext/customScroll/js/jquery.mousewheel.min.js"></script>
        <script src="js/application.js"></script>

        <script>
            function map_init() {
                var mapOptions = {
                    center : new google.maps.LatLng(-8.688905, 116.567095),
                    zoom : 15,
                    mapTypeId : google.maps.MapTypeId.ROADMAP,
                    mapTypeControlOptions : {
                        position : google.maps.ControlPosition.RIGHT_TOP,
                        style : google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    zoomControlOptions : {
                        position : google.maps.ControlPosition.RIGHT_BOTTOM
                    },
                    panControlOptions : {
                        position : google.maps.ControlPosition.RIGHT_BOTTOM
                    }
                };

                EGMap0 = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
                // default map type
                EGMap0.mapTypeControlOptions.mapTypeIds = ['roadmap', 'satellite', 'hybrid', 'terrain'];

            }


            google.maps.event.addDomListener(window, "load", map_init);

            (function($) {

                $(".point-list-view").mCustomScrollbar({
                    scrollButtons : {
                        enable : true
                    },
                    theme : 'dark-thick',
                    contentTouchScroll : true
                });

            })(jQuery);
        </script>
    </body>
</html>
