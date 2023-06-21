<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furniture Transport Order System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @auth
                        <p class="text-4xl font-bold">{{ __("Welcome,") }} {{ Auth::user()->name }}</p>
                        <p class="text-xl p-6"><a href="{{ route('services') }}" class="text-blue-500 hover:text-blue-700">{{ __("Make order ⬅") }}</a></p>
                    @endauth

                    @guest
                        <p class="text-4xl font-bold">{{ __("Welcome, guest!") }}</p>
                        <p class="text-xl">{{__("Please ")}}<a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">{{ __("Log in") }}</a>
                            {{__("or ")}}<a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">{{ __("Register") }}</a> {{__("to make an order.") }}</p>
                    @endguest

                    <div class="mb-6">
                        <img src="{{ asset('images/furnituretransport.jpg') }}" alt="Furniture Transport Image" class="w-full max-h-160 mx-auto">
                    </div>

                    <div class="flex flex-wrap -mx-4 mb-4">
                        <div class="w-full md:w-1/2 px-4 mb-4">
                            <div class="h-full rounded-lg bg-blue-300 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center mb-4">
                                        <img src="{{ asset('images/fast_icon.png') }}" alt="Fast Icon" class="w-1/4 mx-auto">
                                    </div>
                                    <h3 class="text-2xl font-bold text-center">Fast and Easy</h3>
                                    <p>We pride ourselves on providing a fast and easy furniture transportation experience, ensuring that your custom-made pieces are delivered promptly and efficiently, without any hassle or delays</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-4 mb-4">
                            <div class="h-full rounded-lg bg-blue-300 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center mb-4">
                                        <img src="{{ asset('images/trust_icon.png') }}" alt="Trust Icon" class="w-1/4 mx-auto">
                                    </div>
                                    <h3 class="text-2xl font-bold text-center">Trustworthy</h3>
                                    <p>Our company is built on trust and reliability. With our proven track record and dedicated team of professionals, you can trust us to handle your valuable custom furniture with the utmost care and ensure its safe and secure delivery to your desired location.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-4 mb-4">
                        <div class="w-full md:w-1/2 px-4 mb-4">
                            <div class="h-full rounded-lg bg-blue-300 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center mb-4">
                                        <img src="{{ asset('images/price_icon.png') }}" alt="Price Icon" class="w-1/4 mx-auto">
                                    </div>
                                    <h3 class="text-2xl font-bold text-center">Great Prices</h3>
                                    <p>At our furniture transportation company, we offer competitive and affordable prices for our custom furniture delivery services. We believe in providing value for money, ensuring that you receive top-quality service at a great price point.</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-4 mb-4">
                            <div class="h-full rounded-lg bg-blue-300 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center mb-4">
                                        <img src="{{ asset('images/help_icon.png') }}" alt="Help Icon" class="w-1/4 mx-auto">
                                    </div>
                                    <h3 class="text-2xl font-bold text-center">Helpful</h3>
                                    <p>We take pride in our helpful and customer-oriented approach. Our team is always ready to assist you throughout the transportation process, offering guidance, answering your questions, and providing personalized solutions to meet your specific needs.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
