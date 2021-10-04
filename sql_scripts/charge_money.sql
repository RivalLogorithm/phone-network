DELIMITER $$
CREATE OR REPLACE PROCEDURE charge_money()
BEGIN
	
	UPDATE account AS a, (SELECT get_diff(a.balance, t.per_minute, a.minutes) as f_balance, a.account_id
	FROM account as a
	JOIN tariff t ON t.tariff_id = a.tariff_id
	WHERE a.balance >= 0 AND a.minutes > 0) AS b
	
	SET a.balance = b.f_balance
	WHERE a.account_id = b.account_id;

	CALL set_zero();
	
END$$
DELIMITER ;