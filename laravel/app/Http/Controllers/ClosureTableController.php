<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Page;

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
		            //join('表名','约束条件') 加入某个表进行多表联查，条件是id和ancestor对应，将两个表联合在一起
		            ->select('pages.id', 'page_closure.descendant', 'page_closure.depth')->where('id','>',16)
		            //select 返回指定字段
		            ->get();
		// dd($users);
		foreach($users as $key => $value){	//使用了迭代器模式，iterator
			$id[] = $value->id;
		}
		$random_keys=array_rand($id,3);		//array_rand 返回随机键名的数组
		var_dump($users);
		var_dump($random_keys);
		echo $id[$random_keys[0]]."<br>";
		echo $id[$random_keys[1]]."<br>";
		echo $id[$random_keys[2]];
	}
	
	//我的版本
	public function copyNode1(){	//$id：需要复制的节点；$copyToId：复制到该节点
		function copyNode($id,$copyToId){
			$newNode = Page::find($copyToId);
			$newNode->addChild( new Page() );
			$child = $newNode->getLastChild();

			$oldNode = DB::table('pages')->where('id',$id)->get();	
			// $child->fillable(['title','excerpt','content']);	//添加指定字段为白名单
			// fillable的第二种用法，在实例化后使用
			$child->fill([									//字段集体赋值
				'title' => $oldNode[0]->title,	 
				'excerpt' => $oldNode[0]->excerpt, 
				'content' => $oldNode[0]->content, 
			]); 
			$child->save(); 	//最后保存

			$oldNode = Page::find($id);
			if($oldNode->hasChildren()){
				foreach( $oldNode->getChildren() as $value){
					copyNode($value->id,$child->id);	//递归调用
				}
			}
		}
		copyNode(2,7);
	}

	//recardoh的版本
	public function copyNode2(){
		$source = Page::find(2);
		$source_Tree = $source->getDescendantsTree();

		$destination = Page::find(7);

		function copy($source, $destination): void {
			// Copy the file / directory to the destination
			$new_file = new Page($source->toArray());
			$destination->addChild($new_file);

			// Copy the children if it's a directory and it has children
			if ($source->hasChildren()) {
				foreach ($source->getChildren() as $child) {
					copy($child, $new_file);
				}
			}
		}
		copy($source, $destination);
	}
	
}

