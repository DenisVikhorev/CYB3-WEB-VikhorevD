<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clicks</title>
</head>
<body>
    <form>
        <input type="submit" value="Click me" />
    </form>
    <?php
        if (isset($_COOKIE["count"]))
        {
            $i = $_COOKIE["count"];
        }
        else
        {
            $i = -1;
        }

        $i++;
        echo "Щелчков: $i"; 
        setcookie("count", $i);
    ?>
    <br>
    <a href="index1.html">Домашняя страница</a>
</body>
</html>