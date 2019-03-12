<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="./vue.js"></script>	<!-- 引入的开发版本的vue，包含完整的警告和调试模式，最好放在head里面，避免页面出现抖屏 -->
</head>

<body>
	<div id="root">
		<h5>前端vue框架学习，你好， {{name}}	</h5>	<!-- 插值表达式 -->
		<h5 v-text="sex"></h5>	<!-- h5的内容由sex这个变量决定 -->
		<h5 v-text="age"></h5>
		<div title={{test}}>测试html标签的属性是否可以用{{}}插值表达式的写法来赋值：测试失败，不能</div>
		<h5 v-text="content"></h5>
		<h5 v-html="content"></h5>
		<h5 v-on:click="test1"> {{diff}} </h5>
		<!-- 简写方式  v-on:等同于 @，比如：  <h3 @click="test1"> {{diff}} </h3> -->
		<input v-bind:value="value"> v-bind:  单向数据绑定，input框的值由data里面的value决定，改变input框的值不会影响到data里面value的值<br>
		<input v-model="value">		 v-model= 双向数据绑定，input框的值 和 data里面value的值 绑定，只要有一个变了，另一个也会同时改变<br>
		<div v-text="value"></div>
		姓：<input v-model="firstName">
		名：<input v-model="lastName">
		全名：{fullName} ：计算属性，定义在computed里面，不定义在data里面
		<div>
			<button @click = "test3">toggle</button>
			<div v-if='show'>点击toggle显示/隐藏这段 v-if 文字，v-if和v-show的区别可F12打开控制台观察</div>
			<div v-show='show'>点击toggle显示/隐藏这段 v-show 文字，v-if和v-show的区别可F12打开控制台观察</div>
		</div>
		<ul>
			<li v-for="(item,index) of list" :key="index">item of list {{item}}</li>
		</ul>
		<input v-model="inputValue">
		<button @click="handleSubmit">提交</button>
		<ul>
			<!-- <li v-for="(item,index) of list1" :key="index">{{item}}</li> -->
			<!-- index 不要换成 key，会有冲突报错 -->
			<todo-item 
			v-for="(item,index) of list1" 
			:key="index" 
			:content="item"	
			:index="index"
			@delete="handleDelete"
			></todo-item>	<!-- 传递一个item的参数给content ，
			@delete 父组件监听一个delete事件，如果监听到了，执行里面的函数-->
		</ul>
		<ul>
			<todo-item></todo-item>
		</ul>
		<ul>
			<todo-item1></todo-item1>
		</ul>
	</div>


	<script>
		Vue.component('todo-item',{		
		//创建一个全局组件，每一个全局组件都是一个 Vue的实例，也就是说组件里面也可以有自己的方法
			props: ['content','index'],			//接收一个参数，保存到 content里面
			template:'<li @click="click">item全局组件 {{content}} {{index}}</li>',	//使用模板
			methods:{
				click:function(){
					// alert('每一个组件都是一个 Vue的实例，组件里面也可以有自己的方法');
					this.$emit('delete',this.index)	// $emit() 是一个事件，触发一个叫delete的事件
				}
			}
		});

		var TodoItem = {				//创建一个局部组件
			template:'<li>item局部组件</li>',
		};

		var dom = new Vue({
			el: "#root",	//挂载点，id用#号，代表接管页面上id等于root的元素，vue在这里就和这个dom做好了绑定，vue只会去处理挂载点的内容
			// template:'<h1>默认模板，优先级最高，这段代码加上去后，挂载点的所有内容就变成这段了</h1>',
			components:{	//组件
				'todo-item1': TodoItem,	//这样就可以使用 todo-item1 这个自定义的标签了
			},
			data:{		//数据
				name: "测试挂载点",
				sex: 'male',
				age:30,
				test:'测试html标签的属性是否可以用vue的插值表达式来赋值',
				content:"<h3>测试 v-html和v-text 的区别：v-text 会进行转义，不会让页面渲染标签</h3>",
				diff:"点击此处查看区别",
				value:"单向/双向数据绑定：v-blind / v-model",
				firstName: "Yliku",
				lastName:"红",
				count:0,
				show:true,
				list: [1,2,3,4],
				inputValue:"",
				list1: [],
			},
			methods:{	//方法
				test1:function(){
					this.diff = "而 v-html 不会进行转义，页面会识别字符串里面的html标签进行渲染";	
					//vue的script里面都是逗号， 只有函数/方法里面 和 data里面的return最后，才需要分号！！！！！！！！！！！
					this.age ++;
				},
				test2:function(){
					alert(123);
				},
				test3:function(){
					this.show = !this.show;
				},
				handleSubmit:function(){
					this.list1.push(this.inputValue);		//push数组的添加，往list1数组里面添加数据
					this.inputValue = "";
				},
				handleDelete:function(index){
					// alert(index);
					this.list1.splice(index,1);
				},
			},
			computed:{	
			//计算属性，是一个属性~~~~~但是属性后面跟的是方法，也就是说fullName这个属性是通过后面的方法计算得来的
			//计算属性有一个缓存，所以计算属性的性能更加好，methods没有缓存
				fullName:function(){
					return this.firstName + this.lastName;
				}
			},
			watch:{		//监听器
				fullName:function(){
					this.count++;
				},
			},
		});
		// 原生的js写法：
		// var dom = document.getElementById('root');
		// dom.innerHTML = "hello world";
	</script>
</body>
</html>