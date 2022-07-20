<?php
if (isset($_POST["submit"])) {
    require "php/resturantsfinder.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WO / WAS ESSEN WIR DENN HEUTE?</title>

    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body>
    <h2>WO / WAS ESSEN WIR DENN HEUTE?</h2>
    <div class="selection-filters">
        <p>Kategorien-FILTER</p>

        <ul id="category" class="filter category">
            <li id="alles">Alles</li>
            <li id="burger">Burger</li>
            <li id="pizza-pasta">Pizza / Pasta</li>
            <li id="asiatisch">Asiatisch</li>
            <li id="hausmannkost">Hausmannkost</li>
            <li id="sonstiges">Sonstiges</li>
        </ul>
        <div class="filter middle-div">
            <div>
                <p>Entfernung</p>
                <ul id="distance" class="filter distance">
                    <li id="far">Egal</li>
                    <li id="middle-distance">nicht so weit weg</li>
                    <li id="near">ganz nah dran</li>
                </ul>
            </div>
            <div>
                <p>Preis</p>
                <ul id="price" class="filter price">
                    <li id="expensive">Egal</li>
                    <li id="middle-price">nicht zu viel</li>
                    <li id="cheap">Ende des Monats</li>
                </ul>
            </div>
        </div>
        <p>Veggietauglich</p>
        <ul id="taste" class="filter taste">
            <li id="viel">Egal</li>
            <li id="middle">sollte schon schmecken</li>
            <li id="wenig">muss ganz lecker sein</li>
        </ul>
    </div>
    <div class="results">
        <div>
            <p>Ergebnisse</p>
            <div class="resturants">
                <ol id="resturants">

                </ol>
            </div>
        </div>
        <div class="container-name">
            <a class="example_c" id="filtered-list"><span>Randomize</span></a>
        </div>

        <div class="container-name">
            <a class="example_c" id="reset"><span>Reset</span></a>
        </div>

    </div>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>