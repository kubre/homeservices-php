<?php
    include_once "scripts/checklogin.php";
    include_once "include/header.php";
    include_once "scripts/DB.php";

    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    $stmt = DB::query("SELECT * FROM providers");

    $providers = $stmt->fetchAll(PDO::FETCH_OBJ);

    include_once "msg/managehall.php";
?>
<div class="container" style="margin-top: 30px; margin-bottom: 60px;">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Profession</th>
                <th>Action</th>
            </tr>
            <?php foreach ($providers as $provider): ?>
            <tr>
                <td>
                    <img style="height: 150px"
                        src="storage/<?= $provider->photo; ?>"
                        alt="photo">
                </td>
                <td><?= $provider->name; ?>
                </td>
                <td><?= $provider->contact; ?>
                </td>
                <td>
                    <?= $provider->adder1; ?>,<br>
                    <?= $provider->adder2 ?>,<br>
                    <?= $provider->city; ?>
                </td>
                <td><?= $provider->profession; ?>
                </td>
                <td>
                    <form action="deletehall.php" method="post">
                        <input type="hidden" name="id"
                            value="<?= $provider->id ;?>">
                        <button type="submit" name="remove" class="btn btn-danger btn-block">Remove</a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include_once "include/footer.php";
