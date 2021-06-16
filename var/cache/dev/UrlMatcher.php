<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    true, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'fos_user_security_login', '_controller' => 'fos_user.security.controller:loginAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login_check' => [[['_route' => 'fos_user_security_check', '_controller' => 'fos_user.security.controller:checkAction'], null, ['POST' => 0], null, false, false, null]],
        '/logout' => [[['_route' => 'fos_user_security_logout', '_controller' => 'fos_user.security.controller:logoutAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profile' => [[['_route' => 'fos_user_profile_show', '_controller' => 'fos_user.profile.controller:showAction'], null, ['GET' => 0], null, true, false, null]],
        '/profile/edit' => [[['_route' => 'fos_user_profile_edit', '_controller' => 'fos_user.profile.controller:editAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'fos_user_registration_register', '_controller' => 'fos_user.registration.controller:registerAction'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/register/check-email' => [[['_route' => 'fos_user_registration_check_email', '_controller' => 'fos_user.registration.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/register/confirmed' => [[['_route' => 'fos_user_registration_confirmed', '_controller' => 'fos_user.registration.controller:confirmedAction'], null, ['GET' => 0], null, false, false, null]],
        '/resetting/request' => [[['_route' => 'fos_user_resetting_request', '_controller' => 'fos_user.resetting.controller:requestAction'], null, ['GET' => 0], null, false, false, null]],
        '/resetting/send-email' => [[['_route' => 'fos_user_resetting_send_email', '_controller' => 'fos_user.resetting.controller:sendEmailAction'], null, ['POST' => 0], null, false, false, null]],
        '/resetting/check-email' => [[['_route' => 'fos_user_resetting_check_email', '_controller' => 'fos_user.resetting.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/profile/change-password' => [[['_route' => 'fos_user_change_password', '_controller' => 'fos_user.change_password.controller:changePasswordAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin' => [[['_route' => 'sonata_admin_redirect', 'route' => 'sonata_admin_dashboard', 'permanent' => 'true', '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction'], null, null, null, true, false, null]],
        '/admin/dashboard' => [[['_route' => 'sonata_admin_dashboard', '_controller' => 'sonata.admin.action.dashboard'], null, null, null, false, false, null]],
        '/admin/core/get-form-field-element' => [[['_route' => 'sonata_admin_retrieve_form_element', '_controller' => 'sonata.admin.action.retrieve_form_field_element'], null, null, null, false, false, null]],
        '/admin/core/append-form-field-element' => [[['_route' => 'sonata_admin_append_form_element', '_controller' => 'sonata.admin.action.append_form_field_element'], null, null, null, false, false, null]],
        '/admin/core/set-object-field-value' => [[['_route' => 'sonata_admin_set_object_field_value', '_controller' => 'sonata.admin.action.set_object_field_value'], null, null, null, false, false, null]],
        '/admin/search' => [[['_route' => 'sonata_admin_search', '_controller' => 'sonata.admin.action.search'], null, null, null, false, false, null]],
        '/admin/core/get-autocomplete-items' => [[['_route' => 'sonata_admin_retrieve_autocomplete_items', '_controller' => 'sonata.admin.action.retrieve_autocomplete_items'], null, null, null, false, false, null]],
        '/admin/app/creepydata/list' => [[['_route' => 'admin_app_creepydata_list', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_list'], null, null, null, false, false, null]],
        '/admin/app/creepydata/create' => [[['_route' => 'admin_app_creepydata_create', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_create'], null, null, null, false, false, null]],
        '/admin/app/creepydata/batch' => [[['_route' => 'admin_app_creepydata_batch', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_batch'], null, null, null, false, false, null]],
        '/admin/app/creepydata/export' => [[['_route' => 'admin_app_creepydata_export', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_export'], null, null, null, false, false, null]],
        '/admin/app/flowercategory/list' => [[['_route' => 'admin_app_flowercategory_list', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_list'], null, null, null, false, false, null]],
        '/admin/app/flowercategory/create' => [[['_route' => 'admin_app_flowercategory_create', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_create'], null, null, null, false, false, null]],
        '/admin/app/flowercategory/batch' => [[['_route' => 'admin_app_flowercategory_batch', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_batch'], null, null, null, false, false, null]],
        '/admin/app/flowercategory/export' => [[['_route' => 'admin_app_flowercategory_export', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_export'], null, null, null, false, false, null]],
        '/admin/app/flowerbouquet/list' => [[['_route' => 'admin_app_flowerbouquet_list', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_list'], null, null, null, false, false, null]],
        '/admin/app/flowerbouquet/create' => [[['_route' => 'admin_app_flowerbouquet_create', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_create'], null, null, null, false, false, null]],
        '/admin/app/flowerbouquet/batch' => [[['_route' => 'admin_app_flowerbouquet_batch', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_batch'], null, null, null, false, false, null]],
        '/admin/app/flowerbouquet/export' => [[['_route' => 'admin_app_flowerbouquet_export', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_export'], null, null, null, false, false, null]],
        '/admin/app/flowerphoto/list' => [[['_route' => 'admin_app_flowerphoto_list', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_list'], null, null, null, false, false, null]],
        '/admin/app/flowerphoto/create' => [[['_route' => 'admin_app_flowerphoto_create', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_create'], null, null, null, false, false, null]],
        '/admin/app/flowerphoto/batch' => [[['_route' => 'admin_app_flowerphoto_batch', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_batch'], null, null, null, false, false, null]],
        '/admin/app/flowerphoto/export' => [[['_route' => 'admin_app_flowerphoto_export', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_export'], null, null, null, false, false, null]],
        '/admin/app/user/list' => [[['_route' => 'admin_app_user_list', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_list'], null, null, null, false, false, null]],
        '/admin/app/user/create' => [[['_route' => 'admin_app_user_create', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_create'], null, null, null, false, false, null]],
        '/admin/app/user/batch' => [[['_route' => 'admin_app_user_batch', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_batch'], null, null, null, false, false, null]],
        '/admin/app/user/export' => [[['_route' => 'admin_app_user_export', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_export'], null, null, null, false, false, null]],
        '/admin/app/usergroup/list' => [[['_route' => 'admin_app_usergroup_list', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_list'], null, null, null, false, false, null]],
        '/admin/app/usergroup/create' => [[['_route' => 'admin_app_usergroup_create', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_create'], null, null, null, false, false, null]],
        '/admin/app/usergroup/batch' => [[['_route' => 'admin_app_usergroup_batch', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_batch'], null, null, null, false, false, null]],
        '/admin/app/usergroup/export' => [[['_route' => 'admin_app_usergroup_export', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_export'], null, null, null, false, false, null]],
        '/lucky/number' => [[['_route' => 'app_lucky_number', '_controller' => 'App\\Controller\\LuckyController::number'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'main', '_controller' => 'App\\Controller\\MainController::main'], null, null, null, false, false, null]],
        '/basket' => [[['_route' => 'basket.post', '_controller' => 'App\\Controller\\BasketController::add'], null, ['POST' => 0], null, false, false, null]],
        '/saveCategory' => [[['_route' => 'flowerCategorySave', '_controller' => 'App\\Controller\\FlowerCategoryController::save'], null, ['POST' => 0], null, false, false, null]],
        '/docs' => [[['_route' => 'hb_swagger_ui_default', '_controller' => 'HarmBandstra\\SwaggerUiBundle\\Controller\\DocsController::indexAction'], null, ['GET' => 0], null, true, false, null]],
        '/admin/login' => [[['_route' => 'sonata_user_admin_security_login', '_controller' => 'Sonata\\UserBundle\\Action\\LoginAction'], null, null, null, false, false, null]],
        '/admin/login_check' => [[['_route' => 'sonata_user_admin_security_check', '_controller' => 'Sonata\\UserBundle\\Action\\CheckLoginAction'], null, ['POST' => 0], null, false, false, null]],
        '/admin/logout' => [[['_route' => 'sonata_user_admin_security_logout', '_controller' => 'Sonata\\UserBundle\\Action\\LogoutAction'], null, null, null, false, false, null]],
        '/admin/resetting/request' => [[['_route' => 'sonata_user_admin_resetting_request', '_controller' => 'Sonata\\UserBundle\\Action\\RequestAction'], null, ['GET' => 0], null, false, false, null]],
        '/admin/resetting/send-email' => [[['_route' => 'sonata_user_admin_resetting_send_email', '_controller' => 'Sonata\\UserBundle\\Action\\SendEmailAction'], null, ['POST' => 0], null, false, false, null]],
        '/admin/resetting/check-email' => [[['_route' => 'sonata_user_admin_resetting_check_email', '_controller' => 'Sonata\\UserBundle\\Action\\CheckEmailAction'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
            .'|(?:(?:[^./]*+\\.)++)(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:60)'
                    .'|wdt/([^/]++)(*:79)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:124)'
                            .'|router(*:138)'
                            .'|exception(?'
                                .'|(*:158)'
                                .'|\\.css(*:171)'
                            .')'
                        .')'
                        .'|(*:181)'
                    .')'
                .')'
                .'|/re(?'
                    .'|gister/confirm/([^/]++)(*:220)'
                    .'|setting/reset/([^/]++)(*:250)'
                .')'
                .'|/admin/(?'
                    .'|core/get\\-short\\-object\\-description(?:\\.(html|json))?(*:323)'
                    .'|app/(?'
                        .'|creepydata/([^/]++)/(?'
                            .'|edit(*:365)'
                            .'|delete(*:379)'
                            .'|show(*:391)'
                        .')'
                        .'|flower(?'
                            .'|category/([^/]++)/(?'
                                .'|edit(*:434)'
                                .'|delete(*:448)'
                                .'|show(*:460)'
                            .')'
                            .'|bouquet/([^/]++)/(?'
                                .'|edit(*:493)'
                                .'|delete(*:507)'
                                .'|show(*:519)'
                            .')'
                            .'|photo/([^/]++)/(?'
                                .'|edit(*:550)'
                                .'|delete(*:564)'
                                .'|show(*:576)'
                            .')'
                        .')'
                        .'|user(?'
                            .'|/([^/]++)/(?'
                                .'|edit(*:610)'
                                .'|delete(*:624)'
                                .'|show(*:636)'
                            .')'
                            .'|group/([^/]++)/(?'
                                .'|edit(*:667)'
                                .'|delete(*:681)'
                                .'|show(*:693)'
                            .')'
                        .')'
                    .')'
                .')'
            .')|(?i:ddd\\.flower)\\.(?'
                .'|/test/([^/]++)(*:741)'
            .')|(?:(?:[^./]*+\\.)++)(?'
                .'|/pet/([^/]++)(*:785)'
                .'|/editCategory/([^/]++)(*:815)'
                .'|/docs/(?'
                    .'|file/(.+)(*:841)'
                    .'|(.+)(*:853)'
                .')'
                .'|/admin/resetting/reset/([^/]++)(*:893)'
            .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        60 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        79 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        124 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        138 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        158 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        171 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        220 => [[['_route' => 'fos_user_registration_confirm', '_controller' => 'fos_user.registration.controller:confirmAction'], ['token'], ['GET' => 0], null, false, true, null]],
        250 => [[['_route' => 'fos_user_resetting_reset', '_controller' => 'fos_user.resetting.controller:resetAction'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        323 => [[['_route' => 'sonata_admin_short_object_information', '_controller' => 'sonata.admin.action.get_short_object_description', '_format' => 'html'], ['_format'], null, null, false, true, null]],
        365 => [[['_route' => 'admin_app_creepydata_edit', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_edit'], ['id'], null, null, false, false, null]],
        379 => [[['_route' => 'admin_app_creepydata_delete', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_delete'], ['id'], null, null, false, false, null]],
        391 => [[['_route' => 'admin_app_creepydata_show', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction', '_sonata_admin' => 'admin.category', '_sonata_name' => 'admin_app_creepydata_show'], ['id'], null, null, false, false, null]],
        434 => [[['_route' => 'admin_app_flowercategory_edit', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_edit'], ['id'], null, null, false, false, null]],
        448 => [[['_route' => 'admin_app_flowercategory_delete', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_delete'], ['id'], null, null, false, false, null]],
        460 => [[['_route' => 'admin_app_flowercategory_show', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction', '_sonata_admin' => 'admin.flower_category', '_sonata_name' => 'admin_app_flowercategory_show'], ['id'], null, null, false, false, null]],
        493 => [[['_route' => 'admin_app_flowerbouquet_edit', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_edit'], ['id'], null, null, false, false, null]],
        507 => [[['_route' => 'admin_app_flowerbouquet_delete', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_delete'], ['id'], null, null, false, false, null]],
        519 => [[['_route' => 'admin_app_flowerbouquet_show', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction', '_sonata_admin' => 'admin.flower_bouquet', '_sonata_name' => 'admin_app_flowerbouquet_show'], ['id'], null, null, false, false, null]],
        550 => [[['_route' => 'admin_app_flowerphoto_edit', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_edit'], ['id'], null, null, false, false, null]],
        564 => [[['_route' => 'admin_app_flowerphoto_delete', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_delete'], ['id'], null, null, false, false, null]],
        576 => [[['_route' => 'admin_app_flowerphoto_show', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction', '_sonata_admin' => 'admin.flower_photo', '_sonata_name' => 'admin_app_flowerphoto_show'], ['id'], null, null, false, false, null]],
        610 => [[['_route' => 'admin_app_user_edit', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_edit'], ['id'], null, null, false, false, null]],
        624 => [[['_route' => 'admin_app_user_delete', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_delete'], ['id'], null, null, false, false, null]],
        636 => [[['_route' => 'admin_app_user_show', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction', '_sonata_admin' => 'sonata.user.admin.user', '_sonata_name' => 'admin_app_user_show'], ['id'], null, null, false, false, null]],
        667 => [[['_route' => 'admin_app_usergroup_edit', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_edit'], ['id'], null, null, false, false, null]],
        681 => [[['_route' => 'admin_app_usergroup_delete', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_delete'], ['id'], null, null, false, false, null]],
        693 => [[['_route' => 'admin_app_usergroup_show', '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction', '_sonata_admin' => 'sonata.user.admin.group', '_sonata_name' => 'admin_app_usergroup_show'], ['id'], null, null, false, false, null]],
        741 => [[['_route' => 'blog_list', '_controller' => ['App\\Controller\\RoutesController', 'test']], ['id'], null, null, false, true, null]],
        785 => [[['_route' => 'petId.post', '_controller' => 'App\\Controller\\BasketController::add'], ['petId'], ['POST' => 0], null, false, true, null]],
        815 => [[['_route' => 'flowerCategoryId', '_controller' => 'App\\Controller\\FlowerCategoryController::edit'], ['categoryId'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        841 => [[['_route' => 'hb_swagger_ui_swagger_file', '_controller' => 'HarmBandstra\\SwaggerUiBundle\\Controller\\DocsController::swaggerFileAction'], ['fileName'], ['GET' => 0], null, false, true, null]],
        853 => [[['_route' => 'hb_swagger_ui_redirect', '_controller' => 'HarmBandstra\\SwaggerUiBundle\\Controller\\DocsController::redirectAction'], ['fileName'], ['GET' => 0], null, false, true, null]],
        893 => [
            [['_route' => 'sonata_user_admin_resetting_reset', '_controller' => 'Sonata\\UserBundle\\Action\\ResetAction'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
