<html>
    <head>
       <tittle><h1>Tabuada PHP</h1></tittle>
    </head>
    <body>
    <div>
        <form method="post" action=""> 
            <label for="numero">Digite um número: </label>
            <input type="number" name="numero" id="numero"></input>
            <button type="submit" name="gerar">Calcular</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $numero = $_POST['numero'];

                echo "<h2>Tabuada do $numero</h2>";
                echo "<ul>";

                for ($i = 1; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "<li>$numero x $i = $resultado</li>";
                }

                echo "</ul>";
            }
        ?>
    </div>
        <br>
    <div>
        <?php 
            $numero = 1;
            echo "Tabuada Manual do número " . $numero . "<br>";
            echo "<br>1 x 1 = " .  $numero * 1;
            echo "<br>1 x 2 = " .  $numero * 2;
            echo "<br>1 x 3 = " .  $numero * 3;
            echo "<br>1 x 4 = " .  $numero * 4;
            echo "<br>1 x 5 = " .  $numero * 5;
            echo "<br>1 x 6 = " .  $numero * 6;
            echo "<br>1 x 7 = " .  $numero * 7;
            echo "<br>1 x 8 = " .  $numero * 8;
            echo "<br>1 x 9 = " .  $numero * 9;
            echo "<br>1 x 10 = " . $numero * 10;

            $numero = 2;
            echo "<br><br>Tabuada Manual do número " . $numero . "<br>";
            echo "<br>2 x 1 = " .  $numero * 1;
            echo "<br>2 x 2 = " .  $numero * 2;
            echo "<br>2 x 3 = " .  $numero * 3;
            echo "<br>2 x 4 = " .  $numero * 4;
            echo "<br>2 x 5 = " .  $numero * 5;
            echo "<br>2 x 6 = " .  $numero * 6;
            echo "<br>2 x 7 = " .  $numero * 7;
            echo "<br>2 x 8 = " .  $numero * 8;
            echo "<br>2 x 9 = " .  $numero * 9;
            echo "<br>2 x 10 = " . $numero * 10;
        
            $numero = 3;
            echo "<br><br>Tabuada Manual do número " . $numero . "<br>";
            echo "<br>3 x 1 = " .  $numero * 1;
            echo "<br>3 x 2 = " .  $numero * 2;
            echo "<br>3 x 3 = " .  $numero * 3;
            echo "<br>3 x 4 = " .  $numero * 4;
            echo "<br>3 x 5 = " .  $numero * 5;
            echo "<br>3 x 6 = " .  $numero * 6;
            echo "<br>3 x 7 = " .  $numero * 7;
            echo "<br>3 x 8 = " .  $numero * 8;
            echo "<br>3 x 9 = " .  $numero * 9;
            echo "<br>3 x 10 = " . $numero * 10;

            $numero = 4;
            echo "<br><br>Tabuada Manual do número " . $numero . "<br>";
            echo "<br>4 x 1 = " .  $numero * 1;
            echo "<br>4 x 2 = " .  $numero * 2;
            echo "<br>4 x 3 = " .  $numero * 3;
            echo "<br>4 x 4 = " .  $numero * 4;
            echo "<br>4 x 5 = " .  $numero * 5;
            echo "<br>4 x 6 = " .  $numero * 6;
            echo "<br>4 x 7 = " .  $numero * 7;
            echo "<br>4 x 8 = " .  $numero * 8;
            echo "<br>4 x 9 = " .  $numero * 9;
            echo "<br>4 x 10 = " . $numero * 10;

            $numero = 5;
            echo "<br><br>Tabuada Manual do número " . $numero . "<br>";
            echo "<br>5 x 1 = " .  $numero * 1;
            echo "<br>5 x 2 = " .  $numero * 2;
            echo "<br>5 x 3 = " .  $numero * 3;
            echo "<br>5 x 4 = " .  $numero * 4;
            echo "<br>5 x 5 = " .  $numero * 5;
            echo "<br>5 x 6 = " .  $numero * 6;
            echo "<br>5 x 7 = " .  $numero * 7;
            echo "<br>5 x 8 = " .  $numero * 8;
            echo "<br>5 x 9 = " .  $numero * 9;
            echo "<br>5 x 10 = " . $numero * 10;

            $numero = 6;
            echo "<br><br>Tabuada Manual do número " . $numero . "<br>";
            echo "<br>6 x 1 = " .  $numero * 1;
            echo "<br>6 x 2 = " .  $numero * 2;
            echo "<br>6 x 3 = " .  $numero * 3;
            echo "<br>6 x 4 = " .  $numero * 4;
            echo "<br>6 x 5 = " .  $numero * 5;
            echo "<br>6 x 6 = " .  $numero * 6;
            echo "<br>6 x 7 = " .  $numero * 7;
            echo "<br>6 x 8 = " .  $numero * 8;
            echo "<br>6 x 9 = " .  $numero * 9;
            echo "<br>6 x 10 = " . $numero * 10;

            $numero = 7;
            echo "<br><br>Tabuada Manual do Número " . $numero . "<br>";
            echo "<br>7 x 1 = " .  $numero * 1;
            echo "<br>7 x 2 = " .  $numero * 2;
            echo "<br>7 x 3 = " .  $numero * 3;
            echo "<br>7 x 4 = " .  $numero * 4;
            echo "<br>7 x 5 = " .  $numero * 5;
            echo "<br>7 x 6 = " .  $numero * 6;
            echo "<br>7 x 7 = " .  $numero * 7;
            echo "<br>7 x 8 = " .  $numero * 8;
            echo "<br>7 x 9 = " .  $numero * 9;
            echo "<br>7 x 10 = " . $numero * 10;

            $numero = 8;
            echo "<br><br>Tabuada Manual do Número " . $numero . "<br>";
            echo "<br>8 x 1 = " .  $numero * 1;
            echo "<br>8 x 2 = " .  $numero * 2;
            echo "<br>8 x 3 = " .  $numero * 3;
            echo "<br>8 x 4 = " .  $numero * 4;
            echo "<br>8 x 5 = " .  $numero * 5;
            echo "<br>8 x 6 = " .  $numero * 6;
            echo "<br>8 x 7 = " .  $numero * 7;
            echo "<br>8 x 8 = " .  $numero * 8;
            echo "<br>8 x 9 = " .  $numero * 9;
            echo "<br>8 x 10 = " . $numero * 10;

            $numero = 9;
            echo "<br><br>Tabuada Manual do Número " . $numero . "<br>";
            echo "<br>9 x 1 = " .  $numero * 1;
            echo "<br>9 x 2 = " .  $numero * 2;
            echo "<br>9 x 3 = " .  $numero * 3;
            echo "<br>9 x 4 = " .  $numero * 4;
            echo "<br>9 x 5 = " .  $numero * 5;
            echo "<br>9 x 6 = " .  $numero * 6;
            echo "<br>9 x 7 = " .  $numero * 7;
            echo "<br>9 x 8 = " .  $numero * 8;
            echo "<br>9 x 9 = " .  $numero * 9;
            echo "<br>9 x 10 = " . $numero * 10;

            $numero = 10;
            echo "<br><br>Tabuada Manual do Número " . $numero . "<br>";
            echo "<br>10 x 1 = " .  $numero * 1;
            echo "<br>10 x 2 = " .  $numero * 2;
            echo "<br>10 x 3 = " .  $numero * 3;
            echo "<br>10 x 4 = " .  $numero * 4;
            echo "<br>10 x 5 = " .  $numero * 5;
            echo "<br>10 x 6 = " .  $numero * 6;
            echo "<br>10 x 7 = " .  $numero * 7;
            echo "<br>10 x 8 = " .  $numero * 8;
            echo "<br>10 x 9 = " .  $numero * 9;
            echo "<br>10 x 10 = " . $numero * 10;
        ?>
    </div>
        <style>
            div{
                border: 10px solid #969696;
                padding: 5px;
            }
        </style>
    </body>
</html>
