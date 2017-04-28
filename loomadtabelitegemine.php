<?php
include("uhendus.php");

$abi2="create table loomad 

(
id			integer not null auto_increment, 
nimi  		varchar(50) null,  
vanus  		integer null,  
liik 		varchar(50) null,    
puur	    integer null,  
 
key voti(id) 
)";
mysql_query($abi2) or die(mysql_error());