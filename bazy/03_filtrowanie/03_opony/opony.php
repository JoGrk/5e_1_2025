<?php
header("Refresh: 10");
$link = new mysqli('localhost', 'root', '', '5e_1_opony');
$sql="SELECT *
FROM opony
ORDER BY cena  
LIMIT 10;";
$result = $link -> query($sql);
$tires = $result -> fetch_all(1);


$firstname = $_POST['imie'] ?? NULL 
$firstname = $_POST['surname'] ?? NULL 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <main>
        <aside>
            <!-- skrypt 1 -->
             <!-- <section class="opona">
                <img src="lato.png" alt="letnie">
                <h4>Opona:[producent] [model] </h4>
                <h3>Cena: [cena]</h3>
             </section> -->
             <?php
             foreach($tires as $tire){
                $season = $tire['sezon'];
                switch($season){
                    case 'letnia':$image='lato.png';break;
                    case 'zimowa':$image='zima.png';break;
                    case 'uniwersalna':$image='uniwer.png';break;
                }
                echo "<section class='opona'>
                        <img src='$image' alt='opona'>
                        <h4>Opona:{$tire['producent']} {$tire['model']} </h4>
                        <h3>Cena: {$tire['cena']}</h3>
                        </section>";
             }
             ?>
             <p><a href="https://opona.pl/">więcej ofert</a></p>
        </aside>

        <section class="first">
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <!-- skrypt2 -->
        </section>

        <section class="second">
            <h2>Najnowsze zamówienia</h2>
            <!-- skrypt3 -->
        </section>
    </main>

    <footer>
        <p>Stornę wykonał: </p>
        <form action="" method="post">
            <label for="firstname">imie:</label>
            <input type="text" name="firstname" id="firstname"><br>
            <label for="surname">nazwisko:</label>
            <input type="text" name="surname" id="surname">
            <button>DODAJ</button>
        </form>
    </footer>
    
</body>
</html>
<?php
$link ->close();
?>