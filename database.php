<?php


$hostname = "localhost";
$dbuser="root";
$dbPassword ="";
$dbName="fileshare";
$link = mysqli_connect($hostname,$dbuser,$dbPassword,$dbName);

if($link)
{
    //
}
else{
    die("Something went wrong");
}

?>