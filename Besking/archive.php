<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="doc-container" id="doc-container">
	<div class="container-fixed">
		<div class="col-content">
			<div class="inner">
				<section class="article-item zoomIn article">
					<h3 class="archive-title"><?php $this->archiveTitle(array(
						'category'  =>  _t('分类 %s 下的文章'),
						'search'    =>  _t('包含关键字 %s 的文章'),
						'tag'       =>  _t('标签 %s 下的文章'),
						'author'    =>  _t('%s 发布的文章')
					), '', ''); ?></h3>
				</section>
				<?php if ($this->have()): ?>
				<?php while($this->next()): ?>
				<article class="article-list bloglist" id="LAY_bloglist">
					<section class="article-item zoomIn article">
						<h5 class="title">
							<span class="fc-blue">【<?php $this->category(','); ?>】</span>
							<a href="<?php $this->permalink() ?>">
								<?php $this->title() ?>
							</a>
						</h5>
						<div class="time">
							<span class="day">
								<?php $this->date('d'); ?>
							</span>
							<span class="month fs-18">
								<?php $this->date('m'); ?>
								<span class="fs-14">月</span>
							</span>
							<span class="year fs-18 ml10">
								<?php $this->date('y'); ?>
							</span>
						</div>
						<div class="content">
							<a href="<?php $this->permalink() ?>" class="cover img-light">
								<img src="<?php echo showThumb($this,null,true); ?>" data-src="<?php echo showThumb($this,null,true); ?>">
							</a>
							<?php $this->excerpt(111, '...'); ?>
						</div>
						<div class="read-more">
							<a href="<?php $this->permalink() ?>" class="fc-black f-fwb">继续阅读</a>
						</div>
						<aside class="f-oh footer">
							<div class="f-fl tags">
								<span class="fa fa-tags fs-16"></span>
									<a class="tag" href="javascript:;"><?php $this->tags(', ', true, ''); ?></a>
							</div>
							<div class="f-fr">
								<span class="read">
									<i class="fa fa-eye fs-16"></i>
									<i class="num"><?php echo get_post_view($this) ?></i>
								</span>
								<span class="ml20">
									<i class="fa fa-comments fs-16"></i>
									<a href="javascript:void(0)" class="num fc-grey">
										</i><?php $this->commentsNum('0', '1', '%d'); ?>
									</a>
								</span>
								<span class="read">
										<i class="fa fa-user fs-16"></i>
										<i class="num"><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></i>
								</span>
							</div>
						</aside>
					</section>
				</article>
				<?php endwhile; ?>
					<?php else: ?>
						<section class="article-item zoomIn article">
							<h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
						</section>
				<?php endif; ?>
			</div>
		</div>
		<?php $this->need('sidebar.php'); ?>
	</div>
</div>


<?php $this->need('footer.php'); ?>