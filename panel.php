<!DOCTYPE html>
<html lang="pl">
    <head>  
        <title>Panel administracyjny</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
        <style>
            .container {
                margin-top: 1%;
            }
            @media only screen and (orientation: landscape) and (min-width: 1280px) {
                .container {
                    width:1280px;
                }
            }
        </style>
    </head>  
    <body>  
        
        <div class="container">  
            <a href="index.php" class="back"><i class="fas fa-long-arrow-alt-left"></i> Powrót do strony głównej</a>
   <br />
            <h3 align="center">Panel administracyjny</h3><br />
   <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <div class="alert alert-success alert-dismissible" ng-show="success" >
                    <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                    {{successMessage}}
                </div>
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID klienta</th>
                                <th>ID naprawy</th>
                                <th>Telefon</th>
                                <th>Samochód</th>
                                <th>Opis usterki</th>
                                <th>Opis naprawy</th>
                                <th>Koszt</th>
                                <th>Etap</th>
                                <th>Działanie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.idk" class="form-control" placeholder="ID klienta" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.idn" class="form-control" placeholder="ID naprawy" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.tel" class="form-control" placeholder="Nr telefonu" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.car" class="form-control" placeholder="Opisz auto" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.opisU" class="form-control" placeholder="Opisz usterkę" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.opisN" class="form-control" placeholder="Opisz naprawę" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.koszt" class="form-control" placeholder="Koszt naprawy" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.etap" class="form-control" placeholder="Etap" ng-required="true" /></td>
                                                                
                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                            
                        </tbody>
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.idk}}</td>
                    <td>{{data.idn}}</td>
                    <td>{{data.tel}}</td>
                    <td>{{data.car}}</td>
                    <td>{{data.opisU}}</td>
                    <td>{{data.opisN}}</td>
                    <td>{{data.koszt}} PLN</td>
                    <td>{{data.etap}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edytuj</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.id)">Usuń</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.idk" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.idn" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.tel" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.car" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.opisU" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.opisN" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.koszt" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.etap" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.id" />
                        <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Edytuj</button>
                        <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Usuń</button>
                    </td>
                </script>         
   </div>  
  </div>
    </body>  
</html>  
<script>
var app = angular.module('liveApp', []);

app.controller('liveController', function($scope, $http){

    $scope.formData = {};
    $scope.addData = {};
    $scope.success = false;

    $scope.getTemplate = function(data){
        if (data.id === $scope.formData.id)
        {
            return 'edit';
        }
        else
        {
            return 'display';
        }
    };

    $scope.fetchData = function(){
        $http.get('select.php').success(function(data){
            $scope.namesData = data;
        });
    };

    $scope.insertData = function(){
        $http({
            method:"POST",
            url:"insert.php",
            data:$scope.addData,
        }).success(function(data){
            $scope.success = true;
            $scope.successMessage = data.message;
            $scope.fetchData();
            $scope.addData = {};
        });
    };

    $scope.showEdit = function(data) {
        $scope.formData = angular.copy(data);
    };

    $scope.editData = function(){
        $http({
            method:"POST",
            url:"edit.php",
            data:$scope.formData,
        }).success(function(data){
            $scope.success = true;
            $scope.successMessage = data.message;
            $scope.fetchData();
            $scope.formData = {};
        });
    };

    $scope.reset = function(){
        $scope.formData = {};
    };

    $scope.closeMsg = function(){
        $scope.success = false;
    };

    $scope.deleteData = function(id){
        if(confirm("Czy na pewno chcesz usunąć ten wiersz?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'id':id}
            }).success(function(data){
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetchData();
            }); 
        }
    };

});

</script>