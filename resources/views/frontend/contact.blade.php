@extends('layout.main')
@section('content')
    
        
        <!-- Start Page Title Area -->
        <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="page-title-content">
                    <h2 class="policy_title">Contact Us</h2>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Contact Area -->
        <section class="contact-area ptb-70">
            <div class="container">
                <div class="section-title">
                    <h2 class="policy_title">Leave  us a message and we'll be right with you!</h2>
                    <div class="bar"></div>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span>Address</span>
                                    <p>
                                        66A Lucky Way Road, Ikpoba hill, Benin city, Edo state, Nigeria.
                                    </p>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <span>Email</span>
                                    <a href="#"><span class="__cf_email__ cf_email" >sales@evokeedgelimited.com</span></a>
                                </li>

                                {{-- <li>
                                    <div class="icon">
                                        <i class="fas fa-phone-volume"></i>
                                    </div>
                                    <span>Phone</span>
                                    <a href="tel:+2348143980684">+2348143980684</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="contact-form">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-map"><img src="assets/img/bg-map.png" alt="image"></div>
        </section>
        <!-- End Contact Area -->
@endsection


        
     