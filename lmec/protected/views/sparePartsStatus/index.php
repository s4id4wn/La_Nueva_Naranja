<?php
/* @var $this SparePartsStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estados de Refacciones',
);

$this->menu=array(
	array('label'=>'Crear Estado', 'url'=>array('create')),
	array('label'=>'Administrar Estados', 'url'=>array('admin')),
);
?>

<h1>Estados de Refacciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting' => true,
	'sortableAttributes'=>array(
            'description',
            
    ),
)); ?>
