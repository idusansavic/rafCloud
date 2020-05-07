
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Active</th>
        <th>Created</th>
        <th>Status</th>
        <th>RAM</th>
        <th>Fee</th>
        <th>Start</th>
        <th>Stop</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($machines as $machine): ?>
        <tr>
            <td> <?= $machine['name']?> </td>
            <td> <?= $machine['active']?> </td>
            <td> <?= $machine['created']?> </td>
            <td> <?= $machine['status']?> </td>
            <td> <?= $machine['ram']?> </td>
            <td> <?= $machine['fee']?> </td>

            <td> <form action="machineStart.php?id=<?= $machine['id']?>" method="POST">
                    <input type="hidden" name="status" value="<?= $machine['status']?>">
                    <input type="hidden"><button type="submit" class="glyphicon glyphicon-play" data-toggle="tooltip" title="START VM"></form>
            </td>

            <td> <form action="machineStop.php?id=<?= $machine['id'] ?>" method="POST">
                    <input type="hidden" name="status" value="<?= $machine['status']?>">
                    <input type="hidden"><button type="submit" class="glyphicon glyphicon-stop" data-toggle="tooltip" title="STOP VM"></form>
            </td>

            <td> <form action="machineDelete.php?id=<?= $machine['id'] ?>" method="POST">
                    <input type="hidden" name="name" value="<?= $machine['name']?>">
                    <input type="hidden" name="status" value="<?= $machine['status']?>">
                    <input type="hidden"><button type="submit" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Destroy VM"></form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
    <br>
    <?php if(isset($_SESSION['actionErr'])): ?>
        <br><span style="color: darkred"><?= $_SESSION['actionErr']?></span>
        <?php unset($_SESSION['actionErr'])?>
    <?php endif; ?>
    <br>
</table>

