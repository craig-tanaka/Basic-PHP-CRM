<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create a File</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>

        <nav>
                <h1>Customers</h1>
                <div class="nav-far-right-cont">
                        <span>
                                List Customers
                        </span>
                        <button class="nav-button">
                                =
                        </button>
                </div>
        </nav>

        <main>

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