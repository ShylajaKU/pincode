
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
    <li> >>> <a href="<?= base_url($pin['pincode'])?>">
        <?= $pin['pincode'] ?>
    </a>
    </li>
    <?php endforeach; ?>
</ol>
<li>This information is subject to change.</li>

</div>
</section>