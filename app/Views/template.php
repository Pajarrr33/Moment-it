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
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>

<body class="bg-black ">


    <nav class="fixed top-0 z-50 pb-5 w-full bg-black" id="navbar">
        <div class="w-screen flex flex-wrap items-center justify-center mt-2">
            <div class="flex flex-wrap items-center justify-center">
                <a href="https://flowbite.com/" class="flex items-center mr-1 sm:mr-1 md:mr-3 lg:mr-3 xl:mr-5">
                    <img src="/img/Logo.png" class="h-11 rounded-full" alt="Moment It logo" />
                </a>
                <a href=""
                    class="border pt-2.5 pb-2.5 pr-6 pl-6 bg-white hidden sm:mr-3 md:mr-3 md:block lg:mr-3 lg:block xl:mr-5 xl:block 2xl:mr-13"
                    style="border-radius: 45px;">
                    Home
                </a>
                <a href=""
                    class="text-white pt-2.5 pb-2.5 pr-6 pl-6 hidden sm:mr-3 md:mr-3 md:block lg:mr-3 lg:block xl:mr-5 xl:block">
                    Post
                </a>
                <form action="#" class="flex mr-1 sm:mr-1 md:mr-3 lg:mr-3 xl:mr-5">
                    <div
                        class="flex items-center justify-start bg-white pt-2.5 pb-2.5 w-726 sm:w-726 md:w-726 lg:w-726 xl:w-726 rounded-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="ml-3 mr-3 flex bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                        <input type="text" class="flex w-670 sm:w-670 md:w-670 lg:w-670 xl:w-670" placeholder="Search">
                    </div>
                </form>
                <a href="" class="text-white hidden mr-3 sm:mr-3 md:mr-3 lg:mr-3 xl:mr-5 md:block lg:block xl:block">
                    Logout
                </a>
                <a href="https://flowbite.com/" class="flex items-center">
                    <img src="/img/Buat logo (2).png" class="h-11 rounded-full" alt="Flowbite Logo" />
                </a>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <nav class="fixed bottom-0 w-full pb-2 pt-2 bg-black block sm:block md:hidden lg:hidden xl:hidden">
        <div class="flex flex-wrap items-center justify-center text-white">
            <a href="" class="flex flex-col items-center text-white mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                </svg>
            </a>
            <a href="" class="flex flex-col items-center text-white mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                </svg>
            </a>
        </div>
    </nav>
</body>

</html>