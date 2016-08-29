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
 	//echo "<h1> UPDATING....</h1>";
 	$updatesql = "update bank_rate_grid SET " .
 	            "brg_rate=" . $_REQUEST['brg_rate'] . 
 	            " ,brg_tier_name='" . $_REQUEST['brg_tier_name'] . "'" .
 	            " , brg_term=" . $_REQUEST['brg_term'] .
                " , brg_min_loan=" . $_REQUEST['brg_min_loan'] .
				" , brg_score_start=" . $_REQUEST['brg_score_start'] .
				" , brg_score_end=" . $_REQUEST['brg_score_end'] .

				" , brg_model_year_start=" . $_REQUEST['brg_model_year_start'] .
				" , brg_model_year_end=" . $_REQUEST['brg_model_year_end'] .
				" , brg_mileage_start=" . $_REQUEST['brg_mileage_start'] .
				" , brg_mileage_end=" . $_REQUEST['brg_mileage_end'] .
				" , brg_FE_percent=" . $_REQUEST['brg_FE_percent'] .
				" , brg_FE_cap=" . $_REQUEST['brg_FE_cap'] .
				" , brg_BE_percent=" . $_REQUEST['brg_BE_percent'] .
				" , brg_BE_cap=" . $_REQUEST['brg_BE_cap']






 	            ;
 	$updatesql .= " WHERE id_bank_rate_grid= " . $_REQUEST['rate_id'];
 	//echo $updatesql;
 	$didup = $this->db->query($updatesql);
 	header( 'Location: index.php?/administrator/banks_rates/' . $_REQUEST['bank_id']);
 }

  $rate_info = $bank_rate_group[0]; //DON"T ASK WHY its array 0  .. it just is ..idk;
 
 ?>
    <!-- Top Breadcrumb End -->
    <div id="rightside_container" style="width:75%">
    	<div id="rightside">
    		<br />
    		<h3 class="well well-sm">Edit Rate</h3>

    	 <form action="index.php?/administrator/banks_rates_edit/<?=$rate_info['id_bank_rate_grid']?>" role="form" class="form-horizontal" method="post">
    	 	<input type="hidden" name="act" value="update">
    	 	<input type="hidden" name="rate_id" value="<?=$rate_info['id_bank_rate_grid']?>">
    	 	<input type="hidden" name="bank_id" value="<?=$rate_info['bank_id']?>">
    	 	<div class="form-group">
                 
                    <label  class="control-label col-sm-4" for="brg_teir_name">Tier Name</label>
                 
                <div class="col-sm-8">
                    <input type=text name="brg_tier_name" id="brg_tier_name" value="<?=$rate_info['brg_tier_name']?>" class="form-control">
                </div>
            </div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_rate">Rate</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_rate" id="brg_rate" value="<?=$rate_info['brg_rate']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	  
    	 			<label  class="control-label col-sm-4" for="brg_term">Term <small>(months)</small></label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_term" id="brg_term" value="<?=$rate_info['brg_term']?>" class="form-control">
    	 		</div>
    	 	</div>
            <div class="form-group">
              
                    <label  class="control-label col-sm-4" for="brg_min_loan">Min Loan Amount $</label>
                 
                <div class="col-sm-8">
                    <input type=number  step="any" name="brg_min_loan" id="brg_min_loan" value="<?=$rate_info['brg_min_loan']?>" class="form-control">
                </div>
            </div>
    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_score_start">Score Start</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_score_start" id="brg_score_start" value="<?=$rate_info['brg_score_start']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_score_end">Score End</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_score_end" id="brg_score_end" value="<?=$rate_info['brg_score_end']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_model_year_start">Model Year Start</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_model_year_start" id="brg_model_year_start" value="<?=$rate_info['brg_model_year_start']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_model_year_end">Model Year End</label>
    	 		 	
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_model_year_end" id="brg_model_year_end" value="<?=$rate_info['brg_model_year_end']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_mileage_start">Mileage Start</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_mileage_start" id="brg_mileage_start" value="<?=$rate_info['brg_mileage_start']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_mileage_end">Mileage End</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_mileage_end" id="brg_mileage_end" value="<?=$rate_info['brg_mileage_end']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_FE_percent">FE %</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_FE_percent" id="brg_FE_percent" value="<?=$rate_info['brg_FE_percent']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_FE_cap">FE Max($)</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_FE_cap" id="brg_FE_cap" value="<?=$rate_info['brg_FE_cap']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_BE_percent">BE %</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_BE_percent" id="brg_BE_percent" value="<?=$rate_info['brg_BE_percent']?>" class="form-control">
    	 		</div>
    	 	</div>

    	 	<div class="form-group">
    	 	 	 
    	 			<label  class="control-label col-sm-4" for="brg_BE_cap">BE Max($)</label>
    	 		 
    	 		<div class="col-sm-8">
    	 			<input type=number  step="any" name="brg_BE_cap" id="brg_BE_cap" value="<?=$rate_info['brg_BE_cap']?>" class="form-control">
    	 		</div>
    	 	</div>
    	 	<div class="form-footer">
    	 		<a href="index.php?/administrator/banks_rates/<?=$rate_info['bank_id']?>"   class="btn btn-info pull-left"> Cancel</a>
    	 		<button type="submit" class="btn btn-success pull-right"> Save</button>
    	 		
    	 	</div>

    	 	

    	 	

    	 </form>
    	</div>
    </div>
