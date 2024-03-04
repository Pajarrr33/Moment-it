<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/x-icon" href="/img/logo (2).png">
    <title>Moment-it | Login</title>
</head>


<?php $session = session() ; ?>
<body>
    <style>
        .text-green-400 {
          --tw-text-opacity: 1;
          color: rgb(74 222 128 / var(--tw-text-opacity));
        }
    </style>
    <div class="w-screen h-screen flex flex-col items-center justify-center text-white"
        style="background-image: url('/img/Walpaper.png'); background-size: cover;">
        <h1 class="font-poppins text-4xl mb-5">Login</h1>
        <?php if(session('error.login')) : ?>
            <p class="text-green-400 font-poppins"><?= session('error.login') ?></p>
        <?php endif; ?>
        <form action="/valid-login" method="post">
            <div class="relative">
                <input type="email" name="email" id=""
                    class="font-poppins border border-black text-black p-3 sm:w-72 w-72 h-12 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-lg md:w-96 md:h-16 rounded-50 text-xl"
                    placeholder="Email">
                    <?php if(isset($session->get('error')['email'])) : ?>
                        <p class="text-red-600 absolute top-16 left-8"><?= $session->get('error')['email'] ?></p>
                    <?php endif; ?>
            </div>
            <div class="mt-10 relative">
                <input type="password" name="password" id=""
                    class="font-poppins border border-black text-black p-3 sm:w-72 w-72 h-12 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-lg md:w-96 md:h-16 rounded-50 text-xl"
                    placeholder="Password">
                    <?php if(isset($session->get('error')['password'])) : ?>
                        <p class="text-red-600 absolute top-16 left-8"><?= $session->get('error')['password'] ?></p>
                    <?php endif; ?>
            </div>
            <div class="mt-10">
                <button type="submit"
                    class="flex flex-col items-center justify-center font-poppins text-white p-3 w-72 h-12 rounded-50 text-md sm:w-72 sm:h-12 sm:rounded-50 sm:text-lg md:w-96 md:h-16 rounded-50 text-xl "
                    style="background-color: #376FFF;">
                    <h1 class="font-poppins text-2xl"><b>Login</b></h1>
                </button>
            </div>


            <div class="mt-5 md:flex flex-col items-center justify-center">
                <h1 class="font-poppins">Doesnt have account? <a href="/register"
                        class="hover:underline focus:underline">Register here</a></h1>
            </div>
        </form>
    </div>
</body>

</html>