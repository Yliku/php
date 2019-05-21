<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\User;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event1' => [            //①要监听的事件类 Event1，注意类的名字不能叫 Event，会导致 event()方法调用失败！！
            'App\Listeners\EventListener',  //②触发器；监听到 事件Event1 变化后，会触发/执行该数组里面所有触发器中的 handle()方法；
            'App\Listeners\TestListener',   //使用 event(new App\Events\Event1(1)); 就可以触发
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // Event::listen('App\Events\*', function ($a,$b) {
        //     var_dump(12222222222222);
        //     var_dump($a);
        //     var_dump(12222222222222);
        //     var_dump($b);
        // });
    }
}
