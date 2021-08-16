    <!-- Javascript -->
    
    <!-- typig-text-->
    <!-- <script>
        const typedTextSpan = document.querySelector(".typed-text");
        const cursorSpan = document.querySelector(".cursor");

        const textArray = ["Selamat Datang"];
        const typingDelay = 150;
        const erasingDelay = 10;
        const newTextDelay = 100; // Delay between current and next text
        let textArrayIndex = 0;
        let charIndex = 0;

        function type() {
            if (charIndex < textArray[textArrayIndex].length) {
                if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                setTimeout(erase, newTextDelay);
            }
        }

        function erase() {
            if (charIndex > 0) {
                // add class 'typing' if there's none
                if (!cursorSpan.classList.contains("typing")) {
                    cursorSpan.classList.add("typing");
                }
                typedTextSpan.textContent = textArray[textArrayIndex].substring(0, 0);
                charIndex--;
                setTimeout(erase, erasingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                textArrayIndex++;
                if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                setTimeout(type, typingDelay);
            }
        }

        document.addEventListener("DOMContentLoaded", function () { // On DOM Load initiate the effect
            if (textArray.length) setTimeout(type, newTextDelay + 250);
        });
    </script> -->
    <!-- //typig-text-->
    
    <!-- theme switch js (light and dark)-->
    <script src="<?php echo base_url('assets/frontend/js/theme-change.js'); ?>"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        // $(document).ready(function () {
        //     // Now to start autoTyping just call the autoType function with the 
        //     // class of outer div
        //     // The second paramter is the speed between each letter is typed.   
        //     autoType(".type-js", 200);
        // });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- Banner Animated Background -->
    <script src="<?php echo base_url('assets/frontend/js/jquery-3.3.1.min.js'); ?>"></script>
    <script>
        var lFollowX = 0,
            lFollowY = 0,
            x = 0,
            y = 0,
            friction = 1 / 60;

        function animate() {
            x += (lFollowX - x) * friction;
            y += (lFollowY - y) * friction;
            translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

            $('.banner-image').css({
                '-webit-transform': translate,
                '-moz-transform': translate,
                'transform': translate
            });
            window.requestAnimationFrame(animate);
        }

        $(window).on('mousemove click', function (e) {
            var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
            var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
            lFollowX = (40 * lMouseX) / 100;
            lFollowY = (20 * lMouseY) / 100;
        });

        animate();
    </script>
    <!-- //Banner Animated Background -->

    <!-- Slider Career-->
    <script src="<?php echo base_url('assets/frontend/js/owl.carousel.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $("#owl-demo2").owlCarousel({
                loop: true,
                nav: false,
                margin: 50,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplaySpeed: 500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    736: {
                        items: 1,
                        nav: false
                    },
                    991: {
                        items: 2,
                        margin: 30,
                        nav: false
                    },
                    1080: {
                        items: 3,
                        nav: false
                    }
                }
            })
        })
    </script>
    <!-- //Slider Career -->

    <!-- Menu Bar JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //Menu Bar JS -->

    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>

    <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
    <!-- //Javascript -->
</body>

</html>