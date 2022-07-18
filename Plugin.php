<?php namespace OFFLINE\BootstrapBoxes;

use Cms\Classes\Controller;
use October\Rain\Support\Facades\Event;
use OFFLINE\BootstrapBoxes\Models\TestModel;
use OFFLINE\Boxes\Classes\Events;
use OFFLINE\Boxes\Models\Box;
use System\Classes\PluginBase;
use System\Models\File;

/**
 * Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = ['OFFLINE.Boxes'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'BootstrapBoxes',
            'description' => 'No description provided yet...',
            'author' => 'OFFLINE',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return string[]
     */
    public function register()
    {
        Box::extend(function (Box $box) {
            $box->attachOne['logo'] = File::class;
            $box->addDynamicMethod('getIconNameOptions', function () {
                return include('icons.php');
            });
        });

        Event::listen(
            \OFFLINE\Boxes\Classes\Events::REGISTER_PARTIAL_PATH,
            fn () => ['$/plugins/offline/bootstrapboxes/partials']
        );

        Event::listen('cms.page.init', function (Controller $controller) {
            $controller->addJs('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', [
                'integrity' => 'sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2',
                'crossorigin' => 'anonymous',
                'async' => 'async',
            ]);

            $controller->addCss('/plugins/offline/bootstrapboxes/assets/css/custom.css');
            $controller->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', [
                'integrity' => 'sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor',
                'crossorigin' => 'anonymous',
            ]);
            $controller->addCss('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css');
        });
    }
}
