
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

            $numero = 6;
            echo "Tabuada Manual do número " . $numero . "<br>";
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
        ?>
    </div>
        <style>
            div{
                border: 10px solid #969696;
                padding: 5px;
            }
        </style>
    </body>
