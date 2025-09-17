<?php
$link = new mysqli('localhost','root','','5e_1_obuwie');
$sql = "select model
        from produkt";
$result = $link -> query($sql);
$shoes = $result -> fetch_all(1);

$sql="select buty.model, nazwa, cena, nazwa_pliku
FROM buty
    JOIN produkt ON buty.model = produkt.model; ";
$result = $link -> query($sql);
$products = $result -> fetch_all(1);


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
        <form action="zamow.php" method="post">
            <label for="model_f">Model:</label>
            <select name="model_f" id="model_f" class="kontrolki">
                <!-- skrypt 1  -->
                <?php
                    foreach($shoes as $shoe){
                        echo "<option value='{$shoe['model']}'>{$shoe['model']}</option>";        
                    }
                ?>
            </select>

            <label for="size_f">Rozmiar:</label>
            <select name="size_f" id="size_f" class="kontrolki">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            <label for="quantity_f">Liczba par: </label>
            <input type="number" name="quantity_f" id="quantity_f" class="kontrolki">
            <button class="kontrolki">Zamow</button>
        </form>
        <!-- skrypt 2 -->

        <?php
        foreach($products as $product){
            echo"<section class='buty'>
                 <img src='{$product['nazwa_pliku']}' alt='but męski'>
                 <h2>{$product['nazwa']}</h2>
                 <h5>Model:{$product['model']}</h5>
                 <h4>Cena: {$product['cena']}</h4>
         </section>";
        }
        ?>

         <section class="buty">
            <img src="but1.png" alt="but męski">
            <h2>[nazwa]</h2>
            <h5>Model:[model]</h5>
            <h4>Cena: [cena]</h4>
         </section>
        <?php
        
        
        ?>

    </main>

    <footer>
        <p>Autor strony: 000000000</p>
    </footer>

</body>
</html>


<?php
$link -> close();
?>