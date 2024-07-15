<?php
function alertMessage($title, $message){ ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> <?php echo $title; ?></h5>
        <?php echo $message; ?>
    </div>
<?php }

?>