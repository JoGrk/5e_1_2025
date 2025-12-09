<?php
    $link = new mysqli('localhost', 'root', '', '5e_1_salary');
    if(isset($_POST['lastname']))
    {
        $lastname = $_POST['lastname'];
        $sql = "
        SELECT last_name
        FROM employees
        WHERE last_name LIKE '$lastname%'
        LIMIT 10;
        ";
        $result = $link -> query($sql);
        $lastnames = $result -> fetch_all(1);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="lastname" id="lastname">
        <?php
            if(isset($_POST['lastname']))
            {
                if(count($lastnames)>9)
                {
                    echo "<p>podaj bardziej precyzyjne informacje</p>";
                }
                else
                {
                    foreach($lastnames as $lastname_O)
                    {
                        echo "<input type='radio' name='{$lastname_O['last_name']}' id='{$lastname_O['last_name']}'>";
                    }
                }
            }
        ?>
        <button type="submit"></button>
    </form>
</body>
</html>