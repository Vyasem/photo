<?php
$this->title = 'Мое портофолио';
?>
<?if(isset($data)){?>
<div id="gallery_main">
	<div>
		<?foreach ($data as $view){?>	
			<div class="gallery">
				<a href="<?=yii\helpers\Url::to(['main/gallery', 'id_cat' => $view['id_cat']])?>">
					<div>
						<p><?=$view['name']?></p>
						<img src="../img/gallery/category/<?=$view['foto']?>">
					</div>
				</a>
			</div>
		<?}?>
	</div>
</div>
<?}else{?>
<div id="category_main">
	<h1 id="h1_style"><?=$categoryName?></h1>
	<div>
		<?foreach ($images as $view){?>	
			<div class="category">
			<a class="quickbox" href="../img/gallery/<?=$view['id_cat']?>/<?=$view['name']?>"><img src="../img/gallery/<?=$view['id_cat']?>/small/<?=$view['name']?>"></a>
		</div>
		<?}?>
	</div>
</div>
<?}?>