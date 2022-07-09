
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    دسته بندی ها
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            کارت ویزیت
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            تراکت
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            بنر
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            وکتور
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    لینک ها
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            درباره ما
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            تماس با ما
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            نحوه خرید
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="mtext-106 cl7 hov-cl1 trans-04">
                            قوانین
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-12 col-lg-6 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    ارتباط با ما
                </h4>

                <p class="mtext-106 cl7" style="line-height: 40px">
                    بدلیل شرایط حساس کنونی و شیوع کرونا تیم سون لرن تا اطلاع ثانوی به صورت دورکار فعالیت دارد.
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>


<!--===============================================================================================-->
<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/bootstrap/js/popper.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="/vendor/daterangepicker/moment.min.js"></script>
<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/vendor/slick/slick.min.js"></script>
<script src="/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "به علاقه مندی ها اضافه گردید!", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

</script>
<!--===============================================================================================-->
<script src="/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="/js/main.js"></script>

</body>
</html>