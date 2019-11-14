<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome Admin</h1>

        <p class="lead">This is your control panel.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/signup']);?>" data-method='post'>Create user account</a>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                

                <p><a class="btn btn-default" href="<?= Url::to(['site/custom-email']); ?>">Send Email &raquo;</a></p>
            </div>
            <div class="col-lg-4">
               
            </div>
            <div class="col-lg-4">
              
            </div>
        </div>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            [
                'label' => 'Username',
                'format' => 'raw',
                'value' => function ($name){
                    return '<a href="'.Url::to(["site/pages","id"=>$name->userid]).'">'.$name->name.'</a>';
                },
            ],
            'firstname',
            'lastname',
            'balance',
            'accountNo',
            //'routingNumber',
            //'name',
            //'message',
            [
                'label' => 'Email',
                'value' => 'email',
            ],
            [
                'label' => 'Status',
                'format' => 'raw',
                'value' => function ($status){
                    ($status->transferStatus == 0) ? ($st = 'Enabled') && ($col = 'primary') : ($st = 'Disabled') && ($col = 'danger'); 
                    return '<button class="statusbtn statusbtn-'.$status->userid.' btn btn-'.$col.' btn-sm" data-value="'.$status->userid.'">'.$st.'</button>';
                },
            ],
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
        ]); ?>


    </div>
</div>
<?php
$updateStatus = Url::to(['site/update-status']);
$statusJs = <<<JS

$('.statusbtn').click(function(e){
    e.preventDefault();
    var id = $(this).data('value');
    $.ajax({
        url: '$updateStatus',
        type: 'POST',
        data: {
          'id':id
          },
        success: function(response) {
        console.log(response)
        if(response == 1){
            $('.statusbtn-'+id).text('Disabled')
            $('.statusbtn-'+id).removeClass('btn-primary')
            $('.statusbtn-'+id).addClass('btn-danger')
        }else {
            $('.statusbtn-'+id).text('Enabled')
            $('.statusbtn-'+id).removeClass('btn-danger')
            $('.statusbtn-'+id).addClass('btn-primary')
        }

        },
        error: function(res, sec){
        console.log('Something went wrong');
        }
    });
})

JS;
$this->registerJs($statusJs);
?>