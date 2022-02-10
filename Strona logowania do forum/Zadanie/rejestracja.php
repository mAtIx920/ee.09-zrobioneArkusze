<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hobby.css">
    <title>Nasze hoby</title>
</head>
<body>
    <section class="banner">
        <h1>FORUM HOBBYSTYCZNE</h1>
    </section>

    <div class="wrap">
        <section class="left">
            <?php
                if(isset($_POST['send'])){
                    if(!empty($_POST['password']) && !empty($_POST['login'])){

                        $name = $_POST['name'];
                        $hobby = $_POST['hobby'];
                        $profession = $_POST['profession'];
                        $sex = $_POST['1'];
                        $login = $_POST['login'];
                        $passowrd = $_POST['password'];
    
                        $c = new mysqli('localhost', 'root', '', 'forum');
                        $q = $c->query("INSERT INTO uzytkownicy (nick, zainteresowania, zawod, plec) VALUES ('$name', '$hobby', '$profession', '$sex');");
                        $q = $c->query("INSERT INTO konta (login, haslo) VALUES ('$login', '$passowrd');");
                        echo "Konto ".$name." zostało zarejestrowane na forum hobbystycznym";
    
                        $c->close();
                    } else echo "Nie wprowadzono głównych wartości (login i hasło)";

                       
                   

                } else echo "Problem z baza dancyh, proszę chwilę doczekać";
            ?>
        </section>

        <section class="right">
            <h3>TEMATY NA FORUM</h3>
            <ul>
                <li>Hodowla zwierząt</li>
                <ul>
                    <li>psy</li>
                    <li>koty</li>
                </ul>
                <li>Muzyka</li>
                <li>Gry komputerowe</li>
            </ul>
        </section>
    </div>    
</body>
</html>