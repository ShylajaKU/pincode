<?php 
$seg = $this->uri->segment(1);
switch($seg){
    case '':
        echo '<br><br><br><br><br><br><br><br>';
        echo '<br><br><br><br><br><br><br><br>';
        echo '<br><br><br><br>';
        break;
        case 'contact':
            echo '<br><br><br><br><br><br><br><br>';
            echo '<br><br><br><br><br><br><br><br>';
            echo '<br><br><br><br>';
            break;
    case 'search-by-place':
        echo '<br><br><br><br>';
        echo '<br><br><br><br>';
        echo '<br><br><br><br>';
        echo '<br><br>';
        break;
    default:
        echo '<br><br><br>';
        break;
}
?>
<style>
    /* .posi{ */
        /* position: relative; */
        /* border: 1px black solid; */
        /* height: 50px; */
    /* } */
    /* position relative on the body tag */
    .posit{
        position: absolute;
        /* width: fit-content; */
        /* border: 1px black solid; */

        bottom: 15px;
        
        right: 15px;
        /* left: 0; */
    }
</style>
<footer>
<div class="container posit">
    <div class="posit">
    copyright 2022 pincodes.ind.in</div>
</div>
</footer>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



</body>
</html>