<html>
<head>
    <title>ow LORD, php</title>
</head>
<body>
    <?php
        define('AN_FONDARE', 2010);
        $nume = "BaietooRecords";
        echo "$nume - Casa de productie muzicala<br />";
        $bani_sir = "300.50";
        $bani = (float)$bani_sir;
        echo "$nume - a facut: $bani de bani!<br />";
        $varname = 'bani';
        $$varname = 600.5;
        echo "$nume - a mai facut: $bani de bani!<br />";
        echo AN_FONDARE;
    ?>

    <?php

        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);

        $conn = new mysqli($server, $username, $password, $db);

        // if($conn->connect_error) {
        //     die("Connection Failed" . $conn->connect_error);
        // }

        $sql = "SELECT * from test_table";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo "nume: " . $row['nume'] . " - Prenume:" . $row['prenume'] . "<br />";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
</body>
</html>