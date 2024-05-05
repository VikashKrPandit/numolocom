<?php 
require("admin/include/conn.php");

// get app details
$getPPQuery   = $conn->query("select * from tbl_configuration where id=1"); 
$getPPRes = $getPPQuery->fetch_assoc();

?>
<!doctype html>
<html class="no-js" lang="en">
	<?php include("include/header.php"); ?>
        <!-- Start Bottom Header -->
        <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline text-center">
                                <h3>Privacy Policy</h3>
                            </div>
                            <ul>
                                <li class="home-bread">Home</li>
                                <li>Privacy Policy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Header -->
        <!-- Start terms area -->
        <div class="terms-area area-padding">
            <div class="container">
               <!-- <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h3>Terms & Conditions</h3>
							<p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p>
						</div>
					</div>
				</div> -->
                <div class="row">
                    <!-- Start Column Start -->
                    <div class="col-md-12">
                        <?php echo $getPPRes['privacy']; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End terms area -->
        <!-- Start Footer Area -->
        <?php include("include/footer.php"); ?>
        <!-- End Footer Area -->
		
		<!-- all js here -->

		<!-- jquery latest version -->
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
		<!-- bootstrap js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- magnific js -->
        <script src="js/magnific.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- Form validator js -->
		<script src="js/form-validator.min.js"></script>
		<!-- plugins js -->
		<script src="js/plugins.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
	</body>
</html>