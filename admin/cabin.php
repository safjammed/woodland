<?php
$page_title="Cabins";
include_once '../partials/adminHead.php';

//Programming Starts
$last_id = lastInsertId($db, 'cabins');

 
//If adding reqested
if (isset($_POST['add_cabin_btn'])) {	
	//Check if the fields are empty
	$form_errors =  check_empty_fields(['cabin_name','cabin_cat', 'cabin_desc','cabin_price']);

	if(empty($form_errors)){
		//get  all data from form
		$cabin_name =  $_POST['cabin_name'];
		$cabin_cat =  $_POST['cabin_cat'];
		$cabin_price = $_POST['cabin_price'];
		$cabin_desc = $_POST['cabin_desc'];
		$date_start = $_POST['date_start'];
		$date_end = $_POST['date_end'];

		//upload Featured Image
		$target_dir = "../assets/img/";
		$target_file_name= time() . basename($_FILES["featured_img"]["name"]);
		$target_file = $target_dir . $target_file_name;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["featured_img"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        swal("Sorry","Uploaded File is not an image.",'error');
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    swal("Sorry","your Featured Image already exists",'error');
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["featured_img"]["size"] > 500000) {
		    swal("Sorry","your Featured Image is too large.",'error');
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    swal("Sorry","Only JPG, JPEG, PNG and GIF Files are supported.",'error');
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["featured_img"]["tmp_name"], $target_file)) {

		    	//Add cabin to database
		    	try {

		    		$sql = "INSERT INTO cabins (cabin_name, cat_id, cabin_desc, feature_image) VALUES(:cabin_name, :cat_id, :cabin_desc, :feature_image)";
		    		$statement = $db -> prepare($sql);
		    		$statement-> execute(array(':cabin_name' => $cabin_name, ':cat_id' => $cabin_cat, ':cabin_desc' => $cabin_desc, ':feature_image' => $target_file_name));
		    		//Count affected rows
		    		$affected = $statement -> rowCount();
		    		if( $affected == 1){

		    			swal('Success!','Item has been added','success');
		    			$cabin_id = lastInsertId($db, 'cabins');
		    			$regular = 1;
		    			addPriceFor($db, $cabin_id,$date_start, $date_end, $cabin_price,$regular);
		    			// Add Gallery Images
		    			foreach($_FILES['multiple_uploaded_files']['tmp_name'] as $key => $tmp_name ){
		    				$target_dir = "../assets/img/gallery/"; 
							$file_name = time().$_FILES['multiple_uploaded_files']['name'][$key];
							$file_size =$_FILES['multiple_uploaded_files']['size'][$key];
							$file_tmp =$_FILES['multiple_uploaded_files']['tmp_name'][$key];
							$file_type=$_FILES['multiple_uploaded_files']['type'][$key];	
							//Check if the file is empty or not
							if ($file_size == 0 && $_FILES['multiple_uploaded_files']['error'] == 0){
								//swal('Error', 'No files Uploaded for the gallery','error');
							}else{
								//Upload file
								if (move_uploaded_file($file_tmp, $target_dir.$file_name)) {
									//Add the record to database
									try{
										$sql = "INSERT INTO cabin_gallery (cabin_id, img,	title) VALUES(:cabin_id, :img, :title)";
										$statement = $db -> prepare($sql);
										$statement->execute(array(':cabin_id' => $cabin_id, ':img' => $file_name, ':title' => $file_name));
										$done = $statement ->rowCount();
										if ($done <= 1) {
											swal('Success','Item has been added successfully', 'success');
										}
									}catch(PDOException $ex){
										echo 'GALLERY:'.$ex->getMessage();
									}
								}

							}
			        		
					        
					    }
						

		    		}
		    	} catch (PDOException $e) {
		    		echo 'CABINS: '.$e->getMessage();
		    	}
		        // echo "The file ". basename( $_FILES["featured_img"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

	}else{ //if formerror was found

	}
	
}

