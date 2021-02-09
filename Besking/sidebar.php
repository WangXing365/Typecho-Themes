<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>		
			<div class="col-other">
				<div class="inner">
					<div class="other-item" id="categoryandsearch">

					<div class="other-item">
						<h5 class="other-item-title">
							文章分类
						</h5>
						<div class="inner">
							<ul class="hot-list-article">
								<?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
							</ul>
						</div>
					</div>
					</div>
					<!--右边悬浮 平板或手机设备显示-->
					<div class="category-toggle">
						<i class="layui-icon">&#xe603;</i>
					</div>
					<div class="article-category">
						<div class="article-category-title">
							分类导航
						</div>
						<?php $this->widget('Widget_Metas_Category_List')->parse('<a href="{permalink}">{name} ({count})</a> '); ?>
						<div class="f-cb"></div>
					</div>
					<!--遮罩-->
					<div class="blog-mask animated layui-hide"></div>
					<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
					<div class="other-item" >
						<h5 class="other-item-title">最新文章</h5>
						<div class="inner">
							<ul class="hot-list-article">
								<?php $this->widget('Widget_Contents_Post_Recent','pageSize=6')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
							</ul>
						</div>
					</div>
					<?php endif; ?>
					<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
					<div class="other-item">
						<h5 class="other-item-title">最新回复</h5>
						<div class="inner">
							<ul class="hot-list-article">
							<?php $this->widget('Widget_Comments_Recent','pageSize=6')->to($comments); ?>
							<?php while($comments->next()): ?>
							<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
							<?php endwhile; ?>
							</ul>
						</div>
					</div>
					<?php endif; ?>
					<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
					<div class="other-item">
						<h5 class="other-item-title">文章归档</h5>
						<div class="inner">
							<ul class="hot-list-article">
							<?php $this->widget('Widget_Contents_Post_Date','pageSize=6')->to($archives); ?>
								<?php while($archives->next()): ?>
								<li><a href="<?php $archives->permalink(); ?>"><?php $archives->date(); ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
					<?php endif; ?>
					<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
					<div class="other-item">
						<h5 class="other-item-title">文章标签</h5>
						<div class="inner">
							<dl class="vistor">
							<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
							<?php while($tags->next()): ?>
							<dd><a style="color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a></dd>
							<?php endwhile; ?>
							</dl>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>