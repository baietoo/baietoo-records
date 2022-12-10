<html>
<head>
    <title>Baietoo Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

<header>

    <?php $nume_site = "BaietooRecords"?> 

    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <?php echo $nume_site ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Acasa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Trimite-ne melodia ta!</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Zona Artistului
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Melodii</a></li>
                <li><a class="dropdown-item" href="#">Date Personale</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Plata</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Contul Meu</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
</header>

<main class="m-4">
    
    <?php
        // learning some basic concepts
        /*
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
        */
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
                $nume = $row['nume'];
                $prenume = $row['prenume'];
                // echo "nume: " . $row['nume'] . " - Prenume:" . $row['prenume'] . "<br />";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>

    <div class="card">
        <div class="card-body">
            <?php echo $nume . " " . $prenume ?>
        </div>
    </div>
    

</main>

<footer>

</footer>


</body>
</html>