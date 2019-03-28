<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>localization</title>
</head>
<body>
	<h1>测试localization本地化，从resource/lang汇出到vue调用</h1>
	<h2>{{ __('passwords.password') }}</h2>
	<h2><?php echo trans('passwords.password'); ?></h2>
	<h2><?php echo trans('message.home'); ?></h2>
</body>
</html>