//If update Requested
if(isset($_POST['update_cabin_btn'])){
	try {
		
	
	//Check if the fields are empty
	$form_errors =  check_empty_fields(['cabin_name','cabin_cat', 'cabin_desc','cabin_price']);

	if(empty($form_errors)){
		//get  all data from form
		$id =$_POST['id'];
		//get  all data from form
		$cabin_name =  $_POST['cabin_name'];
		$cabin_cat =  $_POST['cabin_cat'];
		$cabin_price = $_POST['cabin_price'];
		$cabin_desc = $_POST['cabin_desc'];
		$date_start = $_POST['date_start'];
		$date_end = $_POST['date_end'];

		//upload Featured Image
		$target_dir = "../assets/img/";
		$target_file_name= time() . basename($_FILES["featured_img"]["name"]);
		$target_file = $target_dir . $target_file_name;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		//checck if image is inserted
		if ($_FILES["featured_img"]["name"] != ''){
			var_dump($_FILES);
		// Check if image file is a actual image or fake image
		if(isset($_POST["update_cabin_btn"])) {
		    $check = getimagesize($_FILES["featured_img"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        swal("Sorry","Uploaded File is not an image.",'error');
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    swal("Sorry","your Featured Image already exists",'error');
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["featured_img"]["size"] > 500000) {
		    swal("Sorry","your Featured Image is too large.",'error');
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    swal("Sorry","Only JPG, JPEG, PNG and GIF Files are supported.",'error');
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded."; 
		// if everything is ok, try to upload file
		} else {
			echo $target_file;
		    if (move_uploaded_file($_FILES["featured_img"]["tmp_name"], $target_file)) {
		    	// chown($target_dir.$previous_image , 666);
		    	// unset(.$previous_image);
		    	
		    	$sql = "UPDATE cabins SET cabin_name = :cabin_name, cat_id= :cat_id, cabin_desc=:cabin_desc, feature_image = :feature_image WHERE id=:id";
		    	$statement= $db->prepare($sql);
		    	$statement ->execute([':cabin_name'=> $cabin_name, ':cat_id' => $cabin_cat, ':feature_image' => $target_file_name, ':cabin_desc'=> $cabin_desc,':id'=>$id]);

		    	$affected =  $statement->rowCount();
		    	if ($affected == 1) {
		    		$cabin_id = $id;
		    		updatePriceFor($db, $cabin_id,$date_start, $date_end, $cabin_price,'1');

		    		swal('Success!','The Item Has Been Updated ','success');
		    	}
		    }else{
		    	swal('Error!','Couldnt Upload File','error');
		    }
		  }

		  }else{
		  	$sql = "UPDATE cabins SET cabin_name = :cabin_name, cat_id= :cat_id,  cabin_desc=:cabin_desc WHERE id=:id";
		    	$statement= $db->prepare($sql);
		    	$statement ->execute([':cabin_name'=> $cabin_name, ':cat_id' => $cabin_cat,  ':cabin_desc'=> $cabin_desc,':id'=>$id]);

		    	$affected =  $statement->rowCount();
		    	if ($affected == 1) {
		    		$cabin_id = $id;
		    		updatePriceFor($db, $cabin_id,$date_start, $date_end, $cabin_price,'1');
		    		swal('Success!','The Item Has Been Updated','success');
		    	}
		  }
	}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

//if deletion requested
if(isset($_GET['del']) == 1 && $_SESSION['role'] ==0){
	try{
		$id = $_GET['del'];
		$sql = "DELETE FROM cabins WHERE id=:id";
		$statement = $db-> prepare($sql);
		$statement -> execute(array(':id' => $id));
		$affected = $statement -> rowCount();

		if ($affected == 1) {
			echo "<script type=\"text/javascript\">
            swal({
                title:\"Success!!\",
                text: \"The Item has been deleted successfully\",
                type:\"success\"},function(){
                	window.location.href='cabin.php';
                }     
             });
         </script>";
		}

	}catch(PDOException $e){
		//
	}
}




?>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body padding-top">
                    <div class="panel panel-default">
                    <?php IF (isset($_GET['add'])=='1') :?>
                    
					  <?php include_once 'html/add_cabin.php'; ?>
					
					<?php ELSEIF(isset($_GET['edit']) && $_SESSION['role'] == 0) : ?>

						<?php include_once 'html/edit_cabin.php';?>
						
					<?php ELSE : ?>
						<div class="panel-heading">View All Cabins</div>
					  	<div class="panel-body">				  		
					  		
					  		<?php printAllItemsForAdmin($db)?>
					  			
					  		</div>
					  		<style type="text/css">
					  			.card {
								    /* Add shadows to create the "card" effect */
								    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
								    transition: 0.3s;
								}

								/* On mouse-over, add a deeper shadow */
								.card:hover {
								    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
								}

								/* Add some padding inside the card container */
								.container {
								    padding: 2px 16px;
								}
								.card {
								    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
								    transition: 0.3s;
								    border-radius: 5px; /* 5px rounded corners */
								}

								/* Add rounded corners to the top left and the top right corner of the image */
								img {
								    border-radius: 5px 5px 0 0;
								}
					  		</style>
					<?php ENDIF?>
					</div>
                </div>
        </div>
<?php
include_once '../partials/adminFooter.php';
?>