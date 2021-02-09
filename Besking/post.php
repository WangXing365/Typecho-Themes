<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="doc-container" id="doc-container">
	<div class="container-fixed">
		<div class="col-content">
			<div class="inner">
				<article class="article-list">
					<section class="article-item">
						<aside class="title" style="line-height:1.5;">
							<h4><?php $this->title() ?></h4>
							<p class="fc-grey fs-14">
								<small>
									作者：
									<a href="<?php $this->author->permalink(); ?>"class="fc-link">
										<?php $this->author(); ?>
									</a>
								</small>
								<small class="ml10">
									围观群众：
									<i class="readcount">
										<?php get_post_view($this) ?>
									</i>
								</small>
								<small class="ml10">
									更新于
									<label>
										<?php $this->date('Y-m-d'); ?>
									</label>
								</small>
							</p>
						</aside>
						<div class="time mt10" style="padding-bottom:0;">
							<span class="day">
								<?php $this->date('d'); ?>
							</span>
							<span class="month fs-18">
								<?php $this->date('m'); ?>
								<small class="fs-14">
									月
								</small>
							</span>
							<span class="year fs-18">
								<?php $this->date('Y'); ?>
							</span>
						</div>
						<div class="content artiledetail" style="border-bottom: 1px solid #e1e2e0; padding-bottom: 20px;" >
							<?php $this->content(); ?>
							<div id="aplayer" style="margin:5px 0"></div>
							<h6>
								延伸阅读
							</h6>
							<?php $this->related(8,'author')->to($relatedPosts); ?>
							<?php if($relatedPosts->have()):?>
							<ol class="b-relation">
								<?php while($relatedPosts->next()): ?>
								<li class="f-toe">
									<a href="<?php $relatedPosts->permalink();?>" title="<?php $relatedPosts->title();?>">
										<?php $relatedPosts->title();?>
									</a>
								</li>
								<?php endwhile; ?>
							<?php endif?>
							</ol>
							<h6>
								更多阅读
							</h6>
							<ol class="b-relation">
								<li class="f-toe">上一篇：<?php $this->thePrev('%s','没有了'); ?></li>
								<li class="f-toe">下一篇：<?php $this->theNext('%s','没有了'); ?></li>
							</ol>
						</div>

						<?php $this->need('comments.php'); ?>
					</section>
				</article>
			</div>
		</div>
		<?php $this->need('sidebar.php'); ?>
	</div>
</div>

<?php $this->need('footer.php'); ?>