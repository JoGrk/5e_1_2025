<?php 
    $link = new mysqli('localhost','root','','5e_1_rzeki');
    
    $level = $_POST['level'] ?? NULL;
    // var_dump($level);
    if($level == 'warning'){
        $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
              FROM wodowskazy
              JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id
              WHERE dataPomiaru='2022-05-05' AND stanWody > stanOstrzegawczy";
    }
    else if($level == 'alarm'){
        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                FROM wodowskazy
                JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id
                WHERE dataPomiaru='2022-05-05' AND stanWody > stanAlarmowy";
    }
    else{
        $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
            FROM wodowskazy
            JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id
            WHERE dataPomiaru='2022-05-05'";
    }
    $result = $link -> query($sql);
    $levels = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wihth=hevice-wihth, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section class="h_left">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>

        <section class="h_right">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>

    <nav>
        <form action="" method="post">
            <input type="radio" name="level" id="all" value="all">
            <label class="formatOption" for="all">Wszystkie</label>
            <input type="radio" name="level" id="warning" value="warning">
            <label class="formatOption" for="warning">Ponad stan ostrzegawczy</label>
            <input type="radio" name="level" id="alarm" value="alarm">
            <label class="formatOption" for="alarm">Ponad stan alarmowy</label>
            <button>Pokaż</button>
        </form>
    </nav>

    <main>
        <section class="left">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <tr>
                    <td>[nazwa]</td>
                    <td>[rzeka]</td>
                    <td></td>
                </tr>

                <?php 
                    foreach($levels as $level){
                        echo"";
                    }
                ?>
                
            </table>
            
        </section>

        <section class="right">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżen o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <!-- skrypt2 -->
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt=Rzeka">
        </section>
    </main>

    <footer>
        <p>Strone wykonał: pikpikszkrt</p>
    </footer>
</body>
</html>
<?php 
    $link -> close();
?>