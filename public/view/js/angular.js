
app.controller("MainController", ['$scope', '$http', '$httpParamSerializerJQLike', '$filter', function ($scope, $http, $httpParamSerializerJQLike, $window, $filter) {


    $scope.CustomerLoginForm = function () {
         $("#loginModal").modal("show");
    }

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


    $scope.register = function () {
        $http({
            method: "POST",
            url: "/register",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false

        }).then(function (response) {
           Swal.fire('info','Kayıt Başarılı');
        });
    }


    $scope.GetModel = function (item,brands) {

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

    $scope.GetVersionOnlyCar = function (item) {
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

    $scope.GetBody = function (year,brand,model) {

        $http({
            method: "GET",
            url: "/getbody?year="+year+"&brand="+brand+"&model="+model,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
                $scope.bodyList = response.data
            },
            function (data) {
                Swal.fire('Araç Bulunamadı')
            });
    }

    $scope.GetFuel = function (year,brand,model) {

        $http({
            method: "GET",
            url: "/getfuel?year="+year+"&brand="+brand+"&model="+model,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
                $scope.fuelList = response.data
            },
            function (data) {
                Swal.fire('Araç Bulunamadı')
            });
    }

    $scope.GetVersion = function (year,brand,model,body,fuel) {

        $http({
            method: "GET",
            url: "/getversionlist?year="+year+"&brand="+brand+"&model="+model+"&body="+body+"&fuel="+fuel,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
                $scope.versionList = response.data
            },
            function (data) {
                Swal.fire('Araç Bulunamadı')
            });
    }


}]);