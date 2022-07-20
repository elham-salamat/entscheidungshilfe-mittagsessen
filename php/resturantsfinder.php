
<?php


if (isset($_POST["submit"])) {

    if ($_POST["submit"]) {

        $category = strtoupper($_POST['category']);


        switch ($_POST['distance']) {
            case "far":
                $distance = "***";
                break;

            case "middle-distance":
                $distance = "**";
                break;

            case "near":
                $distance = "*";
                break;

            case null:
                $distance = null;
                break;
        }

        switch ($_POST['price']) {
            case "expensive":
                $price = '***';
                break;

            case "middle-price":
                $price = '**';
                break;

            case "cheap":
                $price = '*';
                break;

            case null:
                $price = null;
                break;
        }

        switch ($_POST['taste']) {
            case "viel":
                $taste = "***";
                break;

            case "middle":
                $taste = "**";
                break;

            case "wenig":
                $taste = "*";
                break;

            case null:
                $taste = null;
                break;
        }


        $serverName = "localhost";
        $dbUserName = "root";
        $dbPassword = "";
        $dbName = "essen-entscheidung";

        $dbConnect = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

        if (!$dbConnect) {
            die("connection failed: " . mysqli_connect_error());
        }

        // $sqlQuery = "SELECT Name FROM `resturants` 
        //              WHERE 
        //              UPPER(`Kategorie`) = '$category'
        //              AND 
        //              `Entfernung` = '$distance' 
        //              AND 
        //              `Preis` = '$price'
        //              AND 
        //              `Veggie-Tauglich` = '$taste'
        //              ";

        $sqlQuery = "SELECT * FROM `resturants` 
                    WHERE";

        if (!is_null($category) && !is_null($distance) && !is_null($price) && !is_null($taste)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category'
                        AND 
                        `Entfernung` = '$distance' 
                        AND 
                        `Preis` = '$price'
                        AND 
                        `VeggieTauglich` = '$taste'
                        ";
        } elseif (!is_null($category) && !is_null($distance) && !is_null($price)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category' OR UPPER(`Kategorie`) = 'Alles'
                        AND 
                        `Entfernung` = '$distance' 
                        AND 
                        `Preis` = '$price'
                        ";
        } elseif (!is_null($category) && !is_null($price) && !is_null($taste)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category' OR UPPER(`Kategorie`) = 'ALLES'
                        AND 
                        `Preis` = '$price'
                        AND 
                        `VeggieTauglich` = '$taste'
                        ";
        } elseif (!is_null($category) && !is_null($distance)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category' OR UPPER(`Kategorie`) = 'ALLES'
                        AND 
                        `Entfernung` = '$distance' 
                        ";
        } elseif (!is_null($category) && !is_null($price)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category' OR UPPER(`Kategorie`) = 'ALLES'
                        AND 
                        `Preis` = '$price' 
                        ";
        } elseif (!is_null($category) && !is_null($taste)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category' OR UPPER(`Kategorie`) = 'ALLES'
                        AND 
                        `VeggieTauglich` = '$taste'
                        ";
        } elseif (!is_null($category)) {
            $sqlQuery .= " UPPER(`Kategorie`) = '$category' OR UPPER(`Kategorie`) = 'ALLES'";
        }


        $results = $dbConnect->query($sqlQuery);
        $records = [];
        $i = 0;

        if ($results !== false && $results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $records[$i] = $row;
                $i++;
            }
        }
    }

    // $result = [];
    // $result['price']    = $price;
    // $result['distance'] = $distance;
    // $result['taste']    = $taste;
    // $result['records']   = $records;
    header("Content-Type: application/json");
    // echo json_encode($result);
    echo json_encode($records);

    exit();
}
