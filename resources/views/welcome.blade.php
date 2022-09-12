<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="fina project" content="">
    <meta name="Elie Azar" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Crypto Services- by Elie Azar</title>
    <!-- Additional CSS Files -->
  @include('web-layout.css-link')
   

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
   
    @include('web-layout.navigation-bar')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    @include('web-layout.header')
   
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->

                        {{-- map the services here --}}
                        @foreach ($services as $service)
                                  
                        
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" 
                        id="home-services"
                        data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                        <a href='{{route('service',"id=$service->id")}}'>    
                            <div class="features-small-item" >
                                <div class="icon">
                                    <i><img class="headlogo" src="http://localhost:8000/storage/{{$service->image}}"  width="90px" height="90px" alt=""></i>
                                </div>
                                <h5 class="features-title">{{$service->name}}</h5>
                                <p>{{$service->description}}</p>
                            </div>
                        </a>    
                        </div>
                        @endforeach
           
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Let’s discuss about you investment plan</h2>
                    </div>
                    <div class="left-text">
                        <p>Investing in crypto assets is risky but also potentially extremely profitable. Cryptocurrency is a good investment if you want to gain direct exposure to the demand for digital currency. A safer but potentially less lucrative alternative is buying the stocks of companies with exposure to cryptocurrency.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Coins Available</h1>
                            <p>Coins listed below are supported by our services</p>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                @foreach($coins as $coin)

                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href={{route('coin',"id=$coin->id")}} class="mini-box">
                            <i><img src="http://localhost:8000/storage/{{$coin->image}}"  width="60px" height="60px" alt=""></i>
                            <strong>{{$coin->name}}</strong>
                            <span>{{$coin->value}}USD/coin</span>
                        </a>
                    </div>
                    @endforeach
     
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Testimonials Start ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">What do they say?</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><img src="assets/images/testimonial-icon.png" alt=""></i>
                            <p>I have earned my first 1000 USD from crypto trading using the signal service provided by Elie Azar and his team. THANK YOU GYUS</p>

                            <div class="user-image">
                                {{-- <img src="http://placehold.it/60x60" alt=""> --}}
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Dr.Noura Rifai </h3>
                                <span>Managing Director</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->
                
                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><img src="assets/images/testimonial-icon.png" alt=""></i>
                            <p>Big Thanks for Elie Azar for providing this amazing services, I really got impressed of what that team has developed to faciliate our trading journey</p>
                            <div class="user-image">
                                {{-- <img src="http://placehold.it/60x60" alt=""> --}}
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Dr. Mario Maroun</h3>
                                <span>Digital Marketer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->
                
                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><img src="assets/images/testimonial-icon.png" alt=""></i>
                            <p>I am so happy with using your services and i really encourage all this websites visitors to subscribe for the AI bot service which is incredible.</p>
                            <div class="user-image">
                                {{-- <img src="http://placehold.it/60x60" alt=""> --}}
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Dr. Ahmad Kassem</h3>
                                <span>Website Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pricing-plans">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Pricing Plans</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                       <p>Below there is a list of priced services already planned for you</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Pricing Item Start ***** -->
                @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">{{$service->name}}</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">$</span>
                                <span class="price">{{$service->price}}</span>
                                <span class="period">monthly</span>
                            </div>
                            <ul class="list">
                                <li class="active">{{$service->description}}</li>
                              
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="main-button">Purchase Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- ***** Pricing Item End ***** -->

            </div>
        </div>
    </section>
    <!-- ***** Pricing Plans End ***** -->

    <!-- ***** Counter Parallax Start ***** -->
    <section class="counter">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong>126</strong>
                            <span>Projects</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-top">
                            <strong>63</strong>
                            <span>Happy Clients</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong>18</strong>
                            <span>Awards Wins</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item">
                            <strong>27</strong>
                            <span>Countries</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Counter Parallax End ***** -->   

    
    <!-- ***** Footer Start ***** -->
  @include('web-layout.footer')
  @include('web-layout.js-link')
    

  </body>
</html>