<?php

use App\Http\Controllers\user\CorporateController;
use App\Http\Controllers\user\DepositController;
use App\Http\Controllers\user\FeedBackController;
use App\Http\Controllers\user\FlightController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\MerchandiseController;
use App\Http\Controllers\user\OtherserviceController;
use App\Http\Controllers\user\PageController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\TransactionsController;
use App\Http\Controllers\user\Usercontroller;
use App\Http\Controllers\user\VisaApplicationController;

use Illuminate\Support\Facades\Route;






Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified', 'checkBanned']], function () {
    Route::get('', [HomeController::class, 'index'])->name('dashboard-page');
    Route::get('/kyc', [HomeController::class, 'KYC'])->name('kyc-page');
    Route::get('/profile', [HomeController::class, 'Profile'])->name('profile-page');
   
   
    
   

    // KYC CONTAINER
    Route::post('/kyc-store', [Usercontroller::class, 'storeKyc'])->name('kyc-store-page');

    Route::group(['middleware'=> ['checkkyc']], function (){
        // user editing
        Route::post('/feedback', [FeedBackController::class, 'StoreFeedBack'])->name('feedback');

        //
        Route::put('/profile_update/{id}', [HomeController::class, 'update_profile'])->name('update-profile-page');
        Route::get('/manage', [TransactionsController::class, 'TransactionHistory'])->name('manage-page');
        
        Route::get('/help', [Usercontroller::class, 'helps'])->name('help-page');
        Route::get('/setting', [HomeController::class, 'Setting'])->name('setting-page');
    
        Route::get('/deposit', [Usercontroller::class, 'deposit'])->name('deposit-page');
        Route::get('/flight',  [Usercontroller::class, 'flight'])->name('flight-page');
        Route::get('/initiator', [Usercontroller::class, 'Initiator'])->name('initiator-page');
        Route::get('/pay-school-fee', [Usercontroller::class, 'pay_school_fee'])->name('pay_school_fee-page');
        Route::get('/others/services', [Usercontroller::class, 'OthersPayment'])->name('others.page');

        //  deposit payment
        Route::get('/add/flutter', [Usercontroller::class,  'addBalance'])->name('add.balance');
        Route::get('/add/bank', [Usercontroller::class, 'addBalanceBank'])->name('add.balance.bank');
        Route::post('/payment/initialize', [DepositController::class, 'initialize'])->name('deposit.payment');
        Route::get('/payment/initialize/callback', [DepositController::class, 'handlecallback'])->name('deposit.callback');
        Route::post('/payment/initialize/transfer', [DepositController::class, 'initializeBankTransfer'])->name('pay.transfer');


        // Tuition Payment
        Route::post('/tuition/portal', [Usercontroller::class, 'payschoolPortalStore'])->name('store-portal');
        Route::get('/tuition/school/portal', [Usercontroller::class, 'payschoolPortal'])->name('school.portal');
        Route::post('/tuition/school/pay', [Usercontroller::class, 'paymentTuiton'])->name('portal.tuiton');
        Route::get('/tuition/payment', [Usercontroller::class, 'tuitionpaymentView'])->name('portal-payment');
        Route::post('/tuition/pay', [Usercontroller::class, 'getPayment'])->name('tuition-pay');
        Route::get('/payment/callback', [Usercontroller::class, 'callback'])->name('tuition.callback');

        Route::get('/tuition/wire-transfer', [Usercontroller::class, 'wireTransfer'])->name('tuition.wire.transfer');
        Route::post('/tuition/wire/store', [Usercontroller::class, 'tuitionviaTransfer'])->name('tuition.wire.transfer.store');
        Route::get('/tuition/wire/payment', [Usercontroller::class, 'tuitionwirepaymentView'])->name('tuition.wire.payment');
        Route::post('/tuition/wire/pay', [Usercontroller::class, 'tuitionwire'])->name('tuition.wire.store');
        
        // visa route
        Route::get('/visa-fee', [Usercontroller::class, 'Vise'])->name('visa-page');
        Route::get('/canada_visa', [Usercontroller::class, 'CanadaVisa'])->name('canada-page');
        Route::get('/us_visa', [Usercontroller::class, 'UsVisa'])->name('us-page');
        // Route::get('/redirect', [VisaApplicationController::class, 'redirect'])->name('redirect');

        Route::get('/application/pay', [Usercontroller::class, 'usPay'])->name('pay-page');
        Route::post('/application/store', [Usercontroller::class, 'storeApplication'])->name('application-store');
        Route::post('/application/payment/initiate', [VisaApplicationController::class, 'initiatePayment'])->name('visa.initiate');
        Route::get('/application/payment/webhook', [VisaApplicationController::class, 'handleWebhook'])->name('handle.callback');


        // flight controller
        Route::get('/flight/International', [Usercontroller::class, 'InternationalFlight'])->name('international-flight-page');
        Route::get('/flight/Local', [Usercontroller::class, 'LocalFlight'])->name('local-flight-page');
        Route::post('/flight/Local/store', [Usercontroller::class, 'flightLocalBooking'])->name('local-store');
        Route::post('/flight/International/store', [Usercontroller::class, 'flightInternationalBooking'])->name('international-store');


        // corporate service subtitle
        Route::post('/corporate/store', [Usercontroller::class, 'store'])->name('store-page');
        Route::get('/corporate/service', [Usercontroller::class, 'Corporate'])->name('corporate-service-page');
        Route::get('/corporate/service/payment', [Usercontroller::class, 'paymentPay'])->name('corporate-payment-page');
        Route::post('/corporate/service/initiate/Payment', [PaymentController::class, 'CorporatePayment'])->name('corporate-payment');
        Route::get('/corporate/service/initiate/callback', [PaymentController::class, 'handlecallback'])->name('corporate.payment.callback');

        
        // Merchanndise controller
        Route::get('/merchandise', [Usercontroller::class, 'Merchandise'])->name('merchandise.page');
        Route::get('/merchandise/pay', [Usercontroller::class, 'MerchandisePay'])->name('merchandise.pay');
        Route::post('/merchandise/store', [Usercontroller::class, 'merchandiseStore'])->name('merchandise.store');
        Route::post('/merchandise/initiate', [PaymentController::class, 'MerchandisePayment'])->name('merchandise.payment');
        Route::get('/merchandise/cellback', [PaymentController::class, 'Merchandisecallback'])->name('merchandise.cellback');


        // Other service
        Route::get('/otherservice', [Usercontroller::class, 'Otherservice'])->name('otherservice-page');
        Route::post('/otherservice/store', [Usercontroller::class, 'storeOtherservice'])->name('otherservice-store');
        Route::get('/otherservice/pay', [Usercontroller::class, 'otherPay'])->name('otherservice.pay');
        Route::post('/otherservice/payment', [PaymentController::class, 'otherservicePayment'])->name('otherservice.payment');
        Route::get('/otherservice/pay/callback', [PaymentController::class, 'otherservicePayCallback'])->name('otherservice-pay.callback');
 
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
