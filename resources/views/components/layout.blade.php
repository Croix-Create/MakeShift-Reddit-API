<!doctype html>

<title>Makeshift Reddit API</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

<script src="//unpkg.com/alpinejs" defer></script>

<style>

    .ui-container 
    {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
    }

    .ui-block 
    {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
 
    
    .title-footer
    {
        align-items: center;
        font-size: 50px;
        position: relative;
    }



    .footer-container::after {
    content: ""; /* Add pseudo-element to create the line */
    position: absolute;
    top: 100%; /* Position the line at the bottom of the top div */
    width: 120%; /* Set the width of the line to 80% */
    height: 2px; /* Set the height of the line (thickness) */
    background-color: black; /* Set the color of the line */
    }

    #submit:hover {
        background-image: linear-gradient(to right, #38A3A5, #80ED99);
        animation: moveBackground 5s ease-in infinite;
    }

    html {
        scroll-behavior: smooth;
    }

    body {

            text
            {
            font-family: "DM Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            }

            background-image: linear-gradient(to right, #38A3A5, #80ED99);
            animation: moveBackground 5s ease-in infinite;

            /* Styles for small screens (phones) */
            @media (max-width: 768px) {
            body {
                font-size: 14px;
            }
            }

            /* Styles for medium screens (tablets) */
            @media (max-width: 1024px) {
            body {
                font-size: 15px;
            }
            }

            /* Styles for large screens (PCs) */
            @media (min-width: 1025px) {
            body {
                font-size: 16px;
            }
            }

            font-size: 20px;
        }

        @keyframes moveBackground 
        {
            from { background-position: 0 0; } /* Starting position (no shift) */
            to { background-position: 100% 0; } /* Ending position (shifted all the way to the right) */
        }


</style>

<body>

<section class="px-6 py-8">

    <nav>
        
        <div class="ui-block" style="width: 100%">

            <div class="ui-container; width: 79%; padding-right: 100px:">

                <a href="/posts/create" class="ml-3 text-s">Make a Post</a>

                <a href="/showPosts" class="ml-3 text-s">Trending on Reddit</a>

                <a href="/search" class="ml-3 text-s">Search posts</a>
                    
                <a href="/sessions/login" class="ml-3 text-s">Sign In</a>

                <a href="/sessions/create" class="ml-3 text-s">Register</a>


            </div>

                <div style="display: flex; flex-direction: column; width: 16%; margin-left: auto;">

                <h1 style="font-size: 16px; margin-left: -26px;">
                <a href="/showPosts"> Specno Technical</a>
                </h1>


            </div>

        </div>
        

        

    </nav>

    {{  $slot }}
</section>


<div id="footer-branch">
    <footer id="newsletter" class="border border-opacity-5 rounded-xl rounded-full text-center">




    </footer>
</div>


@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-black-200 text-red-500 py-2 px-4 rounded-xl bottom-3 right-3 text-sm"

    >
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
</body>
