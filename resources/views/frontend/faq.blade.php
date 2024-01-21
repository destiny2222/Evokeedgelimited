@extends('layout.main')
@section('content')
    
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <h2 class="policy_title">FAQ</h2>
                {{-- <p>Frequently Asked Questions</p> --}}
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start FAQ Area -->
        <section class="faq-area ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="faq-content text-center">
                            <h2 class="policy_title">Frequently Asked Questions</h2>
                            {{-- <div class="bar"></div> --}}
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="faq-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                     What is Evokeedge Limited?
                                    </a>

                                    <p class="accordion-content show">
                                        It is a platform that helps people across Africa and overseas complete cross-border reimbursement for products, goods, and services. 
                                    </p>
                                </li>
                                
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        How do I get started? 
                                    </a>

                                    <p class="accordion-content">
                                        Please click <span class="click-here"><a href="">here</a></span> 
                                        to get started. We will need to ask you a few questions about you before your account is set up. 
                                    </p>
                                </li>
                                
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        How does it work? 
                                    </a>

                                    <p class="accordion-content">You can easily make payments by uploading your payments instructions .</p>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        What countries can I make remit to?  
                                    </a>

                                    <p class="accordion-content"> 
                                        All European countries, America, Canada,United Kingdom, Africa, 
                                        Australia and others with exceptions to the following countries like North Korea, Russia and Belarus. 
                                    </p>
                                </li>
                                
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        Why do I need to provide documentation on my ID or address to support my application?  
                                    </a>

                                    <p class="accordion-content">
                                        We are required to carry out a KYC (Know Your Customer) check which is NOT a credit check just to identify you and where you live. 
                                    </p>
                                </li>
                                
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        How long does it take for my transaction to be processed and how do I know when it has been processed?
                                    </a>

                                    <p class="accordion-content">Processing of Transaction takes between 2-5 working days, this also depends on the transaction type. Also once your payment is received we will initiate the transaction and send proof of payment and other details via email.</p>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        Does Evokeedge have a transaction limit? 
                                    </a>

                                    <p class="accordion-content">There are no transaction limits, but the minimum deposit is $50.</p>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        How do I pay for account balance top ups? 
                                    </a>

                                    <p class="accordion-content">
                                        It’s easy, by clicking on the Deposit and you can use any of the medium of payment you want
                                    </p>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        Is Evoke edge safe and secure?
                                    </a>

                                    <p class="accordion-content">Yes! 
                                        With our secured performs we have ensured clients details are not share except a client shares his own details to a third party.
                                        
                                    </p>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        If I have questions, who do I contact for answers?
                                    </a>

                                    <p class="accordion-content">Contact customer support through email at <span class="click-here"><a href="">sales@evokeedgelimted.com </a></span>or reach out to the live support on our website. 
                                        
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                
            </div>
        </section>
    <!-- End FAQ Area -->
@endsection