var app = angular.module('voicesApp', ['ngSanitize']);

app.controller('mainCtrl', mainController);

mainController.$inject = ['$scope', '$http'];

function mainController($scope, $http) {
    var mCtrl = this;

    mCtrl.title = 'This title';
    mCtrl.navOpen = false;
    mCtrl.posts = [];
    mCtrl.currentPost;

    mCtrl.goTo = function(location) {
        $state.go(location);
        mCtrl.navOpen = false;
    }

    mCtrl.openNav = function() {
        if (mCtrl.navOpen) {
          mCtrl.navOpen = false;
        } else {
          mCtrl.navOpen = true;
        }
    }


    $http.get('wp-json/wp/v2/posts')
      .then(function(response) {
        console.log(response.data)
        mCtrl.posts = response.data;
        mCtrl.currentPostID = mCtrl.posts[0].id;
      })

    mCtrl.goTo = function(postID) {
      mCtrl.currentPostID = postID;
      mCtrl.navOpen = false;
    }




    jQuery(document).ready(function() {
        jQuery('html').click(function(event){
        //   console.log(event.target.className)
          if (event.target.className == 'side-nav-backer side-nav-backer--open') {
            // console.log('backer', iCtrl.navOpen)
            mCtrl.navOpen = false;
            $scope.$apply();
          }
        });
    })
}
