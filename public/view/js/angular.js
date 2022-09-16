app.controller("MainController", ['$scope', '$http', '$httpParamSerializerJQLike', '$filter', function ($scope, $http, $httpParamSerializerJQLike, $window, $filter) {


    $scope.CustomerLoginForm = function () {
        $("#loginModal").modal("show");
    }

    $scope.CustomerLogin = function () {
        $http({
            method: "GET", url: "/arac-sat", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: false, processData: false, contentType: false

        }).then(function (response) {
            if (response.data.status == false) {
                $("#loginModal").modal('show')
            }
        });
    }

    $scope.login = function () {
        $http({
            method: "POST", url: "/giris-yap", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, data: $("#loginForm").serialize(),
        }).then(function (response) {
            if (response.data.success == true) {
                Swal.fire('Başarılı', 'Giriş Başarılı Anasayfaya Yönlendiriliyorsunuz');
                setInterval(window.location.reload(), 10000);
            } else {
                Swal.fire('Hata', 'Bilgiler hatalı tekrar deneyiniz');
                $scope.loginMessage = "*** " + response.data.message;
            }
        });
    }

    $scope.register = function () {
        $http({
            method: "POST", url: "/kayit-ol", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, data: $("#registerForm").serialize(),
        }).then(function (response) {
            $("#loginModal").modal('hide')

            Swal.fire('info', 'Kayıt Başarılı');
        });
    }

    $scope.GetModel = function (item, brands) {

        $http({
            method: "GET", url: "/getmodel?year=" + item + "&brand=" + brands + "", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: true, processData: false, contentType: false

        }).then(function (response) {
            if(response.data == "")
            {
                $("#version").hide();
                $("#custom_version").show();
            }else{
                $("#custom_version").hide();
                $("#version").show();
                $scope.modelList = response.data;
            }
        });
    }

    $scope.GetVersionOnlyCar = function (item) {
        $http({
            method: "GET", url: "/getversion?id=" + item + "", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json',

        }).then(function (response) {
            $scope.versionList = response.data;
        });
    }

    $scope.GetDistricts = function (item) {
        $http({
            method: "GET", url: "/getdistricts?id=" + item + "", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: true, processData: false, contentType: false

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
            method: "POST", url: "/vehiclerequest", data: $("form#VehicleRequest").serialize(), headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: true, processData: false, contentType: false
        }).then(function (response) {
            $("#VehicleRequestButton").prop('disabled', false);
            $("#VehicleModal").modal('hide');
            $scope.error = false;
            Swal.fire('Ekibimiz en kısa süre içerisinde sizinle iletişime geçecektir.')
        }, function (data) {
            $scope.error = true;
            $scope.customer_id_error = data.data.errors.customer_id[0];
            $scope.brand_id_error = data.data.errors.brand_id[0];
        });
    }

    $scope.GetCar = function (type) {

        $http({
            method: "GET", url: "/getcar?type=" + type + "", headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: true, processData: false, contentType: false
        }).then(function (response) {
            $scope.carList = response.data
        }, function (data) {
            Swal.fire('Araç Bulunamadı')
        });
    }

    $scope.GetBody = function (year, brand, model) {

        $http({
            method: "GET", url: "/getbody?year=" + year + "&brand=" + brand + "&model=" + model, headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: true, processData: false, contentType: false
        }).then(function (response) {
            if(response.data == "")
            {
                $("#version").hide();
                $("#custom_version").show();
            }else{
                $("#custom_version").hide();
                $("#version").show();
                $scope.bodyList = response.data
            }
        }, function (data) {
            Swal.fire('Araç Bulunamadı')
        });
    }

    $scope.GetFuel = function (year, brand, model) {

        $http({
            method: "GET", url: "/getfuel?year=" + year + "&brand=" + brand + "&model=" + model, headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, dataType: 'json', cache: true, processData: false, contentType: false
        }).then(function (response) {
            if(response.data == "")
            {
                $("#version").hide();
                $("#custom_version").show();
            }else{
                $("#custom_version").hide();
                $("#version").show();
                $scope.fuelList = response.data
            }
        }, function (data) {
            Swal.fire('Araç Bulunamadı')
        });
    }

    $scope.GetVersion = function (year, brand, model) {

        $http({
            method: "GET",
            url: "/getversionlist?year=" + year + "&brand=" + brand + "&model=" + model,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
            if(response.data == "")
            {
              $("#version").hide();
              $("#custom_version").show();
            }else{
                $("#custom_version").hide();
                $("#version").show();
                $scope.versionList = response.data
            }
        }, function (data) {
            Swal.fire('Araç Bulunamadı')
        });
    }

    $scope.CustomerCarFollow = function (type, customer_car_id) {
        if (type == 4) {
            $http({
                method: "GET",
                url: "/account.customer.customer_car_id_follow?type=" + type + "&customer_car_id=" + customer_car_id,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false
            }).then(function (response) {
                if (response.data.message != null) {
                    Swal.fire(response.data.message);
                } else {
                    Swal.fire("Kullanıcı Girişi Yapmalısınız");
                }
                $scope.GetCar(4);
            }, function (data) {
                console.log("Burada");
                Swal.fire("Kullanıcı Girişi Yapmalısınız");
            });
        } else {
            Swal.fire(response.data.message);
        }

    }

    $scope.CustomerCarUnFollow = function (follow_id) {
        $http({
            method: "GET", url: "/account.customer.customer_car_id_un_follow?follow_id=" + follow_id, headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
        }).then(function (response) {
            console.log(response);
            window.location.reload();
        }, function (data) {
            Swal.fire(data.data.message);
        });
    }

    $scope.CustomerCarBuy = function (customer_car_id) {
        $http({
            method: "GET",
            url: "/account.customer.car.buy?customer_car_id=" + customer_car_id,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            dataType: 'json',
            cache: true,
            processData: false,
            contentType: false
        }).then(function (response) {
            if (response.data.message != null) {
                Swal.fire(response.data.message);
            } else {
                Swal.fire("Kullanıcı Girişi Yapmalısınız");
            }
            $scope.GetCar(4);
        }, function (data) {
            console.log("Burada");
            Swal.fire("Kullanıcı Girişi Yapmalısınız");
        });

    }

    $scope.AffiliateSave = function () {
        $http({
            method: "POST",
            url: "/account.customer.affiliateSave",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            data: $('form#Affiliate').serialize(),
        }).then(function (response) {
            if (response.data.message != null) {
                Swal.fire(response.data.message);
            } else {
                Swal.fire("Kullanıcı Girişi Yapmalısınız");
            }
            $scope.Affiliate();
        }, function (data) {
            Swal.fire("Kullanıcı Girişi Yapmalısınız");
        });
    }

    $scope.Affiliate = function () {
        $http({
            method: "GET",
            url: "/account.customer.affiliates",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
        }).then(function (response) {
            $scope.affiliates = response.data;
        }, function (data) {
            Swal.fire("Kullanıcı Girişi Yapmalısınız");
        });
    }
}]);