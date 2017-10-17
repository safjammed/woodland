<?php pageClass('pack-details'); 


$cabin_id = $_GET['details'];
$cabin_price = base64_decode($_GET['p']);
$date_start = $_GET['start'];
$date_end = $_GET['end'];

$statement = $db ->prepare('SELECT * FROM cabins WHERE id=:id');
$statement->execute([':id' => $cabin_id]);
$row= $statement->fetch();
?>
<div class="slider">
		<ul class="slides">			
			<?php printGalleryCoreOf($db, $row['id'], $row['cabin_name'], '', $cabin_price)?>    
		</ul>
</div>

<div class="container">
	
	<div class="row">		
		
		<div class="col m10 offset-m1">
			<div class="card">
		    <div class="card-content">
			<div class="row">
    <div class="col s12">
      <ul class="tabs grey-text ">
        <li class="tab col s3"><a href="#test1">Overview</a></li>
        <li class="tab col s3"><a href="#test2">Description</a></li>
        <li class="tab col s3"><a href="#test3">Special Prices / Offers</a></li>
        <?php 
        	$msg = '';
        	
        	if(!isset($_SESSION['id'])){
        		$msg .=' You Have To login First'; 
        	}elseif (isCabinBooked($db,$cabin_id)) {
        		$msg .= 'This Cabin is Booked.'; 
        	}
        ?>
        <li class="tab col s3 <?= (!isset($_SESSION['id']) || isCabinBooked($db,$cabin_id)) ? 'disabled tooltipped" data-position="Top" data-delay="50" data-tooltip="'.$msg.'"' : '"' ;?>> <a href="#test4">Book</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
    	<h4><b>Overview</b></h4>
    	<ul class="collection">    
		    <li class="collection-item avatar">
		      <i class="material-icons circle">home</i>
		      <span class="title"><b>Status</b></span>
		      <h5><b><?= (isCabinBooked($db,$row['id']) == true) ? 'BOOKED' : 'NOT BOOKED';?></b></h5>		      
		    </li>
		    <li class="collection-item avatar">
		      <i class="material-icons circle">home</i>
		      <span class="title"><b>Cabin Type</b></span>
		      <h5><b><?= getTypeName($db, $row['type'])?></b></h5>		      
		    </li>
		    <li class="collection-item avatar">
		      <i class="material-icons circle">home</i>
		      <span class="title"><b>Regular Price</b></span>
		      <h4 class="package-price"><?= getRegularPrice($db,$row['id']);?></h4><input type='hidden' class='package-base-price' value="<?= getRegularPrice($db,$row['id'])?>"/>
              <p class="currencysign">USD</p>		      
		    </li>
		    
		</ul>
    </div>
    <!-- Overview END -->

    <!-- Description  start-->
    <div id="test2" class="col s12">
    	<h4><b>Description</b></h4>
    	<div class="card">
		    <div class="card-content">
		      <?= $row['cabin_desc']?>
		    </div>
		</div>
    </div>
    <!-- Description  END-->
    <!-- Discount Calendar -->
    <div id="test3" class="col s12">    	
    	<div class="row">
    		<h4><b>Special Price/ Offers</b></h4>	
    	
    	<div class="card">
    		<h5><b>Price Table</b></h5>	
    		<div class="card-content">
    			 <table class="table centered bordered striped highlight">
			        <thead>
			          <tr>
			              <th>PRICE</th>
			              <th>FROM</th>
			              <th>TO</th>
			              <th>Adults</th>
			              <th>Children</th>
			          </tr>
			        </thead>
			        <tbody>
			          <tr>
			            <td><b><span class="package-price"><?= getRegularPrice($db,$row['id'])?></span> <span class="currencysign">USD</span>(Regular)</b><input type='hidden' class='package-base-price' value="<?= getRegularPrice($db,$row['id'])?>"/></td>
			            <td><?= getDateOf($db, $row['id'], $type = 'start', $regular = '1'); ?></td>
			            <td><?= getDateOf($db, $row['id'], $type = 'end', $regular = '1'); ?></td>
			            <td>2</td>
			            <td>2</td>
			          </tr>
			          <?php printPricetableOf($db, $row['id']) ?>		          
			        </tbody>
			     </table>
    		</div>
    	</div>
    	</div>
    </div>
    <!-- Discount Calendar END-->
    <!-- Booking Details -->
    <div id="test4" class="col s12">
    	
    	<div class="row">   	
    	<div class="card">
    		<h5><b>Book a Cabin</b></h5>	
    		<div class="card-content">
    			 <form action="" method="post" accept-charset="utf-8">
    			 	<div class="input-field">
    			 		<label> Your Name </label>
    			 		<input disabled type="text" name="fullname" value="<?= (isset($_SESSION['id'])) ? $_SESSION['fname'].' '.$_SESSION['lname'] : 'NOT LOGGED IN';?>">
    			 		<input type="hidden" name="fname" value="<?= $_SESSION['fname']?>">
    			 		<input type="hidden" name="lname" value="<?= $_SESSION['lname']?>">    			 		
    			 	</div>
    			 	<div class="input-field">
    			 		<label> ARRIVAL DATE </label>
    			 		<input disabled type="text" name="dtstrt" value="<?= $date_start?>">
    			 		<input type="hidden" name="date_start" value="<?= $date_start?>">   			 		   			 		
    			 	</div>
    			 	<div class="input-field">
    			 		<label> CHECKOUT DATE </label>
    			 		<input disabled type="text" name="dtend" value="<?= $date_end?>">
    			 		<input type="hidden" name="date_end" value="<?= $date_end?>">			 		   			 		
    			 	</div>
    			 	<div class="input-field">
    			 		<label> Your Email </label>
    			 		<input disabled type="text" value="<?= (isset($_SESSION['id'])) ? $_SESSION['email'] : 'NOT LOGGED IN';?>">	 		
    			 		<input type="hidden" name="email" value="<?= $_SESSION['email']?>">
    			 	</div>
    			 	<div class="input-field">
					    <select required name='days'>
					      <option value="" disabled selected>Choose Days</option>
					      <option value="4">4 days (Friday to Monday)</option>
					      <option value="5">5 days (Monday to Friday)</option>					      					      
					    </select>
					    <label>How Long Do you plan to stay?</label>
					</div>
					<div class="input-field col s12">	
						<input type="hidden" name="cabin_name" value="<?= $row['cabin_name']?>">	
						<input type="hidden" name="cabin_id" value="<?= $cabin_id?>">	
						<input type="hidden" name="user_id" value="<?= (isset($_SESSION['id'])) ? $_SESSION['id'] : 'NOT LOGGED IN'?>">
					    <button class="waves-effect waves-light btn btn-large" type="submit" name='bookBtn'> BOOK THE CABIN </button>
					</div>					
    			 </form>
    		</div>
    	</div>
    	</div>
    </div>
    <!-- Booking Details END -->
    </div>
</div>
  </div>
		</div>

	</div>

</div>