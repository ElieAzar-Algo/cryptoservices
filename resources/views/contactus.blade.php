@include('web-layout.navigation-bar')
@include('web-layout.css-link')
    <!-- ***** Contact Us Start ***** -->
    <section class="section colored" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Talk To Us</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Our team is honored to support you 24/24 please for any question don't hesitate to contact us by sending a message in the form presented below</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Keep in touch</h5>
                    <div class="contact-text">
                        
                        <br>Team of crypto services is ready to hear you anytime </p>
                        <p>Thank you.</p>
                    </div>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action={{route('message')}} method="post">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                            @csrf
                              
                                  @auth
                                 <input type='text' hidden name="userid" value={{Auth::id()}}/>
                                <input name="name" type="text" readonly value="{{Auth::user()->name}}" class="form-control" id="name" placeholder="Full Name" required="">

                                @else
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">

                                @endauth
                            
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              
                                  @auth
                                <input name="email" type="email"  readonly value="{{Auth::user()->email}}"  class="form-control" id="email" placeholder="E-Mail Address" required="">

                                  @else
                                <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address" required="">

                                  @endauth
                              
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
    @include('web-layout.footer')

@include('web-layout.js-link')