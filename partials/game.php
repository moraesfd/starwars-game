<?php
include_once('_header.php');

$pagePersons = (isset($_GET['page'])) ? $_GET['page'] : 1;
$numberPerson = 1;

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

function getPersons(){
    $url = "https://swapi.co/api/people/?page=1";
    $array = getArrayFromAPI($url);
    return $array->results;
}

$persons = getPersons();
?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>StarQuiz</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
    </head>
<body>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">StarQuiz!</h1>
            <p class="lead">O quiz mais legal do universo Star Wars</p>
<!--            <div class="countdown"></div>-->
            <span id="timer"></span>
        </div>
    </div>

<section class="cards container">
    <div class="row">
        <?php
        $numberPerson = 1;
            foreach ($persons as $person) { ?>
                <div class="card col-md-3">
                    <img class="card-img-top"
                         src="https://starwars-visualguide.com/assets/img/characters/<?= $numberPerson ?>.jpg"
                         alt="Card image cap">
                    <div class="card-body text-center">
                        <button class="btn btn-primary" id="open-input">?</button>
                        <a data-toggle="modal" data-id="<?= $person->url ?>" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#exampleModalCenter">...</a>
<!--                        <button class="btn btn-primary" id="open-modal" data-toggle="modal" data-target="#exampleModalCenter">...</button>-->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nome do personagem" aria-label="Recipient's username" aria-describedby="basic-addon2" id="name-character">
                        </div>
                    </div>
                </div>
            <?php
                $numberPerson++;
            }
            ?>
    </div>
    <!--<div class="row text-center">
        <a href="game.php?page=<?/*= ($pagePersons == 1) ? $pagePersons : ($pagePersons - 1) */?>"><< Anterior</a>
        <a href="game.php?page=<?/*= ($pagePersons == 9) ? $pagePersons : ($pagePersons + 1) */?>">Próximo >></a>
    </div>-->
</section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="bookId" id="bookId" value=""/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<?php include_once('_footer.php'); ?>