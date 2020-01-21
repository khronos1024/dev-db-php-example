<?php 
/*function create_table(){
	CREATE TABLE data_user(
	user_id int (11) AUTO_INCREMENTE PRIMARY KEY not null;
	user_first varchar (256) not null;
	user_last varchar (256) not null;
	user_email varchar (256) not null;
);
}*/

function insert_data(){
	INSERT INTO user (id, user_name, user_password) 
	VALUES ('','Hanzo','12345');
}
?>