(function() {
    var comments = angular.module('comments', []);

    comments.controller('comment', function ($scope) {
        $scope.comment_text = '';
        $scope.user_name = '';
        $scope.user_email = '';
        
        $scope.comments_list = [
            {
                id: 0,
                content: 'hui'
            },
            {
                id: 0,
                content: 'hui2'
            },
            {
                id: 0,
                content: 'hui3'
            }
        ];
        
        $scope.addComment = function(user_name, user_email, text) {
            if($scope.comment_text !== '') {
                $scope.comments_list.push({
                    id: 23,
                    content: $scope.comment_text,
                    user_name: $scope.user_name,
                    date: new Date().getTime()
                });
            }
            
            $scope.comment_text = '';
            console.log($scope.comments_list);
        };
    });
    
  
})();


