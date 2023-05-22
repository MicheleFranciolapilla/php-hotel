<?php

    $parking = $_GET["parking"];
    $vote = $_GET["vote"];
    $valid_items = 0;
    $message_str = "";

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

    // Array di numeri ordinali per elencare gli hotel nella Milestone 1
    // $numeral_array  = [
    //     'Primo',
    //     'Secondo',
    //     'Terzo',
    //     'Quarto',
    //     'Quinto'
    // ];

    // Output della Milestone 1
    // foreach($hotels as $index => $associative_array)
    // {
    //     echo "<br";
    //     echo $numeral_array[$index] . " hotel della lista: <br>";
    //     echo "- " . $associative_array['name'] . "<br>";
    //     echo "Voto: " . $associative_array['vote'] . "<br>";
    //     echo "Distanza dal centro: " . $associative_array['distance_to_center'] . "Km<br>";
    //     $parking = "Presente";
    //     if (! $associative_array['parking'])
    //     {
    //         $parking = "Assente";
    //     }
    //     echo "Parcheggio: " . $parking . "<br>";
    //     echo "----------------------------------------<br>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link al foglio di stile -->
    <link rel="stylesheet" href="./style.css">
    <title>Hotel - PHP</title>
</head>
<body>
    <header>
        <h1 class="text-center text-primary">Hotel - PHP</h1>
    </header>
    <main class="row m-5">
        <section id="form_section" class="col-3 p-2 border border-3 rounded-3 bg-info">
            <h3 class="text-center text-black-50">Filters</h3>
            <form id="form_id" action="index.php" method="GET">
                <!-- Sotto sezione checkbox e radiobuttons per filtro parcheggio -->
                <!-- <div class="form-check border border-1 border-dark rounded-2 bg-light"> -->
                    <!-- <input id="parking_check" class="form-check-input mx-1" type="checkbox"> -->
                    <!-- <label for="parking_check" class="form-check-label">Go to filter for "parking"</label> -->
                    <div id="parking_radiobuttons" class="form-check ps-5">
                        <div>
                            <input id="with_parking" class="form-check-input" type="radio" name="parking"  
                                <?php
                                    if (isset($parking) && $parking == "with") echo "checked";
                                ?>
                            value="with">
                            <label for="with_parking" class="form-check-label">With Parking</label>
                        </div>
                        <div>
                            <input id="without_parking" class="form-check-input" type="radio" name="parking"  
                                <?php
                                    if (isset($parking) && $parking == "without") echo "checked";
                                ?>
                            value="without">
                            <label for="without_parking" class="form-check-label">Without Parking</label>
                        </div>
                    </div>
                <!-- Sotto sezione checkbox e input per filtro voto -->
                <!-- </div> -->
                <!-- <div class="form-check my-2 border border-1 border-dark rounded-2 bg-light"> -->
                    <!-- <input id="vote_check" class="form-check-input mx-1" type="checkbox"> -->
                    <!-- <label for="vote_check" class="form-check-label">Go to filter for "vote"</label> -->
                    <div class="form-check ps-5 my-5">
                        <input id="vote_input" class="form-check-input" type="number" min="0" max="5" step="0.5" name="vote" value = "<?php if (isset($vote)) echo $vote; ?>">
                        <label for="vote_input" class="form-check-label mx-2">Vote</label>
                    </div>
                <!-- </div> -->
                <!-- Pulsante submit -->
                <div class="d-flex justify-content-center my-3">
                    <button type="submit">Show table</button>
                </div>
            </form>
            <!-- <?php
                var_dump($parking);
            ?> -->
        </section>
        <section id="table_container" class="col-7 offset-1">
            <!-- Bootstrap table -->
            <table class="table table-dark table-striped">
                <!-- Creazione dinamica del thead -->
                <thead>
                    <tr>
                        <?php
                            // Si salvano in un array tutte le chiavi dei sotto-array (singolo hotel)
                            $keys = array_keys($hotels[0]);
                            foreach ($keys as $index => $key)
                            {
                                // Al primo giro di foreach vengono create due colonne: la colonna numerata e quella della key indirizzata
                                // Creazione della colonna numerata
                                if ($index == 0)
                                {
                                    echo "<th scope='col'>#</th>";
                                }
                                // Creazione della colonna indirizzata (escludendo "description" poichè ridondante)
                                if ($key != "description")
                                {
                                    // Alla key della distanza dal centro si aggiunge l'unità di misura (Km)
                                    if ($key == "distance_to_center")
                                    {
                                        $key .= " (Km)";
                                    }
                                    echo "<th scope='col'>$key</th>";
                                }
                            }
                            // Si "distruggono" le variabili del foreach in via precauzionale
                            unset($index);
                            unset($key);
                        ?> 
                    </tr>
                </thead>
                <!-- Creazione dinamica del tbody con due foreach annidati -->
                <tboby>
                    <?php
                    if (isset($parking))
                        $parking_bool = ($parking == "with");
                    // Primo foreach per settaggio stringhe e output
                    foreach ($hotels as $hotel_index => $hotel)
                    {
                        // Assegnazione di dato stringa al campo "parcheggio"
                        $parking_str = "Yes";
                        if (!$hotel["parking"])
                        {
                            $parking_str = "No";
                        }
                        // Inizio costruzione dell'output con numero di riga
                        $echo_str = "<tr><th scope='row'>" . strval($hotel_index+1) . "</th>";
                        // Secondo foreach per costruzione output ed esclusione del campo ridondante
                        foreach ($keys as $index => $key)
                        {
                            // Esclusione del campo ridondante
                            if ($key != "description")
                            {
                                // Frammento di output per chiave parcheggio
                                if ($key == "parking")
                                {
                                    $echo_str .= "<td>" . $parking_str . "</td>";
                                }
                                // Frammento di output per le altre chiavi
                                else
                                {
                                    $echo_str .= "<td>$hotel[$key]</td>";
                                }
                            }
                        }
                        // Completamento dell'output
                        $echo_str .= "</tr>";

                        $condition1 = (!isset($parking) && !isset($vote));
                        $condition2 = (isset($parking) && ($hotel["parking"] == $parking_bool) && isset($vote) && ($hotel["vote"] >= $vote));
                        $condition3 = (isset($parking) && ($hotel["parking"] == $parking_bool) && !isset($vote));
                        $condition4 = (!isset($parking) && isset($vote) && ($hotel["vote"] >= $vote));

                        if  ($condition1 || $condition2 || $condition3 || $condition4)
                        {
                            // Generazione rigo tabella mediante output
                            echo $echo_str;
                            $valid_items++;
                        }
                    }
                    ?>
                </tboby>
            </table>
            <?php
                if ($valid_items != 0)
                    $message_str = 'Campo "description" non visualizzato poichè ridondante!';
                else
                $message_str = 'La ricerca con i filtri impostati non ha prodotto risultati!';
                echo '<span class="p-2 border border-3 bg-warning">' . $message_str . '</span>';
            ?>
        </section>
    </main>
    <!-- CDN per Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>