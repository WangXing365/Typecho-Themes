<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="grid-footer">
	<div class="footer-fixed">
		<div class="copyright">
			<div class="info">
				<!-- 尊重作者版权，请给作者留一个位置，万分感谢。 -->
				<p class="mt05">
					Copyright &copy; <?php echo date("Y"); ?> <?php $this->options->title() ?>  All Rights Powered by <a href="http://typecho.org/" target="_blank" >Typecho</a>
    				Theme By <a href="https://www.hiai.top/">Besking</a>
				</p>
				<p class="mt05">
					<a href="http://www.beian.miit.gov.cn/">鄂ICP备19007924号-1</a>
				</p>
			</div>
		</div>
	</div>
</footer>
<script type="text/javascript" src="<?php $this->options->themeUrl('lib/layui/layui.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/yss/gloable.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/plugins/nprogress.js'); ?>"></script>
<script>NProgress.start();</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/yss/article.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/pagemessage.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/plugins/blogbenoitboucart.min.js'); ?>"></script>

<script>
	window.onload = function() {
		NProgress.done();
	};
</script>
<script type="text/javascript">
	$(function () {
		$("#btn").click(function () {
		$("#btn-search").toggle();
		})
	})
</script>
<?php if($this->options->GoogleAnalytics): ?>
<?php $this->options->GoogleAnalytics(); ?>
<?php endif; ?>
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "https://hm.baidu.com/hm.js?ce0a6af43c652c3267509e86227948e0";
var s = document.getElementsByTagName("script")[0]; 
s.parentNode.insertBefore(hm, s);
})();
</script>
<?php $this->footer(); ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/plugins/prism.js'); ?>"></script>

</body>
</html>