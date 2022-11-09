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
        <title>Projects</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>

        <nav>
                <h1>Customer Relationship Management</h1>
                <div class="nav-far-right-cont">
                        <a href="#">Projects</a>
                        <a href="./customers.php">Customers</a>
                        <a href="#">Files</a>
                </div>
        </nav>

        <main>

                <header>
                        <h2 class="page-title">All Projects</h2>
                        <a href="./create-project.php" class="header-add-button">
                                <button>+</button>
                                Create a Project
                        </a>
                </header>

                <table>
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Customer Email</th>
                                        <th>Date</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                        $projects = $database->getRows('projects_customers_view');
                                        $count = 0;

                                        foreach($projects as $project){
                                                $count++;?>
                                <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $project['name'] ?></td>
                                        <td><?php echo $project['email_address'] ?></td>
                                        <td><?php echo $project['created_at'] ?></td>
                                        <td>
                                                <a href="./view-project.php?id=<?php echo $project['id'] ?>">
                                                        View
                                                </a>
                                        </td>
                                        <td>
                                                <a href="./edit-project.php?id=<?php echo $project['id'] ?>">
                                                        Edit
                                                </a>
                                        </td>
                                        <td>
                                                <a class="table-link delete"
                                                        href="./process.php?action=deleteproject&id=<?php echo $project['id'] ?>">
                                                        Delete
                                                </a>
                                        </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                </table>


        </main>

</body>

</html>