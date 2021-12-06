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

        $select = "SELECT * FROM Users";
        echo "<table>";
        echo "<tr>";
        echo "<td>" . "Username" . "</td>";
        echo "</tr>";

        $result = $mysqli->query($select);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        $mysqli->close();
        ?>
    </body>
</html>