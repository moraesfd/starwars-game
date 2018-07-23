// Angular

var app = angular.module('app', [
    'ngRoute'
]);

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when("/", {templateUrl: "partials/home.php", controller: "PageCtrl"})
        .when("/quiz", {templateUrl: "partials/quiz.php", controller: "CharacterCtrl"})
        .otherwise("/404", {templateUrl: "partials/404.php", controller: "PageCtrl"});
}]);

app.controller('CharacterCtrl', function($scope, $http) {
    $http.get("https://swapi.co/api/people/?page=1").
        then(function (response) {
            $scope.myData = response.data.results;
        });
});

app.controller('PageCtrl', function (/* $scope, $location, $http */) {
    console.log("Page Controller reporting for duty.");
});

function FetchCtrl($scope, $http, $templateCache) {
    $scope.fetch = function() {
        $scope.method = 'GET';
        $scope.url = $("#character").val();
        $scope.code = null;
        $scope.response = null;

        $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
        success(function(data, status) {
            $scope.status = status;
            $scope.data = data;
        }).
        error(function(data, status) {
            $scope.data = data || "Request failed";
            $scope.status = status;
        });
    };
}

// Functions
var count = 60;
var counter=setInterval(timer, 1000);

function timer()
{
    count=count-1;
    if (count < 0)
    {
        clearInterval(counter);

        disableActions();
        var points = getPontuation();
        showMessagePontuation(points);

        return;
    }

    document.getElementById("timer").innerHTML=count + " segundos";
}

function getPontuation(){
    var inputName = "";
    var realName = "";
    var points = 0;
    $(".card").each(function(){
        inputName = $(this).find("#nameCharacter").val().toLowerCase();
        realName = $(this).find("#realNameCharacter").val().toLowerCase();
        if (inputName === realName){
            points =+ 10;
        }
    });
    return points;
}

function showMessagePontuation(points) {
    if (points < 60){
        $("#overTimeModal .message-title").text("Pontuação abaixo da média. Precisa melhorar!");
    } else if (points >= 60 || points < 80){
        $("#overTimeModal .message-title").text("Pontuação na média. Está bom, mas melhorar sempre!");
    } else  {
        $("#overTimeModal .message-title").text("Pontuação além da média. Parabéns!");
    }
    $("#overTimeModal .score").text(points);

    $("#overTimeModal").modal('show');
}

function disableActions(){
    $(".cards #nameCharacter").prop('disabled', true);
}

$(document).on("click", ".urlCharacter", function () {
    var urlCharacter = $(this).data('id');
    $(".modal-body #character").val( urlCharacter );
});