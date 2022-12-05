<html>
<head>
    <title>ow damn, php</title>
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
</body>
</html>