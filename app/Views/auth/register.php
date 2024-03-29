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
    <title>Moment-it | Register</title>
</head>

<body>
    <?php $session = session() ; ?>
    <div class="w-screen h-screen flex flex-col items-center justify-center text-white"
        style="background-image: url('/img/Walpaper.png'); background-size: cover;">
        <h1 class="font-poppins text-4xl mb-5">Register</h1>
        <form action="/valid-register" method="post">
            <div class="mt-5 justify-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2">
                <div class="col-span-1 mx-auto md:mx-3">
                    <div class="relative">
                        <input type="email" name="email" id=""
                            class="font-poppins border border-black text-black p-3 w-48 h-12 mb-5 sm:mb-10 sm:w-60 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-md md:w-72 md:h-14 rounded-50 md:text-lg lg:w-96 lg:h-16 rounded-50 lg:text-xl"
                            placeholder="Email">
                        <?php if(isset($session->get('error')['email'])) : ?>
                            <p class="text-red-600 absolute bottom-5 left-4"><?= $session->get('error')['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-span-1 mx-auto md:mx-3">
                    <div class="relative">
                        <input type="text" name="username" id=""
                            class="font-poppins border border-black text-black p-3 w-48 h-12 mb-5 sm:mb-10 sm:w-60 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-md md:w-72 md:h-14 rounded-50 md:text-lg lg:w-96 lg:h-16 rounded-50 lg:text-xl"
                            placeholder="Username">
                        <?php if(isset($session->get('error')['username'])) : ?>
                            <p class="text-red-600 absolute bottom-5 left-4"><?= $session->get('error')['username'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-span-1 mx-auto md:mx-3">
                    <div class="relative">
                        <input type="password" name="password" id=""
                            class="font-poppins border border-black text-black p-3 w-48 h-12 mb-5 sm:mb-10 sm:w-60 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-md md:w-72 md:h-14 rounded-50 md:text-lg lg:w-96 lg:h-16 rounded-50 lg:text-xl"
                            placeholder="Password">
                        <?php if(isset($session->get('error')['password'])) : ?>
                            <p class="text-red-600 absolute bottom-5 left-4"><?= $session->get('error')['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-span-1 mx-auto md:mx-3">
                    <div class="relative">
                        <input type="password" name="password2" id=""
                            class="font-poppins border border-black text-black p-3 w-48 h-12 mb-5 sm:mb-10 sm:w-60  rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-md md:w-72 md:h-14 rounded-50 md:text-lg lg:w-96 lg:h-16 rounded-50 lg:text-xl"
                            placeholder="Repeat password">
                        <?php if(isset($session->get('error')['password2'])) : ?>
                            <p class="text-red-600 absolute bottom-5 left-4"><?= $session->get('error')['password2'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center">
                <button type="submit"
                    class="font-poppins text-white p-3 w-48  h-12 rounded-50 text-md sm:w-60 sm:h-12 sm:rounded-50 sm:text-md md:w-72 md:h-14 rounded-50 md:text-lg lg:w-96 lg:h-16 rounded-50 lg:text-xl"
                    style="background-color: #376FFF;">
                    <h1 class="font-poppins text-2xl"><b>Register</b></h1>
                </button>
            </div>

            <div class="mt-5 flex flex-col items-center justify-center">
                <h1 class="font-poppins">Already have an account? <a href="/login"
                        class="hover:underline focus:underline">Login here</a></h1>
            </div>
        </form>
    </div>
</body>

</html>