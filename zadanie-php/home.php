<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona internetowa z danymi XML</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Strona główna</a></li>
            <li><a href="index.php">Lista kursów</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
    </nav>
    <img class="banerek" src="https://pracabezszefa.pl/wp-content/uploads/2019/11/szkolenia-kursy-online.jpg">
    <main>
        
        <?php
        $str = '<?xml version="1.0"?>
            <products>
                <product>
                    <name>Kurs PHP </name>
                    <price> 79.99 </price>
                    <desc>Opis produktu </desc>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/800px-PHP-logo.svg.png"/>
                </product>
                <product>
                    <name> Kurs MySQL </name>
                    <price> 59.99 </price>
                    <desc> Opis produktu </desc>
                    <img src="https://d1.awsstatic.com/asset-repository/products/amazon-rds/1024px-MySQL.ff87215b43fd7292af172e2a5d9b844217262571.png"/>
                </product>
                <product>
                    <name> Kurs JavaScript </name>
                    <price> 75.00 </price>
                    <desc> Opis produktu </desc>
                    <img src="https://jaki-jezyk-programowania.pl/img/technologies/javascript.png"/>
                </product>
                <product>
                <name> Kurs CSS </name>
                <price> 45.00 </price>
                <desc> Opis produktu </desc>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png"/>
            </product>
            </products>';
        
        $xml = simplexml_load_string($str);
        
        if ($xml === false) {
            echo "Nie udało się wczytać danych XML";
        } else {
            echo "<h1>Produkty:</h1>";
            echo "<table class='table table-hover'>";
            echo "<tr><th scope='col'>Numer Indeksu</th><th scope='col'>Nazwa kursu</th><th scope='col'>Cena</th><th scope='col'>Opis</th></tr>";
            $i = 1;
            foreach ($xml->product as $product) {
                echo "<tr>";
                echo "<td scope='row'>" . $i++ . "</td>";
                echo "<td>" . $product->name . "</td>";
                echo "<td>" . $product->price . "</td>";
                echo "<td>" . $product->desc . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </main>
    
    <footer>
        <p>Strona stworzona przez ...</p>
    </footer>
</body>
</html>