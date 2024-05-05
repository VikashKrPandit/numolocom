<?php 
include('include/security.php');
if(isset($_POST['pkg_id'])){
    $pkg_id= $_POST['pkg_id'];
    $getFees = $conn->query("select f.*, p.pkg_name from fees_master as f left join tbl_packages as p on p.id=f.pkg_id having f.pkg_id='$pkg_id'");
    if(mysqli_num_rows($getFees)>0){
    ?>
											<table id="example" class="datatable-table table-hover table table-separate dataTable dtr-inline" style="width:100%">
											      
												  		<thead>
														  <tr>
														  <th>ID</th>
														  <th>Package</th>
														  <th>Question</th>
														  <th>Answer</th>
														  <th>Price</th>
														  <th>No of Winner</th>
														  <th>No of Ticket</th>
														  <th>Action</th>
														  </tr>
													  </thead>
        											<tbody>
											        	<?php while($getFeesRes = $getFees->fetch_assoc()) { ?>
											        	<tr>
											        		<td><?php echo $getFeesRes['id']; ?></td>
											        		<td><?php echo $getFeesRes['pkg_name']; ?></td>
											        		<td><?php echo $getFeesRes['question']; ?></td>
															<td><?php echo $getFeesRes['answer_key']; ?></td>
											        		<td><?php echo $getFeesRes['price']; ?></td>
											        		<td><?php echo $getFeesRes['no_of_winners']; ?></td>
											        		<td><?php echo $getFeesRes['no_of_tickets']; ?></td>
															<td><a href="fees-master?uid=<?php echo $getFeesRes['id']; ?>" title="Update" class="mr-5" ><i class="far fa-edit"></i></a>
																	 &nbsp;&nbsp;
																	 <a href="fees-master?did=<?php echo $getFeesRes['id']; ?>" title="Delete" class="mr-5" onclick="return checkDelete()"><i class="fas fa-times-circle"></i></a>
																	 	 &nbsp;&nbsp;<a href="prizepool-master?fid=<?php echo $getFeesRes['id']; ?>" title="prize pool" class="mr-5"><i class="fas fa-external-link-alt"></i></a>
																		  &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#myModal" data-fid="<?php echo $getFeesRes['id']; ?>" data-efee="<?php echo $getFeesRes['price']; ?> " class="addparti mr-5"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			        <polygon points="0 0 24 0 24 24 0 24"/>
																			        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																			        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																			    </g>
																			</svg></span></a>
																			&nbsp;&nbsp;<a href="#" data-toggle="modal" title="Status" data-target="#myModal2" data-qid="<?php if(isset( $getFeesRes['id'])){ echo $getFeesRes['id']; }  ?>" data-endDate="<?php if(isset( $getFeesRes['endDate'])){ echo $getFeesRes['endDate']; }  ?>" data-endTime="<?php if(isset( $getFeesRes['endTime'])){ echo $getFeesRes['endTime']; }  ?>" class="qStatus"><i class="fas fa-calendar-alt"></i></a>
																			&nbsp;&nbsp;<a href="#" data-toggle="modal" title="Answer Key" data-target="#myModal3" data-qid="<?php if(isset( $getFeesRes['id'])){ echo $getFeesRes['id']; }  ?>" class="qAnsKey"><i class="fa fa-reply"></i></a>
																			&nbsp;&nbsp;<i class="fa fa-circle <?php if( (int)$getFeesRes['status']==2) {echo 'deactivateQuestion';}elseif((int)$getFeesRes['status']==1){echo 'activeQuestion';} else{echo 'activeQuestion';} ?>" aria-hidden="true" id="questionStat"></i>
																			
																		</td>
											        	</tr>
											        	<?php } ?>
											        </tbody>
													</table>
        
   
<?php 
    }
}

?>