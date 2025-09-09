<?php
$link = new mysqli('localhost','root','','5e_1_biuro');
$sql="SELECT id, dataWyjazdu, cel, cena
FROM wycieczki
WHERE dostepna = 1;";
$result=$link->query($sql);
$wycieczki= $result -> fetch_all(1);

$sql="SELECT nazwaPliku, podpis
FROM zdjecia
ORDER BY podpis DESC;";
$result = $link -> query($sql);
$photos = $result -> fetch_all(1); 


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>

    <main>
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul><!-- skrypt 1 -->
            <!-- <li><id>. dnia <dataWyjazdu> jedziemy do <cel>, cena: <cena></li> -->
            <?php
                foreach($wycieczki as $wycieczka){
                    echo "<li>{$wycieczka['id']}. dnia {$wycieczka['dataWyjazdu']} jedziemy do {$wycieczka['cel']}, cena: {$wycieczka['cena']}</li>";
                }
            ?>
        </ul>
    </main>

    <div class="flex">

        <section class="left">
            <h2>Bestselery</h2>
            <table>
                <tr>
                    <td>Wenecja</td>
                    <td>Kwiecień</td>
                </tr>
                <tr>
                    <td>Londyn</td>
                    <td>Lipiec</td>
                </tr>
                <tr>
                    <td>Rzym</td>
                    <td>Wrzesień</td>
                </tr>
            </table>
        </section>

        <section class="middle">
            <h2>Nasze zdjęcia</h2>
           <!-- skrypt 2 -->
            <!-- <img src="2.jpg" alt="Wenecja"> -->
            <?php
                foreach($photos as $photo){
                    echo "<img src='{$photo['nazwaPliku']}' alt='{$photo['podpis']}'>";
                }
            ?>
        </section>

        <section class="right">
            <h2>Skontaktuj się</h2>
            <a href="mailto: turysta@wycieczki.pl">Napisz do nas</a>
            <p>Telefon: 111 222 333</p>
        </section>

    </div>

    <footer>
        <p>Stronę wykonał: Numer</p>
    </footer>

</body>
</html>