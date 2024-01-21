<?php

use App\Http\Controllers\user\CorporateController;
use App\Http\Controllers\user\DepositController;
use App\Http\Controllers\user\FeedBackController;
use App\Http\Controllers\user\FlightController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\MerchandiseController;
use App\Http\Controllers\user\OtherserviceController;
use App\Http\Controllers\user\PageController;
use App\Http\Controllers\user\TransactionsController;
use App\Http\Controllers\user\Usercontroller;
use App\Http\Controllers\user\VisaApplicationController;

use Illuminate\Support\Facades\Route;



// KYC CONTAINER
Route::post('/kyc-store', [Usercontroller::class, 'storeKyc'])->name('kyc-store-page');


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified', 'checkBanned']], function () {
    Route::get('', [HomeController::class, 'index'])->name('dashboard-page');
    Route::get('/kyc', [HomeController::class, 'KYC'])->name('kyc-page');
    Route::put('/profile_update/{id}', [HomeController::class, 'update_profile'])->name('update-profile-page');
    Route::get('/manage', [TransactionsController::class, 'TransactionHistory'])->name('manage-page');
    Route::get('/initiator', [PageController::class, 'Initiator'])->name('initiator-page');
    Route::get('/help', [PageController::class, 'helps'])->name('help-page');
    Route::get('/setting', [HomeController::class, 'Setting'])->name('setting-page');
    Route::get('/profile', [HomeController::class, 'Profile'])->name('profile-page');
    Route::get('/deposit', [PageController::class, 'deposit'])->name('deposit-page');
    Route::get('/flight',  [PageController::class, 'flight'])->name('flight-page');
    Route::get('/pay-school-fee', [PageController::class, 'pay_school_fee'])->name('pay_school_fee-page');
    Route::get('/others-payment', [PageController::class, 'OthersPayment'])->name('others-page');
    Route::get('/add/flutter', [Usercontroller::class,  'addBalance'])->name('add.balance');

    //  deposit payment
    Route::post('/payment/initialize', [DepositController::class, 'initialize'])->name('deposit.payment');
    Route::get('/payment/callback', [DepositController::class, 'handlecallback'])->name('callback');

    Route::group(['middleware'=> ['checkkyc']], function (){
        // user editing
        Route::post('/feedback', [FeedBackController::class, 'StoreFeedBack'])->name('feedback');

        //  pages 

        // flight controller
        Route::get('/flight/International', [FlightController::class, 'InternationalFlight'])->name('international-flight-page');
        Route::get('/flight/Local', [FlightController::class, 'LocalFlight'])->name('local-flight-page');
        Route::post('/flight/Local/store', [FlightController::class, 'flightLocalBooking'])->name('local-store');
        Route::post('/flight/International/store', [FlightController::class, 'flightInternationalBooking'])->name('international-store');
        // Route::post('/flight/pay', [FlightController::class, 'flightsPaymentAction'])->name('flightpayment');
        // Route::get('/flight/callback', [FlightController::class, 'handlecallback'])->name('callback');



        // Tuition Payment
        Route::get('/tuition/wire-transfer', [PageController::class, 'wireTransfer'])->name('wire-transfer');
        Route::post('/tuition/wire-transfer/store', [PageController::class, 'tuitionviaTransferStoreSession'])->name('wire-transfer-store');
        Route::post('/tuition/store', [PageController::class, 'tuitionviaTransferStore'])->name('wire-transferstore');
        Route::get('/tuition/wire-transfer/payment', [PageController::class, 'tuitionPaymentWireView'])->name('wire-transfer-paymentView');
        Route::post('/tuition/wiretransfer/payment', [PageController::class, 'getPaymentWire'])->name('wire-transfer-payment');
        Route::get('/tuition/payment/callback', [PageController::class, 'paymentCallback'])->name('tuition-wiretransfer-callback');

        Route::get('/tuition/school-portal', [PageController::class, 'payschoolPortal'])->name('school-portal');
        Route::post('/tuition/portal', [PageController::class, 'payschoolPortalStore'])->name('store-portal');
        Route::post('/tuition/portalpay', [PageController::class, 'paymentTuiton'])->name('portal-tuiton');
        Route::get('/tuition/payment', [PageController::class, 'tuitionpaymentView'])->name('portal-payment');
        Route::post('/tuition/pay', [PageController::class, 'getPayment'])->name('tuition-pay');
        Route::get('/tuition/pay/callback', [PageController::class, 'handlecallback'])->name('tuition-callback');

        // corporate service subtitle
        Route::post('/corporate/store', [CorporateController::class, 'store'])->name('store-page');
        Route::get('/corporate-service', [CorporateController::class, 'Corporate'])->name('corporate-service-page');
        Route::get('/corporate-service/payment', [CorporateController::class, 'paymentPay'])->name('corporate-payment-page');
        Route::post('/corporate-service/initiatePayment', [CorporateController::class, 'CorporatePayment'])->name('corporate-payment');
        Route::get('/corporate-service/Payment/callback', [CorporateController::class, 'handlecallback'])->name('corporate-payment-callback');



        // Merchanndise controller
        Route::get('/merchandise-payment', [MerchandiseController::class, 'Merchandise'])->name('merchandise-page');
        Route::get('/merchandise/pay', [MerchandiseController::class, 'MerchandisePay'])->name('merchandise-pay');
        Route::post('/merchandise/store', [MerchandiseController::class, 'merchandiseStore'])->name('merchandise-store');
        Route::post('/merchandise/initiate', [MerchandiseController::class, 'MerchandisePayment'])->name('merchandise-payment');
        Route::get('/merchandise/cellback', [MerchandiseController::class, 'handlecallback'])->name('merchandise-cellback');


        // Other service
        Route::get('/otherservice', [PageController::class, 'Otherservice'])->name('otherservice-page');
        Route::post('/otherservice/store', [OtherserviceController::class, 'storeOtherservice'])->name('otherservice-store');
        Route::get('/otherservice/pay', [OtherserviceController::class, 'otherPay'])->name('otherservice-pay');
        Route::post('/otherservice/payment', [OtherserviceController::class, 'otherservicePayment'])->name('otherservice-payment');
        Route::get('/otherservice/pay/callback', [OtherserviceController::class, 'otherservicePayCallback'])->name('otherservice-pay-callback');


        // visa route
        Route::get('/visa-fee-payment', [VisaApplicationController::class, 'Vise'])->name('visa-page');
        Route::get('/canada_visa', [VisaApplicationController::class, 'CanadaVisa'])->name('canada-page');
        Route::get('/us_visa', [VisaApplicationController::class, 'UsVisa'])->name('us-page');
        Route::get('/redirect', [VisaApplicationController::class, 'redirect'])->name('redirect');


        // payment 
        Route::get('/pay', [VisaApplicationController::class, 'usPay'])->name('pay-page');
        Route::post('/application', [VisaApplicationController::class, 'storeApplication'])->name('application-store');
        Route::post('/payment/initiate', [VisaApplicationController::class, 'initiatePayment'])->name('initiate-page');
        Route::get('/payment/webhook', [VisaApplicationController::class, 'handleWebhook'])->name('paystack.webhook');

        
    });


    Route::get('optimize', function () {
        \Illuminate\Support\Facades\Artisan::call('optimize');
        return 1;
    });
    Route::get('clear', function () {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return 1;
    });
});
