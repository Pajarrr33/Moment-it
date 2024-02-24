<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.0/dist/css/splide.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Moment it | Email Verification</title>
</head>

<body class="bg-black">
    <div class="container mx-auto my-10 px-4 md:px-0">
        <img src="<?= base_url() ?>/img/Full Logo (1).png" alt="Moment it logo" class="w-20 md:w-32 lg:w-40 xl:w-48 h-auto mx-auto">

        <div class="flex flex-col items-center justify-center bg-white m-4 p-2  w-full md:max-w-md lg:max-w-lg xl:max-w-xl mx-auto rounded-lg">
            <img src="<?= base_url() ?>/img/2804530.jpg" alt="Email picture" class="w-20 sm:w-32 md:w-40 lg:w-48 xl:w-52 rounded-full mb-2 md:mb-4">

            <h1 class="font-poppins text-lg sm:text-xl  md:text-2xl xl:text-4xl text-center"><b>Email Verification</b></h1>
            <p class="font-poppins text-xs sm:text-sm md:text-base xl:text-xl text-center">To start using Moment it, we need to verify your email.</p>
            <p class="font-poppins text-xs sm:text-sm md:text-base xl:text-xl text-center underline"><?php echo $email; ?></p>
            <a href="<?= base_url() ?>/verification/<?php echo $active_code; ?>" class="mt-2 md:mt-4 xl:mt-6 px-4 md:px-6 xl:px-8 py-2 md:py-3 xl:py-4 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">CLICK TO VERIFY</a>
        </div>
    </div>
</body>

</html>