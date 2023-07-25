<?php include('components/globals/head.php') ?>

<?php include('components/globals/header.php') ?>


    <main aria-labelledby="main-title">
        <div class="container">
            <div class="flex items-center justify-center flex-col bg-brand-brown rounded-lg p-12">
                <h1 id="main-title" class="text-h1-desktop mb-8 text-brand-beige">Add Credits</h1>
                <div class="container">
                    <div class="grid grid-cols-1 gap-12">
                        <form id="creditform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <label for="credit" class="text-brand-beige block mb-2">How many credits do you want to add?</label>
                            <input type="number" id="credit" name="credit" min="1" max="1000" class="block w-[200px] mb-2">
                            <input type="submit" value="Add Credits" class="bg-brand-beige p-2 hover:cursor-pointer">
                        </form>
                        <div class="text-brand-beige">
                            <?php

                            if($_SERVER["REQUEST_METHOD"] == "POST") {

                                $credits = $_POST['credit'];
                                $newCredits = $_SESSION['credit']+$credits;
                                $myusername = $_SESSION['login_user'];

                                $sql = "UPDATE users SET credit = '$newCredits' WHERE username = '$myusername'";


                                $_SESSION['credit'] = $newCredits;

                                if ($conn->query($sql) === TRUE) {
                                    echo "Your credits have been added sucessfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                $conn->close();

                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>