<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Kwiaty</title>
</head>
<body>
    <section class="banner">
        <h1>Moje kwiaty</h1>
    </section>

    <section class="left">
        <h3>Kwiaty dla ciebie!</h3>
        <a href="https://www.swiatkwiatow.pl/">Rozpoznaj kwiaty</a>
        <a href="znajdz.php">Znajdź kwiaciarnię</a>
        <img src="Images/gozdzik.jpeg" alt="">
    </section>

    <section class="right">
        <div class="wrap">
            <img src="Images/gerbera.jpeg" alt="Gerbera">
            <img src="Images/gozdzik.jpeg" alt="Goździk">
            <img src="Images/roza.jpeg" alt="Róża">
        </div>
        <p>Podaj miejscowość, w której poszukujesz kwiaciarni:</p>
        <form action="znajdz.php" method="POST">
            <input type="text" name="name">
            <input type="submit" name="send" value="SPRAWDŹ">
        </form>
        <?php
            $c = new mysqli('localhost', 'root', '', 'kwiaciarnia');
            if(isset($_POST['send'])){
                if(!empty($_POST['name'])){
                    $name = $_POST['name'];
                    $q =$c->query("SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$name'");
                    
                    if($q->num_rows > 0){
                        while($r = $q->fetch_row()){
                            echo "<p class='color: lightPink;'>".$r[0].",".$r[1]."</p>";
                        }
                    }
                } else echo "<p style='color:red; font-style:normal; margin:0;'>Prosze wypełnij powyższe pole</p>";
            } else $c->error;
           
        ?>
    </section>

    <section class="footer">
        <h3>Stronę opracował: 000000000</h3>
    </section>
</body>
</html>