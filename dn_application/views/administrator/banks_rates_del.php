    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul class="breadcrumb">	
        	<li><a href="#" title="">Banks</a></li>
        	<li><a href="#" title="">Rate Grid</a></li>
        	
            <li class="active">Rates</li>
        </ul>
 </div>

 <?
 $act = isset($_REQUEST['act']);

 if ($act) {
 	
 	
    $delsql = "DELETE FROM bank_rate_grid WHERE id_bank_rate_grid= " . $_REQUEST['rate_id'];
    
 	 
 	$didup = $this->db->query($delsql);

 	header( 'Location: index.php?/administrator/banks_rates/' . $_REQUEST['bank_id']);
 }

  $rate_info = $bank_rate_group[0]; //DON"T ASK WHY its array 0  .. it just is ..idk;
 
 ?>
    <!-- Top Breadcrumb End -->
    <div id="rightside_container" style="width:75%">
    	<div id="rightside">
    		<br />
    		<h3 class="well well-sm">Delete Rate?</h3>

    	 <form action="index.php?/administrator/banks_rates_del/<?=$rate_info['id_bank_rate_grid']?>" role="form" class="form-horizontal" method="post">
    	 	<input type="hidden" name="act"  value="del">
    	 	<input type="hidden" name="rate_id" value="<?=$rate_info['id_bank_rate_grid']?>">
    	 	<input type="hidden" name="bank_id" value="<?=$rate_info['bank_id']?>">
    	 	<div class="form-group">
                 
                    <label  class="control-label col-sm-4" for="brg_teir_name">Tier Name</label>
                 
                <div class="col-sm-8">
                    <input type=text name="brg_tier_name" id="brg_tier_name" readonly value="<?=$rate_info['brg_tier_name']?>" class="form-control">
                </div>
            </div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_rate">Rate</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_rate" id="brg_rate" readonly value="<?=$rate_info['brg_rate']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	  
    	 			<label  class="control-label col-sm-4" for="brg_term">Term <small>(months)</small></label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_term" id="brg_term" readonly value="<?=$rate_info['brg_term']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_score_start">Score Start</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_score_start" id="brg_score_start" readonly value="<?=$rate_info['brg_score_start']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_score_end">Score End</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_score_end" id="brg_score_end" readonly value="<?=$rate_info['brg_score_end']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_model_year_start">Model Year Start</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_model_year_start" id="brg_model_year_start" readonly value="<?=$rate_info['brg_model_year_start']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_model_year_end">Model Year End</label>
    	 		 	
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_model_year_end" id="brg_model_year_end" readonly value="<?=$rate_info['brg_model_year_end']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_mileage_start">Mileage Start</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_mileage_start" id="brg_mileage_start" readonly value="<?=$rate_info['brg_mileage_start']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_mileage_end">Mileage End</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_mileage_end" id="brg_mileage_end" readonly value="<?=$rate_info['brg_mileage_end']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_FE_percent">FE %</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_FE_percent" id="brg_FE_percent" readonly value="<?=$rate_info['brg_FE_percent']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_FE_cap">FE Max($)</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_FE_cap" id="brg_FE_cap" readonly value="<?=$rate_info['brg_FE_cap']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_BE_percent">BE %</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_BE_percent" id="brg_BE_percent" readonly value="<?=$rate_info['brg_BE_percent']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_BE_cap">BE Max($)</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number name="brg_BE_cap" id="brg_BE_cap" readonly value="<?=$rate_info['brg_BE_cap']?>" class="form-control">
    	 		</div>
    	 	</div>
    	 	<div class="form-footer">
    	 		<a href="index.php?/administrator/banks_rates/<?=$rate_info['bank_id']?>"   class="btn btn-info pull-left"> No</a>
    	 		<button type="submit" class="btn btn-success pull-right"> Yes</button>
    	 		
    	 	</div>

    	 	

    	 	

    	 </form>
    	</div>
    </div>
