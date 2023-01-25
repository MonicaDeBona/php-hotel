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


$newHotels = [];
if (isset($_POST['chooseParking'])) {
    $userParkingChoice = $_POST['chooseParking'];
    foreach ($hotels as $key => $hotel) {
        if ($hotel['parking'] == true) {
            array_push($newHotels, $hotel);
        }
    }
    $hotels = $newHotels;
}

if (isset($_POST['chooseVote']) && $_POST['chooseVote'] != '') {
    $userVoteChoice = $_POST['chooseVote'];
    foreach ($hotels as $key => $hotel) {
        if ($userVoteChoice == $hotel['vote']) {
            array_push($newHotels, $hotel);
        }
    }
    $hotels = $newHotels;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>

    <!-- Importing bootstrap v5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="./index.php" method="POST" class="w-25 my-5">
                        <div class="mb-3 mt-5">
                            <!-- <select class="form-select" name="chooseParking">
                                <option selected>Search for hotels that have parking</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select> -->
                            Do you need parking area?
                            <input type="checkbox" name="chooseParking" value="Yes">
                        </div>
                        <div class="mb-3">
                            <label for="hotelsVote" class="form-label">Choose hotel rating</label>
                            <input type="number" class="form-control" name="chooseVote" max="5">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Parking</th>
                                <th scope="col">Vote</th>
                                <th scope="col">Distance to center</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($hotels as $key => $hotel) {
                                echo "
                        <tr>
                        <td>{$hotel['name']}</td>
                        <td>{$hotel['description']}</td>
                        <td>{$hotel['parking']}</td>
                        <td>{$hotel['vote']}</td>
                        <td>{$hotel['distance_to_center']}</td>
                        </tr>
                        ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>