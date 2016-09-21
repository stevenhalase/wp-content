<?php get_header(); ?>
<div class="app-container" ng-app="voicesApp">
    <div class="controller-container" ng-controller="mainCtrl as mCtrl">
        <div class="side-nav" ng-class="{'nav-open': mCtrl.navOpen}">
          <button type="button" class="navbar-toggle" ng-click="mCtrl.openNav()">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-list" ng-class="{'nav-list--open': mCtrl.navOpen}">
            <div class="nav-item" ng-click="mCtrl.goTo('dashboard')" ng-class="{'nav-item--active': iCtrl.currentState == 'dashboard'}">
              <p>Dashboard</p>
            </div>
            <div class="nav-item" ng-click="mCtrl.goTo('messaging')" ng-class="{'nav-item--active': iCtrl.currentState == 'messaging'}">
              <p>Messaging</p>
            </div>
            <div class="nav-item" ng-click="mCtrl.goTo('activities')" ng-class="{'nav-item--active': iCtrl.currentState == 'activities'}">
              <p>Activities</p>
            </div>
            <div class="nav-item" ng-click="mCtrl.logout()">
              <p>Logout</p>
            </div>
          </div>
        </div>
        <div class="side-nav-backer" ng-class="{'side-nav-backer--open': mCtrl.navOpen}"></div>

        <div class="content-container container-fluid">
            <div class="row">
                <?php
                    $args = array( 'posts_per_page' => 5 );

                    $myposts = get_posts( $args );
                    $first = true;
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                        if ( $first ) { ?>
                            <div class="post-container display-post">
                                <h1><?php the_title(); ?></h1>
                            	<div class="post-body">
                            	    <?php the_content(); ?>
                            	</div>
                            </div>
                    <?php
                        $first = false;
                        } else { ?>
                            <div class="post-container">
                                <h1><?php the_title(); ?></h1>
                            	<div class="post-body">
                            	    <?php the_content(); ?>
                            	</div>
                            </div>
                    <?php } ?>

                <?php endforeach;
                wp_reset_postdata();?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
