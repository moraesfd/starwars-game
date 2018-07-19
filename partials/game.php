<?php
include_once('_header.php');

$pagePersons = (isset($_GET['page'])) ? $_GET['page'] : 1;

function getArrayFromAPI($url_parameter){
    $url = $url_parameter;
    $headers = array(
        'Content-Type: application/json',
    );
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);

    $result_arr = json_decode($result, 0);
    return $result_arr;
}

function getPersons($page){
    $url = "https://swapi.co/api/people/?page=".$page;
    $array = getArrayFromAPI($url);
    return $array->results;
}

$persons = getPersons($pagePersons);
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">StarQuiz!</h1>
            <p class="lead">O quiz mais legal do universo Star Wars</p>
        </div>
    </div>

<section class="cards container">
    <div class="row">
        <?php
            foreach ($persons as $person) { ?>
                <div class="card col-md-3">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h1><?= $person->name ?></h1>
                        <a href="#" class="btn btn-primary">?</a>
                        <a href="#" class="btn btn-primary">...</a>
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
    <div class="row text-center">
        <a href="game.php?page=<?= ($pagePersons - 1) ?>"><< Anterior</a>
        <a href="game.php?page=<?= ($pagePersons + 1) ?>">Próximo >></a>
    </div>
</section>

<?php include_once('../partials/_footer.php'); ?>