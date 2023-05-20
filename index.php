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
        <table class="table">
            <thead>
                <tr>
                    <?php
                        $keys = array_keys($hotels[0]);
                        foreach ($keys as $index => $key)
                        {
                            if ($index == 0)
                            {
                                echo "<th scope='col'>#</th>";
                            }
                            if ($key != "description")
                            {
                                if ($key == "distance_to_center")
                                {
                                    $key .= " (Km)";
                                }
                                echo "<th scope='col'>$key</th>";
                            }
                        }
                        unset($index);
                        unset($key);
                    ?> 
                </tr>
            </thead>
            <tboby>
                <?php
                foreach ($hotels as $hotel_index => $hotel)
                {
                    $parking = "Yes";
                    if (!$hotel["parking"])
                    {
                        $parking = "No";
                    }
                    $echo_str = "<tr><th scope='row'>" . strval($hotel_index+1) . "</th>";
                    foreach ($keys as $index => $key)
                    {
                        if ($key != "description")
                        {
                            if ($key == "parking")
                            {
                                $echo_str .= "<td>" . $parking . "</td>";
                            }
                            else
                            {
                                $echo_str .= "<td>$hotel[$key]</td>";
                            }
                        }
                    }
                    $echo_str .= "</tr>";
                    // var_dump($echo_str);
                    echo $echo_str;
                }
                ?>
            </tboby>
        </table>
    </main>
</body>
</html>