<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
 
<?php
    $host = 'https://www.hiai.top/yuan/favicon.png';
    $avatar = $host;
?>
        <li class="zoomIn article" id="li-<?php $comments->theId(); ?>" <?php 
            if ($comments->levels > 0) {
                echo ' comment-child';
                $comments->levelsAlt(' info', ' comment-level-even');
            } else {
                echo ' comment-parent';
            }
                $comments->alt(' comment-odd', ' comment-even');
                echo $commentClass;
            ?>">
            <div class="comment-parent" id="<?php $comments->theId(); ?>">
                <?php local_random_avatar($comments->author)?>
                <div class="info">
                    <span class="username">
                       <?php $comments->author(); ?>&nbsp;&nbsp;<?php get_comment_at($comments->coid)?>
                    </span>
                </div>
                <div class="comment-content">
                    <?php $comments->content(); ?>
                </div>
                <p class="info info-footer">
                    <span class="comment-time">
                       <?php $comments->date('Y-m-d'); ?>
                    </span>
                    <?php $comments->reply('<i class="mdi mdi-reply"></i>回复'); ?>
                    
                </p>
            </div>
            
          
            <?php if ($comments->children) { ?> 
                <?php $comments->threadedComments($options); ?>
             <?php } ?>
        </li>

<?php } ?>


<?php $this->comments()->to($comments); ?>
<fieldset class="layui-elem-field layui-field-title">
    <legend>发表评论  <?php $this->commentsNum('<small>抢沙发</small>', '<b>1</b>', '<b>%d</b>'); ?></legend>
</fieldset>
<?php if(!$this->allow('comment')){ ?>
<fieldset class="layui-elem-field layui-field-title">
    <legend>评论已经关闭了</legend>
</fieldset>
<?php }else{ ?>

<div class="textarea-wrap message" id="<?php $this->respondId(); ?>">
    <h3><?php $comments->cancelReply('<i class="mdi mdi-reply" ></i>取消回复'); ?></h3> 
    <form method="post" action="<?php $this->commentUrl() ?>" class="layui-form blog-editor" id="comment-form">
        <?php if($this->user->hasLogin()): ?>
            <h3 class="layui-field-title"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></h3>
        <?php else: ?>
        <div class="layui-form-item">
            <div class="layui-inline">
                <input type="tel" name="author" id="author" lay-verify="required" autocomplete="off" placeholder="称呼 * " class="layui-input">
            </div>
            <div class="layui-inline">
                <input type="text" name="mail" id="mail" lay-verify="email" autocomplete="off" placeholder="电子邮箱 * "class="layui-input">
            </div>
            <div class="layui-inline">
                <input type="text" name="url" id="url" autocomplete="off"  placeholder="网址 http:// " class="layui-input">
            </div>
        </div>
        
        <?php endif; ?>
        
        <div class="layui-form-item">
            <textarea name="text" lay-verify="content" id="remarkEditor" placeholder="请输入内容" class="layui-textarea layui-hide">
            </textarea>
        </div>
       
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="formLeaveMessage" lay-filter="formLeaveMessage">
                提交留言
            </button>
        </div>
    </form>
</div>
    
<?php } ?>

<div class="f-cb"></div>
<div class="mt20">
    <ul class="message-list" id="message-list">
        <?php if ($comments->have()) : ?>
           <?php $comments->listComments(); ?>
       <?php endif; ?>
    </ul>
</div>

<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/message.css'); ?>">