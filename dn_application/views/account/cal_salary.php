  <style>
   input[type="text"]{ 
    width: 96%;
	height: 100%;
	border: none; 
	background-color: transparent;
   }
   
   .bg_color_yellow {
    background-color: #FFFF00;
   }
   
   .bg_color_darkyellow {
    background-color: #FFE699;
   }   

   .bg_color_yellow {
    background-color: #FFFF00;
   }

   .bg_color_gray {
    background-color: #D0CECE;
   }
   
   .bg_color_blue {
    background-color: #9DC3E6;
   }   
   
   .bg_color_green {
    background-color: #C5E0B4;
   }     
   
   .calc_container {
    width: 600px;
	margin: auto;
   }
   
   .center {
    text-align: center;
   }

   .label_padding {
    padding-top: 16px !important;
   }
  </style>

<div class="calc_container">

 
 <table class="table table-bordered">
  <tr>
   <td class="bg-primary" width="80%">Calculator</td>
   <td class="bg-primary">Inputs</td>
  </tr>
  <tr>
   <td class="bg_color_green label_padding" width="80%">Payment to income</td>
   <td class="bg_color_green"><input type="number" step=".01" value=".18" id="payment_to_income" class="bg_color_green form-control"></td>
  </tr>  
  <tr>
   <td class="bg_color_green label_padding" width="80%">Minimum verifiable income to qualify for a loan</td>
   <td class="bg_color_green"><input type="number" step="1" value="1800" id="min_verifiable_income" class="bg_color_green form-control"></td>
  </tr>  
  <tr>
   <td class="bg-primary" width="80%">Are you a salaried employee?</td>
   <td class="bg-primary"></td>
  </tr>  
  <tr>
   <td class="bg_color_blue label_padding" width="80%">What is your annual salary?</td>
   <td class="bg_color_blue"><input type="number" id="annual_salary" class="form-control bg_color_blue"></td>
  </tr>    
  <tr>
   <td class="bg_color_blue label_padding" width="80%">Other POI PER month:  SSI, child support, etc.</td>
   <td class="bg_color_blue"><input type="number" id="other_verifiable_income" class="form-control bg_color_blue"></td>
  </tr>  
  <tr>
   <td class="bg_color_blue label_padding" width="80%">Other monthly income (i.e. Mow lawns, babysit, ebay, etc.)</td>
   <td class="bg_color_blue"><input type="number" id="non_verifiable_income" class="form-control bg_color_blue"></td>
  </tr>    
   <tr>
   <td class="bg_color_yellow label_padding" width="80%">Total Monthly POI</td>
   <td class="bg_color_yellow"><div id="total_verifiable_income" class="form-control bg_color_yellow center"><div>---</div></div></td>
  </tr>    
   <tr>
   <td class="bg_color_yellow label_padding" width="80%">Total Monthly Stated Income</td>
   <td class="bg_color_yellow"><div id="total_income_not_verifiable" class="form-control bg_color_yellow center"><div>---</div></div></td>
  </tr>   
   <tr>
   <td class="bg-primary" width="80%">Payment you qualify for:</td>
   <td class="bg-primary"></td>
  </tr>  
  <tr>
   <td class="bg_color_yellow label_padding" width="80%">POI loan</td>
   <td class="bg_color_yellow"><div id="verifiable_income_loan" class="form-control bg_color_yellow center"><div>---</div></div></td>
  </tr>
  <tr>
   <td class="bg_color_yellow label_padding" width="80%">Stated income loan</td>
   <td class="bg_color_yellow"><div id="stated_income_loan" class="form-control bg_color_yellow center"><div>---</div></div></td>
  </tr>  
 </table>

 
 <button id="paystub_calculate" class="btn btn-default btn-lg btn-block">Calculate</button><br><br>
</div> 

<script>
	$(document).ready(function() {
		$('#paystub_calculate').on('click', function() {
			var paymentToIncome = parseFloat($('#payment_to_income').val()),
					minIncome = parseInt($('#min_verifiable_income').val()),
					annualSalary = parseInt($('#annual_salary').val()),
					monthsPerYear = 12,
					verifiableMonthlyIncome = $('#other_verifiable_income').val(),
					nonVerifiableIncome = $('#non_verifiable_income').val(),
					resultTotalVerifiable = $('#total_verifiable_income div'),
					resultNonVerifiable = $('#total_income_not_verifiable div'),
					verifiableIncomeLoan = $('#verifiable_income_loan div'),
					statedIncomeLoan = $('#stated_income_loan div');

			if (annualSalary === '') {
				alert("Please enter your annual salary.");
			} else {
				if (verifiableMonthlyIncome === '') {
					verifiableMonthlyIncome = 0;
				} else {
					verifiableMonthlyIncome = parseInt(verifiableMonthlyIncome);
				}
				if (nonVerifiableIncome === '') {
					nonVerifiableIncome = 0;
				} else {
					nonVerifiableIncome = parseInt(nonVerifiableIncome);
				}

				var result = annualSalary / monthsPerYear,
						totalVerifiableMonthlyIncome = Math.round(result + verifiableMonthlyIncome),
						totalNonVerifiableMonthlyIncome = totalVerifiableMonthlyIncome + nonVerifiableIncome;

				resultTotalVerifiable.html('$' + totalVerifiableMonthlyIncome);
				resultNonVerifiable.html('$' + totalNonVerifiableMonthlyIncome);

				if (totalVerifiableMonthlyIncome > minIncome) {
					verifiableIncomeLoan.html('$' + Math.round(totalVerifiableMonthlyIncome * paymentToIncome));
				} else {
					verifiableIncomeLoan.html('$0');
				}

				if (totalNonVerifiableMonthlyIncome > minIncome) {
					statedIncomeLoan.html('$' + Math.round(totalNonVerifiableMonthlyIncome * paymentToIncome));
				} else {
					statedIncomeLoan.html('$0');
				}
			}
		});
	});
</script></div>
</div>

