<?php
$link = new mysqli('localhost','root','','5e_1_weterynarz');
$sql="SELECT id, imie, wlasciciel
FROM Zwierzeta
WHERE rodzaj = 1;";
$result=$link->query($sql);
$dogs= $result -> fetch_all(1);

$sql="SELECT id, imie, wlasciciel
FROM Zwierzeta
WHERE rodzaj=2;";
$result=$link->query($sql);
$cats = $result ->fetch_all(1);

$sql="SELECT imie, telefon, szczepienie, opis
FROM Zwierzeta;";
    $result=$link->query($sql);
    $animals= $result-> fetch_all(1);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weterynarz</title>
    <link rel="stylesheet" href="weterynarz.css">
</head>
<body>
    <header></header>

    <main>
        <section class="left">
            <h2>Psy</h2>
            <!-- skrypt1 -->
             <!-- id imie wlasciciel <br> -->
              <?php
                foreach($dogs as $dog){
                  echo"
                  {$dog['id']} {$dog['imie']} {$dog['wlasciciel']} <br>";
                }
            ?>
            

            <h2>Koty</h2>
            <!-- skrypt2 -->
                <?php
                foreach($cats as $cat){
                  echo"
                  {$cat['id']} {$cat['imie']} {$cat['wlasciciel']} <br>";
                }
                ?>

        </section>


        <section class="middle">
            <h2>SZCZEGÓŁOWA INFORMACJA O ZWIERZĘTACH</h2>
            <!-- skrypt3 -->
             <!-- Pacjent: <imie> <br>
Telefon właściciela: <telefon>, ostatnie szczepienie: <szczepienie>, informacje: <opis> <hr> -->
                <?php
                foreach($animals as $animal){
                    echo" Pacjent: {$animal['imie']} <br>
Telefon właściciela:{$animal['telefon']}, ostatnie szczepienie: {$animal['szczepienie']}, informacje: {$animal['opis']} <hr>";
                };
                ?>
            
        </section>


        <section class="right">
            <h2>WETERYNARZ</h2>

            <a href="logo.jpg"><img src="logo-mini.jpg" alt="ladny piesek"></a>

            <p>Krzysztof Nowakowski, lekarz weterynarii</p>

            <h2>GODZINY PRZYJĘĆ</h2>
            <table>
                <tr>
                    <td>Poniedzialek</td>
                    <td>15:00 - 19:00</td>
                </tr>
                <tr>
                    <td>Wtorek</td>
                    <td>15:00 - 19:00</td>
                </tr>
            </table>
        </section>
    </main>
</body>
</html>
<?php
$link -> close();

?>