<?php 
  $id = $_GET['edit'];

  $statement = $db->prepare('SELECT * FROM places WHERE id=:id');
  $statement->execute([':id' = $id]);
  $row = $statement->fetch();
 ?>

<div class="panel-heading">Edit Place</div>
<div class="panel-body">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_name">Place Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="item_name" placeholder="Enter Category Name" name="cat_name" value="<?= $row['cat_name']?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_name">Place Slug:<br> <small>Unique, Url friendly,No Spaces, As small as possible</small></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="item_name" placeholder="Enter Category Name" name="cat_slug" value="<?= $row['cat_slug']?>"  required>
    </div>
  </div>              
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_desc">Place's short Details:</label>
    <div class="col-sm-10"> 
      <textarea id="item_desc" name="cat_desc"><?= $row['cat_desc']?></textarea>
    </div>
  </div>              
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="id" value="<?= $id;?>">
      <button type="submit" class="btn btn-default" name="catUpdateBtn">Update</button>
    </div>
  </div>
</form>
</div> <!-- END panel body -->