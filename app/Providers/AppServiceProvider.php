<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Schema::defaultStringLength(191);
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MENÚ DE NAVEGAÇÃO');
            $event->menu->add([
                'text' => 'Postagem',
                'icon'    => 'fa fa-newspaper-o',
                'submenu' => [
                    [
                        'text'=>'Nova postagem',
                        'url'  => route('notices.create'),
                        'icon'=>'fa fa-plus'
                    ],
                    [
                        'text' => 'Todas as postagens',
                        'url'  => route('notices.index'),
                        'icon' => 'fa fa-list',
                    ],
                    [
                        'text' => 'Minhas postagens',
                        'url'  => route('notices.index'),
                        'icon' => 'fa fa-user',
                    ],
                ]
                
            ]);
            $event->menu->add([
                'text' => 'Comentários',
                'icon'    => 'fa fa-comment-o',
                'submenu' => [
                    [
                        'text' => 'Todos as comentários',
                        'url'  => '#',
                        'icon' => 'fa fa-comments-o',
                    ],
                    [
                        'text' => 'Nas minhas postagens',
                        'url'  => '#',
                        'icon' => 'fa fa-user',
                    ],
                ]                
            ]);
            $event->menu->add([
                'text' => 'Categorias',
                'icon'=> 'fa fa-reorder',
                'url' => '#'
            ]);
            $event->menu->add('PAINEL DE USUÁRIO');
            $event->menu->add([
                'text' => 'Configurações de usário',
                'icon'=> 'fa fa-users',
                'url' => '#'
            ]);
        });
    }
}
