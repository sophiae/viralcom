<?php
    $db =
        mysqli_connect('54.175.23.88', 'root', 'secretpassword', 'pictures')
        or die('Error connecting to MySQL server.');
?>

<html>
    <head>
        <style>
            h1 {
                text-align: center;
                font-family: sans-serif;
                margin: 20px;
            }
            table {
                width: 50%;
                margin-left: auto;
                margin-right: auto;
                font-family: sans-serif;
            }
            td {
                text-align: center;
                vertical-align: middle;
                padding-bottom: 20px;
            }
            .image {
                width: 75%;
            }
            .username {
                width: 25%;
            }
            img {
                width: 100%;
                height: auto;
            }
        </style>
        <h1>Public Pictures</h1>
    </head>
    <body>
        <table align="center">
        <?php
            $query =
                "SELECT imageurl, username
                FROM images JOIN users ON images.userid = users.userid
                WHERE NOT private";
            mysqli_query($db, $query) or die('Error querying database.');

            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);

            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td class="image">' , '<img src="' , $row['imageurl'] , '">' , '</td>';
                echo '<td class="username">' , $row['username'] , '</td>';
                echo '</tr>', "\n";
            }
            mysqli_close($db);
        ?>

        </table>
    </body>
</html>