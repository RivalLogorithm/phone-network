use directorydb;
DELIMITER $$
CREATE PROCEDURE delete_owners()
BEGIN
	 START TRANSACTION;
	 BEGIN
		 DECLARE ex INT;
		 DECLARE id INT;
		 DECLARE own_cur CURSOR FOR SELECT owner_id FROM owner;
		
		 DECLARE CONTINUE HANDLER FOR SQLEXCEPTION 
		 BEGIN
			 SET ex = 1;
		 END;
		
		OPEN own_cur;
		read_loop: LOOP
			FETCH own_cur INTO id;
			
			IF ex = 1 THEN
				SET ex = 0;
				ROLLBACK;
			END IF;
		
		 	DELETE FROM owner WHERE owner_id = id;
		 	COMMIT;
		 END LOOP;
		CLOSE own_cur;
	 END;
END$$
DELIMITER ;
