<?php

//load.php
//Change testing to the name of database in mySQL you wish to connect it too
/*
File Name: load.php
Description: Used to load events that in database to javascript full calendar
*/

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>