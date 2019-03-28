<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="./vue.js"></script>	<!-- 引入的开发版本的vue，包含完整的警告和调试模式，最好放在head里面，避免页面出现抖屏 -->
</head>
<body>
	<iframe src="//player.bilibili.com/player.html?aid=45520296&cid=79702612&page=1&autoplay=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true" allow="autoplay" width="500px" height="400px"> </iframe>
	<div id="app1">
	    <child :test='msg'></child>		<!-- 将vue实例的 msg属性的值 赋值给组件的 test属性 -->
	    <h1>父辈的msg：{{msg}}</h1>
	</div>
	<script>
	    var com1 = Vue.component('child',{ 	// 创建全局组件，每个组件的作用域都是独立的
	        props:['test'], 				// props 中声明： 自定义的test属性 将引用组件外的数据，接受外来的数据并保存到 test属性里面
	        template:'<div>父辈传递了msg的值给test：<input v-model="test" /><p>子辈的test属性：{{test}} ——只能在子辈里面使用</p></div>',	
	        // 这里渲染props中声明的 test属性
	        // template 中必须要由一个大的div标签包裹起来！！！！
	        // 在 JavaScript 中对象和数组是引用类型，指向同一个内存空间，如果 props 是一个对象或数组，在子组件内部改变它会影响父组件的状态。
	    })

	    var app1 = new Vue ({	//这里是vue的实例
	        el: '#app1',
	        data: {
	            msg: '父辈的msg',
	        }
	    })
	</script>
</body>
</html>