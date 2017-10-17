<?php
$page_title="DashBoard";
include_once '../partials/adminHead.php';



//If checkout was requested
if (isset($_GET['checkout'])) {
	//get request	
	$user_id = $_GET['user_id'];
	$cabin_id =$_GET['cabin_id'];

	if($_SESSION['role'] == 0 ){ //if logged in user is an admin
		$sql = "DELETE FROM cabin_booking WHERE cabin_id= :cabin_id AND user_id =:user_id";
		$statement = $db -> prepare($sql);
		$statement -> execute(array(':cabin_id'=>  $cabin_id, ':user_id'=>$user_id));
		if ($statement->rowCount() == 1) {
			echo $result= "<script type='text/javascript'>
                    swal({
                        title:\"Success\",
                        text: \"Checkout Completed\",
                        type:\"success\"},function() {
                            window.location.href='bookings.php';       
                         });
                                       
                </script>";
		}else{// if unsuccessful
			echo $result= "<script type='text/javascript'>
                    swal({
                        title:\"Error\",
                        text: \"The Checkout was unsuccessful\",
                        type:\"error\"},function() {
                            window.location.href='booking.php';       
                         });
                                       
                </script>";
		}


	}else{ // if not admin
		echo "<h1>ONLY ADMINS CAN DO THIS. Yeah Nice try!</h1>";
	}
}







?>
<?php if (isset($_GET['modify'])): ?>

	<?php include_once 'html/modify_booking.php'; ?>

<?php else: ?>
<div class="panel panel-default">
  <div class="panel-heading"><h4>BOOKINGS</h4></div>
  <div class="panel-body">
  	<div class="row">
  		<table class="table table-bordered table-highlight table-responsive datatable">
  			<thead>
  				<tr>
  					<th>CABIN NAME</th>
  					<th>CABIN TYPE</th>
  					<th>LOCATION</th>
  					<th>BOOKED BY</th>
  					<th>TIME</th>
  					<th>BOOKING TYPE</th>  	
  					<th> ACTION </th>				
  				</tr>
  			</thead>
  			<tbody>
  				<!-- <tr>
  					<td>CABIN NAME</td>
  					<td>Luxury</td>
  					<td>Scotland</td>
  					<td>Safayat Jamil</td>
  					<td>TIME</td>
  					<td>BOOKING TYPE</td>
  					<td><a href="prices.php?checkout=5&user_id=3&cabin_id=5" onclick="return confirm('are you sure?');" class="del_cat btn btn-danger"> Checkout</a><a href="prices.php?modify=1&user_id=3&cabin_id=5" class="del_cat btn btn-info"> Modify</a></td>
  				</tr> -->
  				<?php printAllBookingsTable($db); ?>
  			</tbody>
  		</table>
  	</div>
  </div>
</div>


<?php endif ?>				
<?php
include_once '../partials/adminFooter.php';
?>