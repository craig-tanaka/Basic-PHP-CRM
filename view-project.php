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
                        <h2 class="page-title">Viewing Project</h2>
                </header>
                <?php
                        // Gets Project data from Projects table
                        $id = $_GET['id'];
                        $where['id'] = '=' . $id;
                        $project = $database->getRow('projects', '*', $where );

                        // Gets project's customer data from Customers table
                        $customer_where['id'] = '=' . $project['customer'];
                        $customer = $database->getRow('customers', '*', $customer_where);

                        // Gets Project's file data from Files table
                        $file_where['project'] = '=' . $id;
                        $file = $database->getRow('files', '*', $file_where);
                ?>

                <div class="form-row">
                        <span>Name : </span>
                        <span><?php echo $project['name'] ?></span>
                </div>
                <div class="form-row">
                        <span>Date :</span>
                        <span><?php echo $project['created_at'] ?></span>
                </div>
                <div class="form-row">
                        <span>Description :</span>
                        <span><?php echo $project['description'] ?></span>
                </div>
                <div class="form-row">
                        <span>Project Income :</span>
                        <span><?php echo $project['project_income'] ?></span>
                </div>
                <div class="form-row">
                        <span>Project Expenditures</span>
                        <span><?php echo $project['project_expenditures'] ?></span>
                </div>
                <div class="form-row">
                        <span>Customer :</span>
                        <span><?php echo $customer['email_address'] ?></span>
                </div>
                <div class="form-row">
                        <span>Project File :</span>
                        <span>
                                <?php
                                        if ( empty( $file ) ) {
                                                echo '<em>No File Found</em>';
                                                echo '<a href="./add-file.php?project=' . $project['id']  . '">Add File</a>';
                                        } else {
                                                echo $file['filename'];
                                                        echo '<a class="view-link" download=' . str_replace(" ", "_", $file['filename']) . ' href="./process.php?action=viewfile&id=' . $file['id'] . '">View File</a>';
                                                        echo '<a class="view-link" href="./process.php?action=deletefile&id=' . $file['id'] .'&prev=edit-project&pid=' . $project['id'] . '">Remove File</a>';
                                        }
                                ?>
                        </span>
                </div>
                <div>
                        <a class="view-link" href="./edit-project.php?id=<?php echo $project['id'] ?>">
                                Edit
                        </a>
                        <a class="view-link table-link delete"
                                href="./process.php?action=deleteproject&id=<?php echo $project['id'] ?>">
                                Delete
                        </a>
                </div>
        </main>

</body>

</html>