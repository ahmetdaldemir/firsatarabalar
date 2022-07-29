app.controller("MainController", ['$scope', '$http', '$httpParamSerializerJQLike', '$filter', function ($scope, $http, $httpParamSerializerJQLike, $window, $filter) {

    $scope.CustomerLogin = function () {
        $http({
            method: "GET",
            url: "/arac-sat",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false

        }).then(function (response) {
             if(response.data.status == false)
            {
                $("#loginModal").modal('show')
            }
         });
    }

    $scope.login = function () {
        $http({
            method: "POST",
            url: "/giris-yap",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false

        }).then(function (response) {
            if(response.data.success == true)
            {
                window.location.reload();
            }else{
                $scope.loginMessage = "*** "+response.data.message;
            }
        });
    }

}]);