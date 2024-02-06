<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Moment it | Login</title>
</head>

<body>
    <div class="w-screen h-screen flex flex-col items-center justify-center text-white"
        style="background-image: url('/img/Walpaper.png'); background-size: cover;">
        <h1 class="font-poppins text-4xl mb-5">Login</h1>

        <form action="/valid-login" method="post">
            <?php $session = session() ; if($session->get('error')) : ?>

            <?php var_dump($session->get('error')) ; endif ; ?>
            <div class="mt-5">
                <input type="email" name="email" id=""
                    class="font-poppins border border-black text-black p-3 sm:w-72 w-72 h-12 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-lg md:w-96 md:h-16 rounded-50 text-xl"
                    placeholder="Email">
            </div>
            <div class="mt-10">
                <input type="password" name="password" id=""
                    class="font-poppins border border-black text-black p-3 sm:w-72 w-72 h-12 rounded-50 text-md sm:h-12 sm:rounded-50 sm:text-lg md:w-96 md:h-16 rounded-50 text-xl"
                    placeholder="Password">
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