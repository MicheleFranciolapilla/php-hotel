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

    $numeral_array  = [
        'Primo',
        'Secondo',
        'Terzo',
        'Quarto',
        'Quinto'
    ];

    foreach($hotels as $index => $associative_array)
    {
        echo "<br";
        echo $numeral_array[$index] . " hotel della lista: <br>";
        echo "- " . $associative_array['name'] . "<br>";
        echo "Voto: " . $associative_array['vote'] . "<br>";
        echo "Distanza dal centro: " . $associative_array['distance_to_center'] . "Km<br>";
        $parking = "Presente";
        if (! $associative_array['parking'])
        {
            $parking = "Assente";
        }
        echo "Parcheggio: " . $parking . "<br>";
        echo "----------------------------------------<br>";
    }

?>