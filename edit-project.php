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
        <title>Create a Project</title>
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
                        <h2 class="page-title">Updating a Project</h2>
                </header>

                <form action="process.php?action=updateproject" method="post">
                        <?php
                                $where['id'] = '=' . $_GET['id'];
                                $project = $database->getRow('projects', '*', $where);
                        ?>

                        <input type="hidden" name="id" value="<?php echo $project['id'] ?>">

                        <div class="form-row">
                                <input type="text" name="name" value="<?php  echo $project['name'] ?>">
                                <label for="">Name</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="description" value="<?php echo $project['description'] ?>">
                                <label for="">Description</label>
                        </div>
                        <div class="form-row">
                                <input type="number" name="project_income" value="<?php echo $project['project_income'] ?>">
                                <label for="">Project Income</label>
                        </div>
                        <div class="form-row">
                                <input type="number" name="project_expenditures" value="<?php echo $project['project_expenditures'] ?>">
                                <label for="">Project Expenditures</label>
                        </div>
                        <div class="form-row">
                                <select name="customer">
                                <?php
                                        $customers = $database->getRows('customers');
                                        foreach($customers as $customer){ ?>
                                                <option 
                                                        value=<?php echo $customer['id']?>
                                                        <?php echo ($customer['id'] == $project['customer']) ? 'selected' : '' ?>
                                                >
                                                        <?php echo $customer['name'] ?>
                                                </option>
                                        <?php } ?>
                                </select>
                                <label for="">Customer</label>
                        </div>

                        <input type="Submit" value="Update">

                </form>

        </main>

</body>

</html>