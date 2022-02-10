<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Warzywniak</title>
</head>
<body>
    <section class="banner">
        <div class="left-banner">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </div>
        <div class="right-banner">
            <ol>
                <li>Warzywa</li>
                <li>Owoce</li>
                <li><a href="https://terapiasokami.pl/" target="_blank">Soki</a></li>
            </ol>
        </div>
    </section>

    <section class="main">
        <?php
            $c = new mysqli('localhost', 'root', '', 'dane2');
            $result = $c->query("SELECT nazwa, ilosc, opis, cena, zdjecie FROM Produkty WHERE Rodzaje_id IN(1, 2); ");

            if($result->num_rows > 0){
                while($r = $result->fetch_row()){

                    echo "<div class='product'> <img src='Images/".$r[4]."'><h5>".$r[0]."</h5><p>opis: ".$r[2]."</p><p>na stanie: ".$r[1]."</p><h2>cena: ".$r[3]." zł</h2> </div>";

                }
            }
           
        ?>
    </section>

    <section class="footer">
        <form action="sklep.php" method="POST">
            Nazwa:<input type="text" name="name" id="one">
            Cena:<input type="text" name="price" id="one">
            <input type="submit" value="Dodaj produkty" name="send">
        </form>
        <?php
            if(isset($_POST['send'])){
                if(!(empty($_POST['name']) && empty($_POST['price']))){
                    
                    $name = $_POST['name'];
                    $price = $_POST['price'];   
                    $c->query("INSERT INTO produkty (Rodzaje_id, Producenci_id, nazwa, ilosc, cena, zdjecie) VALUES(1, 4, '$name', 10, $price, 'owoce.jpg')");
                    $name = "";
                    $price = "";
                    header("Location:sklep.php");
                

                } else{
                    echo "<span style='color: yellow'>Wypełnij formularz jeśli chcesz przejść dalej!!!</span>";
                }
               
            } else {
                $c->error;
            }

            $c->close();
        ?>
        </br>
        Stronę wykonał: 000000000
    </section>
</body>
</html>