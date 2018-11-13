<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testValue()
    {
        $try = new TryClass();
        $this->assertEquals(1, $try->getValue());
        //可以改改我们的预期值试试效果，预期值为括号左边的值
    }
}
//下面这个类不会被phpunit调用到，文件命名要和类名保持一致，但当然被上面的testValue方法调用到~~~~
class TryClass
{
    public function getValue()
    {
        return 1;
    }
}