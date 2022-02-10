<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Video On Demand</title>
</head>
<body>
    <section class="banner">
        <div class="left">
            <h1>Internetowa wypozyczalnia filmów</h1>
        </div>
        <div class="right">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </section>

    <section class="main">
        <div class="recommended">
            <h3>Polecamy</h3>
            <!-- skrypt1 -->
            <?php
                $c = new mysqli('localhost', 'root', '', 'dane');
                $q = $c->query("SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN(18, 22, 23, 25)");

                if($q->num_rows > 0){
                    while($r = $q->fetch_row()){
                        echo "<div class='block'>";
                        echo "<h4>".$r[0].". ".$r[1]."</h4>";
                        echo "<img src='Images/".$r[3]."' alt='film'>";
                        echo "<p>".$r[2]."</p>";
                        echo "</div>";
                    }
                } else $c->error();
            ?>
        </div>
        <div class="fantastic-films">
            <h3>Filmy fantastyczne</h3>
            <!-- skrypt2 -->
            <?php
                $q = $c->query("SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12");

                if($q->num_rows > 0){
                    while($r = $q->fetch_row()){
                        echo "<div class='block'>";
                        echo "<h4>".$r[0].". ".$r[1]."</h4>";
                        echo "<img src='Images/".$r[3]."' alt='film'>";
                        echo "<p>".$r[2]."</p>";
                        echo "</div>";
                    }
                } else $c->error();
            ?>
        </div>
    </section>

    <section class="footer">
        <form action="video.php" method="POST">
            Usuń film nr.:<input type="number" name="number">
            <input type="submit" value="Usuń film" name="send"></br>
        </form>
        <?php
            if(isset($_POST['send'])){
                if(!empty($_POST['number'])){
                    $number = $_POST['number'];
                    $c->query("DELETE FROM produkty WHERE id = $number;");
                    header("Location:video.php");
                    $c->close();

                } else echo "Nie wprowadzono wratości";

            } else {
                mysqli_error($c);
                $c->close();
            }
            
            
        ?>
        Strone wykonał:<a href="mailto:ja@poczta.com">000000000</a>   
    </section>
</body>
</html>