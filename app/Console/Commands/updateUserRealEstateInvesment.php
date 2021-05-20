<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\estateInvestmentsModel;
use App\Models\investmentTransactions;
use App\Models\accountTypeModel;
use Carbon\Carbon;

class updateUserRealEstateInvesment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:userRealestateInvestment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users real estate invesment roi plan and add the amount to the savings account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user, estateInvestmentsModel $estateInvestmentsModel, investmentTransactions $investmentTransactions, accountTypeModel $accountTypeModel)
    {
        parent::__construct();
        $this->user = $user;
        $this->estateInvestmentsModel = $estateInvestmentsModel;
        $this->accountTypeModel = $accountTypeModel;
        $this->investmentTransactions = $investmentTransactions;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->realEstateInvementPlanTopUp();
    }

    public function realEstateInvementPlanTopUp(){
         //get all the users
         $users = $this->user->getAllUsers();

         //get the general settings
         $settings = settings();
 
         if(count($users) > 0){
 
             //looping through the users
             foreach($users as $each_user){
                 //with the individual users object, use the user_id to pull their investments records from the getAllinvestmentTransactions

                 $investments = $this->investmentTransactions->getAllinvestmentTransactions([
                    ['user_id', $each_user->id],
                    ['status', 'pending'],
                ]);
 
                 if(count($investments) > 0){
                     //
                     foreach($investments as $each_investments){

                        $get_date_progress = Carbon::parse($each_investments->created_at)->diffInDays(Carbon::now());

                        $real_estate = $this->estateInvestmentsModel->getSingleEstateInvestments([
                            ['unique_id', $investments->investment_id],
                        ]);

                        if($real_estate != null){
    
                            if($get_date_progress <= $real_estate->investment_duration){

                                $account = $this->accountTypeModel->getSingleAccountType([
                                    ['user_id', $each_user->id],
                                ]);
                                $roi_amount = $investments->amount * $real_estate->investment_roi;
                                $investments->final_amount = $roi_amount;
                                $investments->status = 'completed';
                                $investments->save();

                                if($investments->account_type == 'savings'){
                                    $new_balance = $account->savings_acct + $roi_amount;
                                    $account->savings_acct = $new_balance;
                                    $account->save();
                                }elseif($investments->account_type == 'current'){
                                    $new_balance = $account->current_acct + $roi_amount;
                                    $account->current_acct = $new_balance;
                                    $account->save();
                                }elseif($investments->account_type == 'fixed'){
                                    $new_balance = $account->fixed_acct + $roi_amount;
                                    $account->fixed_acct = $new_balance;
                                    $account->save();
                                }
    
                            }
                        }

                     }
                    
                 }
 
             }
 
         }
    }
}
