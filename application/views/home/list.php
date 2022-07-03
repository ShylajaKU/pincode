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
</style>
<br><br>
<div class="container bor">

<section>
    <h5>List of Head Post Offices in India</h5>
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
    <h5>List of Sub Post Offices in India</h5>
<div class="container bor overflow">
<ol>
    <?php foreach($suboffice_list as $so): ?>
    <li><?= $so['suboffice_name'] ?></li>
    <?php endforeach; ?>
</ol>
<li>This information is subject to change.</li>

</div>
</section>
<br>

<section>
    <h5>List of PIN Codes of India</h5>
<div class="container bor overflow">
<ol>
    <?php foreach($pincode_list as $pin): ?>
    <li> >>> <a href="https://pincodes.ind.in/<?= $pin['pincode']?>">
        <?= $pin['pincode'] ?>
    </a>
    </li>
    <?php endforeach; ?>
</ol>
<li>This information is subject to change.</li>

</div>
</section>

</div>

<br><br><br><br>
<br><br><br><br>