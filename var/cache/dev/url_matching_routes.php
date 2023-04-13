<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/categorieoffre' => [[['_route' => 'app_categorieoffre_index', '_controller' => 'App\\Controller\\CategorieoffreController::index'], null, ['GET' => 0], null, true, false, null]],
        '/categorieoffre/new' => [[['_route' => 'app_categorieoffre_new', '_controller' => 'App\\Controller\\CategorieoffreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/colis' => [[['_route' => 'app_colis', '_controller' => 'App\\Controller\\ColisController::index'], null, null, null, false, false, null]],
        '/colis/add' => [[['_route' => 'add_colis', '_controller' => 'App\\Controller\\ColisController::addcolis'], null, null, null, false, false, null]],
        '/demande' => [[['_route' => 'app_demande_index', '_controller' => 'App\\Controller\\DemandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/livraison' => [[['_route' => 'app_livraison', '_controller' => 'App\\Controller\\LivraisonController::index'], null, null, null, false, false, null]],
        '/livreur' => [[['_route' => 'app_livreur', '_controller' => 'App\\Controller\\LivreurController::index'], null, null, null, false, false, null]],
        '/offre' => [[['_route' => 'app_offre_index', '_controller' => 'App\\Controller\\OffreController::index'], null, ['GET' => 0], null, true, false, null]],
        '/offre/ListOffre' => [[['_route' => 'app_offre_Front', '_controller' => 'App\\Controller\\OffreController::FrontList'], null, ['GET' => 0], null, false, false, null]],
        '/offre/new' => [[['_route' => 'app_offre_new', '_controller' => 'App\\Controller\\OffreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/trajetoffre' => [[['_route' => 'app_trajetoffre_index', '_controller' => 'App\\Controller\\TrajetoffreController::index'], null, ['GET' => 0], null, true, false, null]],
        '/trajetoffre/new' => [[['_route' => 'app_trajetoffre_new', '_controller' => 'App\\Controller\\TrajetoffreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/c(?'
                    .'|ategorieoffre/([^/]++)(?'
                        .'|(*:37)'
                        .'|/edit(*:49)'
                        .'|(*:56)'
                    .')'
                    .'|olis/(?'
                        .'|update/([^/]++)(*:87)'
                        .'|delete/([^/]++)(*:109)'
                    .')'
                .')'
                .'|/demande/(?'
                    .'|([^/]++)(?'
                        .'|(*:142)'
                        .'|/new(*:154)'
                    .')'
                    .'|detail(?'
                        .'|/([^/]++)(*:181)'
                        .'|back/([^/]++)(*:202)'
                    .')'
                    .'|([^/]++)(?'
                        .'|/edit(*:227)'
                        .'|(*:235)'
                    .')'
                .')'
                .'|/offre/(?'
                    .'|([^/]++)(?'
                        .'|(*:266)'
                        .'|/(?'
                            .'|edit(*:282)'
                            .'|demande(*:297)'
                        .')'
                        .'|(*:306)'
                    .')'
                    .'|pdf/generator/([^/]++)(*:337)'
                .')'
                .'|/trajetoffre/([^/]++)(?'
                    .'|(*:370)'
                    .'|/edit(*:383)'
                    .'|(*:391)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:431)'
                    .'|wdt/([^/]++)(*:451)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:497)'
                            .'|router(*:511)'
                            .'|exception(?'
                                .'|(*:531)'
                                .'|\\.css(*:544)'
                            .')'
                        .')'
                        .'|(*:554)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        37 => [[['_route' => 'app_categorieoffre_show', '_controller' => 'App\\Controller\\CategorieoffreController::show'], ['idcatoffre'], ['GET' => 0], null, false, true, null]],
        49 => [[['_route' => 'app_categorieoffre_edit', '_controller' => 'App\\Controller\\CategorieoffreController::edit'], ['idcatoffre'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        56 => [[['_route' => 'app_categorieoffre_delete', '_controller' => 'App\\Controller\\CategorieoffreController::delete'], ['idcatoffre'], ['POST' => 0], null, false, true, null]],
        87 => [[['_route' => 'update_colis', '_controller' => 'App\\Controller\\ColisController::update'], ['id'], null, null, false, true, null]],
        109 => [[['_route' => 'delete_colis', '_controller' => 'App\\Controller\\ColisController::delete'], ['id'], null, null, false, true, null]],
        142 => [[['_route' => 'app_demande_indexoffre', '_controller' => 'App\\Controller\\DemandeController::indexbyoffre'], ['idoffre'], ['GET' => 0], null, false, true, null]],
        154 => [[['_route' => 'app_demande_new', '_controller' => 'App\\Controller\\DemandeController::new'], ['idOffre'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        181 => [[['_route' => 'app_demande_show', '_controller' => 'App\\Controller\\DemandeController::show'], ['iddemande'], ['GET' => 0], null, false, true, null]],
        202 => [[['_route' => 'app_demande_showback', '_controller' => 'App\\Controller\\DemandeController::showback'], ['iddemande'], ['GET' => 0], null, false, true, null]],
        227 => [[['_route' => 'app_demande_edit', '_controller' => 'App\\Controller\\DemandeController::edit'], ['iddemande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        235 => [[['_route' => 'app_demande_delete', '_controller' => 'App\\Controller\\DemandeController::delete'], ['iddemande'], ['POST' => 0], null, false, true, null]],
        266 => [[['_route' => 'app_offre_show', '_controller' => 'App\\Controller\\OffreController::show'], ['idoffre'], ['GET' => 0], null, false, true, null]],
        282 => [[['_route' => 'app_offre_edit', '_controller' => 'App\\Controller\\OffreController::edit'], ['idoffre'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        297 => [[['_route' => 'app_offre_demande', '_controller' => 'App\\Controller\\OffreController::demande'], ['idoffre'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        306 => [[['_route' => 'app_offre_delete', '_controller' => 'App\\Controller\\OffreController::delete'], ['idoffre'], ['POST' => 0], null, false, true, null]],
        337 => [[['_route' => 'pdf_generator', '_controller' => 'App\\Controller\\OffreController::pdf'], ['idoffre'], ['GET' => 0], null, false, true, null]],
        370 => [[['_route' => 'app_trajetoffre_show', '_controller' => 'App\\Controller\\TrajetoffreController::show'], ['idtrajetoffre'], ['GET' => 0], null, false, true, null]],
        383 => [[['_route' => 'app_trajetoffre_edit', '_controller' => 'App\\Controller\\TrajetoffreController::edit'], ['idtrajetoffre'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        391 => [[['_route' => 'app_trajetoffre_delete', '_controller' => 'App\\Controller\\TrajetoffreController::delete'], ['idtrajetoffre'], ['POST' => 0], null, false, true, null]],
        431 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        451 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        497 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        511 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        531 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        544 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        554 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];