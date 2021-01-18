<?php
// config/routes.php
use App\Controller\RoutesController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('blog_list', '/test/{id}')
        // the controller value has the format [controller_class, method_name]
        ->controller([RoutesController::class, 'test'])
        ->host('ddd.flower')

        // if the action is implemented as the __invoke() method of the
        // controller class, you can skip the 'method_name' part:
        // ->controller(BlogController::class)
    ;
};