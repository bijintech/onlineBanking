<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\accountTypeModel;
use App\Models\accountDepositTransaction;
use App\Models\investmentTransactions;
use App\Models\currencyList;
use App\Models\estateInvestmentsModel;
use App\Models\userWallets;
use App\Models\walletTopUpTransaction;
use App\Models\coinExchangeModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Traits\Generics;

class AccountTypeController extends Controller
{
    //
    use Generics;
    function __construct(accountTypeModel $accountTypeModel, currencyList $currencyList, accountDepositTransaction $accountDepositTransaction, estateInvestmentsModel $estateInvestmentsModel, investmentTransactions $investmentTransactions, walletTopUpTransaction $walletTopUpTransaction, userWallets $userWallets){
       $this->accountTypeModel = $accountTypeModel;
       $this->currencyList = $currencyList;
       $this->accountDepositTransaction = $accountDepositTransaction;
       $this->estateInvestmentsModel = $estateInvestmentsModel;
       $this->investmentTransactions = $investmentTransactions;
       $this->walletTopUpTransaction = $walletTopUpTransaction;
       $this->userWallets = $userWallets;
    }

    public function lowIntrestInterface(){
        $user = Auth::user();

        $transactions = $this->accountDepositTransaction->getAllAccountDepositTransaction([
            ['user_id', $user->id],
        ]);

        $account = $this->accountTypeModel->getSingleAccountType([
            ['user_id', $user->id],
        ]);

        $settings = settings();

        $view = [
            'account'=>$account,
            'transactions'=>$transactions,
            'settings'=>$settings,
            'savings_last_deposit'=>$this->returnLastDeposit($user, 'savings'),
            'current_last_deposit'=>$this->returnLastDeposit($user, 'current'),
            'fixed_last_deposit'=>$this->returnLastDeposit($user, 'fixed'),
        ];
       
        return view('userdashboard.lowIntrest', $view);
        
    } 

    function returnLastDeposit($user, $action){
       $trans =  $this->accountDepositTransaction->getLastestAccountDepositTransaction([
            ['user_id', $user->id],
            ['account_type', $action],
        ]);

        if($trans != null){
            return $trans;
        }else{
            return 0;
        }
    }
    
    public function accountTopupInterface(){
        $currency = $this->currencyList->getAllCurrencyList();

        $view = [
            'currency'=>$currency,
        ];
        return view('userdashboard.account_topup', $view );
    }

    public function comfrimDeposit($unique_id = null){
        if($unique_id != null){ 

            $transaction = $this->accountDepositTransaction->getSingleAccountDepositTransaction([
                ['unique_id', $unique_id],
            ]);

            if($transaction != null){
                $currency = $this->currencyList->getSingleCurrencyList([
                    ['id', $transaction->currency_id]
                ]);
                if($currency != null){
                    $view = [
                        'transaction'=>$transaction,
                        'currency'=>$currency,
                    ];
                    return view('userdashboard.confirm_deposit', $view);
                }
            }
        }
    }

