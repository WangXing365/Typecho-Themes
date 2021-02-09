<?php
/**
 * 关于我们
 *
 * @package custom
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="doc-container" id="doc-container">
	<div class="about-banner" id="container">
		<header class="l-top hasAnim arrow-holder">
			<a data-path-hover="M31.3184948,33.1943359 C36.3357454,28.0664371 44.4728686,28.0690462 49.572124,33.2807584 C54.6360745,38.4563871 54.6061839,46.8782889 49.6566817,51.9369454 L31.318494,69.5197703 L49.6566817,89.71735 C54.6739322,94.8452488 54.6713794,103.161825 49.572124,108.373537 C44.5081735,113.549166 36.267997,113.518616 31.3184948,108.459959 L3.8112137,78.891075 C-1.25273677,73.7154463 -1.2880417,65.3601778 3.8112137,60.1484655 L31.3184948,33.1943359 Z">
			<svg width="0" height="0">
			<path fill="#fff" d="M58.9103319,3.8342148C63.9275825,-1.29368407,72.0647057,-1.29107495,77.1639611,3.92063726C82.2279116,9.09626594,82.198021,17.5181678,77.2485188,22.5768242C77.2485188,22.5768242,31.318494,69.5197703,31.318494,69.5197703C31.318494,69.5197703,77.2485188,116.462716,77.2485188,116.462716C82.2657693,121.590615,82.2632165,129.907191,77.1639611,135.118903C72.1000106,140.294532,63.8598341,140.263982,58.9103319,135.205326C58.9103319,135.205326,3.8112137,78.891075,3.8112137,78.891075C-1.25273677,73.7154463,-1.2880417,65.3601778,3.8112137,60.1484655C3.8112137,60.1484655,58.9103319,3.8342148,58.9103319,3.8342148C58.9103319,3.8342148,58.9103319,3.8342148,58.9103319,3.8342148">
			</path>
		</svg>
		</a>
		<!--/arrow-->
		<a data-path-hover="M31.3184948,33.1943359 C36.3357454,28.0664371 44.4728686,28.0690462 49.572124,33.2807584 C54.6360745,38.4563871 54.6061839,46.8782889 49.6566817,51.9369454 L31.318494,69.5197703 L49.6566817,89.71735 C54.6739322,94.8452488 54.6713794,103.161825 49.572124,108.373537 C44.5081735,113.549166 36.267997,113.518616 31.3184948,108.459959 L3.8112137,78.891075 C-1.25273677,73.7154463 -1.2880417,65.3601778 3.8112137,60.1484655 L31.3184948,33.1943359 Z">
		<svg width="0" height="0">
		<path fill="#fff" d="M58.9103319,3.8342148 C63.9275825,-1.29368407 72.0647057,-1.29107495 77.1639611,3.92063726 C82.2279116,9.09626594 82.198021,17.5181678 77.2485188,22.5768242 L31.318494,69.5197703 L77.2485188,116.462716 C82.2657693,121.590615 82.2632165,129.907191 77.1639611,135.118903 C72.1000106,140.294532 63.8598341,140.263982 58.9103319,135.205326 L3.8112137,78.891075 C-1.25273677,73.7154463 -1.2880417,65.3601778 3.8112137,60.1484655 L58.9103319,3.8342148 Z">
		</path>
		</svg>
		</a>
		<!--/arrow-->
		</header>
		<div class="about-title">
		<h1>关于我</h1>
		<p><?php $this->options->description() ?></p>
		</div>
	</div>
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
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/about.css'); ?>">