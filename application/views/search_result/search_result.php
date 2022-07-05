<br>
<style>
    .bord{
        box-shadow: 
        inset 
            0 -3em 3em rgba(0, 0, 0, 0.1), 
            0 0 0 2px rgb(255, 255, 255),
            0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
        border-radius: .1cm;
    }
    .cont{
        padding: 10px;
    }
    .relative{
        position: relative;
    }
    .inp{
        background-color: none;
        background: none;
        border: none;
        width: 80%;
        
    }
    .ip-button{
        background-color: none;
        background: none;
        border: none;
        position: absolute;
        top: 5px;
        right: 5px;
    }
    .count{
        font-weight: 650;
        display: flex;
        justify-content: center;
        text-decoration: underline;
    }
</style>
    <?php if(!$valid_pincode){ ?>
        <div class="container cont bord">
        <?php echo 'Pincode ( '.$pincode. ' ) is Invalid'; ?>
        </div>
    <?php } ?>
    <?php
    if($valid_pincode){
        $count3 = count($table_rows);
        for($i = 0;$i < $count3 ; $i++){
    // foreach($table_rows as $row){
        $row = $table_rows[$i];
        // var_dump($row);
        ?>
<div class="container cont bord">
    <?php 
        echo '<div class="count">'.($i + 1).' of '.$count3.' Post Offices '.'</div>';
        echo 'Pincode : ' .$row['pincode'] .'<br>';
        echo 'Post Office : ' .$row['officename_only'] .'<br>';
        if($row['officeType'] != 'NA'){
            $type = $row['officeType'];
            switch ($type){
                case 'S.O':
                    echo 'Office Type : Sub Office'.'<br>';
                    break;
                case 'B.O';
                echo 'Office Type : Branch Office'.'<br>';
                    break;
                    case 'H.O';
                echo 'Office Type : Head Office'.'<br>';
                    break;
            }
            }

        if($row['Related_Suboffice'] != 'NA'){
        echo 'Sub office : ' .$row['Related_Suboffice'] .'<br>';
                }
                    
        if($row['Related_Headoffice'] != 'NA'){
        echo 'Head office : ' .$row['Related_Headoffice'] .'<br>';
        }
        echo 'City : ' .$row['divisionname'] .'<br>';
        echo 'Taluk : ' .$row['Taluk'] .'<br>';
        echo 'District : ' .$row['Districtname'] .'<br>';
        echo 'State : ' .ucwords(strtolower($row['statename'])) .'<br>';
        echo 'Country : India'.'<br>';
        if($row['Telephone'] != 'NA'){
        echo 'Post Office Tel : '; ?>
        <a href="tel:<?= $row['Telephone']?>"><?= $row['Telephone']?></a>  <br>
        <?php 
        }
        if($row['longitude'] != 'NA'){
            echo 'Longitude : ' .$row['longitude'] .'<br>';
        }
        if($row['latitude'] != 'NA'){
            echo 'Latitude : ' .$row['latitude'] .'<br>';
        }
        if($row['visiter_count'] >= '0'){
            echo 'No of times searched : ' .$row['visiter_count'] .'<br>';
        }
        ?>


        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> -->
        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
 
<!-- <form action="" id="likes" method="post">
<span id="up_no">
    <?php $up = 1; ?>
<?= $up ?>
<input type="number" value="1" hidden>
<span class="material-icons-outlined" style="color:blue ;" onclick="up(1)" id="thumb_up">
thumb_up
</span>

123
<button type="submit" class="btn">

<span class="material-icons-outlined" style="color:blue ;">
thumb_down
</span>
</button>
</span>
</form>    

<script>
    function up(a){
        var a = a;
        document.getElementById('likes').submit();
        document.getElementById('up_no').writeText('1');
    }
</script> -->






</div>
<br>
<div class="container cont bord relative">

<textarea class="inp text-one" id="myInput" cols="" rows="3">
<?php echo $row['officename_only'].' P O , '.$row['divisionname'].' , '.$row['Districtname'].' , '.ucwords(strtolower($row['statename'])).' , India , Pincode - '.$row['pincode']?>
</textarea>

<!-- The button used to copy the text -->
<style>
    @media (max-width: 900px) {
    #button-pc {
        visibility: hidden;
    }
}
</style>
<button class="ip-button bord" id="button-pc"  onclick="myFunction()">Copy</button>

</div>
<br><hr style="width:50vw ; margin:auto;"><br>
   <?php }?>
   <?php }?>


<script>
    $(function(){
    $('.text-one').focus(function(){
        $(this).select();
    });
});
    function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

