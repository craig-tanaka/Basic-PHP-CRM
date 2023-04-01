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
                        <h2 class="page-title">Add a Customer</h2>
                </header>

                <form action="process.php?action=createcustomer" method="post">

                        <div class="form-row">
                                <input type="text" name="name">
                                <label for="">Name</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="contact_person">
                                <label for="">Contact Person</label>
                        </div>
                        <div class="form-row">
                                <input type="email" name="email_address">
                                <label for="">Email Address</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="full_address">
                                <label for="">Full Address</label>
                        </div>
                        <div class="form-row">
                                <input type="text" name="phone_number">
                                <label for="">Phone Number</label>
                        </div>

                        <input type="submit" value="Submit">

                </form>

        </main>

</body>

</html>