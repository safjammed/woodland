<div class="slider">
		<ul class="slides">
			<li>
				<img src="https://lorempixel.com/1600/400/abstract"> <!-- random image -->
				<div class="caption center-align">
					<h3>Woodland Away!</h3>
					<h5 class="light grey-text text-lighten-3">Here's slogan.</h5>
				</div>
			</li>      
		</ul>
	</div>

	<div class="container">
		<div class="row">
		<div class="col m3">
			<div class="row">
		        <div class="col s12">
		          <div class="card blue-grey darken-1">
		            <div class="card-content white-text center-align">
		            <i class="material-icons circle outline">search</i>		            	
		              <span class="card-title">Search Tools</span>
		              	              	
		              	<form action="#">
					    <div class="input-field">
					        <input type="text" class="datepicker start-date">
					        <label>From</label>
					    </div>
					    <div class="input-field">
					        <input type="text" class="datepicker end-date">
					        <label>to</label>
					    </div>
					    <div class="input-field">
						    <select class="area">						      
						      <option value="1">Scotland</option>
						      <option value="2">London</option>
						      <option value="" selected>All</option>
						    </select>
						    <label>Area</label>
						</div>
						<div class="input-field">
						    <select class="type">						      
						      <option value="1">Luxury</option>
						      <option value="2">Contemporary</option>
						      <option value="3">Original</option>						      
						      <option value="" selected>All</option>
						    </select>
						    <label>Type</label>
						</div>
					  </form>
		              
		            </div>		            
		          </div>
		        </div>
		        
		    </div>
		            
		</div>
		<div class="col m9">
			<div class="row">		
				<?php printCabinsForFront($db); ?>				
			</div>
		</div>

		</div>
	</div>