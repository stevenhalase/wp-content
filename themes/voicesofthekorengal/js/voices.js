var app = angular.module('voicesApp', []);

app.controller('mainCtrl', mainController);

mainController.$inject = ['$scope'];

function mainController($scope) {
    var mCtrl = this;

    mCtrl.title = 'This title';
    mCtrl.navOpen = false;

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
