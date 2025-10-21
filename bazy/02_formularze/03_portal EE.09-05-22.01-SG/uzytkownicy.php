<?php
$link = new mysqli('localhost','root','','5e_1_portal');
$sql="SELECT COUNT(*) AS ilosc
FROM dane;";

$result = $link->query($sql);
$quantity = $result ->fetch_array();

?>




<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section class="banner-left">
            <h2>Nasze osiedle</h2>
        </section>

        <section class="banner-right">
            <!-- skrypt1 -->
            <h5>
                <?php
                echo"
                Liczba użytkowników portalu: {$quantity['ilosc']}
                ";
                ?>
            </h5>


        </section>
    </header>


    <main>
        <section class="main-left">
            <h3>Logowanie</h3>
            <form action="" method="post">
                <label for="login">login</label><br>
                <input type="text" name="login" id="login">
                <label for="password">password</label><br>
                <input type="password" name="password" id="password">
                <button>Zaloguj</button>
            </form>
        </section>
        <section class="main-right">
            <h3>Wizytówka</h3>
            <section class="profile">
                <!-- skrypt 2 -->
                 <?php
                if (!empty($_POST['login']) && !empty($_POST['password'])){
                    $login = $_POST['login'];
                    $pass = $_POST['password'];

                    $sql="SELECT haslo
                         FROM uzytkownicy
                         WHERE login = '$login'";
                    $result = $link -> query($sql);
                    
                    if($result -> num_rows < 1){
                        echo 'Login nie istnieje';
                    }else{
                        $logowanie = $result -> fetch_array();
                        $passhash = $logowanie['haslo'];
                        $pass = sha1($pass);     
                        if($pass != $passhash){
                            echo"Hasło nieprawidłowe";
                        } else {
                            $sql = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie
                                    FROM uzytkownicy
                                    JOIN dane ON dane.id = uzytkownicy.id
                                    WHERE login = '$login'";
                            $result = $link -> query($sql);
                            $profile = $result -> fetch_array();
                            $age = date('Y')-$profile['rok_urodz'];
                            echo "<img src='{$profile['zdjecie']}' alt='osoba'>
                                    <h4>{$profile['login']} ($age)</h4>
                                    <p>hobby: {$profile['hobby']}</p>
                                    <h1>
                                    <img src='icon-on.png' alt='serce'>
                                    {$profile['przyjaciol']} 
                                    </h1>
                                    <a href='dane.html'><button>Więcej informacji</button></a>";
                        }
                    }

                
                }

                    
        
                 ?>
                <!-- <img src="o1.jpg" alt="osoba">
                <h4>[login] (wiek)</h4>
        
                <p>hobby: [hobby]</p>
                <h1>
                    <img src="icon-on.png" alt="serce">
                    [przyjaciol] 
                </h1>
                <a href="dane.html"><button>Więcej informacji</button></a> -->
            </section>
        </section>
    </main>
    
    <footer>Stronę wykonał: 00000000000</footer>
    
</body>
</html>

<?php
$link -> close();
?>