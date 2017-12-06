<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'car_id',
            'car_owner',
            'colour',
            'consumption',
            'cost_less_30_inc',
            [
                    'format' => 'html',
                    'label' => 'Image',
                    'value' => function($data){
                        return Html::img($data->getImage(), ['width'=>200]);
                    }
            ],
            // 'cost_more_31',
            // 'foto',
            // 'mark',
            // 'model',
            // 'mileage',
            // 'state_num',
            // 'year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
