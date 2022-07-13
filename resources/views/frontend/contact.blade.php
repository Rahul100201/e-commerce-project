@extends('frontend.master')
@section('content')
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>Contact Us</h1>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>


    <section class="contact-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-placeholder"></i>
                        </div>
                        <h3>Address</h3>
                        <p><a href="#" target="_blank">284403, Lalitpur (U.P)</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-phone-ringing"></i>
                        </div>
                        <h3>Phone</h3>
                        <p><a href="tel:16798">Hotline: 16798</a></p>
                        <p><a href="tel:+1234567898">Tech support: 7084530151</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <h3>Email</h3>
                        <p><a
                                href="https://templates.envytheme.com/cdn-cgi/l/email-protection#533b363f3f3c1337213c373c7d303c3e"><span
                                    class="__cf_email__"
                                    data-cfemail="4a222f2626250a2e38252e2564292527">[email&#160;protected]</span></a></p>
                        <p><a href="#">Skype: ranshsoni1234@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <h3>Working Hours</h3>
                        <p>Sunday - Friday</p>
                        <p>8:00AM - 8:00PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <span class="sub-title">Get In Touch</span>
                        <h2>We want to provide you with a great experience</h2>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required
                                            data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" required
                                            data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile No.</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                                            required data-error="Please enter your phone number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" id="message" class="form-control" cols="30" rows="6" required
                                            data-error="Please enter your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="default-btn">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="contact-image text-center">
                        <img src="assets/img/contact.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29000.871802687398!2d78.39176407046008!3d24.6887803346344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3979bba7e5a1b16f%3A0xee0a601a1a0f3dd7!2sLalitpur%2C%20Uttar%20Pradesh%20284403!5e0!3m2!1sen!2sin!4v1648373863976!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <section class="facility-area bg-f7f8fa pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-free-shipping"></i>
                        </div>
                        <h3>Free Shipping</h3>
                        <p>Free shipping world wide</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-headset"></i>
                        </div>
                        <h3>Support 24/7</h3>
                        <p>Contact us 24 hours a day</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-secure-payment"></i>
                        </div>
                        <h3>Secure Payments</h3>
                        <p>100% payment protection</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-return-box"></i>
                        </div>
                        <h3>Easy Return</h3>
                        <p>Simple returns policy</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
