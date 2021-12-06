<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "z374x525", "eTh9keiR", "z374x525");
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}
$username = $_POST["username"];
$content = $_POST["content"];
$insert = "INSERT INTO Users (user_id) VALUES ('$username')";
$query = "SELECT * FROM Users WHERE user_id = '$username'";
$insertplus = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";

if($result = $mysqli->query($query))
{
    if($result->num_rows < 0 || $result->num_rows == 0)
    {
        echo "UNSUCCESSFUL";
    }
    else
    {
        if($content == "")
        {
            echo "UNSUCCESSFUL";
        }
        else
        {
            if($mysqli->query($insertplus))
            {
                echo "SUCCESSFUL";
            }
            else
            {
                echo "UNSUCCESSFUL";
            }
        }
    }
}
else
{
    echo "UNSUCCESSFUL";
}
$mysqli->close();
?>