<?php get_header(); ?>
<div class="app-container" ng-app="voicesApp">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1098163140256883";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <div class="controller-container" ng-controller="mainCtrl as mCtrl">
        <div class="side-nav" ng-class="{'nav-open': mCtrl.navOpen}">
          <button type="button" class="navbar-toggle" ng-click="mCtrl.openNav()">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-list" ng-class="{'nav-list--open': mCtrl.navOpen}">
            <div
              class="nav-item"
              ng-click="mCtrl.goTo(post.id)"
              ng-class="{'nav-item--active': post.id == mCtrl.currentPostID}"
              ng-repeat="post in mCtrl.posts track by $index">
              <p>{{post.title.rendered.toUpperCase()}}</p>
            </div>
          </div>
        </div>
        <div class="side-nav-backer" ng-class="{'side-nav-backer--open': mCtrl.navOpen}"></div>

        <div class="content-container container-fluid">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1 class="header-title">VOICES OF THE <strong>KORENGAL</strong></h1>
              </div>

              <div id="{{post.id}}" class="post-container col-xs-10 col-xs-offset-1" ng-class="{'display-post': post.id == mCtrl.currentPostID}" ng-repeat="post in mCtrl.posts track by $index">
                  <h1 class="post-title">{{post.title.rendered.toUpperCase()}}</h1>
              	<div class="post-body" ng-bind-html="post.content.rendered"></div>
              </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
