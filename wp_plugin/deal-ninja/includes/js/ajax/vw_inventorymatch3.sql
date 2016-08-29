alter VIEW  vw_InventoryMatch3
AS
SELECT inventory.* ,
dealer_title_fee, dealer_doc_fee, dealer_tax_rate, 
bank.bank_id, bank_name,

brg_BE_percent,brg_FE_percent,brg_score_end,brg_score_start,
brg_model_year_start,brg_model_year_end,brg_term,
brg_rate,id_bank_rate_grid, 


(inventory_nada * ((100+ brg_FE_percent)/100) )   FrontEndMax,
(inventory_nada * brg_FE_percent) with_fe,
(inventory_nada * brg_FE_percent)  - dealer_title_fee tot_title_fee, 
(((inventory_nada * (100+ brg_FE_percent)/100)  - dealer_title_fee)  / (1+ (dealer_tax_rate)/100)) * (dealer_tax_rate/100) tot_tax,
(inventory_nada * brg_FE_percent) - (((inventory_nada * brg_FE_percent)  - dealer_title_fee)  / dealer_tax_rate ) - dealer_doc_fee     tot_after_doc_fee,

fn_ceilingnumber(brg_BE_percent / 100  * ((inventory_nada * (100+brg_FE_percent)/100)) , bank_max_cap  )             be,
 inventory_cost + dealer_doc_fee price_with_brev,
(dealer_tax_rate / 100) * ( inventory_cost + dealer_doc_fee)    price_with_brev_tax,
(1+(dealer_tax_rate / 100)) * ( inventory_cost + dealer_doc_fee) price_with_brev_with_tax,
(1+(dealer_tax_rate / 100) * ( inventory_cost + dealer_doc_fee))  + dealer_title_fee price_with_brev_with_title,


get_payment((1+(dealer_tax_rate / 100) * ( inventory_cost + dealer_doc_fee))  + dealer_title_fee, brg_term, brg_rate)  payment_with_br_ev,
get_payment(inventory_cost ,brg_term/12, brg_rate) payment_at_cost,
get_payment((inventory_nada * ((100+brg_FE_percent)/100) ),brg_term/12,brg_rate) payment_with_fe,
(inventory_nada * brg_FE_percent) + fn_ceilingnumber(brg_BE_percent / 100  * ((inventory_nada * brg_FE_percent/100)) , bank_max_cap  )          price_fe_be,


(((inventory_nada * brg_FE_percent)  - dealer_title_fee)  / dealer_tax_rate ) - dealer_doc_fee  - inventory_cost  front_gross


FROM
inventory 
inner join dealer on dealer.dealer_id  = inventory.dealer_id
inner join bank_assignment ba on ba.dealer_id = dealer.dealer_id
inner join bank on bank.bank_id = ba.bank_id
inner join bank_rate_grid on bank_rate_grid.bank_id = bank.bank_id


where (inventory.inventory_year between  brg_model_year_end  and  brg_model_year_start  or  inventory_year = brg_model_year_end)
and (inventory_odometer between brg_mileage_end and brg_mileage_start );

Select * from vw_InventoryMatch3 where bank_id = 37;


                        



 