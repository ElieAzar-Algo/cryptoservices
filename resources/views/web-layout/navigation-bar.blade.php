<head>
    <title>Crypto Services- by Elie Azar</title>
    </head>
<header class="header-area header-sticky">
   
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo" >
                        <img class="headlogo" style="padding:10px;  border-radius: 90px"src="assets/images/lazarusfx-logo.jpeg" width="78" height="78" alt="Softy Pinko"/>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" >Home</a></li>
                        <li><a href="#home-services">Services</a></li>
                        <li><a href="#work-process">Work Process</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#pricing-plans">Pricing Tables</a></li>
                        <li><a href="/contactus">Contact Us</a></li>
                        <li><a href="#features">About</a></li>

                        @auth
                        <li><a href={{route('myprofile')}}>My Profile</a></li>
                        <li><a href={{route('logout')}}>Logout</a></li>
                        @else
                        <li><a href="/admin/login">Login</a></li>
                        <li><a href="/registerform">Register</a></li>
                        @endauth
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>