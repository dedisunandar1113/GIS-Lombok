<?php
// Create database connection using config file
include_once("admin/config.php");

// Fetch all users data from database

$id = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM lokasi where id='$id'");

$result1 = mysqli_query($con, "SELECT * FROM lokasi");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>GIS App Lombok</title>
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
                <a class="navbar-brand" href="index.php">Lombok GIS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="browse.php">Browse</a>
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
                        <a href="#">About</a>
                    </li>

                </ul>
                <p class="navbar-text">Signed in</p>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Signed in</p></li>
                    <li>
                        <a href="#">Login</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="map-canvas" ></div>
        <div class="visible-lg visible-md">

            <div id="sidemenu" class="well">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="#special" data-toggle="tab">Layanan Publik Terdekat</a>
                    </li>
                    <li class="active">
                        <a href="#other" data-toggle="tab">Other Point</a>
                    </li>

                </ul>

                <div class="list-group point-list-view">
                <?php  
                    while($data = mysqli_fetch_array($result1)) {  
                    ?>
                    <a href="point_map.php?id=<?php echo $data['id']; ?>"class="list-group-item point-item"> <h4 class="list-group-item-heading" ><?php echo $data['nama']; ?></h4>
                    <p class="list-group-item-text">
                        <?php echo $data['kecamatan']; ?>
                    </p> </a>
                <?php } ?>
                  
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

 <?php  
                    while($data = mysqli_fetch_array($result)) {  
                    ?>

        <script>
			function map_init() {
                var longitude=3.8;
                var latittude=8.3;


                longitude = <?php echo $data['longitude']; ?>;
                latittude = <?php echo $data['latittude']; ?>;
				var mapOptions = {
					center : new google.maps.LatLng(latittude, longitude),
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
          <?php              
            }
        ?>
    </body>
</html>
