<footer class="absolute bottom-0 w-full">
    <div class="w-full bg-brand-brown flex justify-between items-center">

        <ul class="text-brand-beige flex">
            <li class="py-4 px-8 inline-block">Available credits (0)</a></li>
            <li><a href="/add-credits.php" title="Add credits" aria-label="Add credits" class="py-4 px-8 inline-block">Add more Credits</a></li>
        </ul>


        <?php if(isset($_SESSION['login_user'])) { ?>
            <a href="/logout.php" title="Log Out" aria-label="Log Out" class="py-4 px-8 inline-block text-brand-beige">Log Out: <?php echo($_SESSION['login_user']); ?></a>
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