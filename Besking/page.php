<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="doc-container" id="doc-container">
	<div class="container-fixed">
		<div class="col-content" style="width:100%">
			<div class="inner">
				<article class="article-list">
					<section class="article-item">
						<aside class="title" style="line-height:1.5;">
							<h4><?php $this->title() ?></h4>
							<p class="fc-grey fs-14">
								<small>
									作者：
									<a href="javascript:void(0)" target="_blank" class="fc-link">
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
						<div class="content artiledetail" style="border-bottom: 1px solid #e1e2e0; padding-bottom: 20px;">
							<?php $this->content(); ?>
							<div id="aplayer" style="margin:5px 0"></div>
						</div>
						<?php $this->need('comments.php'); ?>
					</section>
				</article>
			</div>
		</div>
	</div>
</div>

<?php $this->need('footer.php'); ?>