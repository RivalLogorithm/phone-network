DELIMITER $$
CREATE PROCEDURE update_tariff (IN p_tariff_id INT(10), IN p_tariff_name VARCHAR(32), p_per_minute FLOAT(10), p_per_minute_rouming FLOAT(10))
BEGIN
	UPDATE tariff
	SET tariff_name = p_tariff_name,
		per_minute = p_per_minute,
		per_minute_rouming = p_per_minute_rouming
	WHERE tariff_id = p_tariff_id;
END$$
DELIMITER ;