    public function depositToAccount(Request $request){
        try {

            $user = Auth::user();

            if($request->action_type == "savings"){

                $rules = [
                    'coin' => 'required',
                    'amount' => 'required',
                ];
                $messages = [
                    'coin.required' => '* This field is required',
                    'amount.required' => '* This field is required',
    
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }  else {

                    $settings = settings();

                    if($request->amount < $settings->savings_acct_min){
                        return redirect()->back()->with('error', 'Minimium amount Savings Account is ('.number_format($settings->savings_acct_min).')');
                    }elseif($request->amount > $settings->savings_acct_max){
                        return redirect()->back()->with('error', 'Maximium amount Savings Account is ('.number_format($settings->savings_acct_max).')');
                    }else{

                        $currency = $this->currencyList->getSingleCurrencyList([
                            ['unique_id', $request->coin]
                        ]);

                        if($currency != null){
                            $coin_eq = $request->amount * number_format($currency->coin_value, 8);
                            $unique_id =  $this->createUniqueId('account_deposit_transactions', 'unique_id');

                            $transaction = new accountDepositTransaction();
                            $transaction->unique_id  = $unique_id;
                            $transaction->user_id = $user->id;
                            $transaction->deposited_amount = $request->amount;
                            $transaction->coin_eq = number_format($coin_eq, 8);
                            $transaction->currency_id = $currency->id;
                            $transaction->transaction_type = 'Savings Account Deposit';
                            $transaction->status = 'pending';
                            $transaction->account_type = 'savings';
                            $transaction->save();

                            return redirect('/comfrim-deposit/'.$unique_id )->with('success', 'Success');
                        }  
                        
                        return redirect()->back()->with('error', 'There was an error, please try again later');

                    }
                    
                }
            }elseif($request->action_type == "current"){

                $rules = [
                    'coin' => 'required',
                    'amount' => 'required',
                ];
                $messages = [
                    'coin.required' => '* This field is required',
                    'amount.required' => '* This field is required',
    
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }  else {

                    $settings = settings();

                    if($request->amount < $settings->current_acct_min){
                        return redirect()->back()->with('error', 'Minimium amount for Current Account is ('.number_format($settings->current_acct_min).')');
                    }elseif($request->amount > $settings->current_acct_max){
                        return redirect()->back()->with('error', 'Maximium amount Current Account is ('.number_format($settings->current_acct_max).')');
                    }else{

                        $currency = $this->currencyList->getSingleCurrencyList([
                            ['unique_id', $request->coin]
                        ]);

                        if($currency != null){
                            $coin_eq = $request->amount * number_format($currency->coin_value, 8);
                            $unique_id =  $this->createUniqueId('account_deposit_transactions', 'unique_id');

                            $transaction = new accountDepositTransaction();
                            $transaction->unique_id  = $unique_id;
                            $transaction->user_id = $user->id;
                            $transaction->deposited_amount = $request->amount;
                            $transaction->coin_eq = number_format($coin_eq, 8);
                            $transaction->currency_id = $currency->id;
                            $transaction->transaction_type = 'Current Account Deposit';
                            $transaction->status = 'pending';
                            $transaction->account_type = 'current';
                            $transaction->save();

                            return redirect('/comfrim-deposit/'.$unique_id )->with('success', 'Success');
                        }  
                        
                        return redirect()->back()->with('error', 'There was an error, please try again later');

                    }
                    
                }
            }elseif($request->action_type == "fixed"){

                $rules = [
                    'coin' => 'required',
                    'amount' => 'required',
                ];
                $messages = [
                    'coin.required' => '* This field is required',
                    'amount.required' => '* This field is required',
    
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }  else {

                    $settings = settings();

                    if($request->amount < $settings->fixed_acct_min){
                        return redirect()->back()->with('error', 'Minimium amount for Fixed Account is ('.number_format($settings->fixed_acct_min).')');
                    }elseif($request->amount > $settings->fixed_acct_max){
                        return redirect()->back()->with('error', 'Maximium amount Fixed Account is ('.number_format($settings->fixed_acct_max).')');
                    }else{

                        $currency = $this->currencyList->getSingleCurrencyList([
                            ['unique_id', $request->coin]
                        ]);

                        if($currency != null){
                            $coin_eq = $request->amount * number_format($currency->coin_value, 8);
                            $unique_id =  $this->createUniqueId('account_deposit_transactions', 'unique_id');

                            $transaction = new accountDepositTransaction();
                            $transaction->unique_id  = $unique_id;
                            $transaction->user_id = $user->id;
                            $transaction->deposited_amount = $request->amount;
                            $transaction->coin_eq = number_format($coin_eq, 8);
                            $transaction->currency_id = $currency->id;
                            $transaction->transaction_type = 'Fixed Account Deposit';
                            $transaction->status = 'pending';
                            $transaction->account_type = 'fixed';
                            $transaction->save();

                            return redirect('/comfrim-deposit/'.$unique_id )->with('success', 'Success');
                        }  
                        
                        return redirect()->back()->with('error', 'There was an error, please try again later');

                    }
                    
                }
            }
           
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return redirect()->back()->with('error', $error);
        }
    }

    public function uploadDepositToAccountProof(Request $request, $unique_id = null){
        try {

            $user = Auth::user();
            //
           
            if ($request->hasFile('image_proof')) {

                $rules = [
                    'image_proof' => 'required|file|image|mimes:jpeg,png,gif|max:4048',
                ];
                $messages = [
                    'image_proof.required' => '* This field is required',
                    'image_proof.max' => '* File too large',
                    'image_proof.mimes' => '* The file must be a type of jpeg, jpg, png, gif',
    
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }else{

                    $transaction = $this->accountDepositTransaction->getSingleAccountDepositTransaction([
                        ['unique_id', $unique_id],
                    ]);

                    if($transaction != null){
                        if($transaction->payment_proof != null){
                            if(file_exists(storage_path('app/public/deposit_proof/') . $transaction->payment_proof)){
                                $file_old = storage_path('app/public/deposit_proof/') . $transaction->payment_proof;
                                unlink($file_old);
                            }
                        }
                        $file = $request->file('image_proof');
                        $deposit_proof = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                        $file->storeAs('public/deposit_proof', $deposit_proof);

                        $transaction->payment_proof = $deposit_proof;
                        $transaction->status = 'pending';
                         if($transaction->save()){
                            return redirect()->back()->with('success', 'Proof was uploaded successfully');
                         }
                    }

                }
            }
           
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return redirect()->back()->with('error', $error);
        }
    }

