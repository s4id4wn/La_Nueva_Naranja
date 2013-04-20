<?php
$this->breadcrumbs=array(
	'Tipos de Equipo'=>array('index'),
	'Administracion',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Equipo', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Equipo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('equipment-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administraci&oacute;n de Tipo de Equipo</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparaci&oacute;n
</p>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'equipment-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'type',
		array(
			'name' => 'active',
			'type'=>'raw',
			'value'=>'EquipmentType::getActive($data->active)',
			'filter'=>array('1'=>'Si','0'=>'No'),
			),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSize,
                array(1=>1,2=>2,5=>5,10=>10,EquipmentType::Model()->count()=>'Todos'),
                array(
					'prompt'=>'Paginacion',
					'onchange'=>"$.fn.yiiGridView.update('equipment-type-grid',{ data:{ pageSize: $(this).val() }})",
					)
            ),
			'template'=>'{update}{view}{delete}{activate}',
			'buttons' => array(

				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("equipmentType/activate", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
					'click'=>"function(){
								if(!confirm('¿Seguro que desea activar este elemento?')){
									return false;
								}
								$.fn.yiiGridView.update('equipment-type-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('equipment-type-grid');
									},
									});
									return false;
							}",
					'visible'=>'$data->active == 0',
				),
				
				'delete'=>array(
					'visible'=>'$data->active == 1',
				),
			),
		),
	),
)); ?>

