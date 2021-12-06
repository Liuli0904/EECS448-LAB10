<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <style>
        table, th, td 
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <body>
        <?php
        $mysqli = new mysqli("mysql.eecs.ku.edu", "z374x525", "eTh9keiR", "z374x525");
        if ($mysqli->connect_errno) 
        {
            printf("Connect failed: %s\n", $mysqli->connect_error); 
            exit();
        }
        $username = $_POST["username"];
        $query = "SELECT * FROM Posts WHERE author_id = '$username'";

        echo "<table>";
        echo "<tr>";
        echo "<td>" . "Post ID" . "</td>";
        echo "<td>" . "Username" . "</td>";
        echo "<td>" . "Content" . "</td>";
        echo "</tr>";

        $result = $mysqli->query($query);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>" . $row["post_id"] . "</td>";
                echo "<td>" . $row["author_id"] . "</td>";
                echo "<td>" . $row["content"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        $mysqli->close();
        ?>
    </body>
</html>