<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AccountTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->group(function() {
    Route::get('/', [GeneralController::class, 'home'])->name('home');
    Route::get('/account-opening', [GeneralController::class, 'accountOpening'])->name('register');
    Route::post('/account-opening', [GeneralController::class, 'registerPost'])->name('registerPost');
    Route::get('/login-account', [GeneralController::class, 'loginAccount'])->name('login');
    Route::post('/login-account', [GeneralController::class, 'loginPost'])->name('loginPost');
    Route::get('/reset-password', [GeneralController::class, 'resetPassword'])->name('resetPassword');
    Route::get('/cooperate', [GeneralController::class, 'cooperate'])->name('cooperate');
    Route::get('/savings', [GeneralController::class, 'savings'])->name('savings');
    Route::get('/deposit', [GeneralController::class, 'deposit'])->name('deposit');
    Route::get('/savings-guide', [GeneralController::class, 'savingsGuide'])->name('savingsGuide');
});


Route::middleware('auth')->group(function() {
    Route::get('logout', [GeneralController::class, 'logout'])->name('logout');
    Route::get('dashboard', [GeneralController::class, 'dashboard'])->name('dashboard');
    Route::get('customer/account', [GeneralController::class, 'customerAccount'])->name('customerAccount');
    Route::post('customer/account', [GeneralController::class, 'customerAccountPost'])->name('customerAccountPost');
    Route::get('customer/funds-recovery', [GeneralController::class, 'fundsRecovery'])->name('fundsRecovery');
    Route::post('customer/funds-recovery', [GeneralController::class, 'fundsRecoveryPost'])->name('fundsRecoveryPost');
    Route::post('customer/funds-recovery-2', [GeneralController::class, 'fundsRecoveryPost2'])->name('fundsRecoveryPost2');
    Route::get('customer/deposit', [GeneralController::class, 'customerDeposit'])->name('customerDeposit');
    Route::post('customer/deposit', [GeneralController::class, 'customerDepositPost'])->name('customerDepositPost');
    Route::get('transactions', [GeneralController::class, 'transactions'])->name('transactions');
    Route::get('transactions-single/{id}', [GeneralController::class, 'transactionsSingle'])->name('transactionsSingle');
    Route::post('transactions-single/{id}', [GeneralController::class, 'transactionsSinglePost'])->name('transactionsSinglePost');
    Route::get('digital-wallets', [AccountTypeController::class, 'digitalWallets'])->name('digitalWallets');

    //account top up
    Route::get('low-interest', [AccountTypeController::class, 'lowIntrestInterface'])->name('low-interest');
    Route::get('real-esate-investments', [AccountTypeController::class, 'realInvestmentsInterface'])->name('real-esate-investments');
    Route::get('account-topup/{action?}', [AccountTypeController::class, 'accountTopupInterface'])->name('account-topup');
    Route::get('comfrim-deposit/{unique_id?}', [AccountTypeController::class, 'comfrimDeposit'])->name('comfrim-deposit');
    Route::get('make-investment/{unique_id?}', [AccountTypeController::class, 'makeInvestmentInterface'])->name('make-investment');
    Route::post('accountTopup', [AccountTypeController::class, 'depositToAccount'])->name('accountTopup');
    Route::post('depositProofUpload/{unique_id?}', [AccountTypeController::class, 'uploadDepositToAccountProof'])->name('depositProofUpload');
    Route::post('walletTopupProof/{unique_id?}', [AccountTypeController::class, 'uploadWalletTopupProof'])->name('walletTopupProof');
    Route::get('fund-wallet/{unique_id?}', [AccountTypeController::class, 'fundWalletInterface'])->name('fund-wallet');
    Route::get('comfirm-topup/{unique_id?}', [AccountTypeController::class, 'comfirmWalletTopupInterface'])->name('comfirm-topup');
    Route::post('add-investment', [AccountTypeController::class, 'makeInvestment'])->name('add-investment');
    Route::post('fundWallet', [AccountTypeController::class, 'fundWallet'])->name('fundWallet');
    Route::post('coinExchange', [AccountTypeController::class, 'coinExchange'])->name('coinExchange');
    Route::get('list-investments', [AccountTypeController::class, 'listAllInvestments'])->name('list-investments');
    Route::get('coin-exchange', [AccountTypeController::class, 'coinExchangeInterface'])->name('coin-exchange');


});
