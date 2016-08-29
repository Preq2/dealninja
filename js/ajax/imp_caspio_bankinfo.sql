CREATE PROCEDURE `imp_caspio_bankinfo` ()
BEGIN
 Delete from bank_rate_grid where bank_id in
 (Select bank_id from imp_brg);
 
 Insert into bank_rate_grid
 (bank_id, brg_tier_name, brg_rate, brg_score_start,brg_score_end,
brg_model_year_start, brg_model_year_end, brg_mileage_start, brg_mileage_end,
brg_term, brg_FE_percent,brg_FE_cap , brg_BE_percent ,   brg_BE_cap, brg_notes)
 Select
 bank_id, brg_tier_name, brg_rate, brg_score_start,brg_score_end,
brg_model_year_start, brg_model_year_end, brg_mileage_start, brg_mileage_end,
brg_term, brg_FE_percent,brg_FE_cap , brg_BE_percent ,   brg_BE_cap, brg_notes
 From Imp_brg;
END
