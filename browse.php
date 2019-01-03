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
        <title>GIS App Lombok - Extended Template by Bale It Solutions</title>
        <meta name="author" content="luckynvic@gmail.com">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.default.css" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-default nav-fixed-top" role="navigation">
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
                    <li >
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
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
                       <a href="about.html">About</a>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Signed in</p></li>
                    <li>
                        <a href="#">Login</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div class="col-xs-12 col-md-4">
            <div class="well">
                <form class="form-inline" role="form">
                    <div class="form-group ">
                        <label class="sr-only" for="searchText">Search</label>
                        <input type="text" class="form-control input-sm" id="searchText" placeholder="Search Location">
                    </div>
                    <button type="submit" class="btn btn-default btn-sm">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                    <button class="btn btn-default btn-sm">
                        <i class="glyphicon glyphicon-filter"></i> Filter
                    </button>
                </form>

                <div class="divider10"></div>
                <div class="hidden-xs hidden-sm">
                    <h4>Wisata Lombok</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item "> <h4 class="list-group-item-heading" >Beach</h4>
                        <p class="list-group-item-text">
                            Lombok Island
                        </p> </a>
                        <a href="#" class="list-group-item"> <h4 class="list-group-item-heading" >Hotel</h4>
                        <p class="list-group-item-text">
                            Lombok Island
                        </p> </a>
                        <a href="#" class="list-group-item "> <h4 class="list-group-item-heading" >Budaya</h4>
                        <p class="list-group-item-text">
                            Lombok Island
                        </p> </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="row">
            <?php  
                    while($data = mysqli_fetch_array($result)) {  
                    ?>

                <div class="col-sm-6 col-md-5 col-lg-4 point-item-thumbnail">
                    <div class="thumbnail">
                        <img src="image/<?php echo $data['gambar']; ?>" alt="...">
                        <div class="caption">
                            <h3><?php echo $data['nama']; ?></h3>
                            <p>
                                <?php echo $data['kecamatan']; ?>
                            </p>
                            <p>
                                <a href="point_more.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">More Info</a>
                                <a href="point_map.php" class="btn btn-default"><i class="glyphicon glyphicon-flag"></i> Find In Map</a>
                            </p>
                        </div>
                    </div>
                </div>

               <?php } 
               ?>
             
            </div>
            <div class="row">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="browse1.html">2</a>
                    </li>
                    <li>
                        <a href="browse2.html">3</a>
                    </li>
                    <li>
                        <a href="browse3.html">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
    </body>
</html>
