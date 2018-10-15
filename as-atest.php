<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  
?>
<?php include "as-config.php";?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>BenchMark Academy</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<style>
		.all_subpackage{
			height:100px;
			width:150px;
			background-color:#943bea;
			color:white;
			border:#9E8FEF;
				
		}
		#btn{
			height:100px;
		}
	</style>
	
</head>
<body onload="fun()">

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    BenchMark Academy
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profiles</p>
                    </a>
                </li>
                <li>
                    <a href="table.php">
                         <i class="pe-7s-news-paper"></i>
                        <p>Create Package</p>
                    </a>
                </li>
                <li>
                    <a href="typography.php">
						 <i class="pe-7s-note2"></i>
                        <p>Set Questions</p>
                    </a>
                </li>
                <li>
                    <a href="icons.php">
                        <i class="pe-7s-trash"></i>
                        <p>Delete Questions</p>
                    </a>
                </li>
                <li>
                    <a href="maps.php">
                        <i class="pe-7s-cash"></i>
                        <p>Package Attributes</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
                        <i class="pe-7s-bell"></i>
                        <p>About Package</p>
                    </a>
                </li>
				<li>
                    <a href="logout.php?logout=1">
                        <i class="pe-7s-power"></i>
                        <p>Log out</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
							<div class="header">
									<h4><?php 
										if(isset($_POST["set_packagetest"])){
											$_SESSION['test_name'] = $_POST["set_packagetest"];
										}
										echo '<strong>'."Package:".$_SESSION['test_name']; ?></strong></h4>
							</div>
                            
                            <div class="content table-responsive table-full-width">
								
								<div class="row">
									<div class="col-md-12">	
										<div class="col-md-10">
											<form action='as-deleteques.php' method= 'post'>				
												<input type = 'hidden' value="<?php echo $_SESSION['test_name']; ?>"  class="all_subpackage" >
												<input type = 'submit' value="All-Questions"  class="all_subpackage" >
											</form>
											<br/>
										</div>	
										<div class="col-md-2">
											<a href="icons.php"><input type = "button"  class=" col-md-12 btn btn-info" value = "Back"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
                        <div class="card">
							<div class="header">
									<h4><strong>All subpackages:</strong></h4>
							</div>
                            
                            <div class="content table-responsive table-full-width">
								<div class="row">
								
									<div class="col-md-12">
										<?php
											
										
											$sql = "SELECT * FROM `as_subpackage` WHERE package = '".$_SESSION["test_name"]."'";
											$result = $conn->query($sql);
												while($row = $result->fetch_assoc()) { ?>
													<div class="col-md-3">
														<form action='as-subquesdelete.php' method= 'post'>	
															<input type = 'submit' class ='all_subpackage' name = 'all_subpackage' value = <?php echo $row["subpackage"] ; ?>>
														</form>
														<br/>
													</div>	
										<?php   } ?>	
									</div>
								</div>
								
						
								
								
								
								
									
								
							</div>
						</div>
					
					</div>
					
					
				</div>
				

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">BenchMark Academy</a>
                </p>
            </div>
        </footer>


    </div>
	
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
	


</html>

