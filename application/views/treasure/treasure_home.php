<style>
    .ip-div{
        border: 1px black solid;
        width: fit-content;
        padding: 50px;
        margin: auto;
        margin-top: 50px;
    }
    .but{
        margin-top: 10px;
    }
</style>


<div class="ip-div">
<?= form_open() ?>
<label for="em" class="form-label">Type Your Email to start the Treasure Hunt</label>
<input class="form-control" id="em" type="email" name="email" placeholder="Enter Your Email">

<button class="btn btn-primary but" type="submit">Start</button>

<?= form_close() ?>
<!-- Your Email is only used to store your progress. -->
</div>
