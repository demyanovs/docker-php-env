ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'secret';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';