<?php
$link = new mysqli('localhost','root','','5e_1_obuwie');
$model_f = $_POST['model_f'] ?? NULL;
$quantity_f = $_POST ['quantity_f'] ?? NULL;
$size_f = $_POST ['size_f'] ?? NULL;

if($model_f && $quantity_f && $size_f){
    $sql="SELECT nazwa, cena, kolor, kod_produktu, material, nazwa_pliku
    FROM buty
        JOIN produkt ON produkt.model = buty.model
    WHERE produkt.model = '$model_f';";

    $result = $link -> query($sql);
    $shoe = $result -> fetch_array();
}

?>





<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header> 
        <h1>Obuwie męskie</h1>
    </header>

    <main>
        <h2>Zamówienie</h2>
        <!-- skrypt3 -->
         <?php 
                echo"<img src='{$shoe['nazwa_pliku']}' alt='but męski'>
                    <h2>{$shoe['nazwa']}</h2>
                    <p>cena za $quantity_f par: ".$quantity_f*$shoe['cena']." zł</p>
                    <p>Szczególy produktu:  {$shoe['kolor']}, {$shoe['material']}</p>
                    <p>Rozmiar: $size_f</p>"
         ?>
         <!-- 
         
         <img src="" alt="but męski">
         <h2>[nazwa]</h2>
         <p>cena za [liczbapar] par: [wartosc] zł</p>
         <p>Szczególy produktu [kolor], [material]</p>
         <p>Rozmiar: [rozmiar]</p> -->
         <a href="index.php">Strona główna</a>
    </main>

    <footer>
        <p>Autor strony: 000000000</p>
    </footer>

</body>
</html>

<?php
$link -> close()


?>