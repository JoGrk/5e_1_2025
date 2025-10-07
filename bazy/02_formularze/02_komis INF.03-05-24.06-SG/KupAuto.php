<?php
$link = new mysqli('localhost','root','','5e_1_komis');

$brand_f = $_POST['brand'] ?? NULL;

if($brand_f){
    $sql="SELECT model, cena, zdjecie
    FROM samochody 
    JOIN marki ON marki.id = samochody.marki_id
    WHERE nazwa = '$brand_f';";
    $result = $link -> query($sql);
    $selections = $result -> fetch_all(1);
}


$sql="SELECT model, rocznik, przebieg, paliwo, cena, zdjecie
FROM samochody
WHERE id=10;";
$result = $link -> query($sql);
$featured = $result -> fetch_array();

$sql="SELECT nazwa, model, rocznik, cena, zdjecie
FROM marki JOIN samochody ON samochody.marki_id = marki.id
WHERE wyrozniony = 1
LIMIT 4;";
$result = $link -> query($sql);
$offers = $result -> fetch_all(1);

$sql = "SELECT nazwa
FROM marki;";
$result = $link -> query($sql);
$brands = $result -> fetch_all(1);
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Komis aut</title>
</head>
<body>
    
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>

    <section class="first">
        <!-- skrypt1 -->
 
        <!-- <img src='toyotayaris.jpg' alt='oferta dnia'>
        <h4>Oferta Dnia: Toyota </h4>
        <p>Rocznik: <rocznik>, przebieg: <przebieg>, rodzaj paliwa: <paliwo></p>
        <h4>Cena: <cena></h4> -->
    <?php
    echo"<img src='{$featured['zdjecie']}' alt='oferta dnia'>
        <h4>Oferta Dnia: {$featured['model']} </h4>
        <p>Rocznik: {$featured['rocznik']}, przebieg: {$featured['przebieg']}, rodzaj paliwa: {$featured['paliwo']}</p>
        <h4>Cena: {$featured['cena']}</h4>";
    ?>
    </section>

    <section class="second">
        <h2>Oferty wyroznione</h2>
        <!-- skrypt 2-->
        <div class="flex">
            <!-- <section class="offer">
                <img src="toyotayaris.jpg" alt="model">
                <h4>marka model</h4>
                <p>Rocznik: rocznik</p>
                <h4>Cena : cena</h4>
            </section> -->
            <?php
            foreach ($offers as $offer){
                echo "            
                <section class='offer'>
                <img src='{$offer['zdjecie']}' alt='{$offer['model']}'>
                <h4>{$offer['nazwa']} {$offer['model']}</h4>
                <p>Rocznik: {$offer['rocznik']}</p>
                <h4>Cena : {$offer['cena']}</h4>
                </section>";
            }
            ?>
        </div>

    </section>
    <section class="third">
        <h2>Wybierz marke</h2>
      <form action="" method="post">
        <select name="brand" id="brand">
            <!-- skrypt3 -->
            <?php
                foreach($brands as $brand)
                {
                    echo "<option value='{$brand['nazwa']}'>{$brand['nazwa']}</option>";
                }
            ?>
            <!-- <option value="jeden">jeden</option> -->
        </select>
        <button type="submit">Wyszukaj</button>
      </form>
      <!-- skrypt4 -->
       <!-- <section class="offer">
        <img src="['zdjecie']" alt="['model']">
        <h4>$brand_f ['model'] </h4>
        <h4>Cena:['cena']</h4>
       </section> -->
       <div class='flex'>
        <?php
            if($brand_f){
                foreach($selections as $selection){
                   echo"
                   <section class='offer'>
                    <img src='{$selection['zdjecie']}' alt='{$selection['model']}'>
                     <h4>$brand_f {$selection['model']} </h4>
                         <h4>Cena:{$selection['cena']}</h4>
                    </section>"; 
                }
            }
        ?>
        </div>
    </section>
    
    <footer>
        <p>Strone wykonal: bacha bilska</p>
        <p><a href="http://firmy.pl/komis">Znajdz nas takze</a></p>
    </footer>
     
</body>
</html>
<?php
$link -> close();

?>