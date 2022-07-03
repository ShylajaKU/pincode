<style>
    .bor{
        /* border: 1px black solid; */
        width: 85vw;
    }
    .overflow{
        height: 200px;
        overflow: auto;
        padding-left: 3%;
    }
</style>
<br><br>
<div class="container bor">

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
<p><strong>
If a Sub Office also handles mail deliveries then that will have another PIN code other than that of it's Head office. This is to facilitate faster mail deliveries.
</strong>
</p>
</section>
<br>
<section>
    <h5>List of Head Offices</h5>
<div class="container bor overflow">
<ol>
    <?php foreach($headoffice_list as $ho): ?>
    <li><?= $ho['headoffice_name'] ?></li>
    <?php endforeach; ?>
</ol>
<li>This information is subject to change.</li>

</div>
</section>
<br>

<section>
    <h5>List of Sub Offices</h5>
<div class="container bor overflow">
<ol>
    <?php foreach($suboffice_list as $so): ?>
    <li><?= $so['suboffice_name'] ?></li>
    <?php endforeach; ?>
</ol>
<li>This information is subject to change.</li>

</div>
</section>

</div>
<br><br><br>
<?php
// echo $this->db->get('all_india_po_list')->num_rows();