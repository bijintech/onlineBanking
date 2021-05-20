<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\accountTypeModel;
use App\Models\accountDepositTransaction;
use Carbon\Carbon;

class updateUserAccountsRoi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:userAccountRoi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command gets all the deposited transactions by the user and adds a roi to thos that are due for';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user, accountTypeModel $accountTypeModel, accountDepositTransaction $accountDepositTransaction)
    {
        parent::__construct();
        $this->user = $user;
        $this->accountTypeModel = $accountTypeModel;
        $this->accountDepositTransaction = $accountDepositTransaction;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->addRoiToUsersAccountAfterTrans ();
    }

    public function addRoiToUsersAccountAfterTrans(){

        //get all the users
        $users = $this->user->getAllUsers();

        //get the general settings
        $settings = settings();

        if(count($users) > 0){

            //looping through the users
            foreach($users as $each_user){
                //with the individual users object, use the user_id to pull their accounts records from the account_type_model
                $account = $this->accountTypeModel->getSingleAccountType([
                    ['user_id', $each_user->id],
                ]);

                if($account != null){
                    //
                    if(number_format($account->savings_balance) > 0){
                        //getting the transactions made by this user for savings account deposit
                        $transactions = $this->returnTransaction($user, 'savings');

                        $savings_roi_days = $settings->savings_acct_roi_days;
                        if(count($transactions) > 0){
                            foreach($transactions as $each_transactions){
                                $get_date_progress = Carbon::parse($each_transactions->created_at)->diffInDays(Carbon::now());

                                if($get_date_progress >= $savings_roi_days){

                                    $amount = number_format($each_transactions->deposited_amount) * ($settings->savings_acct_roi/100);
                                    $new_amount = number_format($account->savings_roi_balance) + $amount ;
                                    $account->savings_roi_balance = $new_amount;
                                    $account->save(); 

                                    $each_transactions->roi_status = 'yes';
                                    $each_transactions->save();

                                }
                                

                            }
                        }
                    }elseif(number_format($account->current_balance) > 0){
                        //getting the transactions made by this user for current account deposit
                        $transactions = $this->returnTransaction($user, 'current');

                        $current_roi_days = $settings->curren_acctt_roi_days;
                        if(count($transactions) > 0){
                            foreach($transactions as $each_transactions){
                                $get_date_progress = Carbon::parse($each_transactions->created_at)->diffInDays(Carbon::now());

                                if($get_date_progress >= $current_roi_days){

                                    $amount = number_format($each_transactions->deposited_amount) * ($settings->current_acct_roi/100);
                                    $new_amount = number_format($account->current_roi_balance) + $amount ;
                                    $account->current_roi_balance = $new_amount;
                                    $account->save(); 

                                    $each_transactions->roi_status = 'yes';
                                    $each_transactions->save();

                                }   

                            }
                        }
                    }elseif(number_format($account->current_balance) > 0){
                        //getting the transactions made by this user for current account deposit
                        $transactions = $this->returnTransaction($user, 'fixed');

                        $fixed_roi_days = $settings->fixed_acct_roi_days;
                        if(count($transactions) > 0){
                            foreach($transactions as $each_transactions){
                                $get_date_progress = Carbon::parse($each_transactions->created_at)->diffInDays(Carbon::now());

                                if($get_date_progress >= $fixed_roi_days){

                                    $amount = number_format($each_transactions->deposited_amount) * ($settings->fixed_acct_roi/100);
                                    $new_amount = number_format($account->fixed_roi_balance) + $amount ;
                                    $account->fixed_roi_balance = $new_amount;
                                    $account->save(); 

                                    $each_transactions->roi_status = 'yes';
                                    $each_transactions->save();

                                }   

                            }
                        }
                    }
                }

            }

        }

    }

    public function returnTransaction($user, $action){
        $transactions = $this->accountDepositTransaction->getAllAccountDepositTransaction([
            ['user_id', $user->id],
            ['account_type', $action],
            ['status', 'comfirmed'],
            ['roi_status', 'no'],
        ]);

        return $transactions;
    }

}
