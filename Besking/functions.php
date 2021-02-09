<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

//后台设置
function themeConfig($form) {

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowArchive' => _t('显示归档'),
    'ShowTag' => _t('显示标签')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowArchive', 'ShowTag'), _t('侧边栏显示'));

    $form->addInput($sidebarBlock->multiMode());

    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Textarea('GoogleAnalytics', NULL, NULL, _t('统计代码'), _t('填写你的各种跟踪统计代码，相当于页尾代码'));
    $form->addInput($GoogleAnalytics);
}


//缩略图调用
function showThumb($obj,$size=null,$link=false){
    preg_match_all( "/<[images|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }
    if(empty($thumb) && empty($options->default_thumb)){
		$thumb= $options->themeUrl .'/img/thumb/' . rand(1, 8) . '.jpg';
        return $thumb;
    }else{
        $thumb = empty($thumb) ? $options->default_thumb : $thumb;
    }
    if($link){
        return $thumb;
    }
}


/*文章阅读次数统计*/
function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'];
}

/**
 * 解析内容以实现附件加速
 * @access public
 * @param string $content 文章正文
 * @param Widget_Abstract_Contents $obj
 */
function parseContent($obj) {
    $options = Typecho_Widget::widget('Widget_Options');
    if (!empty($options->src_add) && !empty($options->cdn_add)) {
        $obj->content = str_ireplace($options->src_add, $options->cdn_add, $obj->content);
    }
    $obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" target=\"_blank\" rel=\"nofollow\">", $obj->content);
    echo trim($obj->content);
}

/*
* 回复评论添加 @ 标签
*/
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href = '回复 <a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}

/**
 * 强制评论支持Markdown语法
 * @param  [type] $archive [description]
 * @return [type]          [description]
 */
function themeInit($archive){
    Helper::options()->commentsHTMLTagAllowed = '<a href=""> <img src=""> <b/> <blockquote>';
    //评论中支持超链接，图片，和引用的html语法
    Helper::options()->commentsMarkdown = true;
    //强制评论支持Markdown语法
}

function  art_count ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	echo mb_strlen($rs['text'], 'UTF-8');
}

/**
 * 添加随机用户头像
 */
function local_random_avatar($user) {
    $options = Typecho_Widget::widget('Widget_Options');
    if($user == 'admin'){
        $thumb= $options->themeUrl .'/img/avatar-default.png';
    }else{
        $thumb= $options->themeUrl .'/img/avatar/' . rand(1, 10) . '.png';
    }
    $avatar = "<img alt='{$user}的头像' src='{$thumb}' class='avatar avatar-50 photo' />";
    echo $avatar;
}