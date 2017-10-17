
<div class="panel-heading">Define a New Price/Offer for a Cabin</div>
<div class="panel-body">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2">Select a Cabin:</label>
    <div class="col-sm-10">
      <select name="cabin_id" class="form-control" required>
        <?php printCabinsOption($db); ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_name">Special Price:<br></label>
    <div class="col-sm-10">
      <input type="number" step="0.01" name="price" placeholder="Enter The Special Price" class="form-control" required>
    </div>
  </div>              
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_desc">Starting From:</label>
    <div class="col-sm-10"> 
      <input type="date" name="date_start" min="1980-12-31" class="form-control" required>
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-sm-2" for="item_desc">Ends:</label>
    <div class="col-sm-10"> 
      <input type="date" name="date_end" min="1980-12-31" class="form-control" required>
    </div>
  </div>           
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="priceAddBtn">Submit</button>
    </div>
  </div>
</form>
</div> <!-- END panel body -->