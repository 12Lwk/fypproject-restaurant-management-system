<?php
if(isset($_SESSION['message']))
{
   ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <h5><?=$_SESSION['message']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   <?php
   unset($_SESSION['message']);
}
?>