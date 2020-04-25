<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Statistics</title>
    <link
            rel="stylesheet"
            href="https://unpkg.com/tailwindcss@next/dist/tailwind.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700"
            rel="stylesheet"
    />
</head>
<body
        class="text-gray-700 bg-white"
        style="font-family: 'Source Sans Pro', sans-serif"
>
<!--Nav-->
<nav>
    <div
            class="container mx-auto px-6 py-2 flex justify-between items-center"
    >
        <a
                class="font-bold text-2xl lg:text-4xl"
                href="#"
        >
            Statistics
        </a>
        <div class="block lg:hidden">
            <button
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-teal-500 appearance-none focus:outline-none"
            >
                <svg
                        class="fill-current h-3 w-3"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                >
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:block">
            <ul class="inline-flex">
                <li>
                    <a class="px-4 font-bold" href="/">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Hero-->
<div
        class="py-20 bg-green-500"
>
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold mb-2 text-white">
            VATSIM Statistics For Iron Mic
        </h2>
        <h3 class="text-2xl mb-8 text-gray-200">
            Get accurate data quickly.
        </h3>
        <button
                class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider"
        >
            Search
        </button>
    </div>
</div>
<!--Call to Action-->
<section style="background-color: #667eea">
    <div class="container mx-auto px-6 text-center py-20">
        <h2 class="mb-6 text-4xl font-bold text-center text-white">
            Write something here...
        </h2>
        <h3 class="my-4 text-2xl text-white">
            I ran out of things to say...
        </h3>
        <button
                class="bg-white font-bold rounded-full mt-6 py-4 px-8 shadow-lg uppercase tracking-wider"
        >
            Click Nothing
        </button>
    </div>
</section>
<!--Footer-->
<footer class="bg-gray-100">
    <div class="container mx-auto px-6 pt-10 pb-6">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/4 text-center md:text-left ">
                <h5 class="uppercase mb-6 font-bold">Links</h5>
                <ul class="mb-4">
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >FAQ</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Help</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Support</a
                        >
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 text-center md:text-left ">
                <h5 class="uppercase mb-6 font-bold">Legal</h5>
                <ul class="mb-4">
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Terms</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Privacy</a
                        >
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 text-center md:text-left ">
                <h5 class="uppercase mb-6 font-bold">Social</h5>
                <ul class="mb-4">
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Facebook</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Linkedin</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Twitter</a
                        >
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 text-center md:text-left ">
                <h5 class="uppercase mb-6 font-bold">Company</h5>
                <ul class="mb-4">
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Official Blog</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >About Us</a
                        >
                    </li>
                    <li class="mt-2">
                        <a
                                href="#"
                                class="hover:underline text-gray-600 hover:text-orange-500"
                        >Contact</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>