<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkujemy</title>
</head>
<body>
    <section class="baner">
        <h1>Portal dla wędkarzy</h1>
    </section>
   
    <section class="main clearFix">
        <div class="left">
            <h2>Ryby drapieżne naszych wód</h2>
            <ul>
                <?php
                    $connectionWitMsql = mysqli_connect("localhost", "root", "") or die(mysqli_error());
                    mysqli_select_db($connectionWitMsql, "wedkowanie") or die(mysqli_error());

                    $result = mysqli_query($connectionWitMsql, "
                        SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1
                    ") or die(mysqli_error());

                    

                    if (mysqli_num_rows($result) > 0 && mysqli_num_fields($result) > 0) {
                        
                        while($takenInfo = mysqli_fetch_assoc($result)) {
                            echo "<li>".$takenInfo['nazwa'].", "."Występowanie : ".$takenInfo['wystepowanie']."</li>";
                        }
                    }

                    mysqli_close($connectionWitMsql);
                ?>
            </ul>
        </div>
        <div class="right ">
            <img src="Ryba.jpg" alt="Sum">
            <a href="Kwerendy.txt">Pobierz kwerendy</a>
        </div>
    </section>

    <section class="foot">
        <p>Stronę wykonał: Mateusz Rosiński</p>
    </section>
</body>
</html>