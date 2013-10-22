
<h1>productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData'=>array('cate'=>$cate, 'sector'=>$sector),

)); ?>
