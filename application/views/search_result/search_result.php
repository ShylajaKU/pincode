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
        ?>
<div class="container cont bord">
    <?php 
        echo '<div class="count">'.($i + 1).' of '.$count3.' Post Offices '.'</div>';
        echo 'Pincode : ' .$row['pincode'] .'<br>';
        echo 'Post Office : ' .$row['officename_only'] .'<br>';
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
        ?>
</div>
<br>
<div class="container cont bord relative">

<textarea class="inp text-one" id="myInput" cols="" rows="3">
<?php echo $row['officename_only'].' P O , '.$row['divisionname'].' , '.$row['Districtname'].' , '.ucwords(strtolower($row['statename'])).' , India , Pincode - '.$row['pincode']?>
</textarea>

<!-- The button used to copy the text -->
<style>
    @media (max-width: 700px) {
    #button-pc {
        visibility: hidden;
    }
}
</style>
<button class="ip-button bord" id="button-pc"  onclick="myFunction()">Copy</button>

</div>
<br><hr style="width:50vw ; margin:auto;"><br>
   <?php }
    }
    ?>


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