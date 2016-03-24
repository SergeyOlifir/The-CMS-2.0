(function() {
    var feedback = angular.module('feedback', ['ngResource']);
    feedback.factory('Feedback',['$resource', function($resource) {
        return $resource('/home/feedback/index.json', {}, {
            save: {
                method: 'POST',
                headers: {
                   'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8',
                },
                
                transformRequest: function(obj) {
                    var str = [];
                    for(var p in obj)
                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    return str.join("&");
                },
                
                url: '/home/feedback/create.json'
            }
        });
    }]);

    feedback.controller('feedback',['$scope', 'Feedback', function ($scope, Feedback) {
        $scope.expanded = false;
        $scope.name = '';
        $scope.mail = '';
        $scope.text = '';
        
        $scope.sucsAlert = false;
        $scope.dungAlert = false;
        
        $scope.errors = new Array();
        
        $scope.toggleHeight = function() {
            $scope.expanded = !$scope.expanded;
        };
        
        $scope.send = function() {
            Feedback.save({
                user_name: $scope.name,
                user_email: $scope.mail,
                text: $scope.text
            }, function(e) {
                if(e.status == "fail") {
                    $scope.errors = e.errors;
                    $scope.sucsAlert = false;
                    $scope.dungAlert = true;
                } else {
                    $scope.sucsAlert = true;
                    $scope.dungAlert = false;
                    $scope.name = '';
                    $scope.mail = '';
                    $scope.text = '';
                }
                
            });
        };
        
    }]);
    $(document).ready(function() {
        angular.bootstrap(document.getElementById("fedback"),['feedback']);
    });
})();