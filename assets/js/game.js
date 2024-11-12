var app = angular.module("myApp", []);

app.controller("gameCtrl", function ($scope, $http) {
    $scope.playerToAdd = "";
    $scope.playerList = [];
    $scope.showAddPlayer = true;
    $scope.showPlayerTable = false;
    $scope.showEndGame = false;
    $scope.gameWinner = "";
    
    $scope.addPlayer = function () {
        if($scope.playerToAdd.trim() !== "") {
            $http.post('/game/add_player', {
                player_name: $scope.playerToAdd
            }).then(function(response) {
                if(response.data.success) {
                    $scope.playerList.push($scope.playerToAdd);
                    $scope.playerToAdd = "";
                }
            });
        }
    };

    $scope.addToScore = function (player, pointsToAdd) {
        if(!isNaN(pointsToAdd)) {
            $http.post('/game/add_score', {
                player: player,
                points: pointsToAdd
            }).then(function(response) {
                if(response.data.success) {
                    $scope.addToScoreList[$scope.playerList.indexOf(player)] = '';
                }
            });
        }
    };

    $scope.endGame = function () {
        $http.get('/game/get_winner').then(function(response) {
            $scope.showPlayerTable = false;
            $scope.showEndGame = true;
            $scope.gameWinner = response.data.winner;
            $scope.listOfLosers = response.data.losers;
        });
    };
});