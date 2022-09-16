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
                        <h2 class="page-title">Add File To Project</h2>
                </header>
                <?php
                        if  ( isset( $_GET['project'] ) ) $id = $_GET['project'];
                        $where['id'] = '=' . $id;
                        $project = $database->getRow( 'projects', '*', $where);
                ?>

                <form action="process.php?action=addfile" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                                <label>
                                        Project :
                                        <?php echo $project['name'] ?>
                                </label>
                        </div>
                        <div class="form-row">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <label>Add File :</label>
                                <input type="file" id="file" name="project_file">
                        </div>
                        <div class=form-row>
                                <input type="submit">
                        </div>
                </form>

        </main>

</body>

</html>