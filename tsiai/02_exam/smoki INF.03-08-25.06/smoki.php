<?php
$link = new mysqli('localhost','root','','5e_1_smoki');

$origin_f=$_POST['origin_f'] ?? NULL;
if($origin_f){
    $sql="SELECT nazwa,dlugosc,szerokosc
            FROM smok
            WHERE pochodzenie ='$origin_f'";
    $result=$link->query($sql);
    $dragons=$result->fetch_all(1);
}



$sql="SELECT DISTINCT pochodzenie
FROM smok
ORDER BY pochodzenie;";
$result=$link->query($sql);
$origins=$result->fetch_all(1);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
    <script src="main.js"defer></script>
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    
    <nav>
        <div class="first">Baza</div>
        <div class="second">Opisy</div>
        <div class="third">Galeria</div>
    </nav>

    <main>
        <section class="first">
            <h3>Baza Smoków</h3>
            <form action="" method="post">
                <select name="origin_f" id="origin_f">
                    <?php
                        foreach($origins as $origin){
                            echo "<option>{$origin['pochodzenie']}</option>";
                        }
                    ?>
                </select>
                <button>Szukaj</button>
            </form>
            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php
                if($origin_f){
                foreach($dragons as $dragon){
                    echo"<tr>
                    <td>{$dragon['nazwa']}</td>
                    <td>{$dragon['dlugosc']}</td>
                    <td>{$dragon['szerokosc']}</td> 
                </tr>";
                }
                }
                ?>
            </table>
        </section>

        <section class="second">
            <h3>Opisy smoków</h3>
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                <dt>Smok niebieski</dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>
        </section>

        <section class="third">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>
    </main>

    <footer>
        <p>Stronę opracował: 0000000000</p>
    </footer>
</body>
</html>