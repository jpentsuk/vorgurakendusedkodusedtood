<?php
include("uhendus.php");
$abi2="create table kylastajad
(id			integer not null auto_increment, 
username  		varchar(100) null,  
password 		varchar(100) null,  
visits		int(11) null,    
 
key voti(id) 
)";
mysql_query($abi2) or die(mysql_error());