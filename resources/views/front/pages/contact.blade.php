@extends('front.layout.layout')
@section('content')
<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Contact Us</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="index.html">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Contact-Page -->
<div class="page-contact u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="touch-wrapper">
                    <h1 class="contact-h1">Get In Touch With Us</h1>
                    @if(Session::has('success_message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong> <?php echo Session::get('success_message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                      @if($errors->any())
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error: </strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                    <form action="{{ url('contact') }}" method="post">@csrf
                        <div class="group-inline u-s-m-b-30">
                            <div class="group-1 u-s-p-r-16">
                                <label for="contact-name">Your Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact-name" class="text-field" placeholder="Name" name="name" value="{{ old('name') }}" required="">
                            </div>
                            <div class="group-2">
                                <label for="contact-email">Your Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="contact-email" class="text-field" placeholder="Email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact-subject">Subject
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="contact-subject" class="text-field" placeholder="Subject" name="subject" value="{{ old('subject') }}" required>
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact-message">Message:</label>
                            <span class="astk">*</span>
                            <textarea class="text-area" id="contact-message" name="message" required="">{{ old('message') }}</textarea>
                        </div>
                        <div class="u-s-m-b-30">
                            <button type="submit" class="button button-outline-secondary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="information-about-wrapper">
                    <h1 class="contact-h1">Information About Us</h1>
                    <p>
                        Welcome to our technical channel "Stack Developers" where you will find tutorials to learn Laravel PHP Framework from basic to expert level. 
                    </p>
                    <p>
                        In this channel, we share tutorials with complete code so that beginners can easily understand it. Here, you will learn everything from Laravel 9 basics to advanced level. Subscribe to our channel and update with the latest technology Laravel 9.
                    </p>
                    <p>
                        How Channel is Helpful for Beginners:<br>
                        1. We provide special tutorials for beginners to easily understand the technology.<br>
                        2. Get step-by-step tutorials on Laravel 6 / Laravel 7 / Laravel 8 / Laravel 9. <br>
                        3. We offer live sessions to more clarity for students.
                        4.  Resolve queries in live sessions.<br>
                        5. Connect with users via social platforms like Facebook, LinkedIn, Instagram, etc.<br>
                    </p>
                    
                </div>
                <div class="contact-us-wrapper">
                    <h1 class="contact-h1">Contact Us</h1>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Location</h6>
                        <span>Stack Developers</span>
                        <span>India</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Email</h6>
                        <span>info@sitemakers.in</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Telephone</h6>
                        <span>+111-222-333</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-s-p-t-80">
        <div id="map"></div>
    </div>
</div>
<!-- Contact-Page /- -->
@endsection