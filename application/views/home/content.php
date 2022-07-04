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
        .border-gk{
            width: 85vw;
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
        width: 50vw;
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
<section>
    <a href="<?= base_url('list-of-all-pincodes-in-india');?>">View List of Post Offices</a>
</section>

</div>
<br><br>
