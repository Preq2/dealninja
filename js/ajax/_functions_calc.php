<?

function get_interest_factor($year_term, $monthly_interest_rate) {
	global $base_rate;
	
	$factor      = 0;
	$base_rate   = 1 + $monthly_interest_rate;
	$denominator = $base_rate;
	for ($i=0; $i < ($year_term * 12); $i++) {
		$factor += (1 / $denominator);
		$denominator *= $base_rate;
	}
	return $factor;
} 

function amort($sale_price,$year_term,$annual_interest_percent) {
	
        $down_percent            = 0;

		$month_term              = $year_term * 12;
		$down_payment            = $sale_price * ($down_percent / 100);
		$annual_interest_rate    = $annual_interest_percent / 100;
		$monthly_interest_rate   = $annual_interest_rate / 12;
		$financing_price         = $sale_price - $down_payment;
		$monthly_factor          = get_interest_factor($year_term, $monthly_interest_rate);
		$monthly_payment         = $financing_price / $monthly_factor;

	return $monthly_payment;
	
	
}

function get_payment($sale_price,$month_term,$annual_interest_percent) {
	
	$year_term = $month_term / 12;
	return round(amort($sale_price,$year_term,$annual_interest_percent),2);	
	
}



?>