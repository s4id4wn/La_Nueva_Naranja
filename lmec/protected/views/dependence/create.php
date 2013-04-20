<?php
/* @var $this DependenceController */
/* @var $model Dependence */

$this->breadcrumbs=array(
	'Dependences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dependence', 'url'=>array('index')),
	array('label'=>'Manage Dependence', 'url'=>array('admin')),
);
?>

<h1>Create Dependence</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>