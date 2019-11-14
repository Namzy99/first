<?php
use yii\helpers\Url;

?>
<style>
    .Transfer{
        color: red
    }
    .Deposit{
        color: green
    }
</style>
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
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
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="col-sm-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Account Balance</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="ti-arrow-up text-success"></i> $<?= number_format($person->balance).'.00'; ?></h2>
                        <span class="text-muted">Current Balance</span>
                    </div>
                    <span class="text-success">100% verified</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-block" style="background:#fcedbe">
                    <h4 class="card-title">Refer Friends. Get Rewarded</h4>
                    <p>You can earn: 15,000 Membership Rewards points for each approved referral – up to 55,000 Membership Rewards points per calendar year.</p>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Balance Statistics</h4>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-line-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <select class="custom-select pull-right">
                        <option selected>January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                    </select>
                    <h4 class="card-title">My Recent Transactions</h4>
                    <div class="table-responsive m-t-40">
                        <table class="table stylish-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Account Name</th>
                                    <th>Amount</th>
                                    <th>Date Of Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? 
                                $count = 0;
                                foreach($transactions as $transaction){
                                ($transaction->transactionType == 0) ? ($type = 'Transfer') && ($sign = '-') : ($type = 'Deposit') && ($sign = '+');
                                $class = ['round-success','round-primary','round-warning','round-danger'];
                                ?>
                                <tr>
                                    <td style="width:50px;"><span class="round <?= $class[$count]; ?>"><?= substr($transaction->name, 0, 1)?></span></td>
                                    <td>
                                        <h6><?= $transaction->name; ?></h6></td>
                                    <td class="<?= $type; ?>"><?= $sign.number_format($transaction->amount).'.00 USD'; ?></td>
                                    <td><?= date('M j Y g:i A', strtotime($transaction->date)); ?></td>
                                </tr>
                                <? $count++; } ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="<?= Url::to('@web/assets/images/big/uk1.png'); ?>" alt="Card">
                <div class="card-block">
                    <ul class="list-inline font-14">
                        <li class="p-l-0">20 May 2016</li>
                        <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                    </ul>
                    <h3 class="font-normal">Instant payment card with free recharge.</h3>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="<?= Url::to('@web/assets/images/big/uk2.png'); ?>" alt="Card">
                <div class="card-block">
                    <ul class="list-inline font-14">
                        <li class="p-l-0">20 May 2016</li>
                        <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                    </ul>
                    <h3 class="font-normal">Get your credit in 30 minutes! The loan amount is up to 5000 USD for a period of up to 60 months.</h3>
                </div>
            </div>
        </div>

        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="<?= Url::to('@web/assets/images/big/uk3.png'); ?>" alt="Card">
                <div class="card-block">
                    <ul class="list-inline font-14">
                        <li class="p-l-0">20 May 2016</li>
                        <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                    </ul>
                    <h3 class="font-normal">Save up to 50% on Affiliate card payments. Receive personalized offers and gifts from partners, participate in competitions and promotions.</h3>
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
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
