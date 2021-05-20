<?php

namespace App\Http\Controllers;

use App\Models\recoverFundsCases;
use App\Models\transactionsHistory;
use App\Models\User;
use App\Models\userWallets;
use App\Models\accountTypeModel;
use App\Models\walletDepositeInstruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\Generics;

class GeneralController extends Controller
{

    use Generics;

    public function home(){
        return view('home');
    }

    public function accountOpening(Request $request){
        $email = $request->email ?? "";
        return view('auth.register', compact('email'));
    }

    public function registerPost(Request $request){

        $rules = [
            'first_name' => 'required|max:120|string',
            'last_name' => 'required|max:120|string',
            'email' => 'required|max:120|email|unique:users',
            'gender' => 'required|max:120|string',
            'dateofbirth' => 'required|max:120|string',
            'address' => 'required|string',
            'phone_number' => 'required|max:120|string',
            'country' => 'required|max:120|string',
            'state' => 'required|max:120|string',
            'username' => 'required|max:120|string|unique:users',
            'password' => 'required|max:120',
            'confirm_password' => 'required|max:120|same:password',
        ];

        $messages = [
            'first_name.required' => '* This field is required',
            'first_name.max' => '* This Field is too long',
            'first_name.string' => '* This field is invalid',


            'last_name.required' => '* This field is required',
            'last_name.max' => '* This Field is too long',
            'last_name.string' => '* This field is invalid',

            'email.required' => '* This field is required',
            'email.max' => '* This Field is too long',
            'email.email' => '* Please enter a valid email, specifically with the "@ symbol"',
            'email.unique' => '* This Email address has already been assigned to another user',

            'gender.required' => '* This field is required',
            'gender.max' => '* This Field is invalid',
            'gender.string' => '* This field is invalid',

            'dateofbirth.required' => '* This field is required',
            'dateofbirth.max' => '* This Field is invalid',
            'dateofbirth.string' => '* This field is invalid',

            'phone_number.required' => '* This field is required',
            'phone_number.max' => '* This Field is too long',
            'phone_number.string' => '* This field is invalid',

            'country.required' => '* This field is required',
            'country.max' => '* This Field is too long',
            'country.string' => '* This field is invalid',

            'state.required' => '* This field is required',
            'state.max' => '* This Field is too long',
            'state.string' => '* This field is invalid',

            'username.required' => '* This field is required',
            'username.max' => '* This Field is too long',
            'username.string' => '* This field is invalid',

            'password.required' => '* This field is required',
            'password.max' => '* Password is too long, please pick something you would remember.',

            'confirm_password.required' => '* This field is required',
            'confirm_password.max' => '* Password is too long, please pick something you would remember.',
            'confirm_password.same' => '* Password confirmation does not match.',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }  else {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->dateofbirth = $request->dateofbirth;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();

            $wallet = new userWallets();
            $wallet->bitcoin = "0.0003200";
            $wallet->ethereum = "0.010000";
            $wallet->litecoin = "0.040000";
            $wallet->tron = "0.0004000";
            $wallet->Dogecoin = "0.020000";
            $wallet->usdt = "0.000020";
            $wallet->binance_usd = "0.000010";
            $wallet->bitcoin_cash = "0.000050";
            $wallet->ripple = "0.000090";
            $wallet->perfect_money = "0.000010";
            $wallet->user_id = $user->id;
            $wallet->save();

            $accountType = new accountTypeModel();
            $accountType->unique_id = $this->createUniqueId('account_type_models', 'unique_id');
            $accountType->user_id = $user->id;
            $accountType->savings_acct = $this->createAcctNum(10, 'account_type_models', 'savings_acct');
            $accountType->current_acct = $this->createAcctNum(10, 'account_type_models', 'current_acct');
            $accountType->fixed_acct = $this->createAcctNum(10,'account_type_models', 'fixed_acct');
            $accountType->save();

            
            auth()->login($user);
            return \redirect()->route('dashboard');
        }
    }

    public function dashboard(){
        return view('userdashboard.dashboard');
    }

