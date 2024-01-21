@extends('layout.master')
@section('content')
    <div class="container">
        <div class="help_content_service">
            <div class="custom_service">
                <span>Customer Support</span>
                <h4>How can we help you?</h4>
            </div>
        </div>
        <div class="breadcrubm">
            <ul>
                <li class="tab_bread">
                    <a href="#faq_ask">Faq</a>
                </li>
                <li class="tab_bread">
                    <a href="#mail">
                        Enquire
                    </a>
                </li>
            </ul>
        </div>
        <div class="breadcrumb-content">
            <div class="content">
                <h1 class="faq-heading">Frequently Asked Questions</h1>
                <div class="faq-container">
                    <div class="faq-one">
                        <!-- faq question -->
                        <h1 class="faq-page">What is Evokeedge Limited?</h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>It is a platform that helps people across Africa and overseas complete cross-border reimbursement for products, goods, and services.</p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-two">
                        <!-- faq question -->
                        <h1 class="faq-page">How do I get started? </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>Please click <a href="/register">here</a> to get started. We will need to ask you a few questions about you before your account is set up</p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-three">
                        <!-- faq question -->
                        <h1 class="faq-page">How does it work? </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>You can easily make payments by uploading your payments instructions </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-four">
                        <!-- faq question -->
                        <h1 class="faq-page">What countries can I make remit to?  </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>
                                All European countries, America, Canada,United Kingdom, Africa, Australia and others with exceptions to the following countries like North Korea, Russia and Belarus. 
                            </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-five">
                        <!-- faq question -->
                        <h1 class="faq-page">Why do I need to provide documentation on my ID or address to support my application? </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>
                                We are required to carry out a KYC (Know Your Customer) check which is NOT a credit check just to identify you and where you live.     
                            </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-six">
                        <!-- faq question -->
                        <h1 class="faq-page">How long does it take for my transaction to be processed and how do I know when it has been processed? </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>
                                Processing of Transaction takes between 2-5 working days, this also depends on the transaction type. Also once your payment is received we will initiate the transaction and send proof of payment and other details via email.    
                            </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-seven">
                        <!-- faq question -->
                        <h1 class="faq-page">Does Evokeedge have a transaction limit?  </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>There are no transaction limits, but the minimum deposit is $50. </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-seven">
                        <!-- faq question -->
                        <h1 class="faq-page">How do I pay for account balance top ups?  </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>It’s easy, by clicking on the Deposit and you can use any of the medium of payment you want </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-seven">
                        <!-- faq question -->
                        <h1 class="faq-page">Is Evoke edge safe and secure? </h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>Yes! 
                                With our secured performs we have ensured clients details are not share except a client shares his own details to a third party
                            </p>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <div class="faq-eight">
                        <!-- faq question -->
                        <h1 class="faq-page">If I have questions, who do I contact for answers?</h1>
                        <!-- faq answer -->
                        <div class="faq-body">
                            <p>
                                Contact customer support through email at sales@evokeedgelimted.com or reach out to the live support on our website. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mail" class="contact_info_mail content">
                <div class="mail_inbox">
                    <img src="{{ asset('assetss/mail.png') }}" alt="">
                    <p class="p-l-3 p-r-3">
                        If you have a question or just want to get in touch, use the form below. We look forward to
                        hearing from you!
                    </p>
                </div>
                <div class="contact_form">
                    <h2>Contact Us</h2>
                    <form action="{{ route('feedback') }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="name" class="contact_form_input" id="" placeholder="Full Name">
                        </div>
                        <div>
                            <input type="email" name="email" id="" placeholder="Email Address">
                        </div>
                        <div>
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <div style="text-align: center;">
                            <input type="submit" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const faqQuestions = document.getElementsByClassName("faq-page");

        for (let i = 0; i < faqQuestions.length; i++) {
            faqQuestions[i].addEventListener("click", function () {
                this.classList.toggle("faq-active");
                const faqAnswer = this.nextElementSibling;

                if (faqAnswer.style.display === "block") {
                    faqAnswer.style.display = "none";
                } else {
                    faqAnswer.style.display = "block";
                }
            });
        }
    });
</script>

