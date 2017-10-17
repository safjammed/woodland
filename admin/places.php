<?php
$page_title="Places";
$result ='';
include_once('../partials/adminHead.php');




//Programming Starts
if(isset($_POST['catAddBtn'])){ //if Place add requested

	//Get all data
	$cat_name = $_POST['cat_name'];
	$cat_desc = $_POST['cat_desc'];
	$cat_slug = trim($_POST['cat_slug']);
	try {
		$sql = 'INSERT INTO places (cat_name, cat_desc, cat_slug) VALUES(:cat_name, :cat_desc, :cat_slug)';
		$statement = $db -> prepare($sql);
		$statement -> execute(array(':cat_name' => $cat_name, ':cat_desc' => $cat_desc, ':cat_slug' => $cat_slug));
		if($statement -> rowCount() == 1){
		?>
		<script type="text/javascript">
		 	swal({
	            title:"Success",
	            text: "The Place has been added successfully",
	            type:"success"}).then(function() {
                            window.location.href='places.php';
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
	                window.location.href='places.php?add=1';       
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
	$cat_name = $_POST['cat_name'];
	$cat_desc = $_POST['cat_desc'];
	$cat_slug = trim($_POST['cat_slug']);
	try {
		$sql = 'Update places SET cat_name = :cat_name, cat_desc = :cat_desc, cat_slug = :cat_slug WHERE id= :id';
		$statement = $db -> prepare($sql);;
		$statement -> execute(array(':cat_name' => $cat_name, ':cat_desc' => $cat_desc, ':cat_slug' => $cat_slug, ':id' =>$id));
		if($statement -> rowCount() == 1){
		?>
		<script type="text/javascript">
		 	swal({
	            title:"Success",
	            text: "The Place has been added successfully",
	            type:"success"}).then(function() {
                            window.location.href='places.php';
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
	                window.location.href='places.php?add=1';       
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
		$sql= 'SELECT * FROM places';
		$statement = $db-> prepare($sql);
		$statement -> execute();
		$html="";
		$i =1;
		while ($row = $statement->fetch()) {

			$html .= '<tr>';
      		$html .= '<td>'.$i.'</td>';
        	$html .= '<td>'.$row['cat_name'].'</td>';
        	$html .= '<td>'.$row['cat_desc'].'</td>';
        	$html .= '<td><a href="places.php?del='.$row['id'].'" onclick="return confirm(\'are you sure?\');" class="del_cat btn btn-danger"> <i class="fa fa-trash"></i></a> <a href="places.php?edit='.$row['id'].'" onclick="return confirm(\'are you sure?\');" class="del_cat btn btn-info"> <i class="fa fa-pencil"></i></a></td>
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
		$sql = "DELETE FROM places WHERE id= :id";
		$statement = $db -> prepare($sql);
		$statement -> execute(array(':id'=>  $id));

		if ($statement->rowCount() == 1) {
			echo $result= "<script type='text/javascript'>
                    swal({
                        title:\"Success\",
                        text: \"The Place has been deleted\",
                        type:\"success\"},function() {
                            window.location.href='places.php';       
                         });
                                       
                </script>";
		}else{// if unsuccessful
			echo $result= "<script type='text/javascript'>
                    swal({
                        title:\"Success\",
                        text: \"The Place has been deleted\",
                        type:\"success\"},function() {
                            window.location.href='places.php';       
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
                    
					  <?php include_once 'html/add_place.php'; ?>
					<?php ELSEIF (isset($_GET['edit'])=='1') :?>
						<?php include_once 'html/edit_place.php';?>	
					<?php ELSE: ?>
						<div class="panel-heading">All Places</div>
							<div class="panel-body">
							 <table class="table table-bordered table-responsive">
							    <thead>
							      <tr>
							      	<th>#</th>
							        <th>Place Name</th>
							        <th>Place Descriptions</th>
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