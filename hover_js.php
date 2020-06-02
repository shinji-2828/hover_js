<?php $arr = [
	[
	'title' => 'きみのなは',
	'stars' => '☆☆☆☆☆',
	'assay' => 'とてもよい',
	],
	[
	'title' => 'てんきのこ',
	'stars' => '☆☆☆☆',
	'assay' => 'よい',
	],
	[
	'title' => '秒速５センチメートル',
	'stars' => '☆☆☆',
	'assay' => 'ほろにがい',
	],
];?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>hover-event</title>
	</head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<style type="text/css">
		#pop{
			display:inline-block;
			position:absolute;
			margin-top:15px;
			margin-left:5px;
			background:rgba(0,0,0,0.5);
			color:#FFF;
			margin-top:15px;
			text-align:center;
			border-radius:3px;
			padding:5px;
		}
	</style>
	<body>
		<h1>映画評価</h1>
		<table class="table table-bordered table-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">題名</th>
				<th scope="col">評価</th>
			</tr>
			<?php foreach ($arr as $key => $value): ?>
				<tr>
					<td scope="row"><?= $key;?></td>
					<td class="hoverAssay" data-eId="<?= $key;?>"><?= $value['title'];?></td>
					<td><?= $value['stars'];?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</body>
</html>

<script type="text/javascript">
var arr = <?= json_encode($arr);?>;
$(function(){
	$('.hoverAssay').hover(function(){
		var eID = $(this).attr('data-eId');
		if (arr[eID]['assay'] !== undefined) {
			var text = arr[eID]['assay'];
		}else{
			var text = '評価はまだありません';
		}
		$('body').append('<div id="pop">'+text+'</div>');
		$('#pop').show();
		$(window).mousemove( function(e){
			var x = e.pageX;
			var y = e.pageY;
			$('#pop').css({left:x+'px',top:y+'px','z-index':'100'});
		});

	},
	function (){
		$('#pop').remove();
	}
	);
	var popOn = function(text){
	}

});
</script>
