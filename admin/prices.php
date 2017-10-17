<?php
$page_title="Places";
$result ='';
include_once('../partials/adminHead.php');




//Programming Starts
if(isset($_POST['priceAddBtn'])){ //if category add requested

	//Get all data
	$cabin_id = $_POST['cabin_id'];
	$price =$_POST['price'];
	$date_start =$_POST['date_start'];
	$date_end = $_POST['date_end'];
	
	try {
		$sql = 'INSERT INTO prices (cabin_id, price, date_start, date_end) VALUES(:cabin_id, :price, :date_start, :date_end)';
		$statement = $db -> prepare($sql);
		$statement -> execute(array(':cabin_id' => $cabin_id, ':price' => $price, ':date_start'=>$date_start, ':date_end'=>$date_end));
		if($statement -> rowCount() == 1){
		?>
		<script type="text/javascript">
		 	swal({
	            title:"Success",
	            text: "The Price / offer has been added successfully",
	            type:"success"}).then(function() {
                            window.location.href='prices.php';
                         }, function(dismiss){

                    });
		 </script>
	<?php
		}else{
			?>
			<script type="text/javascript">
		 	swal({
	            title:"Operation Failed",
	            text: "Please try again. If the problem Persists contact dev",
	            type:"error"},function() {
	                window.location.href='prices.php?add=1';       
             });
		 </script>
			<?php
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

} // End if add categoryy

if(isset($_POST['catUpdateBtn'])){ //if category Update requested
	$id = $_POST['id'];
	//Get all data
	$cabin_id = $_POST['cabin_id'];
	$price =$_POST['price'];
	$date_start =$_POST['date_start'];
	$date_end = $_POST['date_end'];
	try {
		$sql = 'INSERT INTO prices (cabin_id, price, date_start, date_end) VALUES(:cabin_id, :price, :date_start, :date_end)';
		$statement = $db -> prepare($sql);;
		$statement -> execute(array(':cabin_id' => $cabin_id, ':price' => $price, ':date_start'=>$date_start, ':date_end'=>$date_end,':id'=>$id));
		if($statement -> rowCount() == 1){
		?>
		<script type="text/javascript">
		 	swal({
	            title:"Success",
	            text: "The Price has been Updated successfully",
	            type:"success"}).then(function() {
                            window.location.href='prices.php';
                         }, function(dismiss){

                    });
		 </script>
	<?php
		}else{
			?>
			<script type="text/javascript">
		 	swal({
	            title:"Operation Failed",
	            text: "Please try again. If the problem Persists contact dev",
	            type:"error"},function() {
	                window.location.href='prices.php?add=1';       
             });
		 </script>
			<?php
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

} // End if Update categoryy
// Get category names
function printPlacestd($db){
	try {
		$sql= 'SELECT * FROM prices WHERE regular = 0';
		$statement = $db-> prepare($sql);
		$statement -> execute();
		$html="";
		$i =1;
		while ($row = $statement->fetch()) {

			$html .= '<tr>';
      		$html .= '<td>'.$row['cabin_id'].'</td>';
        	$html .= '<td>'.getCabinNameOf($db, $row['cabin_id']).'</td>';
        	$html .= '<td>'.$row['price'].'</td>';
        	$html .= '<td>'.$row['date_start'].'</td>';
        	$html .= '<td>'.$row['date_end'].'</td>';
        	$html .= '<td><a href="prices.php?del='.$row['id'].'" onclick="return confirm(\'are you sure?\');" class="del_cat btn btn-danger"> <i class="fa fa-trash"></i></a><a href="prices.php?edit='.$row['id'].'" class="del_cat btn btn-info"> <i class="fa fa-pencil"></i></a></td>
      </tr>';
      $i++;
		}

		echo $html;
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}


//If delete was requested
if (isset($_GET['del']) != '') {
	//get request
	$id = $_GET['del'];

	if($_SESSION['role'] == 0 ){ //if logged in user is an admin
		$sql = "DELETE FROM prices WHERE id= :id";
		$statement = $db -> prepare($sql);
		$statement -> execute(array(':id'=>  $id));

		if ($statement->rowCount() == 1) {
			echo $result= "<script type='text/javascript'>
                    swal({
                        title:\"Success\",
                        text: \"The Price / Offer has been deleted\",
                        type:\"success\"}).then(function() {
                            window.location.href='prices.php';
                         }, function(dismiss){
                    });
                                       
                </script>";
		}else{// if unsuccessful
			echo $result= "<script type='text/javascript'>
                    swal({
                        title:\"Success\",
                        text: \"The Price/Offer has been deleted\",
                        type:\"success\"}).then(function() {
                            window.location.href='prices.php';
                         }, function(dismiss){
                    });
                                       
                </script>";
		}


	}else{ // if not admin
		echo "<h1>ONLY ADMINS CAN DO THIS. Yeah Nice try!</h1>";
	}
}



?>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body padding-top">
                    <div class="panel panel-default">
                    <?php IF (isset($_GET['add'])=='1') :?>
                    
					  <?php include_once 'html/add_price.php'; ?>
					<?php ELSEIF (isset($_GET['edit'])=='1') :?>
						<?php include_once 'html/edit_price.php';?>	
					<?php ELSE: ?>
						<div class="panel-heading">All Places</div>
							<div class="panel-body">
							 <table class="table datatable table-bordered table-responsive">
							    <thead>
							      <tr>
							      	<th>Cabin ID</th>
							        <th>Cabin Name</th>
							        <th>Special Price</th>
							        <th>Valid From</th>
							        <th>Valid To</th>
							        <th>Action</th>
							      </tr>
							    </thead>
							    <tbody>
							      
							      <?php printPlacestd($db);?>      
							    </tbody>
							 </table>
							</div> <!-- END panel body -->
											
					
					<?php ENDIF?>
					</div>
                </div>
        </div>

<?php
echo $result;
include_once('../partials/adminfooter.php');
?>