<div class="container">
    <h5>GK QA</h5> <br>
<?= form_open("",array('id'=>'form'))?>

<textarea class="form-control me-2" name="question" cols="10" rows="5" placeholder="Question" required></textarea>

<br>
<input  class="form-control me-2" type="text" name="answer" placeholder="Answer">
<br>
<!-- <input class="btn btn-primary" style="width:200px ;" type="button" value="&#10003"> -->
<button class="btn btn-primary" style="width:200px ;" type="submit">&#10003</button>

<?= form_error('question')?>
<?= form_close()?>


</div>
<br>
<div class="container">
<div style="height:200px ; overflow:auto; margin-left:25px;">
<?php if(!empty($qa)){
foreach($qa as $q){
    $sl = $q['sl_no'];
    $qes = $q['question'];
    $ans = $q['answer'];

?>
<?= $sl ?> : Q : <?= $qes ?> <br>
<?= $sl ?> : A : <?= $ans ?> <br>

<?php } }?>
</div>
</div>































<!-- onclick="fn()" -->

<!-- <script> 
function fn(){
    setTimeout = 10;
    document.getElementById("form").submit();
    }

    </script> -->