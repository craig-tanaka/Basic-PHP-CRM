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
                        <a href="./index.php">Projects</a>
                        <a href="./customers.php">Customers</a>
                        <a href="#">Files</a>
                </div>
        </nav>

        <main>
                <header>
                        <h2 class="page-title">All Files</h2>
                        <span>
                                <a href="./add-file.php" class="header-add-button">+</a>
                                <span id='header-add-button-text'>
                                        Add File
                                </span>
                        </span>
                </header>

                <table>
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Filename</th>
                                        <th>Project</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                        $files = $database->getRows('files');
                                        $count = 0;

                                        foreach($files as $file){
                                                $count++;
                                ?>
                                <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $file['filename'] ?></td>
                                        <td><?php echo $file['project'] ?></td>
                                        <td class="table-link">
                                                <a download='<?php echo str_replace(" ", "_", $file['filename']) ?>'
                                                        href="./process.php?action=viewfile&id=<?php echo $file['id'] ?>">
                                                        View File
                                                </a>
                                        </td>
                                        <td class="table-link">
                                                <a
                                                        href="./process.php?action=deletefile&id=<?php echo $file['id'] ?>&prev=files&pid=0">
                                                        Remove File
                                                </a>
                                        </td>
                                </tr>
                                <?php
                                        }
                                ?>
                        </tbody>
                </table>

        </main>

</body>

</html>