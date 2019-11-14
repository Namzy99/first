<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            
                <?= $form->field($person, 'firstname')->textInput() ?>
            
                <?= $form->field($person, 'lastname')->textInput() ?>
                <?= $form->field($person, 'address')->textInput() ?>
                <?= $form->field($person, 'accountNo')->textInput(['type' => 'number']) ?>
                <?= $form->field($person, 'balance')->textInput(['type' => 'number']) ?>
                <?= $form->field($person, 'telephone')->textInput(['type' => 'number']) ?>
                <?= $form->field($person, 'nationality')->textInput() ?>
                <?= $form->field($person, 'sex')->dropDownList(['male'=>'male','female'=>'female'])?>
                <?= $form->field($person, 'maritalStatus')->dropDownList(['single'=>'single','married'=>'married','divorced'=>'divorced','widowed'=>'widowed'])?>
                <?= $form->field($person, 'occupation')->textInput()?>
                <?= $form->field($person, 'zip')->textInput(['type' => 'number'])?>
                <?= $form->field($person, 'dateOfBirth')->textInput(['placeholder'=>'e.g 12 Feb, 1990'])?>
                <?= $form->field($person, 'Bio')->textInput()?>
                <?= $form->field($person, 'profilePicture')->fileInput()?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
