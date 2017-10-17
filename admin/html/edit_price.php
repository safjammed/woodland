<?php 
$id = $_GET['edit'];

  $statement = $db->prepare('SELECT * FROM prices WHERE id=:id');
  $statement->execute([':id' => $id]);
  $row = $statement->fetch();
 ?>
<div class="panel-heading">Edit a Price/Offer Definition</div>
<div class="panel-body">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2">Select a Cabin:</label>
    <div class="col-sm-10">
      <select name="cabin_id" class="form-control" required>
        <?php printCabinsOption($db, $row['cabin_id']); ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_name">Special Price:<br></label>
    <div class="col-sm-10">
      <input type="number" step="0.01" name="price" placeholder="Enter The Special Price" class="form-control" value="<?= $row['price']?>" required>
    </div>
  </div>              
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_desc">Starting From:</label>
    <div class="col-sm-10"> 
      <input type="date" name="date_start" min="1980-12-31" class="form-control" value="<?= $row['date_start']?>" required>
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_desc">Ends:</label>
    <div class="col-sm-10"> 
      <input type="date" name="date_end" min="1980-12-31" class="form-control" value="<?= $row['date_end']?>" required>
    </div>
  </div>           
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="price_id" value="<?= $id?>">
      <button type="submit" class="btn btn-success" name="priceUpdateBtn">Edit</button>
    </div>
  </div>
</form>
</div> <!-- END panel body -->