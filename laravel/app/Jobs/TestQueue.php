<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        var_dump('成功执行队列任务');
        // 使用 App\Jobs\TestQueue::dispatch([1,2]); 来将队列任务存入数据库
        // 然后开启队列进程，执行队列任务：php artisan queue:work
    }

    public function failed(){       //可选，队列任务执行失败后，会调用该方法
        var_dump('队列任务执行失败后的业务逻辑');     //可以写 给开发人员发送邮件的逻辑
    }
}
