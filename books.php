<?php include('components/globals/head.php') ?>

<?php include('components/globals/header.php') ?>

    <?php
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);
?>


    <main aria-labelledby="main-title">
        <div class="container">
            <div class="flex items-center justify-center flex-col bg-brand-brown rounded-lg p-12">
                <h1 id="main-title" class="text-h1-desktop mb-8 text-brand-beige">Available Books</h1>
                <div class="container">
                    <ul class="grid grid-cols-6 gap-4">
                        <?php

                        if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) { ?>
                            <li class="text-brand-beige text-center book-listing <?php if($row['availability']<1) echo 'brightness-50 hover:cursor-not-allowed pointer-events-none' ?>">
                                <img src="images/logo.webp" alt="<?php echo $row["thumb_image_title"] ?>">
                                <h3><?php echo $row["title"] ?></h3>
                                <p><?php echo $row["description"] ?></p>
                                <p><span class="font-bold">Cost: </span><?php echo $row["price"] ?></p>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <label for="id" class="hidden">id</label>
                                    <input type="number" id="id" name="id" value="<?php echo $row["id"] ?>" class="hidden">

                                    <label for="price" class="hidden">Price</label>
                                    <input type="number" id="price" name="price" value="<?php echo $row["price"] ?>" class="hidden">

                                    <label for="availability" class="hidden">availability</label>
                                    <input type="number" id="availability" name="availability" value="1" class="hidden">

                                    <button type="submit" class="text-black bg-brand-beige p-2 <?php if($row['availability']<1) echo 'hover:cursor-not-allowed'; else echo 'hover:cursor-pointer'?>">
                                        Borrow Book
                                    </button>
                                </form>
                            </li>
                        <?php }
                        } else {
                            echo "0 results";
                        }

                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            $price = $_POST['price'];
                            $newCredits = $_SESSION['credit']-$price;
                            $myUsername = $_SESSION['login_user'];


                            $bookId = $_POST['id'];
                            $amount = $_POST['availability']-1;

                            $updateCredit = "UPDATE users SET credit = '$newCredits' WHERE username = '$myUsername'";

                            if ($_SESSION['credit'] < $_POST['price']) {

                                echo "You do not have enough credits to borrow this book!";

                            } else {

                                $updateAvailability = "UPDATE books SET availability = '$amount', borrowed_by = '$myUsername' WHERE id = '$bookId'";
                                ($conn->query($updateCredit) === TRUE) && ($conn->query($updateAvailability) === TRUE);
                                $_SESSION['credit'] = $newCredits;

                                echo "You have successfully borrowed this book!";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>