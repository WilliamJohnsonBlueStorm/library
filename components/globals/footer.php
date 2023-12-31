<footer class="w-full absolute bottom-0">
    <div class="w-full bg-brand-brown flex justify-between items-center">

        <ul class="text-brand-beige flex">
            <li class="py-4 px-8 inline-block">
                <?php if(isset($_SESSION['credit'])) { ?>
                    Available credits (<?php echo $_SESSION['credit'] ?>)

            </li>
            <li>
                <a href="/add-credits.php" title="Add credits" aria-label="Add credits" class="py-4 px-8 inline-block">Add more Credits</a>
            </li>
            <?php } ?>
        </ul>


        <?php if(isset($_SESSION['login_user'])) { ?>
            <a href="/logout.php" title="Log Out" aria-label="Log Out" class="py-4 px-8 inline-block text-brand-beige">Click here to Log Out --> <?php echo($_SESSION['login_user']); ?></a>
        <?php }

        else { ?>
            <a href="/index.php" title="log in" aria-label="log in" class="py-4 px-8 inline-block text-brand-beige">You are not logged in</a>
        <?php } ?>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="./scripts/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</body>
</html>