    public function logout(){
        auth()->logout();
        return \redirect()->route('home');
    }

    public function loginAccount(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        if(User::Where('username', $request->username)->exists() == true){
            $credentials = ['username' => $request->username, 'password' => $request->password];
            if(Auth::validate($credentials) == true) {
                Auth::attempt($credentials, true );
                return redirect()->intended();
            } else {
                return redirect()->back()->with('info', 'invalid username or Password, please check your credentials and try again.')->withInput($request->only('username'));
            }

        } else{
            return redirect()->back()->with('info', 'invalid username or Password, please check your credentials and try again.')->withInput($request->only('username'));
        }
    }

    public function resetPassword(){

    }

    public function cooperate(){
        return view('pages.cooperate');
    }
    public function savings(){
        return view('pages.savings');
    }
    public function deposit(){
        return view('pages.deposit');
    }
    public function savingsGuide(){
        return view('pages.savings-guide');
    }
    public function customerAccount(){
        return view('userdashboard.account');
    }
    public function customerAccountPost(Request $request){
        if($request->action_type == "update_account"){

            $rules = [
                'first_name' => 'required|max:120|string',
                'last_name' => 'required|max:120|string',
                'username' => 'required|string|max:120|unique:users,username,' . auth()->user()->id. ',id',
            ];
            $messages = [
                'first_name.required' => '* This field is required',
                'first_name.max' => '* This Field is too long',
                'first_name.string' => '* This field is invalid',


                'last_name.required' => '* This field is required',
                'last_name.max' => '* This Field is too long',
                'last_name.string' => '* This field is invalid',

                'username.required' => '* This field is required',
                'username.max' => '* This Field is too long',
                'username.string' => '* This field is invalid',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }  else {
                $user = User::where('id', auth()->user()->id)->firstOrFail();
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->username = $request->username;
                $user->save();
                return redirect()->back()->with('success', 'Account updated successfully');
            }

        } elseif ($request->action_type == "update_info"){

            $rules = [
                'address' => 'required|max:120|string',
                'country' => 'required|max:120|string',
                'state' => 'required|max:120|string',
                'gender' => 'required|max:120|string',
            ];
            $messages = [
                'address.required' => '* This field is required',
                'address.max' => '* This Field is too long',
                'address.string' => '* This field is invalid',

                'country.required' => '* This field is required',
                'country.max' => '* This Field is too long',
                'country.string' => '* This field is invalid',

                'state.required' => '* This field is required',
                'state.max' => '* This Field is too long',
                'state.string' => '* This field is invalid',

                'gender.required' => '* This field is required',
                'gender.max' => '* This Field is too long',
                'gender.string' => '* This field is invalid',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }  else {
                $user = User::where('id', auth()->user()->id)->firstOrFail();
                $user->address = $request->address;
                $user->country = $request->country;
                $user->state = $request->state;
                $user->gender = $request->gender;
                $user->save();
                return redirect()->back()->with('success', 'Account information updated successfully');
            }
        } else {
            $rules = [
                'current_password' => 'required|max:120|min:6|string',
                'new_password' => 'required|max:120|min:6|string',
                'new_password_confirmation' => 'required|max:120|min:6|string|same:new_password',
            ];
            $messages = [
                'current_password.required' => 'This field can not be empty',
                'current_password.max' => 'Please enter a valid input.',
                'current_password.min' => 'Please enter a valid input.',
                'current_password.string' => 'Please enter a valid input.',

                'new_password.required' => 'This field can not be empty',
                'new_password.max' => 'Password is too long, please pick something you would remember.',
                'new_password.min' => 'Password must be 6 characters long.',
                'new_password.string' => 'Please enter a valid input.',

                'new_password_confirmation.required' => 'This field can not be empty',
                'new_password_confirmation.max' => 'Password is too long, please pick something you would remember.',
                'new_password_confirmation.min' => 'Password must be 6 characters long.',
                'new_password_confirmation.string' => 'Please enter a valid input.',
                'new_password_confirmation.same' => 'Password confirmation does not match',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            } else {
                $data = User::where('id', auth()->user()->id)->firstOrFail();
                if (password_verify($request->current_password, $data->password)) {
                    $data->password = Hash::make($request->new_password);
                    $data->save();
                    return redirect()->back()->with('success', 'Password changed successfully.');
                } else {
                    return redirect()->back()->with('error', 'Invalid current password.');
                }
            }
        }
    }

