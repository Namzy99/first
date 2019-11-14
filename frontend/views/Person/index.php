<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'People';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <? $imgpath = Url::to('@web/'); ?>
                                <center class="m-t-30"> <img src="<?= $imgpath.$model->profilePicture ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?= $model->firstname.' '.$model->lastname; ?></h4>
                                    <h6 class="card-subtitle"><?= $model->occupation; ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                         <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-1 col-md-6">
                                        <div>Date of birth:</div>
                                        <div>Sex:</div>
                                        <div>Marital Status:</div>
                                        <div>Nationality:</div>
                                    </div>
                                    <div class="col-sm-1 col-md-6">
                                        <div><?= $model->dateOfBirth; ?></div>
                                        <div><?= $model->sex; ?></div>
                                        <div><?= $model->maritalStatus; ?></div>
                                        <div><?= $model->nationality; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" id="profileForm">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email" id="example-email"
                                            value="<?= $UserDb->email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" class="form-control form-control-line"
                                            name="telephone" value = "<?= $model->telephone; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="address" 
                                            value="<?= $model->address; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Occupation</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="occupation" 
                                            value="<?= $model->occupation; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Zip Code</label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="zip" value="<?= $model->zip; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"name="bio" ><?= $model->Bio; ?></textarea>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success update">Update Profile</button>
                                            <p id="complete"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2017 Monster Admin by wrappixel.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

<?php
$profUrl = Url::to(['person/update-profile']);
$profileJs = <<<JS

$(document).on('click','.update',function(e){
e.preventDefault();
form = $('#profileForm').serializeArray();

$.ajax({
   type: "POST",
   url: '$profUrl',
   data: form,
   success: function(data)
   {
       $('#complete').text(data);

   }
});

})

JS;
$this->registerJs($profileJs);
?>
