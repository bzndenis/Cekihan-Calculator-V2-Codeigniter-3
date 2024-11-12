var app = angular.module("myApp", []);

app.controller("gameCtrl", function ($scope) {
  $scope.playerToAdd = "";
  $scope.playerMap = new Map();
  $scope.playerList = [];
  $scope.showAddPlayer = true;
  $scope.showPlayerTable = false;
  $scope.showEndGame = false;
  $scope.gameWinner = "";
  $scope.addPlayer = function () {
    $scope.playerMap.set($scope.playerToAdd, 0);
    $scope.playerList.push($scope.playerToAdd);
    $scope.playerToAdd = "";
  };
  $scope.startGame = function () {
    $scope.showAddPlayer = false;
    $scope.showPlayerTable = true;
  };
  $scope.addToScore = function (player, pointsToAdd) {
    let newScore = $scope.playerMap.get(player) + pointsToAdd;
    $scope.playerMap.set(player, newScore);
  };
  $scope.endGame = function () {
    $scope.showPlayerTable = false;
    $scope.showEndGame = true;
    $scope.listOfLosers = [];
    let minKey = "";
    let minVal = Infinity;
    for (const [key, value] of $scope.playerMap.entries()) {
      if (minVal > value) {
        minKey = key;
        minVal = value;
      } else if (minVal == value) {
        $scope.listOfLosers.push(minKey);
        minKey = key;
        minVal = value;
      } else {
        $scope.listOfLosers.push(key);
      }
    }
    $scope.listOfLosers.push(minKey);
  };
});
