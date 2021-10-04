CREATE USER 'administrator'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'administrator'@'localhost';

CREATE USER 'user'@'localhost' IDENTIFIED BY 'qwerty';
GRANT SELECT, UPDATE ON *.* TO 'user'@'localhost';

FLUSH PRIVILEGES;