    public function realInvestmentsInterface(){

        $estateInvestmentsModel = $this->estateInvestmentsModel->getEstateInvestmentsByPaginate(5, [
            ['status', 'pending'],
        ]);

        $view = [
            'estateInvestmentsModel'=>$estateInvestmentsModel,
        ];

        return view('userdashboard.realestateInvestments', $view);
    }

    public function makeInvestmentInterface($unique_id = null){

        if($unique_id != null){
            $user = Auth::user();

            $accounts = $this->accountTypeModel->getSingleAccountType([
                ['user_id', $user->id],
            ]);
    
            if($accounts != null){
               
                $view = [
                    'accounts'=>$accounts,
                ];
            }
    
            return view('userdashboard.make_estate_invest', $view);
        }
    }

    public function makeInvestment(Request $request){
        try {

            $user = Auth::user();

            $rules = [
                'amount' => 'required',
            ];
            $messages = [
                'amount.required' => '* This field is required',

            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }else{

                $accounts = $this->accountTypeModel->getSingleAccountType([
                    ['user_id', $user->id],
                ]);

                $investments = $this->estateInvestmentsModel->getSingleEstateInvestments([
                    ['unique_id', $request->uniqueId],
                ]);

                if($accounts != null){

                    $equest = (int)($request->amount);

                    if($request->account === 'savings'){

                        $balance =  number_format($accounts->savings_balance);

                        if($equest >= $accounts->savings_balance){
                           return redirect()->back()->with('error', 'You do not have sufficient balance'); 
                        }else{

                            $unique_id =  $this->createUniqueId('investment_transactions', 'unique_id');

                            $new_balabnce = $accounts->savings_balance - $equest;
                            $accounts->savings_balance = $new_balabnce;
                            
                            if($accounts->save()){
                                $investmenTrans = new investmentTransactions();
                                $investmenTrans->unique_id = $unique_id;
                                $investmenTrans->user_id  = $user->id;
                                $investmenTrans->investment_id  = $request->uniqueId;
                                $investmenTrans->amount  = $equest;
                                $investmenTrans->investment_roi  = $investments->investment_roi;
                                $investmenTrans->investment_duration  = $investments->investment_duration;
                                $investmenTrans->account_type  = 'savings';
                                $investmenTrans->save();

                                return redirect()->back()->with('success', 'investment was placed successfully');
                            }                            

                        }

                    }elseif($request->account === 'current'){

                        if($equest >= $accounts->current_balance){
                           return redirect()->back()->with('error', 'You do not have sufficient balance'); 
                        }else{

                            $unique_id =  $this->createUniqueId('investment_transactions', 'unique_id');

                            $new_balabnce = $accounts->current_balance - $equest;
                            $accounts->current_balance = $new_balabnce;
                            
                            if($accounts->save()){
                                $investmenTrans = new investmentTransactions();
                                $investmenTrans->unique_id = $unique_id;
                                $investmenTrans->user_id  = $user->id;
                                $investmenTrans->investment_id  = $request->uniqueId;
                                $investmenTrans->amount  = $equest;
                                $investmenTrans->investment_roi  = $investments->investment_roi;
                                $investmenTrans->investment_duration  = $investments->investment_duration;
                                $investmenTrans->account_type  = 'current';
                                $investmenTrans->save();

                                return redirect()->back()->with('success', 'investment was placed successfully');
                            }                            

                        }

                    }elseif($request->account === 'fixed'){

                        if($equest >= $accounts->fixed_balance){
                           return redirect()->back()->with('error', 'You do not have sufficient balance'); 
                        }else{

                            $unique_id =  $this->createUniqueId('investment_transactions', 'unique_id');

                            $new_balabnce = $accounts->fixed_balance - $equest;
                            $accounts->fixed_balance = $new_balabnce;
                            
                            if($accounts->save()){
                                $investmenTrans = new investmentTransactions();
                                $investmenTrans->unique_id = $unique_id;
                                $investmenTrans->user_id  = $user->id;
                                $investmenTrans->investment_id  = $request->uniqueId;
                                $investmenTrans->amount  = $equest;
                                $investmenTrans->investment_roi  = $investments->investment_roi;
                                $investmenTrans->investment_duration  = $investments->investment_duration;
                                $investmenTrans->account_type  = 'fixed';
                                $investmenTrans->save();

                                return redirect()->back()->with('success', 'investment was placed successfully');
                            }                            

                        }

                    }

                    
                }

                
                //return $accounts;

                
                
            }
           
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return redirect()->back()->with('error', $error);
        }
    }

