<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Szkoła</title>
</head>
<body>
    <form action="index.php" method="POST">
        Podaj nazwę klasy: <input type="text" name="class">
        <input type="submit" name="send" value="Pokaż klasę">
    </form></br>
    <?php
        

        if(isset($_POST['send'])){
            if(!empty($_POST['class'])){

                if(isset($_POST['class'])){                                                                

                    $className = $_POST['class'];
                    $className = htmlentities($className, ENT_QUOTES, "UTF-8");
                    // strtolower($className);
                    $connect = new mysqli('localhost', 'root', '', 'szkolnictwo') or die($connect->error("Baza danych nie działa"));
                    $result = $connect->query("SELECT uczen.Imie, uczen.Nazwisko, uczen.Srednia_ocen FROM uczen JOIN klasa ON uczen.id_klasy = klasa.id AND klasa.nazwa = '$className'");
                    if($result->num_rows > 0){
                        

                        echo "<table border='1' cellpadding='10'>";
                        echo "<tr> <td>Imię</td><td>Nazwisko</td><td>Średnia ocen</td> </tr>";
                        $averageMark = 0;
                        

                        while($row = $result->fetch_row()){

                            echo "<tr> <td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]"</td> </tr>";
                            $averageMark += $row[2];
                        }

                        echo "</table>";
                        echo "<p>Średnia klasy: ".round($averageMark / $result->num_rows, 3)."</p>";

                    } else if($result->num_rows === 0){

                        echo "<p style='color:red'>Tej klasy nie ma w szkole</p>";
                    }
                    $connect->close();

                } else throw new exception($connect->error("Napotkano problemy z bazą danych"));           
            } else echo "<p style='color:green'>Nie podano nazwy klasy</p>";
        }
    ?>
</body>
</html>