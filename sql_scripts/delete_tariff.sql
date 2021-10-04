DELIMITER $$
CREATE PROCEDURE delete_tariff (IN p_tariff_id INT(10))
BEGIN
	DELETE FROM tariff
	WHERE tariff_id = p_tariff_id;
END$$
DELIMITER ;
