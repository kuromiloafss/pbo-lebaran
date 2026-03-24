// fix error
<?php
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    class User {
        public $firstname;
        public $lastname;
        public $phone;
        public $address;

        public function __construct($firstname, $lastname, $phone, $address) {
            $this->firstname = htmlspecialchars($firstname);
            $this->lastname = htmlspecialchars($lastname);
            $this->phone = htmlspecialchars($phone);
            $this->address = htmlspecialchars($address);
        }

        public function getFullName() {
            return $this->firstname . " " . $this->lastname;
        }
    }

    $user = new User(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['phone'],
        $_POST['address']
    );

    $result = $user;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Form Kelompok 2 T2E</h2>

    <form method="POST">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <button type="submit">Submit</button>
    </form>
    
    <?php if ($result): ?>
        <div class="result">
            <p><strong>Hi, my name is:</strong> <?= $result->getFullName(); ?></p>
            <p><strong>Phone:</strong> <?= $result->phone; ?></p>
            <p><strong>Address:</strong> <?= $result->address; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>