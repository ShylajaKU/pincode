<style>
    .bor{
        /* border: 1px black solid; */
        width: 50vw;
    }
    @media (max-width: 500px) {
        .bor{
            width: 85vw;
        }
        .overflow{
            padding-left: 25px;
        }

    }
    .overflow{
        height: 200px;
        overflow: auto;
        padding-left: 25px;
    }
    .border-gk{
        
        box-shadow: 
        inset 
            0 -3em 3em rgba(0, 0, 0, 0.1), 
            0 0 0 2px rgb(255, 255, 255),
            0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
        border-radius: .1cm;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: auto;
        margin-bottom: 15px;
    }
    .hidden{
        visibility: hidden;
        
        display: none;
    }

</style>
<br><br>
<div class="container bor">
<?php if(!empty($gk)): ?>
<section class="border-gk">
    <h6>Ponder the Question</h6>
    <p><?= $gk[0]['question'].' ' ?>
    <button class="btn" onclick="visibile()"> &#8595</button>
    <button class="btn" onclick="hide()">&#8593</button></p>
    <p id="answer-1" class="hidden"><?= $gk[0]['answer'] ?></p>
</section>
<script>
    function visibile(){
        document.getElementById("answer-1").style.visibility = 'visible';
        document.getElementById("answer-1").style.display = 'block';
    }
    function hide(){
        document.getElementById("answer-1").style.visibility = 'hidden';
        document.getElementById("answer-1").style.display = 'none';
    }
</script>

<?php endif; ?>
<section>
<h5>What is a PIN</h5>
<p> 
<strong>Postal Index Number </strong> or commonly known as PIN is a 6 digit number which is used by Indian Postal Service.
</p>
</section>
<br>
<section>
<h5>How many PIN codes are there in India ?</h5>
<p><strong>19100 </strong> unique pincodes are available in India</p>
</section>

<br>
<section>
<h5>How many Post Offices Does India Have ?</h5>
<p><strong>154797 </strong> is the number of Post Offices India Have.</p>
</section>

<br>
<section>
<h5>Why is there more Post Offices than PIN codes ?</h5>
<p>To understand this we need to understand the structure of Indian Post Offices, There are 3 classifications
    <ul>
        <li>Head Office</li>
        <li>Sub Office</li>
        <li>Branch Office</li>
    </ul>
Each <strong> Head Office </strong> will have a <strong> unique PIN code.</strong></p>
<p>
After Head Offices there is Sub Offices , Head offices may have more than 1 Sub Offices depending on their needs and locality.</p>
<p>
Similarly under Sub Offices there can be as many needed Branch Offices.
</p>
<p>
Most of the time Sub offices and Branch offices will also have same PIN code as the Head Office.
</p>
<p>
If a Sub Office also handles mail deliveries then that will have another PIN code other than that of it's Head office. This is to facilitate faster mail deliveries.
</p>
</section>
<br>
<!-- <section>
    <a href="<?= base_url('list-of-all-pincodes-in-india');?>">View List of Post Offices</a>
</section> -->
<?php $state_names = $this->db->get('state_id')->result_array(); ?>
<section>
    <h5>View the list of all the post offices in each state</h5>
    <ol>
    <?php foreach($state_names as $st): ?>
        <li>
        <a href="<?= base_url();?>list-of-all-pincodes-state-wise/<?= $st['statename_slug'];?>" target="_blank" rel="noopener noreferrer"><?= $st['statename']?></a>
        </li>
    <?php endforeach; ?>
    </ol>
</section>

</div>
<br><br>

<?php
foreach($state_names as $st){
    $statename =  ucwords(strtolower($st['statename']));
    $statename_slug =  $st['statename_slug'];
    echo '<br>';
    echo $uri_string = 'list-of-all-pincodes-state-wise/'.$statename_slug;
    echo '<br>';
    echo $meta_desc = 'List of all the pincodes and post offices of '.$statename;
    echo '<br>';
    echo $meta_title =  $statename.' - List of all post offices & pincodes.';


    $this->meta_model->run_meta_for_all_given($uri_string);
    $meta_desc_length = strlen($meta_desc);
$data = array(
    'meta_title' => $meta_title,
    'meta_description' => $meta_desc,
    'meta_desc_len' => $meta_desc_length,
);
    $this->db->where('uri_string',$uri_string);
    $this->db->update('meta',$data);


}
