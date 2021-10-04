DELIMITER $$
CREATE OR REPLACE TRIGGER log_balance AFTER UPDATE ON account
FOR EACH ROW BEGIN IF old.balance <> new.balance THEN
	INSERT INTO log SET 
					account_id = new.account_id, 
					new_balance = new.balance, 
					log_date = CURDATE();
				END IF;
END$$