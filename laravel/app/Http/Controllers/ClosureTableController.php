<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ClosureTableController extends Controller{
	public function test1(){ //测试访问是否正常
		return view('welcome');
	}
	public function query1(){
		$query = DB::table('pages')->whereIn('id', [1, 2, 3])->where(function($query) {
		     $query->whereIn('parent_id', [5])->where('position', 1);
		})->where(function($query) {
		     $query->whereIn('parent_id', [6]);
		});
		return $query->pluck('id');
	}
	public function query2(){
		$query = DB::table('pages')->whereIn('id', [1, 2, 3]);	//whereIn返回：id列的值在[1,2,3]范围的数据
		return var_dump($query->pluck('position','id'));		//pluck('position','id') 返回以id为键，position为值的关联数组
	}

	//ORM多条件查询
	public function query3(){
		$query = DB::table('users')
		    ->where('name', '=', 'yliku')
		    ->orWhere(function ($query2) {	//这里的$query2可以随便起名，只要花括号内的$query2和它保持一致即可
		        $query2->where('id', '<=', 1);
		    })->get();
		var_dump($query);
	}

	public function query4(){
		$query1 = DB::table('pages')->whereIn('id', [1, 2, 3])->orWhere(function($query){	//查询id=1,2,3的数据，或者
			$query->whereIn('parent_id', [5])->where('position', 1);				//parent_id=5且position=1的数据，或者
		})->orWhere(function($query){
			$query->whereIn('parent_id', [6]);										//parent_id=6的数据
		})->pluck('id');				//只返回id字段
		var_dump($query1);
	}

	public function tablequery(){
		$users = DB::table('pages')
		            ->join('page_closure', 'pages.id', '=', 'page_closure.ancestor')
		            ->select('pages.id', 'page_closure.descendant', 'page_closure.depth')->where('id','>',16)
		            ->get();
		var_dump($users);
	}
}

