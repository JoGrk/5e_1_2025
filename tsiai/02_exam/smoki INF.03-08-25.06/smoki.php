<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
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
                <select name="origin" id="origin">
                    <!-- <option value="1">1</option> skrypt1 -->
                </select>
                <button>Szukaj</button>
            </form>
            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <!-- <tr>
                    <td></td>
                    <td></td>
                    <td></td> skrypt2
                </tr> -->
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