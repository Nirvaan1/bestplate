<!DOCTYPE html>
<html lang="zxx">
<?php if (!isset($admin)):?>
    <head>
        <meta charset="utf-8">
        <title>Cusine Cool</title>

        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        ﻿<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap">

        <link rel="icon" type="image/png" href="<?= $router->getWwwPath()?>/img/logo-site.png"/>
        <link rel="stylesheet" href="<?= $router->getWwwPath()?>/css/main.css?b=<?= date('ymdHis') ?>" />
        <script src="<?= $router->getWwwPath()?>/js/uikit.js"></script>
    </head>

    <body>

 <!-- //////////////////////////////////////////***HEADER***///////////////////////////////////// -->
         <nav class="uk-navbar-container uk-letter-spacing-small">
             <div class="uk-container">
                 <div class="uk-position-z-index" data-uk-navbar>
                     <div class="uk-navbar-left">
                         <a class="uk-navbar-item uk-logo" href="<?= Router::getInstance()->generateUrl('resto_home_main')?>">CuisineCool</a>
                         <ul class="uk-navbar-nav uk-visible@m uk-margin-large-left">
                             <li <?php if (isset($title) and $title == 'home'):?>class="uk-active"<?php endif;?>><a href="<?= Router::getInstance()->generateUrl('resto_home_main')?>">Accueil</a></li>
                             <li <?php if (isset($title) and $title == 'recette'):?>class="uk-active"<?php endif;?>><a href="<?= Router::getInstance()->generateUrl('resto_dish_showall')?>">Recettes</a></li>
                             <li <?php if (isset($title) and $title == 'worldCuisine'):?>class="uk-active"<?php endif;?>><a href="<?= Router::getInstance()->generateUrl('resto_state_showall')?>">Cuisine du Monde</a></li>
                             <?php if (UserSession::getInstance()->isAdmin()):?>
                                 <li><a href="<?= Router::getInstance()->generateUrl('resto_admin_home')?>">ADMIN</a></li>
                             <?php elseif (UserSession::getInstance()->isAuthenticated()):?>
                                 <li><a href="<?= Router::getInstance()->generateUrl('resto_admin_home')?>">Ajouter Recette</a></li>
                             <?php endif; ?>

                         </ul>
                     </div>
                     <div class="uk-navbar-right">
                         <div>
                             <a class="uk-navbar-toggle" data-uk-search-icon href="#"></a>
                             <div class="uk-drop uk-background-default" data-uk-drop="mode: click; pos: left-center; offset: 0">
                                 <form class="uk-search uk-search-navbar uk-width-1-1" method="GET" action="<?= Router::getInstance()->generateUrl("resto_dish_search")?>">
                                     <input class="uk-search-input uk-text-demi-bold" name="q" type="search" placeholder="Recherche de plat..." autofocus>
                                     <button type="submit" hidden></button>
                                 </form>
                             </div>
                         </div>
                         <?php if (UserSession::getInstance()->isAuthenticated()): ?>
                             <div class="after-log">
                                 <span style="margin-right: 30px">Bonjour <?= UserSession::getInstance()->getForname() ?></span>
                                 <a class="uk-button uk-button-primary" href="<?= Router::getInstance()->generateUrl("resto_user_logout")?>">Déconnexion</a>
                             </div>
                         <?php else: ?>
                             <ul class="uk-navbar-nav uk-visible@m">
                                 <li ><a href="<?= Router::getInstance()->generateUrl('resto_user_login') ?>">Connexion</a></li>
                             </ul>
                             <div class="uk-navbar-item">
                                 <div>
                                     <a class="uk-button uk-button-primary" href="<?= Router::getInstance()->generateUrl('resto_user_create')?>">Inscription</a>
                                 </div>
                             </div>
                             <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span data-uk-navbar-toggle-icon></span></a>
                         <?php endif; ?>

                     </div>
                 </div>
             </div>
         </nav>

        <!-- //////////////////////////////////////////***MAIN***///////////////////////////////////// -->

        <main>

            <?php include $templatePath ?>
        </main>

        <!-- //////////////////////////////////////////***FOOTER***///////////////////////////////////// -->


         <footer class="uk-section uk-section-default">
             <div class="uk-container uk-text-secondary uk-text-500">
                 <div class="uk-child-width-1-2@s" data-uk-grid>
                     <div>
                         <a href="#" class="uk-logo">CuisineCool</a>
                     </div>
                     <div class="uk-flex uk-flex-middle uk-flex-right@s">
                         <div data-uk-grid class="uk-child-width-auto uk-grid-small">
                             <div>
                                 <a href="https://www.facebook.com/" data-uk-icon="icon: facebook; ratio: 0.8" class="uk-icon-button facebook" target="_blank"></a>
                             </div>
                             <div>
                                 <a href="https://www.instagram.com/" data-uk-icon="icon: instagram; ratio: 0.8" class="uk-icon-button instagram" target="_blank"></a>
                             </div>
                             <div>
                                 <a href="mailto:info@blacompany.com" data-uk-icon="icon: twitter; ratio: 0.8" class="uk-icon-button twitter" target="_blank"></a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid>
                     <div>
                         <ul class="uk-list uk-text-small">
                             <li><a class="uk-link-text" href="http://rajiv.fr/">Présentation</a></li>
                             <li><a class="uk-link-text" href="http://rajiv.fr/">Portfolio</a></li>
                         </ul>
                     </div>

                 </div>
                 <div class="uk-margin-medium-top uk-text-small uk-text-muted">
                     <div>Made by a <a class="uk-link-muted" href="http://www.rajiv.fr/" target="_blank">Rajiv</a> in Paris.</div>
                 </div>
             </div>
         </footer>
         <div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
             <div class="uk-offcanvas-bar">
                 <a class="uk-logo" href="<?= Router::getInstance()->generateUrl('resto_home_main')?>">CuisineCool</a>
                 <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
                 <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
                     <li <?php if (isset($title) and $title == 'home'):?>class="uk-active"<?php endif;?>><a href="<?= Router::getInstance()->generateUrl('resto_home_main')?>">Accueil</a></li>
                     <li <?php if (isset($title) and $title == 'recette'):?>class="uk-active"<?php endif;?>><a href="<?= Router::getInstance()->generateUrl('resto_dish_showall')?>">Recettes</a></li>
                     <li <?php if (isset($title) and $title == 'worldCuisine'):?>class="uk-active"<?php endif;?>><a href="<?= Router::getInstance()->generateUrl('resto_state_showall')?>">Cuisine du Monde</a></li>
                     <?php if (UserSession::getInstance()->isAdmin()):?>
                         <li><a href="<?= Router::getInstance()->generateUrl('resto_dish_create')?>">ADMIN</a></li>
                     <?php endif; ?>
                 </ul>
                 <div class="uk-margin-medium-top">
                     <a class="uk-button uk-width-1-1 uk-button-primary" href="<?= Router::getInstance()->generateUrl('resto_user_create')?>">S'inscrire'</a>
                 </div>
                 <div class="uk-margin-medium-top uk-text-center">
                     <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
                         <div>
                             <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
                         </div>
                         <div>
                             <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
                         </div>
                         <div>
                             <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
                         </div>
                         <div>
                             <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <?php if(isset($neededScripts)): ?>
             <?php foreach ($neededScripts as $script): ?>
                 <script type="text/javascript" src="<?= Router::getInstance()->getWwwPath()?>/js/<?= $script ?>"></script>
             <?php endforeach; ?>
         <?php endif; ?>
        <?php endif;?>
    </body>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////------PARTIE-----///////////////////////////////////////////-->
