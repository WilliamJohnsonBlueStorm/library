<?php include('components/globals/head.php') ?>

<?php include('components/globals/header.php') ?>

<?php
    $errors = [];
    $invalid = false;
    $success = false;

    // Detect form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Create variables from Post data
        $formUsername =  isset($_POST['username']) ? $_POST['username'] : '';
        $formPassword = isset($_POST['password']) ? $_POST['password'] : '';


    // Validate data
        if ($formUsername == '') {
            $errors[] = 'Username is required';
            $invalid = true;
        }

        if ($formPassword == '') {
            $errors[] = 'Password is required';
            $invalid = true;
        }

        if(!$invalid) {
            $success = true;

            // database connection settings
            require_once "scripts/config.php";

            $sql = "INSERT INTO users (username, password) VALUES ('{$formUsername}', '{$formPassword}')";

            if ($conn->query($sql) === TRUE) {
                header("location: books.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

        } else {
            $success;
        }
    }
?>

    <main aria-labelledby="main-title">
        <div class="container">
            <div class="flex items-center justify-center flex-col bg-brand-brown rounded-lg p-12">
                <h1 id="main-title" class="text-h1-desktop mb-8 text-brand-beige">Bluestorm Library Account Register</h1>

                <div class="container">
                    <form id="registerform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-brand-beige flex flex-col mb-8">

                        <?php if($invalid) { ?>
                            <div class="form-errors mb-8">
                                <ul>
                                    <?php foreach ($errors as $error) { ?>
                                        <li class="bg-brand-red text-brand-white p-2 text-center rounded mb-4"><?php echo $error ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>


                        <?php if($success) { ?>
                            <div class="form-success w-full bg-brand-blue p-2 text-center text-brand-white rounded mb-8">
                                <p class="text-brand-beige">Your Account has been created</p>
                            </div>
                        <?php } ?>

                        <label for="username" class="mb-2">Username</label>
                        <input type="email" id="username" name="username" placeholder="Email Address" class="p-4 mb-8 text-black">

                        <label for="confirmUsername" class="mb-2">Confirm Username</label>
                        <input type="email" id="confirmUsername" name="username" placeholder="Confirm Email Address" class="p-4 mb-8 text-black">

                        <label for="password" class="mb-2">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="p-4 mb-8 text-black">

                        <input type="submit" value="Register" class="cursor-pointer p-4 bg-brand-sage text-brand-brown font-bold">
                    </form>
                    <a href="/" title="back" aria-label="back" class="text-brand-beige">Back</a>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>