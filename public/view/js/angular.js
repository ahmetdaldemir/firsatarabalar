
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
            if (response.data.status == false) {
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
            if (response.data.success == true) {
                window.location.reload();
            } else {
                $scope.loginMessage = "*** " + response.data.message;
            }
        });
    }


    $scope.GetModel = function (item,brands) {
        alert(brands);
        $http({
            method: "GET",
            url: "/getmodel?year=" + item + "&brand="+brands+"",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false

        }).then(function (response) {
            $scope.modelList = response.data;
        });
    }

    $scope.GetVersion = function (item) {
        $http({
            method: "GET",
            url: "/getversion?id=" + item + "",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',

        }).then(function (response) {
             $scope.versionList = response.data;
        });
    }



    $scope.GetDistricts = function (item) {
        $http({
            method: "GET",
            url: "/getdistricts?id=" + item + "",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false

        }).then(function (response) {
            $scope.districtsList = response.data;
        });
    }

    $scope.VehicleModal = function () {
        $scope.error = false;
        $("#VehicleModal").modal('show');
    }

    $scope.VehicleRequest = function () {
        $("#VehicleRequestButton").prop('disabled', true);
        $http({
            method: "POST",
            url: "/vehiclerequest",
            data: $("form#VehicleRequest").serialize(),
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
                $("#VehicleRequestButton").prop('disabled', false);
                $("#VehicleModal").modal('hide');
                $scope.error = false;
                Swal.fire('Ekibimiz en kısa süre içerisinde sizinle iletişime geçecektir.')
            },
            function (data) {
                $scope.error = true;
                $scope.customer_id_error = data.data.errors.customer_id[0];
                $scope.brand_id_error = data.data.errors.brand_id[0];
            });
    }

    $scope.GetCar = function (type) {

        $http({
            method: "GET",
            url: "/getcar?type="+type+"",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
                $scope.carList = response.data
            },
            function (data) {
               Swal.fire('Araç Bulunamadı')
            });
    }

}]);