<?php include "+koneksi.php";
$data_setting = $pdo->query("SELECT * FROM settings")->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter - Landing Page Pemetaan Kost</title>
    <meta name="description"
        content="(Formerly Tailwind Toolbox) (Formerly Tailwind Toolbox) Free open source Tailwind CSS starter template (Hero Product) to use with node.js/npm, postcss+purgecss!">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,hero, product">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#3b7977">

    <!-- Primary Meta Tags -->
    <title>Tailwind Starter - Landing Page Pemetaan Kost</title>
    <meta name="title" content="Windy Toolbox - Free Starter Templates and Components for Tailwind CSS">
    <meta name="description"
        content="Free open source Tailwind CSS starter Templates and Components to get you started quickly to creating websites in Tailwind CSS!">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.tailwindtoolbox.com/">
    <meta property="og:title" content="Windy Toolbox - Free Starter Templates and Components for Tailwind CSS">
    <meta property="og:description"
        content="Free open source Tailwind CSS starter Templates and Components to get you started quickly to creating websites in Tailwind CSS!">
    <meta property="og:image" content="https://www.tailwindtoolbox.com/social.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.tailwindtoolbox.com/">
    <meta property="twitter:title" content="Windy Toolbox - Free Starter Templates and Components for Tailwind CSS">
    <meta property="twitter:description"
        content="Free open source Tailwind CSS starter Templates and Components to get you started quickly to creating websites in Tailwind CSS!">
    <meta property="twitter:image" content="https://www.tailwindtoolbox.com/social.png">
    <!-- Font Awesome if you need it
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!--Replace with your tailwind.css once created-->
    <!-- AOS Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />


    <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #38b2ac 50%, #3182ce 100%);
        }
    </style>


</head>


<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">

    <!--Nav-->
    <nav id="header" class="fixed top-0 z-30 w-full text-white">
        <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
            <!-- Logo -->
            <div class="flex items-center pl-4">
                <a class="text-2xl font-bold text-white no-underline toggleColour hover:no-underline lg:text-4xl"
                    href="index2.php">
                    <svg class="inline h-8 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512.005 512.005">
                        <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" />
                        <path class="plane-take-off"
                            d="M510.7 189.151 C505.271 168.95 484.565 156.956 464.365 162.385 L330.156 198.367 L155.924 35.878 L107.19 49.008 L211.729 230.183 L86.232 263.767 L36.614 224.754 L0 234.603 L45.957 314.27 L65.274 347.727 L105.802 336.869 L240.011 300.886 L349.726 271.469 L483.935 235.486 C504.134 230.057 516.129 209.352 510.7 189.151 Z" />
                    </svg> GeoKost.ID
                </a>
            </div>

            <!-- Hamburger -->
            <div class="block pr-4 lg:hidden">
                <button id="nav-toggle"
                    class="flex items-center px-3 py-2 text-gray-500 border border-gray-600 rounded appearance-none hover:text-gray-800 hover:border-teal-500 focus:outline-none">
                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black bg-white lg:flex lg:items-center lg:w-auto lg:block lg:mt-0 lg:bg-transparent lg:p-0"
                id="nav-content">
                <ul class="items-center justify-end flex-1 list-reset lg:flex">
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 font-bold text-black no-underline" href="#home">Home</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline"
                            href="#about">About</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline"
                            href="#kost">List Kost</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline"
                            href="#fitur">Fitur</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline"
                            href="#maps">Maps</a>
                    </li>
                </ul>
                <button id="navAction"
                    class="px-8 py-4 mx-auto mt-4 font-bold text-gray-800 bg-white rounded-full shadow opacity-75 lg:mx-0 hover:underline lg:mt-0"
                    onclick="location.href='#cta'">Get Started</button>
            </div>
        </div>
        <hr class="py-0 my-0 border-b border-gray-100 opacity-25" />
    </nav>