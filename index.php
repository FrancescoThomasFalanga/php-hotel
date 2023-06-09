<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parking = $_GET["parking"] ?? "";
    $vote = $_GET["vote"] ?? "";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Hotel</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

    <h1 class="text-center mt-4">PHP - Hotel</h1>

    <div class="container text-center">

        <form action="index.php" method="GET" class="container d-flex justify-content-center align-items-center mt-4">

            <strong class="pe-2">Filtra per Parcheggio</strong>
            <select name="parking" class="form-select" style="width: 200px">
                <option value="nop">Nessun Filtro</option>
                <option value="true">SI</option>
                <option value="false">NO</option>
            </select>

            <strong class="pe-2 ps-4">Filtra per Punteggio</strong>
            <input name="vote" type="number" class="form-control" placeholder="Numero tra 1 e 5" style="width: 200px">

            <input type="submit">

        </form>


        <table class="table mt-5">

            <thead>
                <tr>

                <?php 
                
                foreach($hotels[0] as $chiave => $valore) {

                    ?>

                    <th scope="col"> <?php echo $chiave ?> </th>

                    <?php

                };
                
                ?>

                </tr>

            </thead>

            <tbody>

            <?php 
            
            foreach($hotels as $hotel) {

                if (($parking == "true" && $hotel["parking"] == true) || $parking == "nop" || $parking == null) {

                    if ($hotel["vote"] >= $vote) {
            ?>
            
                        <tr>
            
                        <?php 
                            foreach($hotel as $chiave => $info) {

                                echo "<td>{$info}</td>";

                            };
                        ?>
            
                        </tr>
            
            <?php
                    };


                } else if($parking == "false") {

            ?>

                <tr>

                <?php 

                foreach($hotel as $chiave => $info) {

                    echo "<td>{$info}</td>";

                };

                ?>

            </tr>

            <?php

                };
            };
            
            ?>

            </tbody>



        </table>



    </div>



</body>
</html>