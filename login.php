<?php include('components/globals/head.php') ?>

<?php include('components/globals/header.php') ?>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];

        $sql = "SELECT username, password FROM users WHERE username='$myusername' AND password='$mypassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            $_SESSION['login_user'] = $myusername;

            header("location: index.php");
            }
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    }
?>

    <main aria-labelledby="main-title">
        <div class="container">
            <div class="flex items-center justify-center flex-col bg-brand-brown rounded-lg p-12">
                <h1 id="main-title" class="text-h1-desktop mb-8 text-brand-beige">Bluestorm Library Account Login</h1>
                <div class="container">
                    <form action="" method="post" class="text-brand-beige flex flex-col mb-8">
                        <label for="username" class="mb-2">Username</label>
                        <input type="email" id="username" name="username" placeholder="Email Address" class="p-4 mb-8">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="p-4 mb-8">
                        <input type="submit" value="login" class="cursor-pointer p-4 bg-brand-sage text-brand-brown">
                    </form>
                    <a href="/" title="back" aria-label="back" class="text-brand-beige">Back</a>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>