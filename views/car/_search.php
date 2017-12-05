<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'car_owner') ?>

    <?= $form->field($model, 'colour') ?>

    <?= $form->field($model, 'consumption') ?>

    <?= $form->field($model, 'cost_less_30_inc') ?>

    <?php // echo $form->field($model, 'cost_more_31') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'mark') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'mileage') ?>

    <?php // echo $form->field($model, 'state_num') ?>

    <?php // echo $form->field($model, 'year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
