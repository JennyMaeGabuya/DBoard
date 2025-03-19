<div class="footer-copyright-area" id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>
                        <?php echo date("Y"); ?> &copy; Municipality of Mataasnakahoy
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --sidebar-width: 200px;
    }

    #footer {
        padding: 5px;
        position: fixed;
        bottom: 0;
        left: var(--sidebar-width);
        width: calc(100% - var(--sidebar-width));
        color: white;
        text-align: center;
        z-index: 1000;
        transition: left 0.3s ease-in-out, width 0.3s ease-in-out, transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }

    .sidebar-collapsed #footer {
        left: 1px;
        width: calc(100% - 1px);
    }

    #footer.hide {
        transform: translateY(100%);
        opacity: 0;
        pointer-events: none;
    }

    @media screen and (max-width: 768px) {
        #footer {
            left: 0;
            width: 100%;
            text-align: center;
            padding: 5px;
            font-size: 13px;
        }
    }
</style>

<script>
    let lastScrollTop = 0;
    const footer = document.getElementById("footer");
    const sidebarToggle = document.getElementById("sidebarCollapse");

    function handleScroll() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (currentScroll > lastScrollTop) {
            footer.classList.add("hide"); // Hide footer when scrolling down
        } else {
            footer.classList.remove("hide"); // Show footer when scrolling up
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    }

    // Sidebar toggle event listener
    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", function() {
            document.body.classList.toggle("sidebar-collapsed");
        });
    }

    // Debounce scroll event
    let isScrolling;
    window.addEventListener("scroll", function() {
        clearTimeout(isScrolling);
        isScrolling = setTimeout(handleScroll, 50);
    });
</script>

<script src=" js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery-price-slider.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/counterup/jquery.counterup.min.js"></script>
<script src="js/counterup/waypoints.min.js"></script>
<script src="js/counterup/counterup-active.js"></script>
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<script src="js/morrisjs/raphael-min.js"></script>
<script src="js/morrisjs/morris.js"></script>
<script src="js/morrisjs/morris-active.js"></script>
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/jquery.charts-sparkline.js"></script>
<script src="js/sparkline/sparkline-active.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>

</html>