<?php
/**
 * Besking主题，一款大气，响应式的主题，适合个人博客
 * 本主题为开源项目，请尊重作者版本，请在使用的时候给
 * 作者留一个版权位置，谢谢.
 * 
 * @package BeSking主题
 * @author 拾光分享网（www.hiai.top）
 * @version 2.0
 * @link http://www.hiai.top
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

	<div class="doc-container" id="doc-container">
		<div class="container-fixed">
			<div class="col-content">
				<div class="inner">
					<article class="article-list bloglist" id="LAY_bloglist">
						<?php if($this->have()):?>
						<?php while($this->next()): ?>
						<section class="article-item zoomIn article" id="items">
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
									<?php $this->tags(' ', true, '<a>没有标签</a>'); ?>
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
						<?php endwhile; ?>
						<?php endif; ?>	

						<div style="text-align: center;">
							<div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-1">
						      <?php $this->pageNav('上一页', '下一页', 3, '...', array('wrapTag' => '', 'wrapClass' => '', 'itemTag' => '', 'textTag' => '', 'currentClass' => 'active', 'prevClass' => 'prev-page', 'nextClass' => 'next-page')); ?>
							</div>
						</div>

					</article>
				</div>
			</div>
			<?php $this->need('sidebar.php'); ?>
		</div>
	</div>
<?php $this->need('footer.php'); ?>