<?php
/* @var $this DependenceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dependences',
);

$this->menu=array(
	array('label'=>'Create Dependence', 'url'=>array('create')),
	array('label'=>'Manage Dependence', 'url'=>array('admin')),
);
?>

<h1>Dependences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
