<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ClosureTableController extends Controller{
	public function test1(){ //���Է����Ƿ�����
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
		$query = DB::table('pages')->whereIn('id', [1, 2, 3]);	//whereIn���أ�id�е�ֵ��[1,2,3]��Χ������
		return var_dump($query->pluck('position','id'));		//pluck('position','id') ������idΪ����positionΪֵ�Ĺ�������
	}

	//ORM��������ѯ
	public function query3(){
		$query = DB::table('users')
		    ->where('name', '=', 'yliku')
		    ->orWhere(function ($query2) {	//�����$query2�������������ֻҪ�������ڵ�$query2��������һ�¼���
		        $query2->where('id', '<=', 1);
		    })->get();
		var_dump($query);
	}

	public function query4(){
		$query1 = DB::table('pages')->whereIn('id', [1, 2, 3])->orWhere(function($query){	//��ѯid=1,2,3�����ݣ�����
			$query->whereIn('parent_id', [5])->where('position', 1);				//parent_id=5��position=1�����ݣ�����
		})->orWhere(function($query){
			$query->whereIn('parent_id', [6]);										//parent_id=6������
		})->pluck('id');				//ֻ����id�ֶ�
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