    public function listAllInvestments(){

        $user = Auth::user();

        $investments = $this->investmentTransactions->getAllinvestmentTransactions([
            ['user_id', $user->id],
        ]);

        $view = [
            'investments'=>$investments,
        ];

         return view('userdashboard.all_investments', $view );
    }

    public function fundWalletInterface($action = null){

        return view('userdashboard.fund_wallet');
    }

    public function fundWallet(Request $request){
        try {

            $user = Auth::user();

            $rules = [
                'amount' => 'required',
            ];
            $messages = [
                'amount.required' => '* This field is required',

            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }else{

                $min = 100;
                $amount = (int)($request->amount);

                if($amount < $min){
                    return redirect()->back()->with('error', 'Amount should not be less than $'.$min);
                }

                $currency = $this->currencyList->getSingleCurrencyList([
                    ['name', $request->coin]
                ]);

                if($currency != null){

                    $coin_eq = $request->amount * number_format($currency->coin_value, 8);
                    $uniqueId =  $this->createUniqueId('wallet_top_up_transactions', 'unique_id');
    
                    $walletTopUpTransaction = new walletTopUpTransaction();
                    $walletTopUpTransaction->unique_id = $uniqueId;
                    $walletTopUpTransaction->user_id = $user->id;
                    $walletTopUpTransaction->amount = $request->amount;
                    $walletTopUpTransaction->coin_equivalent = $coin_eq;
                    $walletTopUpTransaction->coin_type = $request->coin;
                    $walletTopUpTransaction->transaction_type = "Wallet Topup";
                    $walletTopUpTransaction->save();

                    return redirect('/comfirm-topup/'.$uniqueId )->with('success', 'Success');                    

                }
                
                return redirect()->back()->with('error', 'There was an error, please try again');
                
            }
           
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return redirect()->back()->with('error', $error);
        }
    }

    public function comfirmWalletTopupInterface($unique_id = null){

        if($unique_id != null){ 

            $transaction = $this->walletTopUpTransaction->getSingleWalletTopUpTransaction([
                ['unique_id', $unique_id],
            ]);

            if($transaction != null){
                $currency = $this->currencyList->getSingleCurrencyList([
                    ['name', $transaction->coin_type]
                ]);
                if($currency != null){
                    $view = [
                        'transaction'=>$transaction,
                        'currency'=>$currency,
                    ];
                    return view('userdashboard.comfirm_wallet_topup', $view);
                }
            }
        }
    }

    public function uploadWalletTopupProof(Request $request, $unique_id = null){
        try {

            $user = Auth::user();
            //
           
            if ($request->hasFile('image_proof')) {

                $rules = [
                    'image_proof' => 'required|file|image|mimes:jpeg,png,gif|max:4048',
                ];
                $messages = [
                    'image_proof.required' => '* This field is required',
                    'image_proof.max' => '* File too large',
                    'image_proof.mimes' => '* The file must be a type of jpeg, jpg, png, gif',
    
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }else{

                    $transaction = $this->walletTopUpTransaction->getSingleWalletTopUpTransaction([
                        ['unique_id', $unique_id],
                    ]);

                    if($transaction != null){
                        if($transaction->proof_image != null){
                            if(file_exists(storage_path('app/public/wallet_topup_proof/') . $transaction->proof_image)){
                                $file_old = storage_path('app/public/wallet_topup_proof/') . $transaction->proof_image;
                                unlink($file_old);
                            }
                        }
                        $file = $request->file('image_proof');
                        $wallet_topup_proof = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                        $file->storeAs('public/wallet_topup_proof', $wallet_topup_proof);

                        $transaction->proof_image = $wallet_topup_proof;
                        $transaction->proof_status = 'comfirm';
                         if($transaction->save()){
                            return redirect()->back()->with('success', 'Proof was uploaded successfully');
                         }
                    }

                }
            }
           
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return redirect()->back()->with('error', $error);
        }
    }

    public function digitalWallets(){

        $user = Auth::user();

        $transactions = $this->walletTopUpTransaction->getAllWalletTopUpTransaction([
            ['user_id', $user->id],
        ]);

        $settings = settings();

        $view = [
            'transactions'=>$transactions,
            'settings'=>$settings,
        ];

        return view('userdashboard.digital-wallets', $view);
    }
    
    public function coinExchangeInterface(){

        $user = Auth::user();

        $settings = settings();

        $view = [
            'settings'=>$settings,
        ];

        return view('userdashboard.coin_exchange', $view);
    }

