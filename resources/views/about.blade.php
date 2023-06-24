<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-3xl font-bold mb-4">About Us</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div class="rounded-lg bg-blue-300 p-6">
                            <div class="flex justify-center items-center h-full">
                                <p class="mb-4 text-lg text-center">
                                    We are a leading furniture transportation company, specializing in providing reliable and efficient services for both residential and commercial clients.
                                </p>
                            </div>
                            <div class="flex justify-center items-center h-full">
                                <p class="mb-4 text-lg text-justify">
                                    At Furniture Transport Co., we understand the importance of safe and secure transportation of your valuable furniture items. Our team of experienced professionals ensures that your furniture is handled with the utmost care and delivered to its destination in perfect condition.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white">
                            <img src="{{ asset('images/delivery4.jpg') }}" alt="Delivery" class="w-full max-h-160 mx-auto mt-4 rounded-lg">
                        </div>

                        <div class="bg-white">
                            <img src="{{ asset('images/delivery2.jpg') }}" alt="Delivery 2" class="w-full max-h-160 mx-auto mt-4 rounded-lg">
                        </div>

                        <div class="rounded-lg bg-blue-300 p-6">
                            <div class="flex justify-center items-center h-full">
                                <p class="mb-4 text-lg text-center">
                                    Our team of skilled professionals is dedicated to providing personalized and reliable furniture transportation services. We take the time to understand your unique requirements and tailor our solutions to meet your specific needs.
                                </p>
                            </div>
                            <div class="flex justify-center items-center h-full">
                                <p class="mb-4 text-lg text-justify">
                                    With our state-of-the-art equipment and modern transportation vehicles, we guarantee the safe and secure handling of your furniture throughout the entire transportation process. Your satisfaction is our utmost priority.
                                </p>
                            </div>
                        </div>

                        <div class="rounded-lg bg-blue-300 p-6">
                            <div class="flex justify-center items-center h-full">
                                <p class="mb-4 text-lg text-center">
                                    Contact us today to learn more about our services and how we can assist you with your furniture transportation needs. Our friendly and knowledgeable team is ready to answer all your questions and provide you with a tailored transportation solution.
                                </p>
                            </div>
                            <div class="flex justify-center items-center h-full">
                                <p class="mb-4 text-lg text-justify">
                                    Experience hassle-free furniture transportation with Furniture Transport Co. and enjoy peace of mind knowing that your valuable furniture is in the hands of experts.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white">
                            <img src="{{ asset('images/delivery3.jpg') }}" alt="Delivery 3" class="w-full max-h-160 mx-auto mt-4 rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
