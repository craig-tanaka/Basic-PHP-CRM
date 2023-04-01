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
        <title>Customers</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>

        <nav>
                <h1>Customer Relationship Management</h1>
                <div class="nav-far-right-cont">
                        <a href="./index.php">Projects</a>
                        <a href="#">Customers</a>
                        <a href="./files.php">Files</a>
                </div>
        </nav>

        <main>
                <header>
                        <h2 class="page-title">All Customers</h2>
                        <span>
                                <a href="./create-customer.php" class="header-add-button">+</a>
                                <span id='header-add-button-text'>
                                        Add a Customer
                                </span>
                        </span>
                </header>

                <table>
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                        $customers = $database->getRows('customers');
                                        $count = 1;

                                        foreach($customers as $customer){?>
                                <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $customer['name'] ?></td>
                                        <td><?php echo $customer['email_address'] ?></td>
                                        <td class="table-link">
                                                <a href="./view-customer.php?id=<?php echo $customer['id']?>">
                                                        View
                                                </a>
                                        </td>
                                        <td class="table-link">
                                                <a href="./edit-customer.php?id=<?php echo $customer['id']?>">
                                                        Edit
                                                </a>
                                        </td>
                                        <td class="table-link">
                                                <a
                                                        href="./process.php?action=deletecustomer&id=<?php echo $customer['id']?>">
                                                        Delete
                                                </a>
                                        </td>
                                </tr>
                                <?php $count++; } ?>
                        </tbody>
                </table>

        </main>

</body>

</html>