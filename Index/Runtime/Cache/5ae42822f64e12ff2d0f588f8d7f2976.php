<?php if (!defined('THINK_PATH')) exit();?>[<?php $__FOR_START_4856__=1;$__FOR_END_4856__=10;for($a=$__FOR_START_4856__;$a < $__FOR_END_4856__;$a+=1){ ?>{<?php if(is_array($data)): foreach($data as $k=>$vo): echo ($vo["field"]); ?>:<?php echo (get_rand($vo["demo_data"],0,300)); ?>,<?php endforeach; endif; ?>}
<?php echo ($Newline); } ?>]