app.controller("MainController", ['$scope', '$http', '$httpParamSerializerJQLike', '$filter', function ($scope, $http, $httpParamSerializerJQLike, $window, $filter) {

    $scope.CustomerLogin = function () {
        alert("da");
        $http({
            method: "GET",
            url: "/arac-sat",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        }).then(function (response) {
            if(response == 'false')
            {
                $("loginModal").modal('show')
            }
         });
    }

}]);