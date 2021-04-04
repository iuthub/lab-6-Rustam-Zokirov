<?php
    $isNameValid = true;
    $isEmailValid = true;
    $isUsernameValid = true;
    $isPasswordValid = true;
    $isConfirmPasswordValid = true;
    $isDateOfBirthValid = true;
    $isGenderValid = true;
    $isMaritalStatusValid = true;
    $isAddressValid = true;
    $isCityValid = true;
    $isPostalCodeValid = true;
    $isHomePhoneValid = true;
    $isMobilePhoneValid = true;
    $isCreditCardNumberValid = true;
    $isExpiryDateValid = true;
    $isMonthlySalaryValid = true;
    $isUrlValid = true;
    $isGpaValid = true;


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $out="Invalid info!";

        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword=$_POST["confirmPassword"];
        $dateOfBirth = $_POST["dateOfBirth"];
        $gender = $_POST["gender"];
        $maritalStatus = $_POST["maritalStatus"];
        $address=$_POST["address"];
        $city = $_POST["city"];
        $postalCode = $_POST["postalCode"];
        $homePhone = $_POST["homePhone"];
        $mobilePhone = $_POST["mobilePhone"];
        $creditCardNumber=$_POST["cardNumber"];
        $expiryDate = $_POST["expiryDate"];
        $monthlySalary=$_POST["monthlySalary"];
        $url=$_POST["url"];
        $gpa=$_POST["gpa"];


        $isNameValid = preg_match('/^[a-zA-Z]{2,}$/i',$name);
        $isEmailValid = preg_match('/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{1,3}/i',$email);
        $isUsernameValid = preg_match('/^.{5,}$/i',$username);
        $isPasswordValid = preg_match('/^.{8,}$/i',$password);
        if($password == $confirmPassword){ $isConfirmPasswordValid = true;}
        else{  $isConfirmPasswordValid = false; }
        $isDateOfBirthValid = preg_match('/\d{2}\.\d{2}\.\d{4}/i',$dateOfBirth);
        $isGenderValid = preg_match('/^(Male|Female)$/i',$gender);
        $isMaritalStatusValid = preg_match('/^(Single|Married|Divorced|Widowed)$/i',$maritalStatus);
        $isAddressValid = true;
        $isCityValid = true;
        $isPostalCodeValid = preg_match('/^\d{6}$/i',$postalCode);
        $isHomePhoneValid = preg_match('/^((\d{2}\s\d{7})|(\d{9}))$/i',$homePhone);
        $isMobilePhoneValid = preg_match('/^((\d{2}\s\d{7})|(\d{9}))$/i',$mobilePhone);
        $isCreditCardNumberValid = preg_match('/^\d{16}$/i',$creditCardNumber);
        $isExpiryDateValid = preg_match('/^\d{2}\.\d{2}\.\d{4}$/i',$expiryDate);
        $isMonthlySalaryValid = preg_match('/^(UZS)\s\d+\,\d+\.\d+$/i',$monthlySalary);
        $isUrlValid = preg_match('/^https?:\/\/[a-z0-9]+\.[a-zA-Z]{1,3}$/i',$url);
        $isGpaValid = preg_match('/^(([0-3]{1}\.([0-9]{1,2}))|([4]{1}\.[0-4]{1}[0-9]{1})|^4.5$)$/i',$gpa);


        $isValid = $isNameValid && $isEmailValid && $isUsernameValid && $isPasswordValid && $isConfirmPasswordValid
            && $isDateOfBirthValid && $isGenderValid && $isMaritalStatusValid && $isAddressValid && $isCityValid
            && $isPostalCodeValid && $isHomePhoneValid && $isMobilePhoneValid && $isCreditCardNumberValid
            && $isExpiryDateValid && $isMonthlySalaryValid && $isUrlValid && $isGpaValid;

        if ($isValid) {
            $out="Success!";
        }

    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<h1>Registration Form</h1>

<p>
    This form validates user input and then displays "Thank You" page.
</p>

<hr />

<h2>Please, fill below fields correctly</h2>
<form action="index.php" method="POST">
    <dl>
        <dt>Name</dt>
        <dd>
            <input type="text" name="name" placeholder="Name" minlength="2" required>
        </dd>

        <dt>Email</dt>
        <dd>
            <input type="email" name="email" placeholder="Mail" required>
        </dd>

        <dt>Username</dt>
        <dd>
            <input type="text" name="username" placeholder="Username" minlength="5" required>
        </dd>

        <dt>Password</dt>
        <dd>
            <input type="password" name="password" placeholder="Password" minlength="8" required>
        </dd>

        <dt>Confirm Password</dt>
        <dd>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" minlength="8" required>
        </dd>

        <dt>Date of Birth</dt>
        <dd>
            <input type="text" name="dateOfBirth" placeholder="dd.mm.yyyy"  required>
        </dd>

        <dt>Gender</dt>
        <dd>
            <input type="text" name="gender" placeholder="Male/Female"  required>
        </dd>

        <dt>Marital Status</dt>
        <dd>
            <input type="text" name="maritalStatus" placeholder="Single | Married | ..."  required>
        </dd>

        <dt>Address</dt>
        <dd>
            <input type="text" placeholder="Address" name="address" required>
        </dd>

        <dt>City</dt>
        <dd>
            <input type="text" placeholder="City"  name="city" required>
        </dd>

        <dt>Postal Code</dt>
        <dd>
            <input type="text" placeholder="Postal Code"  name="postalCode" maxlength="6" required>
        </dd>

        <dt>Home Phone</dt>
        <dd>
            <input type="text" name="homePhone" placeholder="71 #######"  required>
        </dd>

        <dt>Mobile Phone</dt>
        <dd>
            <input type="text" name="mobilePhone" placeholder="## #######" required>
        </dd>

        <dt>Credit Card Number</dt>
        <dd>
            <input type="text" name="cardNumber"  placeholder="#### #### #### ####" required>
        </dd>

        <dt>Credit Card Expiry Date</dt>
        <dd>
            <input type="text" name="expiryDate" placeholder="dd.mm.yyyy" required>
        </dd>

        <dt>Monthly Salary</dt>
        <dd>
            <input type="text" name="monthlySalary" placeholder=" UZS 200,000.00" required>
        </dd>

        <dt>Web Site URL</dt>
        <dd>
            <input type="text" name="url" placeholder="http://github.com" required>

        </dd><dt>Overall GPA</dt>
        <dd>
            <input type="text" name="gpa" placeholder="#.#/4.5" required>
        </dd>

    </dl>

    <div>
        <input type="submit" value="Register">
    </div>
</form>
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){?>
    <h1><?php echo $out;?></h1>
<?php } ?>
</body>
</html>