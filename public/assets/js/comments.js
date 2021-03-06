(function() {
    var comments = angular.module('comments', ['ngResource']);

    comments.factory('Comment',['$resource', function($resource) {
        return $resource('/home/comment/index.json', {}, {
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
                
                url: '/home/comment/create.json'
            },
            
            all: {
                method: 'GET',
                isArray: true,
                url: '/home/comment/all/:id/.json'
            },
            
            request_capcha: {
                method: 'GET',
                url: '/home/comment/capcha.json'
            }
        });
    }]);
    
    comments.controller('comment',['$scope', 'Comment', function ($scope, Comment) {
        
        var content_id = $('[data-content-id]').attr('data-content-id');
        
        $scope.comment_text = '';
        $scope.user_name = '';
        $scope.user_email = '';
        $scope.errors = new Array();
        $scope.capcha_numbers = Comment.request_capcha();
        $scope.capcha = '';
        
        $scope.count = 0;
        
        $scope.comments_list = Comment.all({id: content_id}, function () {
            $scope.count = Object.keys($scope.comments_list).length - 2;
        });
        
        $scope.collapsed = false;
        
        $scope.toggleHeight = function() {
            $scope.collapsed = !$scope.collapsed;
        };
        
        var updateComments = function() {
            Comment.all({id: content_id}, function (e) {  
                $scope.comments_list = e;
                $scope.count = Object.keys($scope.comments_list).length - 2;
            });
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
            $scope.capcha = '';
        };
        
        var update_capcha = function() {
            $scope.capcha_numbers = Comment.request_capcha();
        };
        
        var create_comment = function(obj) {
            Comment.save(obj, function(e) {
                if(e.status === 'fail') {
                    $scope.errors = e.errors;
                } else {
                    reset_fields();
                    
                }
                update_capcha();
                updateComments();
            });
        };
        
        $scope.addComment = function(user_name, user_email, text) {
            if(validate(user_name, user_email, text)) {
                create_comment({
                    id: $('[data-content-id]').attr('data-content-id'),
                    text: $scope.comment_text,
                    user_name: $scope.user_name,
                    user_email: $scope.user_email,
                    date: new Date().getTime(),
                    capcha_result: $scope.capcha
                });
            } else {
                update_capcha();
            }
        };
        
        window.setInterval(function() {
            updateComments();
        }, 10000);
        
    }]);
    
  
})();


