@extends('layouts.app')

@section('content')

    <section class="page-title centred" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Savings</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Savings</li>
                </ul>
            </div>
        </div>
    </section>
    @include('partials.quick-info')
    <div class="auto-container">
        <article class="cfix">
            <h5>
                Savings Guide</h5>

            <h4>Understanding Savings</h4>
            <p>Ask yourself the following questions and if you answer yes then you should consider making your money work harder by simply saving.</p>
            <p>&nbsp;</p>
            <ul class="main-content-list">
                <li>
                    <p>Do you have any spare money sitting in your current account?</p>
                </li>
                <li>
                    <p>Are you unsure how much interest you’re earning on your savings?</p>
                </li>
                <li>
                    <p>Do you think you could save more if you changed some of your spending habits?</p>
                </li>
                <li>
                    <p>Are you hoping to treat yourself to something special in the future or save for a house, but don’t know where the money will come from?</p>
                </li>
            </ul>
            <p>&nbsp;</p>
            <p>Put your mind at rest with a savings account.</p>

            <div id="accordion">
                <div class="card active">
                    <div class="card-header active" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                What is your Savings Goal
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body">
                            <p>Saving is much easier when you have a particular goal in mind which keeps you motivated to stay on track. So what's your goal? To build up a deposit to buy a car, put a down-payment on a house, or to start saving for retirement? To save for that dream holiday, a wedding or simply for a rainy day?</p>
                            &nbsp;
                            <p>Whatever your goal is, it's important to keep it firmly in your mind.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How long do I need to save to reach my goal?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">


                            <p>Another thing you need to think about is how often you will need to save to achieve your goal. It is best practice to base the frequency of your savings on when you get paid. For example, if your salary is paid fortnightly then make sure you put some money away each time.</p>
                            &nbsp;
                            <p>Once you've decided how often you can put money into your savings, you need to work out how much you can save.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How much can I save?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">

                            <p>Once you know what you want to save for and for how long you need to save, you'll need to work out how much to save. To achieve this you need to:</p>
                            <p>&nbsp;</p>
                            <p style="margin-left: 10px;">1. Consider the savings you already have</p>
                            &nbsp;
                            <p style="margin-left: 10px;">2. Understand how regular and how much you can save</p>
                            &nbsp;
                            <p style="margin-left: 10px;">3. Take into account the interest earned on your savings</p>
                            &nbsp;
                            <p style="margin-left: 10px;">4. Compare how much you need versus how much you can save. If there is a gap in the amount you need to save, ask yourself how you can achieve this.</p>
                            &nbsp;
                            <p style="margin-left: 10px;">5. Review your budget and make a plan. To achieve your aim it's important to be realistic so make sure it’s something which can be met.</p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How much should I save?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <p>If you are buying a property, how much is the total cost and what do you need for a deposit? Don’t forget there may be additional costs such as legal, insurance and even renovation costs to improve the property before you move in. If it's a holiday, how much are the airfares, hotels and general spending money for the trip? If you think there may be some additional unexpected costs then add another 5% or 10% to cover yourself.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Why should I save?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <p>Life is full of surprises. It could be an unexpected bill, an urgent car repair or a shock redundancy. Having money saved up can help you manage and give you some peace of mind. People save for many reasons but here are the 3 main ones:</p>
                            &nbsp;
                            <p style="margin-left: 10px;">1. To be covered for life’s unexpected twists and turns</p>
                            &nbsp;
                            <p style="margin-left: 10px;">2. To improve your standard of living through the earnings on savings</p>
                            &nbsp;
                            <p style="margin-left: 10px;">3. To buy that special gift that you can’t afford right now</p>
                            <p>&nbsp;</p>
                            <p>On the other hand it’s also worth thinking about longer-term savings for your retirement. Secure your future now by establishing a savings plan and put your mind at rest.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Which Account is right for me?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                        <div class="card-body">
                            <p>There are two main types of bank accounts. A savings account will give you access to your savings instantly whilst a fixed term deposit may give a higher rate of return if you leave money untouched for a fixed period of time.</p>
                            <p></p>
                            <p>&nbsp;</p>
                            <p>These accounts will offer different rates and may allow the option to accrue compound interest or get interest quarterly, half-yearly or annually.</p>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingEight">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Some quick tips on saving
                            </button>
                        </h5>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="main-content-list">
                                <li>
                                    <p>Try to clear any debts as quickly as possible. This may not be very easy, but once you get rid of any outstanding payments, such as credit-card bills or utility bills, you are in a better position to reach your goals and stick to your plan.</p>
                                </li>
                                <li>
                                    <p>Develop good habits by saving each time you get paid. Set up a standing order on payday, such as a day’s salary, so that money will be transferred on a regular basis before you’ve had the chance to spend it. Challenge yourself every month to increase this amount.</p>
                                </li>
                                <li>
                                    <p>If you receive a bonus or a large amount of cash from an inheritance then lock the money away, warding off the temptation to spend, with a fixed term deposit</p>
                                </li>
                                <li>
                                    <p>Create a budget on your spending and stick to it.</p>
                                </li>
                                <li>
                                    <p>Be disciplined and persistent. Set up a realistic savings goal which you can achieve.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <p><span style="font-size: xx-small;">&nbsp;</span></p>
                <p><span style="font-size: xx-small;">&nbsp;</span></p>
                <p><em>Disclaimer: This information is general advice only and does not constitute any recommendation or personal advice. It has been prepared without taking account of your objectives, financial situation or needs. You should consider obtaining personalised advice from a certified financial adviser and your accountant before making any financial decisions in relation to the matters discussed on this webpage. </em></p>
                <p><em>&nbsp;</em></p>
                <p><em>This is current at the time of publication (2 May 2014), and subject to change.</em></p>


            </div></article>
    </div>
@endsection