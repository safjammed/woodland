<div class="panel-heading">Add a New Cabin</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="cabin_name" placeholder="Enter Item Name" name="cabin_name"  required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_cat">Place:</label>
    <div class="col-sm-10">
      <select id="cabin_cat"  class="form-control" name="cabin_cat" required>
      	<?php printPlacesOptions($db);?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_cat">Type:</label>
    <div class="col-sm-10">
      <select id="cabin_cat"  class="form-control" name="cabin_cat" required>
        <?php printTypeOptions($db);?>
      </select>
    </div>
  </div>
  <div class="form-inline col-sm-offset-2">
    <div class="form-group">
      <label for="from">Regular Availability From:</label>
      <input type="date" class="form-control" min="1980-12-28" id="from" name="date_start">
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
      <label for="to">To:</label>
      <input type="date" class="form-control" data-provide="datepicker" min="1980-12-28" data-date-format="yyyy-mm-dd" id="to" name="date_end">
    </div>  
  </div>
  <br>


  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_price">Regular Price (USD):</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" step='0.01' id="cabin_price" placeholder="Enter Item Price" name="cabin_price" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="feat_img">Cabin Featured Photo:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="feat_img" placeholder="Add an Image" accept="image/*" name="featured_img" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cabin_desc">Cabin Details:</label>
    <div class="col-sm-10"> 
      <textarea id="cabin_desc" name="cabin_desc"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gallery">Park Gallery: (*Not Editable)</label>
    <div class="col-sm-10"> 
      <input type="file" multiple="true" class="form-control" id="gallery" placeholder="Add multiple Image" accept="image/*" name="multiple_uploaded_files[]" />
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="add_cabin_btn">Submit</button>
    </div>
  </div>
</form>
</div> <!-- END panel body -->