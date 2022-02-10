<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <title>Potwierdzenie złoszenia</title>
</head>
<body>
    <?php
        $teamNumber = $_POST['n_team'];
        $teamLifeguard = $_POST['n_workers'];
        $adress = $_POST['adress'];
        $time = date('H:i:s');

        $connection = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
        mysqli_select_db($connection, 'ratownictwo') or die(mysqli_error());

        $query = "INSERT INTO zgloszenia (ratownicy_id, dyspozytorzy_id, adres, pilne, czas_zgloszenia) VALUES ($teamNumber, $teamLifeguard, '$adress', 0, '$time')";
        mysqli_query($connection, $query) or die(mysqli_error());

        mysqli_close($connection);  
    ?>
    <section class="baner">
        <div class="image">
            <img src="./images/obraz.jpg" alt="pogotowie">
        </div>
        <div class="headline">
            <h1>Pogotowie <span><i>ratunkowe</i></span></h1>
        </div>
        <div class="contact">
            <p>Kontakt:</p><br>
            <p><i>022 222 11 333</i></p>
        </div>
    </section>

    <section class="main">
        <?php
            echo "<p><span><b> (Numer zespołu :</b></span>".$teamNumber.")"."<span><b> (Numer dyspozytora :</b></span>".$teamLifeguard.")"."<span><b> (Adres :</b></span>".$adress.")"."</p>";
        ?>
        <p>Twoje zgłoszenie zostało przyjęte do realizacji, wróć do strony głównej </p>
        <a href="pogotowie.html">Wróć</a>
    </section>

    <section class="footer">
        <div class="number">
            <h4>Numery alarmowe</h4>
            <ul>
                <li>999</li>
                <li>112</li>
            </ul>
        </div>
        <div class="download">
            <a href="./kwerendy.txt">Pobierz kwerendy</a>
        </div>
        <div class="pesel">
            <p>Autor</p><br>
            <p>000000000</p>
        </div>
    </section>
   
</body>
</html>