    public function fundsRecovery(){
        return view('userdashboard.funds-recovery');
    }

    public function fundsRecoveryPost2(Request $request){
        $rules = [
            'name_of_platform' => 'required|max:120|string',
            'amount_lost' => 'required|max:120|string',
            'currency' => 'required|max:120',
            'proof' => 'nullable|max:5124|mimes:jpeg,png,jpg',
            'lost_date' => 'required|max:120',
        ];
        $messages = [
            'name_of_platform.required' => '* This field is required',
            'name_of_platform.max' => '* This Field is too long',
            'name_of_platform.string' => '* This field is invalid',

            'amount_lost.required' => '* This field is required',
            'amount_lost.max' => '* This Field is too long',
            'amount_lost.string' => '* This field is invalid',

            'currency.required' => '* This field is required',
            'currency.max' => '* This Field is too long',
            'currency.string' => '* This field is invalid',

            'Duplicate array key.required' => '* This field is required',
            'Duplicate array key.max' => '* This Field is too long',
            'Duplicate array key.string' => '* This field is invalid',

            'proof.max' => '* File size can not be bigger than 5MB',
            'proof.mimes' => '* Supported File Types is (Jpeg, PNG, JPG)',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }  else {
            $case = new recoverFundsCases();
            $case->name_of_platform = $request->name_of_platform;
            $case->amount_lost = $request->amount_lost;
            $case->currency = $request->currency;
            $case->user_id = auth()->user()->id;
            $case->lost_date = $request->lost_date;

            $name = sha1(date('YmdHis') . Str::random(20));
            $resize_name = $name . '-' . $request->image_name;
            $request->proof->move(realpath('./') . '/uploads/images', $resize_name);
            $case->proof =  $resize_name;
            $case->status = 1;
            $case->save();
            return redirect()->back()->with('success', 'Case recorded successfully');
        }
    }

    public function fundsRecoveryPost(Request $request){
        return \redirect()->back()->with('error', 'Sorry in other to add a review, you must have fully concluded the fund recovery process');
    }

    public function customerDeposit(){
        return view('userdashboard.deposit');
    }

    public function customerDepositPost(Request $request){
        $deposite_info = walletDepositeInstruction::where('wallet_name', $request->coin)->firstOrFail();

        $data = new transactionsHistory();
        $data->user_id = \auth()->user()->id;
        $data->deposited_amount = $request->amount;
        $data->final_amount = (float)$request->amount * $deposite_info->rate;
        $data->transaction_type = $request->coin;
        $data->transaction_rate = $deposite_info->rate;
        $data->status = 0;
        $data->save();
        return \redirect()->to(route('transactionsSingle', $data->id))->with('success', 'Transaction initiated successfully, deposit funds to continue');
    }

    public function transactionsSingle(Request $request, $id){
        $data = transactionsHistory::where('id', $id)->firstOrFail();
        $info = walletDepositeInstruction::where('wallet_name', $data->transaction_type)->firstOrFail();
        return view('userdashboard.transaction-single', compact('data', 'info'));
    }

    public function transactionsSinglePost(Request $request, $id){
        if($request->proof){
            $data = transactionsHistory::where('id', $id)->firstOrFail();
            $name = sha1(date('YmdHis') . Str::random(20));
            $resize_name = $name . '-' . $request->image_name;
            $request->proof->move(realpath('./') . '/uploads/images', $resize_name);
            $data->payment_proof =  $resize_name;
            $data->status = "1";
            $data->save();
            return \redirect()->to(route('transactions'));
        } else {
            return \redirect()->to(route('transactions'));
        }
    }

    public function transactions(){
        $data = transactionsHistory::where('user_id', \auth()->user()->id)->get();
        return view('userdashboard.transactions', compact('data'));
    }
}
