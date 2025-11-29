<footer class="flex flex-col items-center md:flex-row md:justify-between w-full mt-10 p-8">

    <div class="flex justify-center md:text-left mb-6 md:mb-0">
        <a href="/" class="p-3" id="site-title"><img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-eo-arte.svg"
                alt="EO Arte logo" class="w-20"></a>
    </div>

    <a href="https://www.mattdev.it/" class="italic mb-6 md:mb-0 text-xs">Made with ❤️ by Matthew</a>


    <a href="https://www.arcicuneoasti.com/">
        <?php echo get_svg_markup('arci-asti-cuneo-footer') ?>
    </a>









    <!-- <a href="https://www.mattdev.it/" class="text-blue italic">Made with ❤️ by Matthew</a> -->
</footer>

<?php
wp_footer();
?>

</body>

</html>