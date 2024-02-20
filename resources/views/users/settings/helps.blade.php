@extends('layout.master')
@section('content')
@section('page-title', 'Help center')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->
<div class="row justify-content-center">
    <div class="col-12 col-xl-10">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title m-auto text-center">Customer Support <br> <span style="font-size: 12px">How can we help you?</span></h3>
            </div>
            <div class="card-body">
                <div class="panel panel-primary">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs justify-content-around">
                                <li><a href="#tab1" class="active" data-bs-toggle="tab">Faq</a></li>
                                <li><a href="#tab2" data-bs-toggle="tab">Enquire</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default active">
                                        <div class="panel-heading " role="tab" id="headingOne1">
                                            <h4 class="panel-title">
                                                <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                    What is Evokeedge Limited?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1">
                                            <div class="panel-body">
                                                It is a platform that helps people across Africa and overseas complete cross-border reimbursement for products, goods, and services.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="headingTwo2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                    How do I get started?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                                            <div class="panel-body">
                                                Please click <a href="/register">here</a> to get started. We will need to ask you a few questions about you before your account is set up
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                    What countries can I make remit to?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                All European countries, America, Canada,United Kingdom, Africa, Australia and others with exceptions to the  countries like North Korea, Russia and Belarus.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading4">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                    Why do I need to provide documentation on my ID or address to support my application?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                You can easily make payments by uploading your payments instructionsWe are required to carry out a KYC (Know Your Customer) check which is NOT a credit check just to identify you and where you live.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                    How long does it take for my transaction to be processed and how do I know when it has been processed?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Processing of Transaction takes between 2-5 working days, this also depends on the transaction type. Also once your payment is received we will initiate the transaction and send proof of payment and other details via email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                                    Does Evokeedge have a transaction limit?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                There are no transaction limits, but the minimum deposit is $50. 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                    How do I pay for account balance top ups?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                It’s easy, by clicking on the Deposit and you can use any of the medium of payment you want
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                                    Is Evoke edge safe and secure? 
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Yes! We  ensured clients details are not share except a client shares his own details to a third party
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default mt-2">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                                    If I have questions, who do I contact for answers?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Contact customer support through email at sales@evokeedgelimted.com or reach out to the live support on our website. 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- PANEL-GROUP -->
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">If you have a question or just want to get in touch, use the form below. We look forward to
                                            hearing from you!</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('feedback') }}" method="post">
                                            @csrf
                                            <div class="">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Full name</label>
                                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Full name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-floating floating-label1">
                                                        <textarea class="form-control" placeholder="Message" name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                                                        <label for="floatingTextarea2">Message</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <button class="btn btn-primary mt-4 mb-0" type="submit">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL-END -->
</div>   
   
@endsection