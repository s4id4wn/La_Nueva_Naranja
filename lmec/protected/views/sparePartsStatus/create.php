<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estado de Refacciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estados', 'url'=>array('index')),
	array('label'=>'Administrar Estados', 'url'=>array('admin')),
);
?>

<h1>Crear Estado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>