USE servers;

INSERT INTO `servers`.`client` (`client_id`, `name`) VALUES ('1', 'Company1');
INSERT INTO `servers`.`client` (`client_id`, `name`) VALUES ('2', 'Company2');
INSERT INTO `servers`.`client` (`client_id`, `name`) VALUES ('3', 'Company3');

INSERT INTO `servers`.`application` (`client_id`, `application_key`, `authentication_token`) VALUES ('1', '11', '11');
INSERT INTO `servers`.`application` (`client_id`, `application_key`, `authentication_token`) VALUES ('2', '21', '21');
INSERT INTO `servers`.`application` (`client_id`, `application_key`, `authentication_token`) VALUES ('3', '31', '31');

INSERT INTO `servers`.`server` (`client_id`, `address`) VALUES ('1', '1.0.0.1');
INSERT INTO `servers`.`server` (`client_id`, `address`) VALUES ('1', '1.0.0.2');
INSERT INTO `servers`.`server` (`client_id`, `address`) VALUES ('1', '1.0.0.3');
INSERT INTO `servers`.`server` (`client_id`, `address`) VALUES ('2', '2.0.0.0');
INSERT INTO `servers`.`server` (`client_id`, `address`) VALUES ('3', '3.0.0.0');

INSERT INTO `servers`.`user` (`client_id`, `username`, `password`) VALUES ('1', 'user1', '123456');
INSERT INTO `servers`.`user` (`client_id`, `username`, `password`) VALUES ('2', 'user2', '123456');
INSERT INTO `servers`.`user` (`client_id`, `username`, `password`) VALUES ('3', 'user3', '123456');
