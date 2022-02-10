<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl8.css">
    <title>Nasz sklep komputerowy</title>
</head>
<body>
    <section class="banner">
        <div class="menu">
            <a href="./index.php">Główna</a>
            <a href="./Podstrony/procesory.html">Procesory</a>
            <a href="./Podstrony/ram.html">RAM</a>
            <a href="./Podstrony/grafika.html">Grafika</a>
        </div>
        <div class="logo">
            <h2>Podzespoły komputerowe</h2>
        </div>
    </section>

    <section class="main">
        <h1>Dzisiejsze promocje</h1>
        <?php
            $c = new mysqli('localhost', 'root', '', 'sklep');
            $result = $c->query("SELECT id, nazwa, opis, cena FROM podzespoly WHERE cena < 1000;");

            echo "<table>";
            echo "<tr><th>NUMER</th><th>NAZWA PODZESPOŁU</th><th>OPIS</th><th>CENA</th></tr>";

            if($result->num_rows > 0){
                while($r = $result->fetch_row()){
                    echo "<tr><td>".$r[0]."</td><td>".$r[1]."</td><td>".$r[2]."</td><td>".$r[3]."</td></tr>";
                }
            }
            echo "</table>";
            $c->close();
        ?>
    </section>

    <section class="footer">
        <div class="one">
            <img src="Images/scalak.png" alt="promocje na procesory">
        </div>

        <div class="two">
        <h4>Nasz Sklep Komputerowy</h4>
        <p>Współpacujemy z hurtownią<a target="_blank" href="http://www.edata.pl">edata</a></p>
        </div>
        
        <div class="three">
            Zadzwoń: 601 602 603
        </div>

        <div class="four">
            <p>Stronę wykonał: 000000000</p>
        </div>
    </section>
</body>
</html>