<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transfers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transfer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'amount',
            'date',
            'bank',
            //'accountNumber',
            //'routingNumber',
            //'name',
            //'message',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
