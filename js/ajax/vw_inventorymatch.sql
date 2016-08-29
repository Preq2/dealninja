Alter VIEW  vw_InventoryMatch2
AS
SELECT inventory.* ,
dealer_title_fee, dealer_doc_fee, dealer_tax_rate, 
bank_name,
bank_metric_be_advance,bank_metric_fe_advance,bank_metric_max_term,bank_metric_note,
bank_score_be,bank_score_fe,bank_score_end,bank_score_start, bank_score.bank_score_id,
bank_year_start,bank_year_end,bank_year_term,bank_year.bank_year_id,
bank_rate_rate,bank_rate_id, 


(inventory_nada * (bank_score_fe/100) )   FrontEndMax,
(inventory_nada * bank_score_fe) with_fe,
(inventory_nada * bank_score_fe)  - dealer_title_fee tot_title_fee, 
(((inventory_nada * bank_score_fe/100)  - dealer_title_fee)  / (1+ (dealer_tax_rate)/100)) * (dealer_tax_rate/100) tot_tax,
(inventory_nada * bank_score_fe) - (((inventory_nada * bank_score_fe)  - dealer_title_fee)  / dealer_tax_rate ) - dealer_doc_fee     tot_after_doc_fee,

fn_ceilingnumber(bank_score_be / 100  * ((inventory_nada * bank_score_fe/100)) , bank_max_cap  )             be,
 inventory_cost + dealer_doc_fee price_with_brev,
(dealer_tax_rate / 100) * ( inventory_cost + dealer_doc_fee)    price_with_brev_tax,
(1+(dealer_tax_rate / 100)) * ( inventory_cost + dealer_doc_fee) price_with_brev_with_tax,
(1+(dealer_tax_rate / 100) * ( inventory_cost + dealer_doc_fee))  + dealer_title_fee price_with_brev_with_title,


get_payment((1+(dealer_tax_rate / 100) * ( inventory_cost + dealer_doc_fee))  + dealer_title_fee, bank_year_term, bank_rate_rate)  payment_with_br_ev,
get_payment(inventory_cost ,bank_year_term/12, bank_rate_rate) payment_at_cost,
get_payment((inventory_nada * (bank_score_fe/100) ),bank_year_term/12,bank_rate_rate) payment_with_fe,
(inventory_nada * bank_score_fe) + fn_ceilingnumber(bank_score_be / 100  * ((inventory_nada * bank_score_fe/100)) , bank_max_cap  )          price_fe_be,


(((inventory_nada * bank_score_fe)  - dealer_title_fee)  / dealer_tax_rate ) - dealer_doc_fee  - inventory_cost  front_gross


FROM
inventory 
inner join dealer on dealer.dealer_id  = inventory.dealer_id
inner join bank_assignment ba on ba.dealer_id = dealer.dealer_id
inner join bank on bank.bank_id = ba.bank_id
inner join bank_rate on bank_rate.bank_id = bank.bank_id
inner join bank_metric on bank_metric.bank_id = bank.bank_id
inner join bank_score on bank_score.bank_score_id = bank_rate.bank_score_id
inner join bank_year on bank_year.bank_year_id = bank_rate.bank_year_id



where inventory.inventory_year <= bank_year.bank_year_start  and  inventory.inventory_year >= bank_year.bank_year_end
AND bank_rate.bank_score_id = bank_rate.bank_score_id 
                        AND bank_rate.bank_year_id = bank_year.bank_year_id
                        



 