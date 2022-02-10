<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Prognoza pogody Poznań</title>
</head>
<body>
    <section class="banner">
        <div class="left">
            <p>maj, 2019 r.</p>
        </div>
        <div class="middle">
            <h2>Prognoza Poznań</h2>
        </div>
        <div class="right">
            <img src="Images/logo.png" alt="prognoza">
        </div>
    </section>
    
    <div class="wrap">
        <section class="left">
            <a href="kwerendy.txt">Kwerendy</a>
        </section>

        <section class="right">
            <img src="Images/obraz.jpg" alt="Polska, Poznań">
        </section>
    </div>
    

    <section class="main">
        <table border="1">
            <tr>
                <th>Lp.</th>
                <th>DATA</th>
                <th>NOC - TEMPERATURA</th>
                <th>DZIEŃ - TEMPERATURA</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php
                $c = new mysqli('localhost', 'root', '', 'pogoda');
                $r = $c->query("SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC;");

                if($r->num_rows > 0){
                    while($rq = $r->fetch_row()){
                        echo "<tr> <td>".$rq[0]."</td> <td>".$rq[2]."</td> <td>".$rq[3]."</td> <td>".$rq[4]."</td> <td>".$rq[5]."</td> <td>".$rq[6]."</td> </tr>";
                    }
                }

                $c->close();
            ?>
        </table>
    </section>

    <section class="footer">
        <p>Stronę wykonał: 000000000</p>
    </section>
</body>
</html>