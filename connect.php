<?php
//---connection database local
// $databaseHost = 'localhost';
// $databaseName = 'uts_pweb';
// $databaseUsername = 'root';
// $databasePassword = '';
//---connection database server
$databaseHost = 'localhost';
$databaseName = 'uas202410101122';
$databaseUsername = '202410101122';
$databasePassword = 'secret';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
