<!DOCTYPE html>
<?php
include 'Connection.php';

$con = mysqli_connect("localhost", "root", "", "practice");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


if (isset($_POST['signup_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $c_password = mysqli_real_escape_string($con, $_POST['c_password']);

    $error = ""; // Initialize the error variable

    if (empty($name)) {
        $error = "Name field is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif (empty($email)) {
        $error = "Email field is required";
    } elseif (empty($password)) {
        $error = "Password field is required";
    } elseif ($password != $c_password) {
        $error = "Passwords do not match";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters";
    } elseif (strlen($name) < 6) {
        $error = "Name must be at least 6 characters";
    } elseif (!preg_match('/^[a-zA-Z ]+$/', $name)) {
        $error = "Name must contain only letters and spaces";
    } else {
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $data = mysqli_query($con, $check_email);
        if (mysqli_num_rows($data) > 0) { // Check the number of rows returned
            $error = "Email already exists";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            $q = mysqli_query($con, $insert);
            if ($q) {
                header("Location: login.php");
                exit;
            } else {
                $error = "Error occurred while registering the user.";
            }
        }
    }
} else {
    // Clear form fields when the page is refreshed
    $name = "";
    $email = "";
    $password = "";
    $c_password = "";
}
?>

<html>
<head>
   <title></title>
</head>
<body>
    <div class="signup">
        <p style="color: red">
            <?php
                if (isset($error)) {
                    echo $error;
                }
            ?>
        </p>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"><br><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="c_password" placeholder="Confirm Password"><br><br>
            <input type="submit" name="signup_btn" value="Sign up">
        </form>
    </div>
</body>
</html>
