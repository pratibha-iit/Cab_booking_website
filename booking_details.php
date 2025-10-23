<?php
require_once('./../../config.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT b.*, CONCAT(c.lastname, ', ', c.firstname, ' ', c.middlename) AS client 
                         FROM `booking_list` b 
                         INNER JOIN client_list c ON b.client_id = c.id 
                         WHERE b.id = '{$_GET['id']}'");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
        $qry2 = $conn->query("SELECT c.*, cc.name AS category 
                              FROM `cab_list` c 
                              INNER JOIN category_list cc ON c.category_id = cc.id 
                              WHERE c.id = '{$cab_id}'");
        if ($qry2->num_rows > 0) {
            foreach ($qry2->fetch_assoc() as $k => $v) {
                if (!isset($$k)) $$k = $v;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay'])) {
    // Simulate payment processing
    // Replace this with actual payment gateway integration code
    $paymentSuccessful = true;

    if ($paymentSuccessful) {
        // Update the booking status to confirmed
        $conn->query("UPDATE `booking_list` SET status = 1 WHERE id = '{$_GET['id']}'");
        header('Location: booking_details.php?id=' . $_GET['id']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <fieldset class="border-bottom">
                    <legend class="h5 text-muted">Cab Details</legend>
                    <dl>
                        <dt>Cab Body No</dt>
                        <dd class="pl-4"><?= isset($body_no) ? $body_no : "" ?></dd>
                        <dt>Vehicle Category</dt>
                        <dd class="pl-4"><?= isset($category) ? $category : "" ?></dd>
                        <dt>Vehicle Model</dt>
                        <dd class="pl-4"><?= isset($cab_model) ? $cab_model : "" ?></dd>
                        <dt>Driver</dt>
                        <dd class="pl-4"><?= isset($cab_driver) ? $cab_driver : "" ?></dd>
                        <dt>Driver Contact</dt>
                        <dd class="pl-4"><?= isset($driver_contact) ? $driver_contact : "" ?></dd>
                        <dt>Driver Address</dt>
                        <dd class="pl-4"><?= isset($driver_address) ? $driver_address : "" ?></dd>
                    </dl>
                </fieldset>
            </div>
            <div class="col-md-6">
                <fieldset class="border-bottom">
                    <legend class="h5 text-muted">Booking Details</legend>
                    <dl>
                        <dt>Ref. Code</dt>
                        <dd class="pl-4"><?= isset($ref_code) ? $ref_code : "" ?></dd>
                        <dt>Client</dt>
                        <dd class="pl-4"><?= isset($client) ? $client : "" ?></dd>
                        <dt>Pickup Zone</dt>
                        <dd class="pl-4"><?= isset($pickup_zone) ? $pickup_zone : "" ?></dd>
                        <dt>Drop off Zone</dt>
                        <dd class="pl-4"><?= isset($drop_zone) ? $drop_zone : "" ?></dd>
                        <dt>Status</dt>
                        <dd class="pl-4">
                            <?php 
                                switch($status){
                                    case 0:
                                        echo "<span class='badge badge-secondary bg-gradient-secondary px-3 rounded-pill'>Pending</span>";
                                        break;
                                    case 1:
                                        echo "<span class='badge badge-success bg-gradient-success px-3 rounded-pill'>Confirmed</span>";
                                        break;
                                    case 2:
                                        echo "<span class='badge badge-warning bg-gradient-warning px-3 rounded-pill'>Picked-up</span>";
                                        break;
                                    case 3:
                                        echo "<span class='badge badge-success bg-gradient-success px-3 rounded-pill'>Dropped off</span>";
                                        break;
                                    case 4:
                                        echo "<span class='badge badge-danger bg-gradient-danger px-3 rounded-pill'>Cancelled</span>";
                                        break;
                                }
                            ?>
                        </dd>
                    </dl>
                </fieldset>
            </div>
        </div>
        <div class="clearfix my-3"></div>
        <div class="text-right">
            <form method="POST">
                <input type="hidden" name="pay" value="1">
                <button class="btn btn-primary btn-flat bg-gradient-primary" type="submit"><i class="fa fa-credit-card"></i> Pay Now</button>
            </form>
            <button class="btn btn-danger btn-flat bg-gradient-red" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>
    </div>
</body>
</html>
