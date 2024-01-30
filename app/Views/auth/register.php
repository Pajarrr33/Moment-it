<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Moment it | Register</title>
</head>

<body>
    <div class="w-screen h-screen flex flex-col items-center justify-center text-white"
        style="background-image: url('/img/Walpaper.png'); background-size: cover;">
        <h1 class="font-poppins text-4xl mb-5">Register</h1>

        <?php $session = session() ; if($session->get('error')) : ?>

        <?php var_dump($session->get('error')) ; endif ; ?>
        <form action="/valid-register" method="post">
            <div class="mt-5 grid grid-cols-1 md:grid-cols-2">
                <div class="col-span-1 mx-3">
                    <input type="email" name="email" id=""
                        class="font-poppins border border-black md:p-5 w-646 h-13 rounded-50 text-black" placeholder="Email">
                </div>
                <div class="col-span-1 mx-3">
                    <input type="text" name="username" id=""
                        class="font-poppins border border-black md:p-5 w-646 h-13 rounded-50 text-black" placeholder="Username">
                </div>
            </div>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2">
                <div class="col-span-1 mx-3">
                    <input type="password" name="password" id=""
                        class="font-poppins border border-black md:p-5 w-646 h-13 rounded-50 text-black" placeholder="Password">
                </div>
                <div class="col-span-1 mx-3">
                    <input type="password" name="password2" id=""
                        class="font-poppins border border-black md:p-5 w-646 h-13 rounded-50 text-black" placeholder="Repeat password">
                </div>
            </div>
            <div class="mt-10 md:flex flex-col items-center justify-center">
                <button type="submit" class=" font-poppins md:p-5 w-646 h-13 rounded-50 text-white" style="background-color: #376FFF;">
                    <h1 class="font-poppins text-2xl"><b>Register</b></h1>
                </button>
            </div>

            <div class="mt-5 md:flex flex-col items-center justify-center">
                <h1 class="font-poppins">Already have an account? <a href="/login" class="hover:underline focus:underline">Login here</a></h1>
            </div>
        </form>
    </div>
</body>

</html>