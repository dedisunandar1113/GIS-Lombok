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
        <title>GIS App Lombok - Extended Template by Bale IT Solutions</title>
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
                        <a href="#">About</a>
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

        <div class="modal fade" id="point-info-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Place Infor</h4>
      </div>
      <div class="modal-body">
          <img data-src="holder.js/200x200" class="pull-left margin-right-10" />
        <p>Place Description</p>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">          
        <button type="button" class="btn btn-default">More Info</button>
<button type="button" class="btn btn-default">View Gallery</button>
        <button type="button" class="btn btn-default">Show in Map</button>
        <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

        <div class="col-xs-12 col-md-3">
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
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#other" data-toggle="tab">Other Point</a>
                        </li>
                        <li>
                            <a href="#special" data-toggle="tab">Special Point</a>
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
                    </div>
                </div>
            </div>
        </div>
         <?php  
                    while($data = mysqli_fetch_array($result)) {  
                    ?>
        <div class="col-xs-12 col-md-9">

            <div class="row point-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><?php echo $data['alamat']; ?></h4>
                    </div>
                    <div class="panel-body">
                        
                       <blockquote>
                           <p>Berita hari ini</p>
                           <p></p>
                       </blockquote>
                        <p> 
                            Selong Kota adalah salah satu kelurahan yang terletak di Kecamatan Selong, Kabupaten Lombok Timur, Provinsi Nusa Tenggara Barat, Indonesia. Kelurahan ini memiliki kodepos 83619.
                            Kelurahan ini adalah ibu kota dari Kabupaten Lombok Timur dan Kecamatan Selong.

                             
                        </p>
                        <p>
                            Luas    81,25 km²
                            Jumlah penduduk 82.505 jiwa (2010)
                            Kepadatan   1.015,45 jiwa/km²
                            Desa/kelurahan  12.
                          
                            Secara geografis Selong terletak pada 8°38'S 116°32'E dengan luas daerah sekitar 81,25 km².                                      
                        </p>
                        <address>
                            <strong>Twitter, Inc.</strong>
                            <br>
                            795 Folsom Ave, Suite 600
                            <br>
                            San Francisco, CA 94107
                            <br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                        <address>
                            <strong>Full Name</strong>
                            <br>
                            <a href="mailto:#">first.last@example.com</a>
                        </address>

                        <div id="point-gallery-slide" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#point-gallery-slide" data-slide-to="0" class="active"></li>
                                <li data-target="#point-gallery-slide" data-slide-to="1"></li>
                                <li data-target="#point-gallery-slide" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="image/bukitselong.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Gallery Caption #1</h3>
                                        <p>
                                            Gallery Desc #1
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="image/beach.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Gallery Caption #2</h3>
                                        <p>
                                            Gallery Desc #2
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="image/masjid agung.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Gallery Caption #3</h3>
                                        <p>
                                            Gallery Desc #3
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="image/tugu.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Gallery Caption #4</h3>
                                        <p>
                                            Gallery Desc #4
                                        </p>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- Controls -->
                            <a class="left carousel-control" href="#point-gallery-slide" data-slide="prev"> <span class="icon-prev"></span> </a>
                            <a class="right carousel-control" href="#point-gallery-slide" data-slide="next"> <span class="icon-next"></span> </a>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <a href="point_gallery.html" class="btn btn-default">View All Gallery</a>
                        <a href="point_map.php" class="btn btn-default">Show In Map</a>

                    </div>
                </div>
            </div>

        </div>
        
        <?php } ?>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
    </body>
</html>
