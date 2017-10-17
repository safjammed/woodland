<?php
 $id = $_GET['edit'];

 $sql = "SELECT * FROM cabins WHERE  id= :id";
 $statement = $db -> prepare($sql);
 $statement -> execute([':id' => $id]);
 $row = $statement->fetch();

?>
<div class="panel-heading">Edit Cabin </div>
<div class="panel-body">
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_name">cabin Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="cabin_name" placeholder="Enter Cabin Name" name="cabin_name" value="<?= $row['cabin_name']?>"  required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_cat">Place:</label>
    <div class="col-sm-10">
      <select id="cabin_cat"  class="form-control" name="cabin_cat" required>
      	<?php printPlacesOptions($db,$row['id']);?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_cat">Type:</label>
    <div class="col-sm-10">
      <select id="cabin_cat"  class="form-control" name="cabin_cat" required>
        <?php printTypeOptions($db, $row['cat_id']);?>
      </select>
    </div>
  </div>
  <div class="form-inline col-sm-offset-2">
    <div class="form-group">
      <label for="from">Regular Availability From:</label>
      <input type="date" class="form-control" min="1980-12-28" id="from" name="date_start" value="<?= getDateOf($db,$row['id'],'start','1')?>">
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
      <label for="to">To:</label>
      <input type="date" class="form-control" data-provide="datepicker" min="1980-12-28" data-date-format="yyyy-mm-dd" id="to" name="date_end" value="<?= getDateOf($db,$row['id'],'end','1')?>" />
    </div>  
  </div>
  <br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_price">Regular Price(USD):</label>
    <div class="col-sm-10">
      <input type="number" min="0" step='0.01' class="form-control" id="cabin_price" placeholder="Enter Cabin Price" name="cabin_price" value="<?= getRegularPrice($db, $row['id']);?>" required />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="feat_img">Change Featured Photo:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="feat_img" placeholder="Add an Image" accept="image/*" name="featured_img">
      
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_desc">Cabin Details:</label>
    <div class="col-sm-10"> 
      <textarea id="cabin_desc" name="cabin_desc"><?= $row['cabin_desc']?></textarea>
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
    <input type="hidden" name="id" value="<?= $id;?>">
    <inpput type="hidden" name="img_prev" value="<?=$row['feature_image']?>"/>
      <button type="submit" class="btn btn-default" name="update_cabin_btn">Update Details</button>
    </div>
  </div>
</form>
</div> <!-- END panel body -->