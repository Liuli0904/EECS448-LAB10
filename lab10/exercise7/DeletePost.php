<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "z374x525", "eTh9keiR", "z374x525");
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}

$checkedboxes = $_POST["checked"];

echo "SUCCESSFUL";
for($i=0; $i<count($checkedboxes); $i++)
{
    $delete = "DELETE FROM Posts WHERE post_id=$checkedboxes[$i]";
    $mysqli->query($delete);
}
$mysqli->close();
?>