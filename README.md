# Docker PHP environment

Local docker environment for PHP development with components:

* PHP 7.3
* Nginx
* MySQL 8
* Redis

## Features
We'll follow important docker rule - one service per container.  Also, we'll mount docker volumes to keep code and data on our host machine and use it in containers, so our containers will work for "read-only" purpose and can be stopped, deleted or replaced without losing data.



## Folders structure
www - projects files
mysql - mysql data
logs - different logs
nginx -  nginx conf files
images - docker images

## Execute
Just run
```
docker-compose up -d
``` 

## Test build
Open the browser and go to localhost:8080. You'll see:
<p align="center">
  <img width="400" height="363" src="https://codingwar.com/sites/default/files/images/docker_phpinfo.png">
</p>

Check MySQL connection, run localhost:8080/db.php

<p align="center">
  <img src="https://codingwar.com/sites/default/files/images/docker_mysql.png">
</p>


## Known issues

In new versions of PHP and MySQL you may see an error:
```
SQLSTATE[HY000] [2002] Connection refused
```

Just connect to a MySQL container and run commands:
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'secret';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
```

To connect to Mysql container find container id by running 
```
docker container ls and run
``` 
Connect to the container
```
docker exec -it CONTAINER_ID /bin/bash 
```
Then connect to mysql from command line  
```
mysql -uroot -p.
```