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

<body>


    <nav class="fixed top-0 w-full bg-black" id="navbar">
        <div class="max-w-screen-xl flex flex-wrap items-center mx-auto p-4">
            <div class="flex items-center justify-around">
                <a href="https://flowbite.com/"
                    class="flex items-center space-x-3 rtl:space-x-reverse md:mr-7 lg:mr-10 xl:mr-10 2xl:mr-10">
                    <img src="/img/Buat logo (2).png" class="h-11 rounded-full" alt="Flowbite Logo" />
                </a>
                <a href="" class="flex border pt-2.5 pb-2.5 pr-6 pl-6 md:mr-7 lg:mr-10 xl:mr-10 2xl:mr-10 bg-white"
                    style="border-radius: 45px;">
                    Home
                </a>
                <a href="" class="flex text-white pt-2.5 pb-2.5 pr-6 pl-6 md:mr-7 lg:mr-10 xl:mr-10 2xl:mr-10">
                    Post!
                </a>
                <form action="" class="flex md:mr-7 lg:mr-10 xl:mr-10 2xl:mr-10">
                    <div class="flex items-center justify-start bg-white lg:pt-2.5 pb-2.5 w-726 rounded-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="ml-3 mr-3 flex bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                        <input type="text" class="flex w-670">
                    </div>
                </form>
                <a href="" class="flex text-white md:mr-7 lg:mr-10 xl:mr-10 2xl:mr-10">
                    Logout
                </a>
                <a href="https://flowbite.com/" class="flex items-center  space-x-3 rtl:space-x-reverse">
                    <img src="/img/Buat logo (2).png" class="h-11 rounded-full" alt="Flowbite Logo" />
                </a>
            </div>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>
</body>

</html>