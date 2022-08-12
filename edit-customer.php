<?php
    require_once('lib/database.php');
    $database = new Database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create a Customer</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>

        <nav>
                <h1>Customer Relationship Management</h1>
                <div class="nav-far-right-cont">
                        <a href="./index.php">Projects</a>
                        <a href="./customers.php">Customers</a>
                        <a href="">Files</a>
                </div>
        </nav>

        <main>
                <header>
                        <h2 class="page-title">Updating a Customer</h2>
                </header>

                <form action="process.php?action=updatecustomer" method="post">
                        <?php
                                $id = $_GET['id'];
                                $where['id'] = '=' . $id;
                                $customer = $database->getRow('customers', '*', $where );
                        ?>

                        <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">

                        <div class="form-row">
                                <input type="text" name="name" value="<?php echo $customer['name'] ?>">
                                <label for="">Name</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="contact_person"
                                        value="<?php echo $customer['contact_person'] ?>">
                                <label for="">Contact Person</label>
                        </div>
                        <div class="form-row">
                                <input type="email" name="email_address"
                                        value="<?php echo $customer['email_address'] ?>">
                                <label for="">Email Address</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="full_address" value="<?php echo $customer['full_address'] ?>">
                                <label for="">Full Address</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="phone_number" value="<?php echo $customer['phone_number'] ?>">
                                <label for="">Phone Number</label>
                        </div>

                        <input type="submit" value="Update">
                        <!-- <button>Delete</button> -->

                </form>

        </main>

</body>

</html>