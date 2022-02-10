<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Wycieczki i urlopy</title>
</head>
<body>
    <section class="top">
        <h1>BIURO PODRÓŻY</h1>
    </section>

    <section class="main">
        <div class="left">
            <h2>KONTAKT</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon : 555666777</p>
        </div>
        <div class="middle">
            <h2>GALERIA</h2>
            <?php
                $connect = mysqli_connect('localhost','root','') or die(mysqli_error());

                mysqli_select_db($connect, 'egzamin3') or die(mysqli_error());

                $result = mysqli_query($connect, "
                    SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;
                ") or die(mysqli_error());

                if(mysqli_num_rows($result) > 0 && mysqli_num_fields($result) > 0) {

                    while($array = mysqli_fetch_assoc($result)) {
                        echo "<img src='images/$array[nazwaPliku]' alt='images/$array[podpis]'>";
                    }
                }
            ?>
        </div>
        <div class="right">
            <h2>PROMOCJE</h2>
            <table>
                <thead>
                    <tr> <th> Jesień <th> Grupa 4+ <th> Grupa 10+
                <tbody>
                    <tr> <th>5%<th>10%<th>15%
        </table>
        </div>
    </section>

    <section class="data">
        <h2>LISTA WYCIECZEK</h2>
        <?php
            $secondResult = mysqli_query($connect, "
            SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1;
            ") or die(mysqli_error());

            if(mysqli_num_rows($secondResult) > 0 && mysqli_num_fields($secondResult) > 0) {

                while($array = mysqli_fetch_assoc($secondResult)) {
                echo "<p>$array[id]. $array[dataWyjazdu], $array[cel], cena: $array[cena]</p>";
            }

            mysqli_close($connect);
        }
        ?>
    </section>

    <section class="footer">
        <p>Stronę wykonał : Mateusz Rosiński</p>
    </section>
</body>
</html>