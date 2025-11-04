<?php
$link = new mysqli('localhost','root','','5e_1_biblio');

$id_liryka=$_POST['id_liryka'] ?? NULL;
$id_epika=$_POST['id_epika'] ?? NULL;
$id_dramat=$_POST['id_dramat'] ?? NULL;

if ($id_liryka) {
    $sql="UPDATE ksiazka
    SET rezerwacja = 1
    WHERE id = $id_liryka;";
$link->query($sql);
    $sql="SELECT tytul
    FROM ksiazka
    WHERE id = $id_liryka;";
    $result=$link->query($sql);
    $tytul=$result->fetch_array();
}
if ($id_epika) {
    $sql="UPDATE ksiazka
    SET rezerwacja = 1
    WHERE id = $id_epika;";
$link->query($sql);
    $sql="SELECT tytul
    FROM ksiazka
    WHERE id = $id_epika;";
    $result=$link->query($sql);
    $tytul=$result->fetch_array();
}
if ($id_dramat) {
    $sql="UPDATE ksiazka
    SET rezerwacja = 1
    WHERE id = $id_dramat;";
$link->query($sql);
    $sql="SELECT tytul
    FROM ksiazka
    WHERE id = $id_dramat;";
    $result=$link->query($sql);
    $tytul=$result->fetch_array();
}

$sql="SELECT id, tytul
FROM ksiazka
WHERE gatunek = 'liryka';";
$result=$link->query($sql);
$lyriki=$result->fetch_all(1);


$sql="SELECT id, tytul
FROM ksiazka
WHERE gatunek = 'epika';";
$result=$link->query($sql);
$epiki=$result->fetch_all(1);


$sql="SELECT id, tytul
FROM ksiazka
WHERE gatunek = 'dramat';";
$result=$link->query($sql);
$dramaty=$result->fetch_all(1);

$sql="SELECT tytul, id_cz, data_odd
FROM ksiazka
JOIN wypozyczenia ON wypozyczenia.id_ks = ksiazka.id
ORDER BY data_odd
LIMIT 15;";
$result=$link->query($sql);
$czytelnicy=$result->fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Biblioteka miejska</title>
</head>
<body>
    <header>
        <?php
            for ($i=0; $i <20 ; $i++) { 
                echo "<img src='obraz.png' alt=''>";
            }

        ?>
    </header>
    <main>
        <section class="first">
            <h2>Liryka</h2>
            <form action="biblioteka.php" method="post">
                <select name="id_liryka" id="form1">
                    <?php
                        foreach($lyriki as $liryka){
                            echo "<option value='{$liryka['id']}'>{$liryka['tytul']}</option>";
                        }
                    ?>
                    
                </select>
                <button type="submit">Rezerwuj</button>
               
            </form>
            <?php
                if ($id_liryka) {
                    echo "<p>Książka została {$tytul['tytul']} zrealizowana</p>";
            }
            
            ?>
        </section>

        <section class="second">
            <h2>Epika</h2>
            <form action="biblioteka.php" method="post">
                <select name="id_epika" id="form2">
                    <?php
                        foreach($epiki as $epika){
                            echo "<option value='{$epika['id']}'>{$epika['tytul']}</option>";
                        }
                    ?>
                </select>
                <button type="submit">Rezerwuj</button>
                
            </form>
             <?php
                if ($id_epika) {
                    echo "<p>Książka {$tytul['tytul']} została zrealizowana</p>";
            }
            
            ?>
        </section>

        <section class="third">
            <h2>Dramat</h2>
            <form action="biblioteka.php" method="post">
                <select name="id_dramat" id="form3">
                    <?php
                        foreach($dramaty as $dramat){
                            echo "<option value='{$dramat['id']}'>{$dramat['tytul']}</option>";
                        }
                    ?>
                </select>
                <button type="submit">Rezerwuj</button>
                
            </form>
            <?php
                if ($id_dramat) {
                    echo "<p>Książka {$tytul['tytul']} została zrealizowana</p>";
            }
            
            ?>
        </section>

        <section class="fourth">
            <h2>Zaległe książki</h2>
            <ul>
                <?php
                    foreach($czytelnicy as $czytelnik){
                        echo " <li>{$czytelnik['tytul']} {$czytelnik['id_cz']} {$czytelnik['data_odd']}</li>";
                    }
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p><strong>Autor:Mgea Myrzun </strong></p>
    </footer>
</body>
</html>
<?php
$link->close();
?>