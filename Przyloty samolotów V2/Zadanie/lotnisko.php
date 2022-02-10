<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Port lotniczy</title>
</head>
<body>
    <section class="banner">
        <div class="left">
            <img src="./Images/zad5.png" alt="logo lotnisko">
        </div>
        <div class="middle">
            <h1>Przyloty</h1>
        </div>
        <div class="right">
            <h3>przydatne linki</h3>
            <a target="_blank" href="./Kwerendy.txt">Pobierz</a>
        </div>
    </section>

    <section class="main">
        <table border="1">
            <tr> <td>czas</td><td>kierunek</td><td>numer rejsu</td><td>status</td> </tr>
            <!-- skrypt1 -->
            <?php
                $c = new mysqli('localhost', 'root', '', 'egzamin') or die(mysqli_error());
                $q = $c->query("SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;");

                if($q->num_rows > 0){
                    while($r = $q->fetch_row()){
                        echo "<tr> <td>".$r[0]."</td><td>".$r[1]."</td><td>".$r[2]."</td><td>".$r[3]."</td> </tr>";
                    }
                }

                $c->close();
            ?>
        </table>
    </section>

    <section class="footer">
        <div class="left">
            <!-- skrypt2 -->
            <?php
                if(!isset($_COOKIE['cookie'])){
                    echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
                    setcookie('cookie', 1, time() + 60*60*2, '/');
                } else {
                    echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                }
            ?>
        </div>
        <div class="right">
            Autor: 000000000
        </div>
    </section>
</body>
</html>