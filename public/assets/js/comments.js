(function() {
    var comments = angular.module('comments', []);

    comments.controller('comment', function ($scope) {
        $scope.comment_text = '';
        $scope.user_name = '';
        $scope.user_email = '';
        $scope.errors = new Array();
        $scope.capcha = '';
        
        $scope.comments_list = [
            
        ];
        
        $scope.collapsed = false;
        
        $scope.toggleHeight = function() {
            $scope.collapsed = !$scope.collapsed;
        };
        
        var validate = function(user_name, user_email, text) {
            if($scope.capcha === '') return false;
            $scope.errors = new Array();
            if(user_name === '') {
                $scope.errors['comment-name'] = true;
            }
            
            if(user_email === '') {
                $scope.errors['comment-email'] = true;
            }
            
            if(text === '') {
                $scope.errors['comment-field'] = true;
            }
            
            return (Object.keys($scope.errors).length === 0);
        };
        
        var reset_fields = function() {
            $scope.comment_text = '';
            $scope.user_name = '';
            $scope.user_email = '';
        };
        
        $scope.addComment = function(user_name, user_email, text) {
            if(validate(user_name, user_email, text)) {
                $scope.comments_list.push({
                    id: 23,
                    content: $scope.comment_text,
                    user_name: $scope.user_name,
                    date: new Date().getTime()
                });
                
                reset_fields();
            }
            
            console.log($scope.comments_list);
        };
    });
    
  
})();


