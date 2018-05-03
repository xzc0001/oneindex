<?php view::layout('layout')?>

<?php view::begin('content');?>
<link href="https://cdn.bootcss.com/dplayer/1.22.2/DPlayer.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/dplayer/1.22.2/DPlayer.min.js"></script>
<div class="mdui-container-fluid">
	<br>
	<?php $ext = strtolower(pathinfo($item['name'], PATHINFO_EXTENSION));if(in_array($ext,['mkv'])):?>
	<video class="mdui-video-fluid mdui-center" preload controls poster="<?php @e($item['thumb'].'&width=176&height=176');?>">
	  <source src="<?php e($item['downloadUrl']);?>" type="video/mp4">
	</video>
<?php else:?>
	<div class="mdui-video-fluid mdui-center" preload controls id="dplayer"></div>
	<script>
	const dp = new DPlayer({
    	container: document.getElementById('dplayer'),
   		screenshot: false,
   	  video: {
       	url: '<?php e($item['downloadUrl']);?>',
        	pic: '<?php @e($item['thumb'].'&width=1024&height=1024');?>',
        	type: 'auto'
    		}
	});
	</script>
<?php endif?>
	<br>
	<!-- 固定标签 -->
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">下载地址</label>
	  <input class="mdui-textfield-input" type="text" value="<?php e($url);?>"/>
	</div>
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">引用地址</label>
	  <textarea class="mdui-textfield-input"><video><source src="<?php e($url);?>" type="video/mp4"></video></textarea>
	</div>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>
