<?php
    if(!isset($_COOKIE['cookie'])){

        setcookie('cookie', 1, time()+60*60, "/");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Odloty samolotów</title>
</head>
<body>
    <section class="baner">
        <div class="right">
            <h2>Odloty z lotniska</h2>
        </div>
        <div class="left">
           <img src="zad6.png" alt="">
        </div>
    </section>
    <section class="main">
        <h4>tabela odlotów</h4>
        <?php
            $connection = mysqli_connect("localhost", "root", "") or die(mysqli_error());
            mysqli_select_db($connection, "egzamin_samoloty") or die(mysqli_error());

            $result = mysqli_query($connection, "
            SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC
            ") or die(mysqli_error());

            if( mysqli_num_rows($result) > 0 ){

                echo "<table border='1' cellspacing='0'>";
                echo "<tr> <td>lp.</td> <td>numer rejsu</td> <td>czas</td> <td>kierunek</td> <td>status</td> </tr>";
               
                while($row = mysqli_fetch_row($result)){

                    echo "<tr> <td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> <td>".$row[4]."</td> </tr>";
                }
                
                echo "</table>";
                
            } else {

                mysqli_error();
            }
         
            mysqli_close($connection);
        ?>
    </section>
    <section class="footer">
        <div class="right">
            <a target="_blank" href="Kwerendy.txt">Pobierz obraz</a>
        </div>
        <div class="middle">
            <?php
                if(!isset($_COOKIE['cookie'])){

                    echo "<p><i>Dzien dobry! Sprawdź regulamin naszej strony</i></p>"; 
                } else {

                    echo "<p><b>Miło nam, że znowu nas odwiedziłeś</b></p>";
                }

            // if (!isset($_SESSION['count'])) { 
            //     $_SESSION['count'] = 1;
            //     $_SESSION['time'] = time();
            //     $_COOKIE['start'] = 1;
            //     echo "<p><i>Dzien dobry! Sprawdź regulamin naszej strony</i></p>";       
            // } else {                          
            //     $_SESSION['count']++;
            //     echo "<p><b>Miło nam, że znowu nas odwdziłeś</b></p>";
            // }   
            
            // if(isset($_SESSION['count']) && (time() - $_SESSION['time']) > 5){
            //     session_destroy();
            // }
            
            // echo 'Strona odczytana '.$_SESSION['count'].' razy w ciągu tej sesji'; 
            ?>
        </div>
        <div class="left">
            <p>Autor : 000000000</p>
        </div>
    </section>
</body>
</html>