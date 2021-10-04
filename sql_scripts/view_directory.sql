CREATE OR REPLACE VIEW view_directory AS
SELECT o.owner_name, a.phone_number, o.city, o.address, o.face, t.tariff_name,
CASE WHEN d.status IS NULL THEN 'Оплачено'
		ELSE CAST(status AS VARCHAR(32))
		END AS status_case
FROM directory d
JOIN owner o ON o.owner_id = d.owner_id
JOIN account a ON a.account_id = d.account_id
JOIN tariff t ON t.tariff_id = a.tariff_id;

