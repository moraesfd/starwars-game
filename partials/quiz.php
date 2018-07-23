<section class="hero-quiz">

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 left">
                <img src="assets/images/tie-fighter.png" alt="">
                <div class="texts">
                    <h2>StarQuiz!</h2>
                    <p>O quiz mais legal do universo Star Wars</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 text-right right">
                <h2 id="timer"></h2>
            </div>
        </div>

    </div>

</section>

<section class="game-quiz">

    <div class="container cards">

        <div class="row">

            <div class="col-sm-3 card" ng-repeat="(key, value) in myData">
                <div class="panel panel-default text-center">
                    <div class="panel-body">
                        <img src="https://starwars-visualguide.com/assets/img/characters/{{ key+1 }}.jpg" alt="">
                    </div>
                    <ul class="list-group">

                        <input type="hidden" id="realNameCharacter" name="realNameCharacter" value="{{ value.name }}">

                        <li class="list-group-item">
                            <button type="button" class="btn btn-primary" id="btn-character{{ key+1 }}">?</button>
                            <button class="btn btn-primary urlCharacter" data-id="{{ value.url }}" data-toggle="modal" data-target="#exampleModalCenter">
                                ...
                            </button>
<!--                            <a data-toggle="modal" data-id="{{ value.name }}" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#exampleModalCenter">...</a>-->
                        </li>
                        <li class="list-group-item"><input type="text" id="nameCharacter" placeholder="Digite o nome"></li>
                    </ul>
                </div>
            </div>

        </div>

        <!--<div class="row">

            <ul class="pager">
                <li class="previous"><a href="#">&larr; Anterior</a>
                </li>
                <li class="next"><a href="#">Próximo &rarr;</a>
                </li>
            </ul>

        </div>-->

    </div>
</section>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">Informações sobre o personagem</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div ng-controller="FetchCtrl">
                        <input type="text" ng-model="url" name="character" id="character" value="" hidden/>
                        <p>Peso: {{ data.height }}</p>
                        <p>Cor do cabelo: {{ data.hair_color }}</p>
                        <p>Cor dos olhos: {{ data.eye_color }}</p>
                        <p>Gênero: {{ data.gender }}</p>
                        <p>Cor da pele: {{ data.skin_color }}</p>

                        <button ng-click="fetch()">Atualizar</button><br>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="overTimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleoverTimeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">Sua pontuação</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h3 class="message-title"></h3>
                    <p> Sua pontuação é: <span class="score"></span></p>
                    <input type="text" name="character" id="character" hidden value=""/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>