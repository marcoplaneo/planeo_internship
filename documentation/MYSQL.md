# MySQL

## Login

```
sudo mysql
-> opens MySQL
if database secured by password, have to give password too
```

## Privileges

- GRANT
  - lets you grant permissions to specific users
- REVOKE
  - lets you take away permissions from specific users
  - only granted privileges can be revoked

## SQL Operations

- Basic operations
  - CREATE
  ```sql
  CREATE TABLE user (userid INT NOT NULL AUTO_INCREMENT, username VARCHAR(50), PRIMARY KEY (userid);
  -> creates table user with the columns userid and username
    -> userid is a number and primary key, which counts up automatically and can not be null
    -> username is text with maximum of 50 characters
  ```
  - DROP
  ```sql
  DROP DATABASE user;
  -> deletes database user;
  ```
  - SELECT
  ```sql
  SELECT * FROM user;
  -> select all rows from table user, which will be shown
  ```
  - INSERT INTO
  ```sql
  INSERT INTO user
  VALUES (0, 'admin');
  -> adds user admin to the table
  ```
  - UPDATE
  ```sql
  UPDATE user
  SET username=root
  WHERE username='admin';
  -> changes the username from admin to root
  ```
  - DELETE
  ```sql
  DELETE FROM user
  WHERE username='root';
  -> deletes row where root is username
  ```
- Advanced operations
  - JOIN
    - join multiple tables to see result in one table
    - INNER JOIN
    - OUTER JOIN
    - LEFT JOIN
    - RIGHT JOIN
    - FULL JOIN
    - SELF JOIN
    - Syntax
    ```sql
    SELECT * FROM table1
    INNER JOIN table2
    ON table1.column=table2.comlumn;
    ```
  - indexing
    - every table has index/primary key
    - when joining two tables, one primary key becomes foreign key
    - every element in table has one unique index
  - optimization
    - use index
    - do not use too many JOINs
    - do not use SELECT DISTINCT (show only one of duplicate entries)
    - use SELECT column instead of SELECT *

## DDL, DQL, DML

- DDL (Data Definition Language)
  - commands used to define database schema
  - creates and modifies structure of database objects
    - CREATE
    - DROP
    - ALTER
    - TRUNCATE
```sql
Example:
CREATE TABLE animal ...;
```
- DQL (Data Query Language)
  - performing queries on data within schema objects
    - SELECT
```sql
Example:
SELECT * FROM animal;
```
- DML (Data Manipulation Language)
  - manipulation of data in database
    - INSERT
    - UPDATE
    - DELETE
    - CALL
    - EXPLAIN CALL
    - LOCK
```sql
Example:
INSERT INTO animal
VALUES ...;
```
- DCL (Data Control Language)
  - rights, permissions and other controls of database system
    - GRANT
    - REVOKE
- TCL (Transaction Control Language)
  - groups a set of tasks into single execution unit
  - begins with specific task
  - end with all tasks in group successfully completed
    - COMMIT
    - SAVEPOINT
    - ROLLBACK
    - SET TRANSACTION
    - SET CONSTRAINT