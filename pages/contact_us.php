<?php

// Initialize a session
// session_start();
require_once('../PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPSecure = 'tls'; // for mailtrap

$mail->Host = 'smtp.gmail.com';
// $mail->Host = 'smtp.mailtrap.com';
$mail->Port = '465';
$mail->isHTML();

// $mail->Username = 'ee1d28d5389d9a';
// $mail->Password = 'ff9acb09150fb2';
$mail->Username = 'cristinadinca.cd@gmail.com';
$mail->Password = 'Lavinelu.dinca2';

/*$mail->SetFrom('cristinadinca.cd@gmail.com', 'Just me');
$mail->Subject = "Your email Subject";
$mail->Body = 'Another HTML content. hi hi!!!';*/

$mail->AddAddress('cristinadinca.cd@gmail.com');
// var_dump($mail);

/*if ($mail->Send()) {
    echo "Message Send!";
} else {
    echo "Sorry. Failure Message";
}*/

// send email configuration
// $headers[] = 'MIME-Version: 1.0';
// $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// we initiate an array that will contain any potential errors.
$errors = array();
$name = $email = $message = '';

if (isset($_POST['submitBtn'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        // 1. Sanitization
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // 2. Validation
        if (!preg_match('/^[a-z]*$/i', $name)) {
           $errors['name'] = "The name is invalid!";
        }

        if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors['email'] = "The email address is invalid!";
        }

        if (!preg_match('/^[a-z _]*$/i', $message)) {
           $errors['message'] = "The message is invalid!";
        }
    } else {
        $errors['empty'] = "Empty fields! Please verify all the fields and try again.";
    }

    if (count($errors) == 0) {
        echo 'no errors, so sent email to admin.';
        // save the data into database

        // send email with the data to admin
        $succes_sending_email;
        $message = wordwrap($message, 70);
        $body = '<h4 class="text-info">You have a messsage from your website!</h4>';
        $body .= '<p class="text-success">'.$message.'</p>';

        $mail->SetFrom($email, 'Contact form');
        $mail->Subject = "Message Subject";
        $mail->Body = $body;

        if ($mail->Send()) {
            echo "Message Send!";
        } else {
            echo "Sorry. Failure Message";
        }
        // mail($to_email_address, $subject, $message, $headers);

        // redirect to homepage with message
        // header('Location: ../index.php');
    }
}

// var_dump($errors);
// var_dump($_SESSION);
/*$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$name_error = isset($errors) && isset($errors['name']) ? $errors['name'] : "";
$email_error = isset($errors) && isset($errors['email']) ? $errors['email'] : "";*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact form</title>

    <!-- Font awesome -->
	<script src="https://kit.fontawesome.com/2d566fa444.js" crossorigin="anonymous"></script>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo+2|Questrial" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://yarnpkg.com/en/package/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<?php include('../layouts/header.php'); ?>

	<div class="container py-3">
		<h4 class="text-info">Contact form</h4>

        <?php if (count($errors) > 0) { ?>
            <div class="text-danger border border-danger p-4 my-3">
                <h4 class="text-dark mb-3">Ouch! You have errors:</h4>

                <?php foreach ($errors as $error) { ?>
                    <p class="mb-1"><?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group mb-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
                <div class="text-danger"><?php echo isset($errors['name']) ? $errors['name'] : ""; ?></div>
            </div>

            <div class="form-group mb-4">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
                <div class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : ""; ?></div>
            </div>

            <div class="form-group">
                <label for="message">Your message:</label>
                <textarea class="form-control rounded-0" name="message" rows="3"><?php echo $message; ?></textarea>
                <div class="text-danger"><?php echo isset($errors['message']) ? $errors['message'] : ""; ?></div>
            </div>

            <button type="submit" class="btn btn-info" name="submitBtn">Submit</button>
        </form>
	</div>

	<?php include('../layouts/footer.php'); ?>

	<!-- Bootstrap files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

<?php

// remove all session variables
// session_unset();

?>