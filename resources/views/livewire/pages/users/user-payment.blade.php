<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
            -webkit-tap-highlight-color: transparent;
        }

        .submit-button:disabled {
            cursor: not-allowed;
            background-color: #D1D5DB;
            color: #111827;
        }

        .submit-button:disabled:hover {
            background-color: #9CA3AF;
        }

        .credit-card {
            max-width: 420px;
            margin-top: 3rem;
        }

        @media only screen and (max-width: 420px) {
            .credit-card .front {
                font-size: 100%;
                padding: 0 2rem;
                bottom: 2rem !important;
            }

            .credit-card .front .number {
                margin-bottom: 0.5rem !important;
            }
        }
    </style>
    <div class="container mx-auto h-full py-1">
        <div class="overflow-x-auto relative shadow-md sm:rounded"></div>
    </div>
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10">
            <div class="w-1/2 bg-[#E5E5CB] p-20">
                <div class="flex justify-between border-b border-[#D5CEA3] pb-5">
                    <h1 class="font-semibold text-3xl text-[#1A120B]">Order Summary</h1>
                </div>
                <div class="flex justify-between mt-5 mb-3 text-[#1A120B]">
                    <p class="text-[#1A120B]">Order Number <span class="font-semibold">W086438695</span></p>
                </div>
                <div class="flex justify-between mt-3 mb-3 border-b border-[#D5CEA3] pb-3">
                    <span class="text-2xl font-semibold">Amount to be paid</span>
                    <span class="text-2xl font-semibold">${{ $this->totalPrice + $defaultshipping }}</span>
                </div>
                <div class="border-b border-[#D5CEA3] pb-3">
                    <p class="font-semibold">Shipping Address:</p>
                    <p class="italic">{{ $address->first_name }} {{ $address->last_name }} <span class="not-italic ">
                            {{ $address->phone_number }}</span></p>
                    <p class="italic">{{ $address->street_address }} {{ $address->district }} {{ $address->town_city }}
                        {{ $address->province }} {{ $address->postcode }}
                    </p>
                </div>
                @forelse ($cartitems as $cart_item)
                    <div class="flex justify-between my-3">
                        <div class="w-1/4">
                            <img class="rounded-lg" src="{{ asset('storage/' . $cart_item->products->product_image) }}"
                                alt="{{ $cart_item->products->product_name }}">
                        </div>
                        <div class="w-3/4 ml-3">
                            <div class="my-5">
                                <div class="font-semibold flex text-sm justify-between uppercase">
                                    <span class="text-xl">{{ $cart_item->products->product_name }}
                                    </span>
                                    <span
                                        class="text-2xl">${{ $cart_item->products->product_price * $cart_item->amount }}</span>
                                </div>
                                <div class="font-semibold flex text-sm justify-between ">
                                    <span class="">Quantity {{ $cart_item->amount }}
                                    </span>
                                    <span class="">${{ $cart_item->products->product_price }} each</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="w-1/2 bg-white p-20">
                <div class="flex justify-between mb-10">
                    <h1 class="font-semibold text-3xl">Select payment method</h1>
                </div>
                <div class="mt-3">
                    <div class="credit-card w-full mx-auto" x-data='creditCard'>
                        <header class="flex flex-col justify-center items-center">
                            <div class="relative" x-show="card === 'front'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100">
                                <img src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/svg-cards/card-visa-front.png"
                                    alt="front credit card" class="w-full h-auto">
                                <div
                                    class="front bg-transparent text-lg w-full text-white px-12 absolute left-0 bottom-12">
                                    <p class="number mb-5 sm:text-xl"
                                        x-text="cardNumber !== '' ? cardNumber : '0000 0000 0000 0000'"></p>
                                    <div class="flex flex-row justify-between">
                                        <p x-text="cardholder !== '' ? cardholder : 'Card holder'"></p>
                                        <div class="">
                                            <span x-text="expired.month"></span>
                                            <span x-show="expired.month !== ''">/</span>
                                            <span x-text="expired.year"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative" x-show="card === 'back'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100">
                                <img class="w-full h-auto"
                                    src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/svg-cards/card-visa-back.png"
                                    alt="">
                                <div
                                    class="bg-transparent text-white text-xl w-full flex justify-end absolute bottom-20 px-8  sm:bottom-24 right-0 sm:px-12">
                                    <div class="border border-white w-16 h-9 flex justify-center items-center">
                                        <p x-text="securityCode !== '' ? securityCode : 'code'"></p>
                                    </div>
                                </div>
                            </div>
                            <ul class="flex">
                                <li class="mx-2">
                                    <img class="w-16"
                                        src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/computop.png"
                                        alt="" />
                                </li>
                                <li class="mx-2">
                                    <img class="w-14"
                                        src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/verified-by-visa.png"
                                        alt="" />
                                </li>
                                <li class="ml-5">
                                    <img class="w-7"
                                        src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/mastercard-id-check.png"
                                        alt="" />
                                </li>
                            </ul>
                        </header>
                        <main class="mt-4 p-4">
                            <form role="form" class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf
                                <h1 class="text-xl font-semibold text-gray-700 text-center">Card payment</h1>
                                <div class="">
                                    <div class="my-3">
                                        <input type="text" id="" wire:model="cardholder"
                                            class="block w-full px-5 py-2 border rounded-lg bg-white  placeholder-gray-400 text-gray-700 focus:ring "
                                            placeholder="Card holder" maxlength="22" x-model="cardholder" />
                                    </div>
                                    <div class="my-3">
                                        <input type="text"
                                            class="block card-number w-full px-5 py-2 border rounded-lg bg-white  placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="Card number" x-model="cardNumber" x-on:keydown="format()"
                                            x-on:keyup="isValid()" maxlength="19" />
                                    </div>
                                    <div class="my-3 flex flex-col">
                                        <div class="mb-2">
                                            <label for="" class="text-gray-700">Expired</label>
                                        </div>
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                            <select name="" id="card-expiry-month"
                                                class="card-expiry-month form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white  placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                                x-model="expired.month">
                                                <option value="" selected disabled>MM</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <select name="" id="card-expiry-year"
                                                class="card-expiry-year form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white  placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                                x-model="expired.year">
                                                <option value="" selected disabled>YY</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>

                                            </select>
                                            <input type="text" id="card-cvc"
                                                class="block w-full col-span-2 px-5 py-2 border rounded-lg bg-white placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                                placeholder="Security code" maxlength="3" x-model="securityCode"
                                                x-on:focus="card = 'back'" x-on:blur="card = 'front'" />
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-12 error form-group hidden">
                                            <div class="alert-danger alert">Please correct the errors and try
                                                again.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="submit-button px-4 py-3 rounded-md bg-blue-300 text-blue-900 focus:ring focus:outline-none w-full text-xl font-semibold transition-colors"
                                    x-bind:disabled="!isValid" type="submit">
                                    Pay now
                                </button>
                            </form>
                        </main>
                    </div>
                </div>
                <div class="divider-cont">
                    <div class="relative flex my-4 items-center">
                        <div class="flex-grow border-t border-gray-400"></div>
                        <span class="flex-shrink mx-4 -mt-1 text-gray-400">
                            or
                        </span>
                        <div class="flex-grow border-t border-gray-400"></div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" wire:click='codPayment'
                        class="w-full text-white bg-blue-700 font-medium rounded-md text-sm mb-3 px-5 py-2.5 ">COD
                        (Cash
                        on Delivery)
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("creditCard", () => ({
            init() {
                console.log('Component mounted');
            },
            format() {
                if (this.cardNumber.length > 18) {
                    return;
                }
                this.cardNumber = this.cardNumber.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
            },
            get isValid() {
                if (this.cardholder.length < 5) {
                    return false;
                }
                if (this.cardNumber === '') {
                    return false;
                }
                if (this.expired.month === '' && this.expired.year === '') {
                    return false;
                }
                if (this.securityCode.length !== 3) {
                    return false;
                }
                return true;
            },
            cardholder: '',
            cardNumber: '',
            expired: {
                month: '',
                year: '',
            },
            securityCode: '',
            card: 'front',
        }));
    });
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hidden');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hidden');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hidden')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                @this.call('cardPayment', token)
            }
        }
    });
</script>
