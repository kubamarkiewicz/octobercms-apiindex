<?php namespace KubaMarkiewicz\ApiIndex;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }


    public function boot()
    {
        \Event::listen('backend.menu.extendItems', function($manager) {
            // $manager->removeMainMenuItem('October.Cms', 'cms');
            $manager->removeMainMenuItem('October.Backend', 'media');
            $manager->removeMainMenuItem('October.Backend', 'dashboard');
        });
    }
    
}