    public function coinExchange(Request $request){
        try {

            $user = Auth::user();

            $rules = [
                'amount' => 'required',
            ];
            $messages = [
                'amount.required' => '* This field is required',

            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }else{

                $settings = settings();

                $wallets = $this->userWallets->getSingleUserWallets([
                    ['user_id', $user->id],
                ]);

                $service_charge = $request->amount * ($settings->exchange_charge_fee / 100);

                $amount = (int)($request->amount);

                $calulate_btc_amount = $amount * $settings->btc_exchage_rate;

                $calulate_btc_service_charge = $service_charge * $settings->btc_exchage_rate;

                $calulateEthAmount = $amount * $settings->eth_exchage_rate;

                $calulate_eth_service_charge = $service_charge * $settings->eth_exchage_rate;

                $uniqueId =  $this->createUniqueId('coin_exchange_models', 'unique_id');

                if($request->coin == 'bitcoin'){

                    if($calulate_btc_amount >= $wallets->bitcoin){
                        return redirect()->back()->with('error', 'Amount inputed exceeds your bitcoin wallet balance');
                    }

                    if($request->t_coin == 'bitcoin'){
                        return redirect()->back()->with('error', 'Please select different coin type to be changed to');
                    }

                    //deduct the money from the bitcoin wallet
                    $deduct_amount = $wallets->bitcoin - $calulate_btc_amount;
                    $new_deduct_amount = $deduct_amount - $calulate_btc_service_charge;
                    $wallets->bitcoin = $new_deduct_amount;
                    $wallets->save();

                    //add balance to the ethereum wallet
                    $added_amount = $wallets->ethereum + $calulateEthAmount;
                    $wallets->ethereum = $added_amount;
                    $wallets->save();

                    $coinExchangeModel = new coinExchangeModel();
                    $coinExchangeModel->unique_id  = $uniqueId;
                    $coinExchangeModel->user_id  = $user->id;
                    $coinExchangeModel->amount  = $request->amount;
                    $coinExchangeModel->from  = 'bitcoin';
                    $coinExchangeModel->to  = 'ethereum';
                    $coinExchangeModel->service_fee  = $service_charge;
                    $coinExchangeModel->btc_exchange_rate  = $settings->btc_exchage_rate;
                    $coinExchangeModel->eth_exchange_rate  = $settings->eth_exchage_rate;
                    $coinExchangeModel->transaction_type  = 'Funds Exchange';

                    if($coinExchangeModel->save()){
                        return redirect()->back()->with('success', 'Success');
                    }else {
                        # code...
                        return redirect()->back()->with('error', 'There was an error, please try again later');
                    }


                  

                }elseif($request->coin == 'ethereum'){

                    if($calulateEthAmount >= $wallets->ethereum){
                        return redirect()->back()->with('error', 'Amount inputed exceeds your ethereum wallet balance');
                    }

                    if($request->t_coin == 'ethereum'){
                        return redirect()->back()->with('error', 'Please select different coin type to be changed to');
                    }

                    //add balance to the ethereum wallet
                    $added_amount = $wallets->ethereum - $calulateEthAmount;
                    $new_deduct_amount = $added_amount - $calulate_eth_service_charge;
                    $wallets->ethereum = $new_deduct_amount;
                    $wallets->save();

                    //deduct the money from the bitcoin wallet
                    $deduct_amount = $wallets->bitcoin + $calulate_btc_amount;
                    $wallets->bitcoin = $deduct_amount;
                    $wallets->save();

                    $coinExchangeModel = new coinExchangeModel();
                    $coinExchangeModel->unique_id  = $uniqueId;
                    $coinExchangeModel->user_id  = $user->id;
                    $coinExchangeModel->amount  = $request->amount;
                    $coinExchangeModel->from  = 'ethereum';
                    $coinExchangeModel->to  = 'bitcoin';
                    $coinExchangeModel->service_fee  = $service_charge;
                    $coinExchangeModel->btc_exchange_rate  = $settings->btc_exchage_rate;
                    $coinExchangeModel->eth_exchange_rate  = $settings->eth_exchage_rate;
                    $coinExchangeModel->transaction_type  = 'Funds Exchange';

                    if($coinExchangeModel->save()){
                        return redirect()->back()->with('success', 'Success');
                    }else {
                        # code...
                        return redirect()->back()->with('error', 'There was an error, please try again later');
                    }

                }
                
                return redirect()->back()->with('error', 'There was an error, please try again');
                
            }
           
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return redirect()->back()->with('error', $error);
        }
    }

    



     
    
}
