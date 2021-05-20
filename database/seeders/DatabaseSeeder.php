<?php

namespace Database\Seeders;

use App\Models\countryList;
use App\Models\generalSettings;
use App\Models\currencyList;
use App\Models\reviews;
use App\Models\User;
use App\Models\userWallets;
use App\Models\estateInvestmentsModel;
use App\Models\walletDepositeInstruction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Traits\Generics;

class DatabaseSeeder extends Seeder
{
    use Generics;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = "Neon";
        $user->last_name = "Emmanuel";
        $user->email = "360crest@gmail.com";
        $user->gender = "Male";
        $user->dateofbirth = "1995-06-21";
        $user->address = "13, Osemene close mafoluku oshodi";
        $user->phone_number = "09098200893";
        $user->country = "Nigeria";
        $user->state = "Delta";
        $user->username = "neon";
        $user->password = Hash::make(123456);
        $user->save();

        $wallet = new userWallets();
        $wallet->bitcoin = "0.000000";
        $wallet->ethereum = "0.000000";
        $wallet->litecoin = "0.000000";
        $wallet->tron = "0.000000";
        $wallet->Dogecoin = "0.000000";
        $wallet->usdt = "0.000000";
        $wallet->binance_usd = "0.000000";
        $wallet->bitcoin_cash = "0.000000";
        $wallet->ripple = "0.000000";
        $wallet->perfect_money = "0.000000";
        $wallet->user_id = $user->id;
        $wallet->save();


        $settings = new generalSettings();
        $settings->sitename = "Fiona";
        $settings->phone = "0100 5200 369";
        $settings->address = "838 Andy Street, Madison,New Jersy 08003";
        $settings->contact_email = "support@finona.com";
        $settings->savings_acct_min = 20000;
        $settings->savings_acct_max = 50000;
        $settings->savings_acct_roi = 1.5;
        $settings->savings_acct_roi_days = 7;
        $settings->current_acct_min = 20000;
        $settings->current_acct_max = 50000;
        $settings->current_acct_roi = 2.5;
        $settings->curren_acctt_roi_days = 7;
        $settings->fixed_acct_min = 20000;
        $settings->fixed_acct_max = 50000;
        $settings->fixed_acct_roi = 3.5;
        $settings->fixed_acct_roi_days = 7;
        $settings->btc_exchage_rate = 0.00009000;
        $settings->eth_exchage_rate = 0.00002000;
        $settings->exchange_charge_fee = 2;
        $settings->about_site = "Fiona Bank is authorised and regulated by the Malta Financial Services Authority, Company registration No. C 50343.";
        $settings->save();


        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        foreach ($countries as $item){
            $country = new countryList();
            $country->name = $item;
            $country->save();
        }


        $reviews = new reviews();

        $reviews->name = "John DOes";
        $reviews->rating = "5";
        $reviews->comment = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque debitis eaque nostrum vero. At debitis dolore, expedita nostrum quia unde voluptatem! Delectus est nulla quas recusandae similique suscipit tempora.";
        $reviews->save();

        $reviews = new reviews();
        $reviews->name = "John Maker";
        $reviews->rating = "4";
        $reviews->comment = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque debitis eaque nostrum vero. At debitis dolore, expedita nostrum quia unde voluptatem! Delectus est nulla quas recusandae similique suscipit tempora.";
        $reviews->save();

        $reviews = new reviews();
        $reviews->name = "Saviour Dean";
        $reviews->rating = "5";
        $reviews->comment = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque debitis eaque nostrum vero. At debitis dolore, expedita nostrum quia unde voluptatem! Delectus est nulla quas recusandae similique suscipit tempora.";
        $reviews->save();

        $reviews = new reviews();
        $reviews->name = "Alexa Er";
        $reviews->rating = "5";
        $reviews->comment = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque debitis eaque nostrum vero. At debitis dolore, expedita nostrum quia unde voluptatem! Delectus est nulla quas recusandae similique suscipit tempora.";
        $reviews->save();


        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "bitcoin";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();


        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "ethereum";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();

        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "tron";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();

        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "dogecoin";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();

        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "usdt";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();


        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "binance_usd";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();


        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "bitcoin_cash";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();

        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "ripple";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();

        $deposite_info = new walletDepositeInstruction();
        $deposite_info->wallet_name = "perfect_money";
        $deposite_info->payment_description= "
            <div class='payment_detail_instruction'>
                Send payment to the bitcoin wallet address below. <br>
                Click to copy wallet address or scan QR code <br>
                Wallet Address 
                <br>
                <br>
                <b>3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb</b>
            </div>
        ";
        $deposite_info->rate = "0.000124";
        $deposite_info->save();

        $currencyAcct = new currencyList();
        $currencyAcct->unique_id = $this->createUniqueId('currency_lists', 'unique_id');
        $currencyAcct->name = "bitcoin";
        $currencyAcct->coin_value = number_format(0.000090, 8);
        $currencyAcct->wallet_address = "3QfKUjuYXSE7UPqU2aKKBQF5MxSvWfjesb";
        $currencyAcct->qr_code = "bitcoin_qrCode.jpg";
        $currencyAcct->description = "Bitcoin Wallet Address";
        $currencyAcct->save();

        $estateInvestment = new estateInvestmentsModel();
        $estateInvestment->unique_id = $this->createUniqueId('estate_investments_models', 'unique_id');
        $estateInvestment->user_id  = 1;
        $estateInvestment->location  = 'Virgin Islands (U.S.)';
        $estateInvestment->invest_image  = 'investments.jpeg';
        $estateInvestment->investment_roi  = 3.6;
        $estateInvestment->investment_duration  = 7;
        $estateInvestment->description  = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque debitis eaque nostrum vero. At debitis dolore, expedita nostrum quia unde voluptatem! Delectus est nulla quas recusandae similique suscipit tempora.';
        $estateInvestment->save();
        

    }
}
