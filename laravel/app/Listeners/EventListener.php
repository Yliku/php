<?php

namespace App\Listeners;

use App\Events\Event1;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListener implements ShouldQueue  
//如果触发器执行的时间比较长，可以将触发器添加到queue队列来执行，只需使用 ShouldQueue 的接口即可
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event1 $event)
    {
        var_dump('EventListener : ' . $event->user);
    }
}
