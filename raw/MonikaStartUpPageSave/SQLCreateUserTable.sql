/* Create the user table */
CREATE TABLE `raw`.`User` ( `user_id` INT NOT NULL , 
`first_name` VARCHAR(15) NOT NULL , `username` VARCHAR(15) NOT NULL , 
`password` VARCHAR(64) NOT NULL , `email` VARCHAR(40) NOT NULL , 
PRIMARY KEY (`user_id`), UNIQUE `username` (`username`)); 

/*insert one record*/
INSERT INTO `user` (`user_id`, `first_name`, `username`, `password`, `email`) 
VALUES ('1', 'Monika', 'Moni', '111', '123@hotmail.ca');

/*Create group table with primary key and unqiue attributes*/
CREATE TABLE `raw`.`groups` ( `group_id` INT NOT NULL AUTO_INCREMENT ,
 `group_name` VARCHAR(16) NOT NULL , PRIMARY KEY (`group_id`), 
 UNIQUE `group_name_unique` (`group_name`)) ;
 
/* Add Fireign key  */
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;