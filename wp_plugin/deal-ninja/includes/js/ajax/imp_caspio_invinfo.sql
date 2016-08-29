CREATE DEFINER=`levarberry`@`%` PROCEDURE `imp_caspio_inventory`()
BEGIN

 Delete from inventory where dealer_id in  (Select dealer_id from imp_inv);
 
INSERT INTO `dealninja`.`inventory`
(
`dealer_id`,
`inventory_name`,
`inventory_nada`,
`inventory_stk`,
`inventory_year`,
`inventory_make`,
`inventory_model`,
`inventory_age`,
`inventory_odometer`,
`inventory_cost`,
`inventory_date_changed`,
`inventory_is_deleted`,
`inventory_category`,
`inventory_rebate1price`, inventory_rebate2price, inventory_rebate3price)
 Select
`dealer_id`,
`inventory_name`,
`inventory_nada`,
`inventory_stk`,
`inventory_year`,
`inventory_make`,
`inventory_model`,
`inventory_age`,
`inventory_odometer`,
`inventory_cost`,
`inventory_date_changed`,
`inventory_is_deleted`,
`inventory_category`,
`inventory_rebate`, inventory_rebate2price, inventory_rebate3price
 From imp_inv;
END