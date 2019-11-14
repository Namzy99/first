<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Transactions */

$this->title = 'Create Transfer';
$this->params['breadcrumbs'][] = ['label' => 'Transfer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	/* =============================================================================
	   Reset form elements
	   ========================================================================== */
	html { font-size: 100%; overflow-y: scroll; -webkit-overflow-scrolling: touch; -webkit-tap-highlight-color: rgba(0,0,0,0); -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
	a:focus { outline: none; }
	a:hover, a:active { outline: 0; }
	b, strong { font-weight: bold; }
	hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
	pre, code, kbd, samp { font-family: monospace, monospace; _font-family: 'courier new', monospace; font-size: 1em; }
	pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; }
	q { quotes: none; }
	q:before, q:after { content: ""; content: none; }
	small { font-size: 85%; }
	sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
	sup { top: -0.5em; }
	sub { bottom: -0.25em; }
	h1, h2, h3, h4, h5 { font-weight: 500 !important; }
	ul, ol { margin: 1em 0; padding: 0 0 0 40px; }
	img { border: 0; -ms-interpolation-mode: bicubic; }
	svg:not(:root) { overflow: hidden; }
	form { margin: 0; }
	fieldset { border: 0; margin: 0; padding: 0; }
	legend { border: 0; *margin-left: -7px; padding: 0; }
	label[for] {cursor: pointer;} 
	label { font-weight: 400; vertical-align: middle;}
	button, input, select, textarea { font-size: 100%; 	padding-left: 1px; border: 1px solid #cdcdcd; margin: 0; border-radius: 2px; vertical-align: middle; font-weight: normal;	box-sizing: border-box;	-moz-box-sizing: border-box;-webkit-box-sizing: border-box;}
/* 	select, input {height: 22px;} */
	select{padding-left: 0px;}
/* 	input {*height: 15px;} */
	button, input { line-height: normal;}
	button, input[type="button"], input[type="reset"], input[type="submit"] { cursor: pointer; -webkit-appearance: button; }
 	input[type="checkbox"], input[type="radio"] { box-sizing: border-box;  height: 13px !important; width: 13px !important; padding: 0;vertical-align: middle;margin-right: 0.25em;*overflow: hidden;  border: none;} 
	input[type="search"] { -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
	button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
	textarea { overflow: auto; vertical-align: top;font-weight: normal;}
</style>
<style>
/* =============================================================================
   Panel elements
   ========================================================================== */
html {
	overflow-x: hidden;
}



.page {
	color: #333;
	background-color: #f9f9f9;
	max-width: 1000px;
	margin-left: auto; 
	margin-right: auto; 
	min-height:100%;
	position: relative;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}

.page > .header {
	xbackground:#ff0;
	padding:10px;
}

.page > .body {
	padding: 0.5em 0.5em 0.5em 0.5em;
	*zoom: expression( this.runtimeStyle.zoom="1", this.appendChild(document.createElement("span")).className="footer-height");
}

.page > .body:after, .page > .body > .footer-height { 
	display: block; 
	content: ""; 
	visibility: hidden; 
}

.page > .footer, .page > .body:after, .page > .body > .footer-height {
	height:60px;
}

.page > .footer {
	background:#6cf;
	width: 100%;
	position:absolute;
	bottom: 0px;
}

/* =============================================================================
   Widgets
   ========================================================================== */

.payment-icon {
	display: inline-block;
	height: 26px;
	width: 39px;
	margin-right: 0.25em;
}
.logo {
	margin: 0 auto;
	width: 19em;
	height: 1.9375em;
	background: url('/wp-includes/images/responsive-form/logo.png') no-repeat scroll 0 0 transparent;
	background-size: cover;
}
.vs-icon {
	background: url("/wp-includes/images/responsive-form/VS.png") no-repeat scroll 0 0 transparent;
}
.ax-icon {
	background: url("/wp-includes/images/responsive-form/AX.png") no-repeat scroll 0 0 transparent;
}
.mc-icon {
	background: url("/wp-includes/images/responsive-form/MC.png") no-repeat scroll 0 0 transparent;
}
.dn-icon {
	background: url("/wp-includes/images/responsive-form/DN.png") no-repeat scroll 0 0 transparent;
}

/* =============================================================================
   Form container and line elements
   ========================================================================== */

form, fieldset {
	font-family: 'helvetica neue', helvetica, arial, sans-serif;
	font-size: 100%;
	margin: 0;
	padding: 0px;
	border: none;
	color: #52585D;
}

form ul, fieldset ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}

form li, fieldset li {
    padding-bottom: 10px;
    width: 100%;
}

/* =============================================================================
   Form elements
   ========================================================================== */

/* ### Labels ### */
label {
	display: inline-block;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	text-align: right;
	vertical-align: middle;
	font-size: 1em;
	font-weight: normal;
	color: #333;
}

input, select, textarea {
	display: inline-block;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	margin-right: 0.5em;
	border: 1px solid #cdcdcd;
	border-radius: 2px;
	width: 18.25em;
	vertical-align: top;
	font-weight: normal;
	*padding: 0px 0 0px 0;
    *margin-right: 0.4em;
}

input[type="checkbox"] , input[type="radio"] {
    width: 0.8125em !important;
    height: 0.875em  !important;
    display: inline !important;
    padding: 0;
    margin-bottom: 1px !important;
    border: none;
    *overflow: hidden;
}

input[type="checkbox"] {
	margin-top: 0.13em;
}

.mandatory {
	color: red;
	margin-left: 2px;
	margin-right: -2px;
	vertical-align: middle;
}

span.error, label.error, .note, .tag, .instruct, .choice, .sep {
	display: inline-block;
	vertical-align: middle;
	width: auto;
	text-align: left;
	font-size: 1em;
	font-weight: normal;
	*display: inline;
	*zoom: 1;
}

span.error, label.error {
	margin-right: 0.5em;
	color: red;
	font-size: 95%;
}

.tag {
	color: #555;
	font-size: 95%;
	font-weight: normal;
}

.sep, .inline .sep {
	width: 0.48em;
	text-align: center;
	margin-left: -0.50em;
	padding-right: 0;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}

.note {
	color: gray;
	font-size: 95%;
	font-style: italic;
}

.choice, .instruct {
	font-size: 95%;
	margin-right: 0.25em;
}

small, .text-small, label.text-small, span.text-small {
	font-size: 75%;
	line-height: 1em;
	*line-height: 1.3em;
}

/* =============================================================================
   Form element sizing
   ========================================================================== */

label {
	width: 30%;
	padding-right: 0.5em;
}

.title-width { 
 	margin-left: 30%;
 	*padding-left: 0.5em;
}

.width-content { 
 	width: 70%;
}

.field-double {width: 37em !important;max-width:100%}
.field1of1 {width: 18.25em !important;}
.field1of2 {width: 8.875em !important;}
.field1of3 {width: 5.75em !important;}
.field1of4 {width: 4.1875em !important;}
.field1of5 {width: 3.25em !important;}
.field1of6 {width: 2.625em !important;}

/* =============================================================================
   Layout and align elements
   ========================================================================== */

form li, fieldset li, li .inline {
	line-height: 1.31em;
	*line-height: 1.6em;
	word-spacing: -0.25em;
	*zoom: expression( this.runtimeStyle.zoom="1", this.insertBefore(document.createElement("span")).className="row-height");
}

.row-height {
	vertical-align: middle;
 	margin: 0 0 0 -0.25em; 
	height: 1.5em;
 	xword-spacing: 0.25em; 
	visibility: hidden;
	*display: inline;
	*zoom: 1;
	
}

form li > *, fieldset li > *, .inline > * {
    word-spacing: normal; 
    line-height: normal;
}

li.field-set, .inline.field-set {
	white-space: nowrap;
}

.stack label {
	display: block;
	width: auto;
	text-align: left;
	margin: 0 0 0.125em 0;
}

.stack input, .stack select, .stack textarea {
	display: block;
}

span.stack {
	display: inline-block;
	vertical-align: top;
}

.inline {
	display: inline-table;
	vertical-align: top; 
	*display: inline;
	*zoom: 1;
}

.inline > * {
    display: inline-block;
/* 	vertical-align: middle;  */
    *display: inline;
    *zoom: 1;
}

.inline > label {
	width: auto;
	display: inline-block;
/* 	vertical-align: middle; */
}

.inline > input, .inline > select, .inline > textarea {
	display: inline-block;
/* 	margin: 0 0.5em 0 0; */
/* 	width: 100%; */
}

.inline.wrap {
	width: 70%;
	max-width: 70%; 
	margin-right: -0.5em;
	*width: auto;
}

.remainder-set {
	float: left;
}

.remainder-set ~ *, .inline > .remainder-set ~ * {
	overflow: hidden;
	display: block;
	zoom: 1;
}

 .remainder-set ~ .row-height { 
 	*height: 0px;
 } 

.fluid {
	width: auto !important;
}

/* =============================================================================
   Align elements
   ========================================================================== */

body .left {
	text-align: left;
}

body .centre {
	text-align: center;
}

body .right {
	text-align: right;
}

/* Reset text-align inherit */
.left > *, .centre > *, .right > *  {
	text-align: initial;
}

/* .class for table cells or elements, .class > * for inline-block elements */
body .top, .top > * {
	vertical-align: top;
}

body .middle, .mid > * {
	vertical-align: middle;
}

body .bottom, .base > * {
	vertical-align: bottom;
}

/* Inline vertical alignment requires a parent line-height or marker sibling node with 'vertical-align: middle' to define base height */
.align {
	*zoom: expression( this.runtimeStyle.zoom="1", this.appendChild(document.createElement("span")).className="align-height");
}
.align:after, .align-height {
	display:inline-block;
	height:100%;
	width: 0;
	vertical-align: middle;
	content: '';
	visibility: hidden;
}

.set-height {
	vertical-align: middle; /* Override vertical marker */
}
.button {
	-moz-box-shadow:inset 0px 0px 0px 0px #d9fbbe;
	-webkit-box-shadow:inset 0px 0px 0px 0px #d9fbbe;
	box-shadow:inset 0px 0px 0px 0px #d9fbbe;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #b8e356), color-stop(1, #a5cc52) );
	background:-moz-linear-gradient( center top, #b8e356 5%, #a5cc52 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8e356', endColorstr='#a5cc52');
	background-color:#b8e356;
	-webkit-border-radius:0.5em;
	-moz-border-radius:0.5em;
	border-radius:0.5em;
	text-indent:0px;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:1em;
	font-weight:bold;
	font-style:normal;
	height:2em;
	line-height:2em;
	width:18.25em;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #86ae47;
}
.button:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #a5cc52), color-stop(1, #b8e356) );
	background:-moz-linear-gradient( center top, #a5cc52 5%, #b8e356 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a5cc52', endColorstr='#b8e356');
	background-color:#a5cc52;
}
.button:active {
	position:relative;
	top:1px;
}     
/* =============================================================================
   Responsive Design
   ========================================================================== */
@media only screen and (max-width: 720px) {
	form {
		width: 18.5em;
		margin: 0 auto;
 		font-size: 200%; 
	}
	label {
		display: block;
		width: auto;
		text-align: left;
		margin: 0;
	}
	
	input, select, textarea {
		display: block;
		margin-right: 0.5em;
	}
	
	span.stack {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
	}
	
	.title-width {
		margin: 0;
	}
	
	.inline {
		display: table;
		*display: block;
	}
	
	.inline.wrap {
		width: auto;
		max-width: none; 
	}
	.wide-only, .error + .wide-only-when-error {
		display: none !important;
	}

}

@media only screen and (max-width: 620px) {
	.logo {font-size: 55%;}
	form {
		font-size: 100%;
	}
	
}
@media only screen and (max-width: 319px) {
	form {
		font-size: 75%;
	}
	.logo {font-size: 40%;}
}

    
    /*form styles*/
#msform {
	/*width: 400px;*/
	margin: auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: relative;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
  border-radius: 30px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
  outline: none;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: 24.33%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}

</style>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?/*= $this->render('_form', [
        'model' => $model,
    ]) */?>
    
	<div class="page">
		
		<div class="body">
			<form method="POST" class="transferForm" id="transfer">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
			<h1 style="text-align:center;font-size:1em">Fill the transfer form</h1>
                <p style="text-align:center">Note: <i>This action is irrevocable once submitted.</i></p>
				<ul>
					<li>			
						<label for="customer.title">Title</label>
						<select id="customer.title" name="customer.title">
							<option value="" selected="selected">---------------- Select ----------------</option>
							<option value="Mr">Mr</option>
							<option value="Mrs">Mrs</option>
							<option value="Miss">Miss</option>
							<option value="Ms">Ms</option>
							<option value="Prof">Prof</option>
							<option value="Dr">Dr</option>
							<option value="Sir">Sir</option>
							<option value="Sir">Others</option>
						</select>
						<span id="customer.title.errors" class="error">Please enter your title</span>
					</li>
					<li>
						<label>Account Name<span class="mandatory">*</span></label>
						<input id="description" name="accountName" type="text" id = "accountName" required />
						<span id="description" class="error">Please enter the account name</span>
					</li>
					<li>
						<label>Account Number<span class="mandatory">*</span></label>
						<span class="inline wrap">
							<input id="longerr" name="accountNumber" type="number" id = "accountNumber" required />
							<span class="error">Enter account number</span>
						</span>
					</li>
					<li>
						<label for="phone">Amount ($)<span class="mandatory">*</span></label>
						<span class="stack">
							<input id="phone" name="amount" class="error amounttra" id = "amount" type="number" required/>
							<label class="note insufficient text-small wide-only-when-error" style="display:none; color:red;">Insufficient account balance</label>
						</span>
    
						<span id="description" class="error">Please enter amount</span>
					</li>
                    <li>
						<label>Bank Name<span class="mandatory">*</span></label>
						<span class="inline wrap">
							<input id="bankName" name="bankName" type="text" required />
							<span class="error">Enter bank name</span>
						</span>
					</li>
					<li>
						<label>Date</label>
							<span class="inline">
								<span class="stack field-set">
									<input id="day" class="field1of6" name="day" type="text" maxlength="2" />
									<label class="tag text-small centre" style="min-width: 2.62em">Day</label>
								</span>
								<label class="sep">/</label>
								<span class="stack">
									<input id="month" class="field1of6" name="month" type="text" maxlength="2" />
									<label class="tag text-small centre">Month</label>
								</span>
								<label class="sep">/</label>
								<span class="stack">
									<input id="year" class="field1of6" name="year" type="text" maxlength="4" />
									<label class="tag text-small centre">Year</label>
								</span>
							</span>
					</li>
					<li>
						<label for="phone">Country<span class="mandatory">*</span></label>
						<span class="stack">
							<input id="country" name="country" class="error" type="text" required/>
							<label class="note text-small wide-only-when-error">Enter country to wire transfer</label>
						</span>
						<span id="description" class="error">Please enter country</span>
					</li>
                    <li>
						<label for="phone">Swift Code/Iban<span class="mandatory">*</span></label>
						<span class="stack">
							<input id="swift" name="swift" class="error" type="number" required/>
						</span>
						<span id="description" class="error">Please enter swift code</span>
					</li>
					<li>
						<label>Message</label>
						<textarea id="input_6" class="form-textarea" name="q6_notes" rows="6"></textarea>
					</li>
					<li>
						
                        <?php if($transferStatus == 0){?>
                        <button class="title-width btn btn-success"><a data-remodal-target="modal" class="button">Continue</a></button>
                        <?php } else {?>
                        <button class="title-width btn btn-success"><a data-remodal-target="modalerror" class="button">Continue</a></button>
                        <?php } ?>
                        <p class="warning" style="display:none">Please fill all required fields.</p>
                        
					</li>
				</ul>
			</form>
			</div>
   		</div>
<div class="remodal" id="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Wire Transfer</h1>
  <p>
    Follow the steps to complete your wire transfer. Note that this action can not be reversed once completed.
  </p>
<!-- multistep form -->
    <form id="msform">
      <!-- progressbar -->
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
      <ul id="progressbar">
        <li class="active">Step 1</li>
        <li>Step 2</li>
        <li>Step 3</li>
        <li>Step 4</li>
      </ul>
      <!-- fieldsets -->
      <fieldset >
        <h3 class="fs-subtitle">Where do you wish to recieve OTP?</h3>
        <p>Do you want to use registered email to recieve OTP or use a different email address?</p>
        <button class="remodal-confirm">Yes</button>
        <button class="remodal-cancel next go">No</button>
        
      </fieldset>
      <fieldset>
        <h3 class="fs-subtitle">Email provided here will recieve OTP</h3>
            <input name="firstname" type="text" placeholder="sender firstname" required>
            <input name="lastname" type="text" placeholder="sender lastname" required>
            <input name="senderEmail" id="email-form" type="text" placeholder="sender email address" required>
          
            <input name="telephone" type="number" placeholder="sender phone number" required>
          <input name="address" type="text" placeholder="sender address" required>
          
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button send-otp" value="Send OTP" />
      </fieldset>
      <fieldset>
        <h3 class="fs-subtitle">Enter OTP sent to your email.</h3>
        <input name="otp" type="number" id="validate-otp" placeholder="Enter OTP" required>
        <input type="button" name="next" id="" class="next action-button check-transfer" value="Transfer" />
        <p class="otp-error" style="color:red; text-align:center; display:none">Sorry! The OTP you entered is incorrect.</p>
      </fieldset>
      <fieldset id="complete">
        <div class="connecting">
            <img src="<?= Url::to('@web/assets/images/loader.gif'); ?>" alt="loading" /> <p><i class="connect-msg">Connecting to bank servers. Please wait...</i></p> 
        </div>
      </fieldset>
    </form>
</div>
    
<div class="remodal" data-remodal-id="modalerror"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false">

  <button data-remodal-action="close" class="remodal-close"></button>
  <h1><span style="color:indianred" class="fa fa-exclamation-circle fa-lg"></span></h1>
  <p>
    <?= $message; ?>
  </p>
  <br>
  
</div>

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
$sendOtp = Url::to(['transfer/mail']);
$validateOtp = Url::to(['transfer/validate']);
$transfer = Url::to(['transfer/create']);
$transferBy = Url::to(['transfer/transfer-by']);
$complete = Url::to(['transfer/complete']);
$particlejs = <<<JS
$(document).on('closing', '.remodal', function (e) {
  $( "#msform" ).load(window.location.href + " #msform" );
});

/*$('.transferForm input').blur(function()
{
    if( !$(this).val() ) {
          $('.title-width').click(false);
    } else {
        $('.title-width').click(true);
    }
});*/

$('.amounttra').on('keyup', function(){
    if('$balance' < parseInt($(this).val())){
        $('.insufficient').show();
    } else {
        $('.insufficient').hide();
        
    }
})

/*$('#msform input').blur(function()
{
    if( !$(this).val() ) {
          $('.send-otp').click(false);
    } else {
        $('.send-otp').click(true);
    }
});*/



$(document).on('click', '.send-otp', function () {
  var emailVal = $('#email-form').val()
  $.ajax({
       type: "POST",
       url: '$sendOtp',
       data: {
                'email': emailVal
                },
       success: function(data)
       {
           console.log(data);
       }
  });
  
});

$(document).on('click', '.finish-transfer', function () {
    location.reload();
});


//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var state = 0;

$(".next").click(function(e){
    e.preventDefault();
	if(animating) return false;
	animating = true;
    if($(this).hasClass('check-transfer')){
    var validateOtp = $('#validate-otp').val()
      $.ajax({
           type: "POST",
           url: '$validateOtp',
           data: {'value': validateOtp}, // serializes the form's elements.
           success: function(data)
           {
                if(data == 1){
                    state = 0;
                    var form = $('#transfer').serializeArray();
                    var personForm = $('#msform').serializeArray();
                    $.ajax({
                           type: "POST",
                           url: '$transfer',
                           data: form, // serializes the form's elements.
                           success: function(response)
                           {
                               personForm.push({'name':'transferId', 'value':response})
                               $.ajax({
                                   type: "POST",
                                   url: '$transferBy',
                                   data: personForm, // serializes the form's elements.
                                   success: function(data)
                                   {
                                       console.log(data);
                                   }
                              });
                           }
                      });
                } else {
                    state = 1;
                }
           },
           async: false
      });
            setTimeout(function(){ 
            $('.connect-msg').text('Transferring. Please wait...');
            }, 4000);

            setTimeout(function(){
                    var emailVal = $('#email-form').val()
                    var amountVal = $('.amounttra').val()
                    var accountName = $('#accountName').val()
                    var accountNumber = $('#accountNumber').val()
                    var bankName = $('#bankName').val()
                    var swift = $('#swift').val()
                    var country = $('#country').val()
                  
                    $.ajax({
                       type: "POST",
                       url: '$complete',
                       data: {
                            'email': emailVal,
                            'amount':amountVal,
                            'accountName': accountName,
                            'accountNumber': accountNumber,
                            'bankName': bankName,
                            'swift': swift,
                            'country': country
                            },
                       success: function(data)
                       {
                           $('#complete').html(data);
                           
                       }
                    });
            }, 10000);
        }
    if(state == 1){
    $('.otp-error').show();
    state = 0;
    animating = false;
    return false;
    }
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})


// ----------------- Variables

wrapper   = $(".tabs");
tabs      = wrapper.find(".tab");
tabToggle = wrapper.find(".tab-toggle");

// ----------------- Functions

function openTab() {
	var content     = $(this).parent().next(".content"),
		activeItems = wrapper.find(".active");
	
	if(!$(this).hasClass('active')) {
		$(this).add(content).add(activeItems).toggleClass('active');
		wrapper.css('min-height', content.outerHeight());
	}
};

// ----------------- Interactions

tabToggle.on('click', openTab);

// ----------------- Constructor functions

$(window).load(function(){
  tabToggle.first().trigger('click');  
});

JS;
$this->registerJs($particlejs);
?>
