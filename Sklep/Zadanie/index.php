<!DOCTYPE html>
<html lang="pl">
<?php
    $connetion = mysqli_connect('localhost', 'root', '', 'sklep') or die(mysqli_error());
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep papierniczy</title>
</head>
<body>
    <section class="banner">
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </section>

    <div class="top">
        <section class="left">
            <h3>Promocja 15% obejmuje artykuły:</h3>
            <ul>
            <?php
                $query = 'SELECT nazwa FROM towary WHERE promocja = 1';
                
                $result = mysqli_query($connetion, $query);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_row($result)){
                        echo "<li>".$row[0]."</li>";
                    }
                }

                
            ?>
            </ul>
        </section>

        <section class="middle">
            <h3>Cena wybranego artykułu w promocji</h3>
            <form action="index.php" method="POST">
                <select name="things" id="">
                    <option value="" diabled selected></option>
                    <option value="Gumka">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki">Pisaki 60 szt.</option>
                    <option value="Markery">Markery 4 szt.</option>
                </select>
                <input type="submit" name="submit" value="WYBIERZ">
            </form>
            <?php

                if(isset($_POST['submit'])){
                    if(!empty($_POST['things'])) {
                        $selected = $_POST['things'];
                        $result = mysqli_query($connetion, "SELECT cena FROM towary WHERE nazwa LIKE '%$selected%'");

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_row($result)){
                                echo round($row[0] * 0.85, 2);
                            }
                        }
                    } else {
                        echo 'Prosze wybrac wartość';
                    }
                }

                

                mysqli_close($connetion);
            ?>
        </section>

        <section class="right">
            <h3>Kontakt</h3>
            <p>telefon: 123123123</br><a href="mailto:bok@sklep.pl">e-mail:bok@sklep.pl</a></p>
            <img src="./images/promocja2.png" alt="promocja">
        </section>
    </div>

    
    <section class="footer">
        <h4>Autor strony 000000</h4>
    </section>
    
</body>
</html>