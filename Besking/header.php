<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
	<meta charset="<?php $this->options->charset(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>
		<?php $this->
			archiveTitle(array( 'category' => _t('分类 %s 下的文章'), 'search' => _t('包含关键字
			%s 的文章'), 'tag' => _t('标签 %s 下的文章'), 'author' => _t('%s 发布的文章') ), '',
			' - '); ?>
			<?php $this->options->title(); ?>
	</title>

 	<link rel="shortcut icon" href="<?php $this->options->themeUrl('img/favicon.ico'); ?>">
	<!-- 使用url函数转换相关路径 -->
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('lib/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('lib/layui/css/layui.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/master.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/gloable.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/nprogress.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/blog.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/plugins/prism.css'); ?>">
</head>
<body>
	<div class="header"></div>
	<header class="gird-header">
		<div class="header-fixed">
			<div class="header-inner">
				<a href="<?php $this->options->siteUrl(); ?>" class="header-logo" id="logo"><?php $this->options->title();?></a>
				<nav class="nav" id="nav">
					<ul>
						<li>
							<a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('网站首页'); ?></a>
						</li>
						<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
						<?php while($pages->next()): ?>
						<li>
							<a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
				</nav>
				<a href="javascript:;" class="blog-user" id="btn">
                    <i class="fa fa-search"></i>
                </a>
				<a class="phone-menu">
					<i></i>
					<i></i>
					<i></i>
				</a>
			</div>
		</div>
	</header>

<section class="article-item zoomIn article site-form" style=" top:58px;opacity: 1; display: none;" id="btn-search">
	<div class="site-search">
	<form method="get" class="site-search-form" action="<?php $this->options ->siteUrl(); ?>">
		<input type="text" class="search-input" name="s" placeholder="请输入关键字" value="">
		<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
	</form>
	</div>
</section>





