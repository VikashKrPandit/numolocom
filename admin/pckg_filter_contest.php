<option selected>Select Question</option>
<?php 
include('include/security.php');
if(isset($_POST['pkg_id'])){
    $pkg_id= $_POST['pkg_id'];
    $getFees = $conn->query("select id,question from fees_master where pkg_id='$pkg_id' and contest_id=0");
    if(mysqli_num_rows($getFees)>0){
    ?>
	
		<?php 
		while($getFeesRes = $getFees->fetch_assoc()) { ?>

		<option value="<?php echo $getFeesRes['id']; ?>"><?php echo $getFeesRes['question']; ?></option>							        	
										
	<?php }
    }
}

?>