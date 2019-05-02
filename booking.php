<?php

include_once "./include/header.php";
include_once "./scripts/DB.php";

if (!isset($_GET['provider'])) {
    header('Location: index.php');
    exit();
}

$provider = DB::query("SELECT * FROM providers WHERE id=?", [$_GET['provider']])->fetch(PDO::FETCH_OBJ);

if ($provider === false) {
    header('Location: index.php');
    exit();
}

include_once "msg/booking.php";

?>

<div class="container" style="margin-top: 30px;">
    <div class="card text-center">
        <div class="card-header">
            <h3>Details about <?= $provider->name; ?></h3>
        </div>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <div class="col">
                    <img style="height: 250px"
                        src="storage/<?= $provider->photo; ?>">
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td>
                        <?= $provider->name; ?>
                    </td>
                    <th>Profession</th>
                    <td>
                        <?= $provider->profession;?>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <?= $provider->adder1; ?>,
                        <?= $provider->adder2; ?>
                    </td>
                    <th>City</th>
                    <td>
                        <?= $provider->city; ?>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>


<div class="container" style="margin-bottom: 60px;margin-top: 20px;">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center">Book Appointment from <?= $provider->name; ?>
                </h3>
            </div>
            <hr>

            <form action="scripts/bookhall.php" method="post">
                <input type="hidden" name="provider"
                    value="<?= $provider->id; ?>">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input id="fname" name="fname" type="text" class="form-control" placeholder="First Name" required>
                </div>

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input id="lname" name="lname" type="text" class="form-control" placeholder="Last Name" required>
                </div>

                <div class="form-group">
                    <label for="">Contact No.</label>
                    <input id="contact" name="contact" type="text" class="form-control" placeholder="Contact No."
                        minlength="10" maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input id="adder" name="adder" type="text" class="form-control" placeholder="Address"
                        maxlength="255" required>
                </div>

                <div class="form-group">
                    <label for="">Date</label>
                    <input class="form-control" type="date" name="date" id="date" required>
                </div>

                <div class="form-group">
                    <label for="">Payment Mode</label>
                    <select class="form-control" name="payment" id="payment" required>
                        <option value="cash">Cash</option>
                        <option value="card">Debit Card</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Problem</label>
                    <textarea id="queries" name="queries" class="form-control" maxlength="255"
                        placeholder="Any queries..?"></textarea>
                </div>

                <button style="margin-top: 30px" class="btn btn-block btn-primary" type="submit" name="book"
                    id="book">Book
                    Hall</button>
            </form>

        </div>
    </div>
</div>

<?php include_once "include/footer.php";
