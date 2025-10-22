
<?php
$link = new mysqli ('localhost','root','','5e_1_portal');
$sql = "SELECT COUNT(*) AS ilosc
FROM dane;";
$result = $link -> query($sql);
$quantity = $result -> fetch_array();
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
       <?php
       echo "<h5>liczba uzytkownikow portalu:{$quantity['ilosc']}</h5>";
       ?>



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
                    if(!empty($_POST['login'])&& !empty($_POST['password'])){
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $sql="SELECT haslo
                            FROM uzytkownicy
                            WHERE login = '$login';";

                        $result=$link->query($sql);
                        // $cypher=$result->fetch_array();
                         

                        if($result -> num_rows < 1){
                            echo "login nie istnieje";
                    
                        }
                        else {
                              $cypher=$result->fetch_array();
                              $cypher=$cypher['haslo'];
                            //  var_dump ($cypher);
                             $password = sha1($password);
                            //  var_dump ($password);
                            
                            if($password == $cypher){
                                // Jest login hasło się zgadza
                                $sql = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie
                                FROM uzytkownicy
                                JOIN dane ON dane.id = uzytkownicy.id
                                WHERE login = '$login'";
                                $result = $link ->query($sql);
                                $profil = $result -> fetch_array();
                                $age = date("Y")-$profil['rok_urodz'];
                                echo "
                                <img src='{$profil['zdjecie']}' alt='osoba'>
                                <h4>{$profil['login']}($age)</h4>
                                <p>hobby: {$profil['hobby']}</p>
                                <h1><img src='icon-on.png' alt='serce'>{$profil['przyjaciol']}</h1>
                                <a href='dane.html'><button>Więcej informacji</button></a>                                
                                ";
                                
                            }
                        }


                    }
               ?>
               <!-- <img src="o1.jpg" alt="osoba">
               <h4>[login](wiek)</h4>
               <p>hobby: [hobby]</p>
               <h1><img src="icon-on.png" alt="serce">[przyjaciol]</h1>
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