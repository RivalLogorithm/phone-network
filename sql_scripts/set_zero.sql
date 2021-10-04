DELIMITER $$
CREATE OR REPLACE PROCEDURE set_zero()
BEGIN
	UPDATE account a
	SET a.minutes = 0
	WHERE a.minutes != 0;
	
	UPDATE directory d, (SELECT * FROM account) AS a
		SET d.status = 'Должник'
		WHERE a.account_id = d.account_id AND a.balance < 0;
END$$
DELIMITER ;
