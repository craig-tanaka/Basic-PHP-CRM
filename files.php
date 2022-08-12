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
                <h1>Projects</h1>
                <div class="nav-far-right-cont">
                        <span>
                                Create Project
                        </span>
                        <button class="nav-button">
                                +
                        </button>
                </div>
        </nav>

        <main>

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
                                                $count++;
                                ?>
                                        <tr>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $project['name'] ?></td>
                                                <td><?php echo $project['email_address'] ?></td>
                                                <td><?php echo $project['created_at'] ?></td>
                                        </tr>
                                <?php
                                        }
                                ?>
                        </tbody>
                </table>


        </main>

</body>

</html>