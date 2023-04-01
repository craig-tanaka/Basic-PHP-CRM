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
                        <a href="./files.php">Files</a>
                </div>
        </nav>

        <main>
                <header>
                        <h2 class="page-title">Viewing Customer</h2>
                </header>
                <?php
                                $id = $_GET['id'];
                                $where['id'] = '=' . $id;
                                $customer = $database->getRow('customers', '*', $where );
                        ?>

                <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">

                <div class="form-row">
                        <span>Name : </span>
                        <span><?php echo $customer['name'] ?></span>
                </div>
                <div class="form-row">
                        <span>Contact Person :</span>
                        <span><?php echo $customer['contact_person'] ?></span>
                </div>
                <div class="form-row">
                        <span>Email Address :</span>
                        <span><?php echo $customer['email_address'] ?></span>
                </div>
                <div class="form-row">
                        <span>Full Address :</span>
                        <span><?php echo $customer['full_address'] ?></span>
                </div>
                <div class="form-row">
                        <span>Phone Number :</span>
                        <span><?php echo $customer['phone_number'] ?></span>
                </div>
                <div>
                        <a class="view-link" href="./edit-customer.php?id=<?php echo $customer['id'] ?>">
                                Edit
                        </a>
                        <a class="view-link" href="./process.php?action=deletecustomer&id=<?php echo $customer['id']?>">
                                Delete
                        </a>
                </div>

                <!-- <button>Delete</button> -->

                </form>

        </main>

</body>

</html>