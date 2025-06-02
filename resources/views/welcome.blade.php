<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap" rel="stylesheet">
        <title>Welcome Page</title>
    </head>
    <body>
        <header>
            <div class="flex justify-between m-2 p-2">
                <div>
                    <!-- logo -->
                    <h1 class="text-3xl font-bold" style="font-family: 'Cherry Bomb One', cursive; color: #ffbf00">RuGoDyMur</h1>
                </div>
                <div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#ffbf00]"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ url('/login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-[#ffbf00] focus:outline-none focus-visible:ring-[#ffbf00]"
                                >
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-[#ffbf00] focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>
            <main class="flex flex-wrap items-center justify-between p-4">
                <div class="w-full lg:w-1/2 p-4">
                    <h2 class="text-4xl font-bold mb-4" style="font-family: 'Cherry Bomb One', cursive; color: #ffbf00;">
                        Welcome to RuGoDyMur
                    </h2>
                    <p class="text-lg text-gray-700">
                        RuGoDyMur is your one-stop shop for all your pet needs. From premium pet food to toys and accessories, we offer everything to keep your furry friends happy and healthy. Join our community and explore the best for your pets today!
                    </p>
                    <a
                        href="{{ route('register') }}"
                        class="mt-4 inline-block rounded-md px-4 py-2 text-white bg-[#ffbf00] hover:bg-[#e6a800] transition"
                    >
                        Shop Now
                    </a>
                </div>
                <div class="w-full lg:w-1/2 p-4">
                    <img
                        src="{{ asset('images/welcomepage.png') }}"
                        alt="Welcome Image"
                        class="rounded-lg shadow-lg w-full"
                    />
                </div>
            </main>
    </body>
</html>
