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

                        while($row = $result->fetch_assoc()) {

                            if (isset($row['borrowed_by'])) {?>
                                <li class="text-brand-beige text-center book-listing">
                                    <img src="images/logo.webp" alt="<?php echo $row["thumb_image_title"] ?>">
                                    <h3><?php echo $row["title"] ?></h3>
                                    <p><?php echo $row["description"] ?></p>
                                    <p><span class="font-bold">Cost: </span><?php echo $row["price"] ?></p>

                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <label for="id" class="hidden">id</label>
                                        <input type="number" id="id" name="id" value="<?php echo $row["id"] ?>" class="hidden">

                                        <label for="availability" class="hidden">availability</label>
                                        <input type="number" id="availability" name="availability" value="1" class="hidden">

                                        <button type="submit" class="text-black bg-brand-beige p-2">
                                            Return Book
                                        </button>
                                    </form>
                                </li>
                            <?php }
                            }
                        } else {
                            echo "0 results";
                        }

                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            $myUsername = $_SESSION['login_user'];
                            $bookId = $_POST['id'];
                            $amount = $_POST['availability']+1;


                            $updateAvailability = "UPDATE books SET availability = '$amount', borrowed_by = NULL  WHERE id = '$bookId'";

                            ($conn->query($updateAvailability) === TRUE) && ($conn->query($updateAvailability) === TRUE);

                            echo "You have successfully returned your book!";

                            $conn->close();

                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>