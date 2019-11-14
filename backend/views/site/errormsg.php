<?php 
use yii\helpers\Url;
?>
<h3>user: <?= $firstname.' '.$lastname?></h3>
<form class="errf">
<div class="form-group">
  <label for="comment">Error message to display:</label>
  <textarea class="form-control" name="message" rows="5" value="" id="comment"><?= $message?></textarea>
</div>
<input type='button' class='btn btn-primary err-btn' value='submit' />
    <p class="success-err" style="color:green; font-weight:bold"></p>
</form>
<?php
$Err = Url::to(['site/error-msg']);
$errJs = <<<JS
var id = $id;
$('.err-btn').click(function(e){
    e.preventDefault();
    var form = $('.errf').serializeArray();
    form.push({'name':'id', 'value': id})
    $('.err-btn').val('saving...');
    $.ajax({
        url: '$Err',
        type: 'POST',
        data: form,
        success: function(response) {
            console.log(response)
            $('.success-err').text(response)
            $('.err-btn').val('Submit')
        
        },
        error: function(res, sec){
            console.log('Something went wrong');
        }
    });
})

JS;
$this->registerJs($errJs);
?>