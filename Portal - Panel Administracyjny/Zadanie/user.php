<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Panel administartora</title>
</head>
<body class=""> 
    <section class="banner">
        <h3>Portal społecznościowy - panel administartora</h3>
    </section>

    <div class="wrap">
        <section class="left">
            <h4>Użytkownicy</h4>
            <?php
                $c = new mysqli('localhost', 'root', '', 'dane4');
                $q = $c->query("SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;");
                if($q->num_rows > 0){
                    while($r = $q->fetch_row()){
                        echo $r[0].". ".$r[1]." ".$r[2].", ".(date('Y') - $r[3])." lat</br>";
                    }
                }
            ?>
            <a href="settings.html">Inne ustawienia</a>
        </section>

        <section class="right">
            <h4>Podaj id użytkownika</h4>
            <form action="user.php" method="POST">
                <input type="number" name="number">
                <input type="submit" value="ZOBACZ" name="send" >
            </form>
            <?php
                if(isset($_POST['send'])){
                    if(!empty($_POST['number'])){
                        $number = $_POST['number'];
                        $qu = $c->query("SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby JOIN hobby ON osoby.Hobby_id = hobby.id AND osoby.id = $number;");

                
                        if($qu->num_rows > 0){
                            while($re = $qu->fetch_assoc()){
                                echo "<h2>".$number.". ".$re['imie']." ".$re['nazwisko']."</h2>";
                                echo "<img src='Images/".$re['zdjecie']."' alt='".$number."'>";
                                echo "<p>Rok urodzenia: ".$re['rok_urodzenia']."</p>";
                                echo "<p>Opis: ".$re['opis']."</p>";
                                echo "<p>Hobby: ".$re['nazwa']."</p>";
                            };
                        } 
                    } else echo "Nie podałeś id do sprawdzenia!!!";
                    
                } else echo "Bazy danych nie odpowiada, proszę poczekać";
                

                // $c->close();
            ?>
            <hr>
        </section>
    </div>
    

    <section class="footer">
        Strone wykonał: 000000000
    </section>
</body>
</html>