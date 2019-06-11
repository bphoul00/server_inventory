Require tool
- Docker
- PHP 7.2
- Symfony 4.3
- mysql 5.7
- Ubuntu

In the database,
Create a database "servers"
Create user "user" with password "123456789".

```
CREATE DATABASE servers;
```
```
CREATE USER 'user'@'localhost' IDENTIFIED BY '123456789';
```
```
GRANT ALL PRIVILEGES ON * . * TO 'user'@'localhost';
```

Create fake data with symfony console


In the project folder
```
./bin/console doctrine:fixtures:load
```



Left To Do
- Extract User from the Administration Zone and store it as Service
- Backend Validation for Server API
- Add better row for server
- Make use of User/Admin Role
- Better Front End
    - Remove Nav Bar for Login Page
- Phpunit Test
- Refactoring...

