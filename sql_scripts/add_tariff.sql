DELIMITER $$
CREATE PROCEDURE add_tariff (p_tariff_name VARCHAR(32), p_per_minute FLOAT(10), p_per_minute_rouming FLOAT(10))
BEGIN
	INSERT INTO tariff (tariff_name, per_minute, per_minute_rouming)
	VALUES (p_tariff_name, p_per_minute, p_per_minute_rouming);
END$$
DELIMITER ;