<!--////////////////////////////////////////-------ADMIN------///////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php if(isset($admin) AND $admin == 1 AND UserSession::getInstance()->isAuthenticated()):?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link rel="stylesheet" href="<?= $router->getWwwPath()?>/css/styles.css?b=<?= date('ymdHis') ?>"/>
        <link rel="stylesheet" href="<?= $router->getWwwPath()?>/css/main.css?b=<?= date('ymdHis') ?>" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Partie Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="navbar-nav ml-auto ml-md-0">
                <a class="btn btn-primary btn active" style="margin-right: 20px" role="button" href="<?= Router::getInstance()->generateUrl("resto_home_main")?>" >CuisineCool</a>
                <?php if (UserSession::getInstance()->isAuthenticated()):?>
                <a class="btn btn-danger btn active" role="button" href="<?= Router::getInstance()->generateUrl("resto_user_logout")?>" >Deconnection</a>
                <?php else:?>
                <a class="btn btn-success btn-lg active" role="button" id="userDropdown" href="<?= Router::getInstance()->generateUrl("resto_user_login")?>">Connection</a>
                <?php endif; ?>
            </div>
            <!-- Navbar-->

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_admin_home') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Accueil
                            </a>
                            <?php if (UserSession::getInstance()->isAdmin()):?>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayout">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-columns"></i>
                                    </div>
                                    Gestion
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_comment_list') ?>">Commentaires</a>
                                        <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_user_list') ?>">Utilisateurs</a>
                                    </nav>
                                </div>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutTwo" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-columns"></i>
                                    </div>
                                    Pays
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="collapseLayoutTwo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_state_list') ?>">Liste</a>
                                        <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_state_create') ?>">Ajouter</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutThree" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-columns"></i>
                                    </div>
                                    Ingredients
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="collapseLayoutThree" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_ingredient_list') ?>">Liste</a>
                                        <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_ingredient_create') ?>">Ajouter</a>
                                    </nav>
                                </div>
                            <?php endif; ?>
                            <div class="sb-sidenav-menu-heading">
                                Recette
                            </div>
                            <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_dish_list') ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-list"></i>
                                </div>
                                Liste Plats
                            </a>
                            <a class="nav-link" href="<?= Router::getInstance()->generateUrl('resto_dish_create') ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                Ajouter Plat
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <!-- //////////////////////////////////////////***MAIN***///////////////////////////////////// -->
            <div id="layoutSidenav_content">
                <main>
                    <?php include $templatePath ?>
                </main>

            <!-- //////////////////////////////////////////***FOOTER***///////////////////////////////////// -->
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= $router->getWwwPath()?>/js/scripts.js"></script>
        <?php if(isset($neededScripts)): ?>
            <?php foreach ($neededScripts as $script): ?>
                <script type="text/javascript" src="<?= Router::getInstance()->getWwwPath()?>/js/<?= $script ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
    <?php endif;?>
</html>