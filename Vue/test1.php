<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vue实例</title>
	<script src='./vue.js'></script>
</head>
<body>
	<div id='test'>
		<!-- <div v-text='msg'></div> -->
		{{msg}}
	</div>

	<script>
		var vm = new Vue({
			el: '#test',
			data:{
				msg:'测试',	//vue里面都是逗号， 只有函数/方法 里面才需要分号;
			}
		});
	</script>
</body>
</html>