
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $captcha = test_input($_POST["captcha"]);

    $nameErr = $emailErr = $phoneErr = $captchaErr = "";

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phone)) {
        $phoneErr = "Invalid phone format. Use 123-456-7890.";
    }

    if ($captcha !== "1234") {
        $captchaErr = "CAPTCHA incorrecto.";
    }

    if ($nameErr || $emailErr || $phoneErr || $captchaErr) {
        echo "<div id='errors'><b>Error:</b><br>";
        echo $nameErr ? "$nameErr<br>" : "";
        echo $emailErr ? "$emailErr<br>" : "";
        echo $phoneErr ? "$phoneErr<br>" : "";
        echo $captchaErr ? "$captchaErr<br>" : "";
        echo "</div>";
    } else {
        echo "Form submitted successfully";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
