<?php include('components/globals/head.php') ?>

<?php include('components/globals/header.php') ?>

    <main aria-labelledby="main-title">
        <div class="container">
            <div class="flex items-center justify-center flex-col bg-brand-brown rounded-lg p-12">
                <h1 id="main-title" class="text-h1-desktop mb-8 text-brand-beige">Welcome to Bluestorm Library</h1>
                <div class="container">
                    <div class="grid grid-cols-2">
                        <div class="text-center">
                            <a href="login.php" title="login" aria-label="login" class="text-h2 text-brand-beige text-center mb-8">Login</a>
                        </div>
                        <div class="text-center">
                            <a href="register.php" title="register" aria-label="register" class="text-h2 text-brand-beige mb-8 text-center">Register New User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include('components/globals/footer.php') ?>