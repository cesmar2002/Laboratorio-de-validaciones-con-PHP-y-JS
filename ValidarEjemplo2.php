
<!DOCTYPE html>
<html>
<head>
    <title>Validaciones</title>
</head>
<body>

<h2>Ejemplo de Validaciones</h2>
<form id="contactForm" method="post" action="validate.php">
    <div id="errors" style="color:red;"></div>
    <div id="response" style="color:green;"></div>

    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Phone: <input type="text" name="phone" placeholder="123-456-7890"><br><br>
    CAPTCHA: <input type="text" name="captcha" placeholder="Escribe 1234"><br><br>

    <input type="submit" value="Submit">
</form>

<script src="form-handler.js"></script>

</body>
</html>
