<?php
$link = new mysqli('localhost','root','','5e_1_gry');

$id_game=$_POST['id_game'] ?? NULL;
if($id_game){
    $sql="SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena
        FROM gry
        WHERE id = $id_game;";
    $result=$link->query($sql);
    $datagame=$result->fetch_array();
}
// <!-- skrypt4 -->
          
$name = $_POST['name'] ?? NULL;
$desc = $_POST['desc'] ?? NULL;
$price = $_POST['price'] ?? NULL;
$img = $_POST['img'] ?? NULL;
if($name && $desc && $price && $img){
    $sql="INSERT INTO gry
            VALUES(
            NULL, 
            '$name',
            '$desc',
            $price,
            0,
            '$img'
            );
    ";     
    $link -> query($sql);
}
          

$sql = "SELECT nazwa, punkty
        FROM gry
        ORDER BY punkty DESC
        LIMIT 5";
$result = $link -> query($sql);
$games = $result -> fetch_all(1);

$sql = "SELECT id, nazwa, zdjecie
        FROM gry";
$result = $link -> query($sql);
$photos = $result -> fetch_all(1);




?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    
    <main>
        <section class="left">
            <h3>Top 5 gier w tym miesiacu</h3>
            <ul>
                <!-- skrypt1 -->
                 <?php
                    foreach($games as $game){
                        Echo "<li>{$game['nazwa']} <span class='points'>{$game['punkty']}</span></li>";
                    }
                 ?>
                 
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Strone wykonal</h3>
            <p>123</p>
        </section>

        <section class="middle">
            <!-- skrypt2 -->
            <?php
                foreach($photos as $photo){
                    echo "<div class='games'>
                        <img src='{$photo['zdjecie']}' alt='{$photo['nazwa']}' title='{$photo['id']}'>
                        <p>{$photo['nazwa']}</p>
                    </div>";
                }
            ?>
            
            
        </section>

        <section class="right">
            <h3>Dodaj nową grę</h3>
            <form action="" method="post">
                <label for="name">Nazwa </label><br>
                <input type="text" name="name" id="name"><br>
                <label for="desc">Opis </label><br>
                <input type="text" name="desc" id="desc"><br>
                <label for="price">Cena </label><br>
                <input type="number" name="price" id="price"><br>
                <label for="img">Zdjęcie </label><br>
                <input type="text" name="img" id="img"><br>
                <button>DODAJ</button>
            </form>
        </section>
    </main>

    <footer>
        <form action="" method="post">
            <input type="number" name="id_game" id="id_game">
            <button>Pokaż opis</button>
        </form>
        <!-- skrypt3 -->
         <?php
         if($id_game){
            echo "<h2>{$datagame['nazwa']}, {$datagame['punkty']} punktów, {$datagame['cena']} zł</h2>
            <p>{$datagame['opis']}</p>";
        }
         ?>
    </footer>
    
</body>
</html>
<?php
$link ->close()
?>