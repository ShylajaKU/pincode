<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin: auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.heading{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}
.heading-left{
    display: flex;
    margin-left: 5vw;
}
</style>
<div class="heading">
<h4>List of all the Post Offices in <?php echo $this->uri->segment(2); ?></h4>
</div>
<div class="heading-left">
<h4>Total No Of Post Offices :<?php echo ' '. $count; ?></h4>
</div>
<table>
  <tr>
    <th>Sl No</th>
    <th>PIN Code</th>
    <th>Post Office Name</th>
    <th>Taluk</th>
    <th>District</th>
    <th>State</th>
    <th>Link</th>
  </tr>

  <?php for($i=0;$i<$count;$i++): ?>
    <?php $uri = $uri_string_array[$i] ?>
  <tr>
    <td><?= ($i + 1) ?></td>
    <td><?= $uri['pincode']?></td>
    <td><?= $uri['officename']?></td>
    <td><?= $uri['Taluk']?></td>
    <td><?= $uri['Districtname']?></td>
    <td><?= ucwords(strtolower($uri['statename']))?></td>
    <td>
        <a href="<?= base_url($uri['uri_string'])?>" target="_blank" rel="noopener noreferrer"><?= $uri['uri_string']?></a>
    </td>
  </tr>

<?php endfor; ?>

</table>
