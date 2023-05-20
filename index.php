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
    <title>Hotel - PHP</title>
</head>
<body>
    <header>
        <h1 class="text-center text-primary">Hotel - PHP</h1>
    </header>
    <main>
        <div id="table_container" class="row m-5">
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
                    // Primo foreach per settaggio stringhe e output
                    foreach ($hotels as $hotel_index => $hotel)
                    {
                        // Assegnazione di dato stringa al campo "parcheggio"
                        $parking = "Yes";
                        if (!$hotel["parking"])
                        {
                            $parking = "No";
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
                                    $echo_str .= "<td>" . $parking . "</td>";
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
                        // Generazione rigo tabella mediante output
                        echo $echo_str;
                    }
                    ?>
                </tboby>
            </table>
        </div>
            <span class="mx-5 p-2 border border-3 bg-warning">Campo "description" non visualizzato poichè ridondante!</span>
    </main>
</body>
</html>