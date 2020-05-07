<div>
    <h4>Create new VM</h4>

    <form method="POST" action="machineValidate.php">

        <input id="name" name="name" placeholder="VM Name" type="text" class="form-control" value="<?=$_SESSION['nameOld']?>" >
        <?php if(isset($_SESSION['nameErr'])): ?>
            <span style="color: darkred"><?= $_SESSION['nameErr']?></span>
            <?php unset($_SESSION['nameErr'])?>
        <?php endif; ?>
        <br>

        <input id="ram" name="ram" placeholder="RAM (1-64GB)" type="number" class="form-control" value="<?=$_SESSION['ramOld']?>" >
        <?php if(isset($_SESSION['ramErr'])): ?>
        <span style="color: darkred"><?= $_SESSION['ramErr']?></span>
            <?php unset($_SESSION['ramErr'])?>
        <?php endif; ?>
        <br>

        <input id="fee" name="fee" type="number" placeholder="Maximum Fee ($)"  class="form-control" value="<?=$_SESSION['feeOld']?>" >
        <?php if(isset($_SESSION['feeErr'])): ?>
            <span style="color: darkred"><?= $_SESSION['feeErr']?></span>
            <?php unset($_SESSION['feeErr'])?>
        <?php endif; ?>
        <br>

        <input type="hidden">
        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Create new VM"><strong>Create</strong></button>

    </form>
</div>

<?php
unset($_SESSION['nameOld']);
unset($_SESSION['ramOld']);
unset($_SESSION['feeOld']);
?>