<?php include('components/globals/head.php') ?>

<?php include('components/globals/header.php') ?>

    <?php
    $errors = [];
    $invalid = false;
    $success = false;

    // Detect form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Create variables from Post data
        $bookTitle =  isset($_POST['title']) ? $_POST['title'] : '';
        $bookImageTitle = isset($_POST['book_image_title']) ? $_POST['book_image_title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $price= isset($_POST['price']) ? $_POST['price'] : '';
        $availability= isset($_POST['availability']) ? $_POST['availability'] : '';

//        var_dump($_POST);
//        die();

        // Validate data
        if ($bookTitle == '') {
            $errors[] = 'Book Name is required';
            $invalid = true;
        }

        if ($bookImageTitle == '') {
            $errors[] = 'Book image title is required';
            $invalid = true;
        }

        if ($description == '') {
            $errors[] = 'Description is required';
            $invalid = true;
        }

        if ($price == '') {
            $errors[] = 'Price is required';
            $invalid = true;
        }

        if ($availability == '') {
            $errors[] = 'Availability is required';
            $invalid = true;
        }

        if(!$invalid) {
            $success = true;

            // database connection settings
            require_once "scripts/config.php";

            $sql = "INSERT INTO books (title, thumb_image_title, description, price, availability) VALUES ('{$bookTitle}', '{$bookImageTitle}', '{$description}', '{$price}', '{$availability}')";

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
                <h1 id="main-title" class="text-h1-desktop mb-8 text-brand-beige">Add New Book</h1>
                <div class="container">
                    <div class="grid grid-cols-1">
                        <form id="bookform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <label for="title" class="text-brand-beige block mb-2">Book Title</label>
                            <input type="text" id="title" name="title" class="block mb-8 p-4 w-full">

                            <label for="book-image-title" class="text-brand-beige block mb-2">Book Image Title</label>
                            <input type="text" id="book-image-title" name="book_image_title" class="block mb-8 p-4 w-full">

                            <label for="description" class="text-brand-beige block mb-2">Description</label>
                            <textarea id="description" name="description" rows="4" class="p-4 w-full mb-8"></textarea>

                            <label for="price" class="text-brand-beige block mb-2">Price</label>
                            <input type="number" id="price" name="price" class="block p-4 w-full mb-8">

                            <label for="availability" class="text-brand-beige block mb-2">Quantity</label>
                            <input type="number" id="availability" name="availability" class="block p-4 w-full mb-8">


                            <input type="submit" value="Add Book" class="bg-brand-beige p-2 hover:cursor-pointer">
                        </form>
                        <div class="text-brand-beige">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>