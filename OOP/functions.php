<?php namespace program;

$dbhost = '_';
$dbname = '_';
$dbuser = '_';
$dbpass = '_';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connection->connect_error) die($connection->connect_error);

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
}