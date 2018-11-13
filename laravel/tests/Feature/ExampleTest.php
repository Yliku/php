<?php

namespace Tests\Feature;
//此处命名空间的声明删除也没影响？？？
//所有测试类文件的命名必须为*Test.php；
//laravel项目自带phpunit，所有的测试类在根目录tests/ 下存放

//这句是必要的！！所有测试类必须继承Tests\TestCase，因为要使用该TestCase类的方法
use Tests\TestCase;

//以下两句use删除也没影响？？？
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

//类名要和文件名保持一致！
class ExampleTest extends TestCase
{
    /** 简单测试示例 * @return void */
    //测试类文件中的所有方法/函数必须为公开的public，命名格式：public function test*(){}
    //当然可以在你的测试用例中包含private的方法，但它们不能被phpunit所调用
    public function testBasicTest()
    {
        $this->assertTrue(3>2);    //断言括号内的内容为真，是的话则该方法测试成功 
    }
    public function testExample1()
    {
        $this->assertFalse(3<2);   //断言括号内的内容为假，是的话则该方法测试成功 
    }    
    public function testExample2()
    {
        $this->assertFalse(false);  //断言括号内的内容为假，是的话则该方法测试成功 
    }
    //class里面总共写了四个方法，代表了四个测试~~~~~方法里面可以有多个断言，只要一个断言失败，这个方法则测试失败
    public function testExample3()
    {
        $stack = [];    //新建数组$stack，给它一个数组，看看输出的结果是否和我们预期的一致，判断是否一致就要开始断言了~~
        $this->assertEquals(count($stack), 0);  //count()提取数组的长度，断言0和数组的长度相等，相等的话测试成功
        array_push($stack, 'foo');              //array_push()向数组尾部插入元素'foo'
        $this->assertEquals($stack[count($stack) - 1], 'foo');
        $this->assertEquals(count($stack), 1);
        $this->assertEquals(array_pop($stack), 'foo'); //array_pop()删除数组的最后一个元素，返回值是被删除的元素
        $this->assertEquals(count($stack), 0);  //判断括号内右边的值是否和左边的一致，右边的值是我们的预期输出
    }
}