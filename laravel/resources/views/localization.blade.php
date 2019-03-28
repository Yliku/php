<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>localization AND laravel+vue</title>
</head>
<body>
	<h1>测试localization本地化，从resource/lang汇出到vue调用</h1>
	<h4>blade模板的写法一：{{ __('message.home') }}</h4>
	<h4>blade模板的写法二：@lang('message.home')</h4>
	<h4>php中的写法一：<?php echo __('message.home'); ?></h4>
	<h4>php中的写法二：<?php echo trans('message.home'); ?></h4>

	<div id="app">
		<input v-model="test">
		@{{test}}
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>