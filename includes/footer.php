<footer class="footer">
    <div class="footer-links">
        <a href="#">Home</a>
        <span>|</span>
        <a href="#">Services</a>
        <span>|</span>
        <a href="#">Our Work</a>
        <span>|</span>
        <a href="#">Contact</a>
    </div>
    <div class="footer-copy">
        Copyright © inktank.com 2018. All Rights Reserved.
    </div>
</footer>

<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="./slider.js"></script>
<script>
    $(document).ready(function () {
        // Toggle mobile nav
        $('.mobile-toggle').click(function () {
            $('.nav-menu').slideToggle(300);
            $(this).toggleClass('active');
            $('body').toggleClass('no-scroll');
        });

        // Toggle dropdown under Services
        $('.dropdown-toggle').click(function (e) {
            e.stopPropagation(); // Prevent click bubbling

            const dropdown = $(this).next('.dropdown-menu');

            // Close other open dropdowns
            $('.dropdown-menu').not(dropdown).slideUp(200);

            // Toggle current dropdown
            dropdown.slideToggle(200);

            // Toggle icon rotation
            $(this).find('.dropdown-icon').toggleClass('rotate');
        });

        // Optional: Close dropdowns if clicked outside (if you want this behavior)
        $(document).click(function () {
            $('.dropdown-menu').slideUp(200);
            $('.dropdown-icon').removeClass('rotate');
        });

        // Prevent closing when clicking inside dropdown
        $('.dropdown-menu').click(function (e) {
            e.stopPropagation();
        });
    });
</script>
<script type="text/javascript">
    $(window).on("load", function () {
        $("#fullscreen-slider").slider();
    });
</script>
</body>
</html>