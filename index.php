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

        $cleardb_url = parse_url(getenv("CLEAR_DB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_user = $cleardb_url["user"];
        $cleardb_pass = $cleardb_url["pass"];

        $cleardb_db = substr($cleardb_url["path"], 1);

        $active_group = 'default';
        $query_builder = TRUE;

        $conn = new mysqli($cleardb_server, $cleardb_user, $cleardb_pass, $cleardb_db);
        if($conn->connect_error) {
            die("Connection Failed" . $conn->connect_error);
        }

        $sql = "SELECT prenume from test_table";
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