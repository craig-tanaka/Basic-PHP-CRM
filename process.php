<?php
    require_once('lib/database.php');
    $database = new Database();

    if(!isset($_GET['action']) || empty($_GET['action'])) {
        exit;
    }

    switch($_GET['action']) {
        case 'createcustomer':
                $data = array(
                        "name" => strip_tags($_POST['name']),
                        "contact_person" => strip_tags($_POST['contact_person']),
                        "email_address" => strip_tags($_POST['email_address']),
                        "full_address" => strip_tags($_POST['full_address']),
                        "phone_number" => strip_tags($_POST['phone_number']),
                    );
                    $database->insertRows("customers", $data);
                    header('Location: customers.php');
                break;
        case 'createproject':
                $data = array(
                        "name" => strip_tags($_POST['name']),
                        "description" => strip_tags($_POST['description']),
                        "project_income" => strip_tags($_POST['project_income']),
                        "project_expenditures" => strip_tags($_POST['project_expenditures']),
                        "customer" => strip_tags($_POST['customer']),
                    );
                    $database->insertRows("projects", $data);
                    header('Location: index.php');
                break;
        case 'updatecustomer':
                $data = array(
                        "name" => strip_tags($_POST['name']),
                        "contact_person" => strip_tags($_POST['contact_person']),
                        "email_address" => strip_tags($_POST['email_address']),
                        "full_address" => strip_tags($_POST['full_address']),
                        "phone_number" => strip_tags($_POST['phone_number']),
                );
                $where['id'] = '=' . $_POST['id'];
                $database->updateRows('customers', $data, $where);
                header('Location: customers.php');
                break;
        case 'updateproject':
                $data = array(
                        "name" => strip_tags($_POST['name']),
                        "description" => strip_tags($_POST['description']),
                        "project_income" => strip_tags($_POST['project_income']),
                        "project_expenditures" => strip_tags($_POST['project_expenditures']),
                        "customer" => strip_tags($_POST['customer']),
                );
                $where['id'] = '=' . $_POST['id'];
                $database->updateRows("projects", $data, $where);
                header('Location: index.php');
                break;
        case 'deletecustomer':
                $where['id'] = '=' . $_GET['id'];
                $database->removeRows('customers', $where );
                header('Location: customers.php');
                break;
        case 'deleteproject':
                $where['id'] = '=' . $_GET['id'];
                $database->removeRows('projects', $where );
                header('Location: index.php');
                break;
        case 'addfile':

                // Checks if file input is empty
                if( $_FILES['project_file']['error'] !== 0 ) {
                        header( 'Location: add-file.php?project=' . $_POST['id'] );
                        break;
                }

                $data = array(
                        "filename" => $_FILES['project_file']['name'],
                        "project" => strip_tags($_POST['project']),
                        "file" => file_get_contents($_FILES['project_file']['tmp_name'])
                );
                $database->insertRows('files', $data);

                header('Location: index.php');
                
                break;
        case 'deletefile':
                $where['id'] = '=' . $_GET['id'];
                $database->removeRows('files', $where );

                $loc = $_GET['prev'] . '.php?id=' . $_GET['pid'];
                header('Location: ' . $loc);
                break;
        case 'viewfile':

                $where['id'] = '=' . $_GET['id'];
                $file = $database->getRow('files', '*', $where);
                
                header('Content-type: application/msword');
                echo $file['file'];
    }

?>