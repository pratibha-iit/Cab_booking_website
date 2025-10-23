<!-- Header-->
<!-- <header class="bg-dark py-5" id="main-header">
    <div class="container h-100 d-flex align-items-end justify-content-center w-100">
        <div class="text-center text-white w-100">
            <h1 class="display-4 fw-bolder mx-5">About Us</h1>
        </div>
    </div>
</header> -->
<section class="py-5">
    <div class="container">
        <div class="card rounded-0 card-outline card-purple shadow px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="card-body">
                    <h4>Contact Information</h4>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <p id="contact_number">9905879407</p>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp_number">WhatsApp Number</label>
                        <p id="whatsapp_number">7250850915</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <p id="email">ajitkr0458@gmail.com</p>
                    </div>
                    <div class="form-group">
                        <label for="facebook_id">Facebook ID</label>
                        <p id="facebook_id">https://www.facebook.com/profile.php?id=61561108149162&mibextid=ZbWKwL</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).scroll(function() { 
        $('#topNavBar').removeClass('bg-purple navbar-light navbar-dark bg-gradient-purple text-light')
        if($(window).scrollTop() === 0) {
           $('#topNavBar').addClass('navbar-dark bg-purple text-light')
        }else{
           $('#topNavBar').addClass('navbar-dark bg-gradient-purple ')
        }
    });
    $(function(){
        $(document).trigger('scroll')
    })
</script>
