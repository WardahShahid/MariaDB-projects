<?php
//This file provides the information for connecting with databse.
//First, we define constants:
Define ('DB_USER','root');
Define ('DB_PASSWORD','');
Define ('DB_HOST','localhost');
Define ('DB_NAME','test');

try 
{
    $dbcon = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    mysqli_set_charset($dbcon,'utf8');
    
}
catch(Exception $e)
{
$e->getMessage();
print "The system is busy please try later";
}
catch(Error $e)
{
    $e->getMessage();
    print "The is busy please try again later.";
}
?>