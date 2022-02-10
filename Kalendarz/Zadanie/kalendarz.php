<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Mój kalendarz</title>
</head>
<body>
    <section class="banner">
        <div class="left">
            <img src="Images/logo1.png" alt="Mój kalnedarz">
        </div>
        <div class="right">
            <h1>KALENDARZ</h1>
            <!-- skrypt1 -->
            <?php
                $c = new mysqli('localhost', 'root', '', 'egzamin5');
                $q1 = $c->query("SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-1'");
                if($q1->num_rows > 0){
                    while($r1 = $q1->fetch_row()){
                        echo "<h3>miesiąc: ".$r1[0].", rok: ".$r1[1]."</h3>";
                    }
                }
            ?>
        </div>
    </section>

    <section class="main">
        <!-- skrypt2 -->
        <?php
            $q2 = $c->query("SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec'");
            if($q2->num_rows > 0){
                while($r2 = $q2->fetch_row()){
                    echo "<div class='block'> <h5>".$r2[0]."</h5><p>".$r2[1]."</p> </div>";
                }
            }
        ?>
    </section>

    <section class="footer">
        <form action="kalendarz.php" method="POST">
            dodaj wpis <input type="text" name="text">
            <input type="submit" value="DODAJ" name="send">
        </form>
        <?php
            if(isset($_POST['send'])){
                if(isset($_POST['text']) && !empty($_POST['text'])){
                    $paragraph = $_POST['text'];
                    $c->query("UPDATE zadania SET wpis = '$paragraph' WHERE dataZadania = '2020-07-13'");
                    header("Location:kalendarz.php");
                } echo "Wprowadź wymagane dane!!!";
            }
            $c->close();
        ?>
        <p>Strone wykonał: 000000000</p>
    </section>
</body>
</html>