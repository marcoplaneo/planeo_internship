CREATE TABLE `internship`.`user` (
    `uid` INT NOT NULL AUTO_INCREMENT ,
    `firstname` TEXT ,
    `username` VARCHAR(50) NOT NULL ,
    `password` CHAR(255) NOT NULL ,
    `avatarpath` TEXT ,
    PRIMARY KEY (`uid`), UNIQUE (`username`))
    ENGINE = InnoDB;