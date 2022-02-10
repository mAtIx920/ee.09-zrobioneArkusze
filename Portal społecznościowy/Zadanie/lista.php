<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Lista przyjaciół</title>
</head>
<body>
    <section class="banner">

        <h1>Portal społecznościowy - moje konto</h1>

    </section>

    <section class="main">

        <h2>Moje zainteresowania</h2>

        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>

        <h2>Moi znajomi</h2>
            <?php
                $connect = new mysqli('localhost', 'root', '', 'dane');
                $result = $connect->query("SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2, 3);");

                if($result->num_rows > 0){
                    while($row = $result->fetch_row()){
                        echo "<div class='wrapper'>";

                        echo "<div class='image'>";
                        echo "<img src='Images/".$row[3]."'>";     
                        echo "</div>";

                        echo "<div class='person'>";
                        echo " <h3 class='name'>".$row[0]." <span>".$row[1]."</span></h3></br>";      
                        echo " <p class='description'>Ostatni wpis: ".$row[2]."</p>";      
                        echo "</div>";
                        
                        echo "<div class='line'></div>";

                        echo "</div>";
                    }
                }
                $connect->close();
            ?>

    </section>

    <div class="wrap">
        <section class="footer-one">
            Stronę wykonał : 000000000
        </section>
        <section class="footer-two">
            <a href="mailto:ja@portal.pl">napisz do mnie</a>
        </section>
    </div>
</body>
</html>