<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
    'focus'=>array($model,'user'),
)); 

//if ($model->isNewRecord==false) { $b=Estado::model()->findByPk($model->id_estado);

?>
    

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->textField($model,'user',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'user'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password3'); ?>
		<?php echo $form->passwordField($model,'password3',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'password3'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

        <div class="row">
		<?php 
		echo $form->labelEx($model,'selected_roles'); ?>
		<?php echo $form->checkBoxList(
			$model,
			'selected_roles',			
			array(
				'tecnico' => 'Técnico',
				'administrador' => 'Administrador',
			//	'recepcionista' => 'Recepcionista',
			)
			
			//CHtml::listData( Role::model()->findAll('active = 1'),
            //                            'id',
            //                            'role'
            //                            )
		); ?>
		<?php echo $form->error($model,'selected_roles')?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->