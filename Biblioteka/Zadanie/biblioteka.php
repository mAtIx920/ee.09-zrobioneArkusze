<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka publiczna</title>
</head>
<body>
    <section class="banner">
        <h2>Miejska biblioteka publiczna w Książkowicach</h2>
    </section>   
    <div class="wrap">
        <section class="left">
            <h2>Dodaj czytelnika</h2>
            <form action="biblioteka.php" method="POST">
                Imię: <input type="text" name="name"></br>
                Nazwisko: <input type="text" name="surname"></br>
                Rok urodzenia: <input type="number" name="birth"></br>
                <input type="submit" value="DODAJ" name="add">
            </form>
            <?php
            $connect = new mysqli('localhost', 'root', '', 'biblioteka') or die($connect->error());
                if(isset($_POST['add'])){
                    
                    $name = $_POST['name'];
                    $newName = substr($name, 0, 2);
                    $surname = $_POST['surname'];
                    $newSurname = substr($surname, 0, 2);
                    $birth = $_POST['birth'];

                    if(strlen($birth) === 4){
                        $newBirth = substr($birth, 2, 4);
                        $combined = strtolower($newName.$newBirth.$newSurname);
                        $connect->query("INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('$name', '$surname', '$combined')");
                        echo "Czytelnik ".$surname." został dodany do bazy danych";
                    } else echo "Podałeś nieprawidłową datę";                   
                }
            ?>
        </section>
        
        <section class="middle">
            <img src="biblioteka.png" alt="biblioteka">
            <h4><p>ul Czytelnicza 25</p><p>12-120 Kraków</p><p>tel: 123123123</p><p>e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></p></h4>
        </section>
        
        <section class="right">
            <h3>Nasi cyztelnicy:</h3>
            <ul>
                <?php
                    $result = $connect->query("SELECT imie, nazwisko FROM czytelnicy;");
                    if($result->num_rows > 0 ){
                        while($row = $result->fetch_row()){
                            echo "<li>".$row[0]." ".$row[1]."</li>";
                        }
                    }

                    $connect->close();
                ?>
            </ul>
        </section> 
    </div>
    <section class="footer">
        <p>Projekt witryny: 000000000</p>
    </section>
</body>
</html>