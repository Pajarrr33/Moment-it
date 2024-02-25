<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="w-screen h-screen flex items-center justify-center">
    <div class="flex items-center justify-center">
        <div class="container bg-gray-100 text-black">
            <div class="grid grid-cols-1 md:grid-cols-2 md:pb-0">
                <div id="image-carousel" class="col-span-1 mx-auto splide rounded-lg rounded-xl">
                    <div class="splide__track bg-gray-300">
                        <ul class="splide__list">
                            <?php foreach($gambar as $g) : ?>
                            <li class="splide__slide">
                                <div class="splide__slide__container w-full md:w-670 lg:w-800 xl:w-550">
                                    <img src="/upload/gambar_postingan/<?= $g['folder'] ?>/<?= $g['img'] ?>"
                                        alt="Image 1" class="object-contain w-full h-full">
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1 md:mx-3">
                    <div class="my-2 md:pt-8">
                        <div class="flex items-center justify-center md:justify-end md:pr-5">
                            <button type="button"
                                onclick="sharePost('<?= $postingan['judul'] ?>', '<?= $postingan['deskripsi'] ?>')"
                                class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                </svg>
                            </button>
                            <?php if(!$like) : ?>
                            <a href="/add-like/<?= $postingan['id_postingan'] ?>"
                                class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </a>
                            <?php else : ?>
                            <a href="/remove-like/<?= $postingan['id_postingan'] ?>/<?= $like['id_like'] ?>"
                                class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6 text-red-600">
                                    <path
                                        d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                </svg>
                            </a>
                            <?php endif ; ?>

                            <?php if(!$album_items) : ?>
                            <button id="open-modal" class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                </svg>
                            </button>
                            <?php else : ?>
                            <a href="/remove-album-items/<?= $album_items['id_items'] ?>/<?= $postingan['id_postingan'] ?>"
                                class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <?php endif; ?>

                            <!-- Modal Overlay -->
                            <div id="modal-overlay"
                                class="fixed top-0 left-0 w-full h-full bg-black opacity-50 z-50 hidden"></div>

                            <!-- Modal -->
                            <div id="modal"
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-4 rounded-md shadow-lg z-50 hidden">
                                <!-- Modal Content -->
                                <div class="text-center">
                                    <h2 class="text-2xl font-bold mb-2 font-poppins">Save To</h2>
                                    <hr class="mb-2">
                                    <?php foreach($album as $a) : ?>
                                    <a href="/add-album-items/<?= $postingan['id_postingan'] ?>/<?= $a['id_album'] ?>"
                                        class="flex items-start w-96 mb-2">
                                        <img src="/upload/album_thumnail/<?= $a['folder'] ?>/<?= $a['thumnail'] ?>"
                                            class="h-12 w-12 mt-2 object-cover" alt="">
                                        <p class="text-xl ml-2 font-poppins"><?= $a['album_name'] ?></p>
                                    </a>
                                    <hr class="mb-2">
                                    <?php endforeach; ?>
                                </div>

                                <div class="text-center" id="add-album">
                                    <button type="button" id="add-album-trigger" class="flex items-center w-96 mb-2">
                                        <div class="h-12 w-12 bg-gray-400 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-xl ml-2 font-poppins">New Album</p>
                                    </button>
                                    <hr class="mb-6">
                                </div>


                                <form id="add-album-form" action="/add-album/<?= $postingan['id_postingan'] ?>"
                                    method="post" class="hidden w-96">
                                    <input type="text" name="album_name" id=""
                                        class="w-full h-12 p-2 border rounded-lg border-black mb-2"
                                        placeholder="Set a name for your new album">
                                    <hr class="mb-6">
                                    <div class="text-right">
                                        <button type="button" id="close-form"
                                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
                                    </div>
                                </form>

                                <div class="text-right">
                                    <button id="close-modal"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Close</button>
                                </div>
                            </div>

                            <?php $session = session(); if($session->get('id_user') == $poster['id_user']) : ?>
                            <div class="relative">
                                <button id="dropdown-toggle" class="ease-in-out p-3 mx-1 rounded-full bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                    </svg>
                                </button>
                                <div id="dropdown-menu"
                                    class="absolute right-0 mt-3 w-36 rounded-md bg-white shadow-lg z-10 transition-all duration-300 ease-in-out transform opacity-0 scale-0">
                                    <div class="py-1">
                                        <!-- Dropdown Item -->
                                        <a href="/edit-postingan/<?= $postingan['id_postingan'] ?>"
                                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit</a>
                                        <!-- Dropdown Item -->
                                        <a href="#"
                                            onclick="confirmDelete('/delete-postingan/<?= $postingan['id_postingan'] ?>')"
                                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div id="poster" class="flex items-start justify-start mx-3">
                            <img src="/upload/profile/<?= $poster['folder'] ?>/<?= $poster['profile_picture'] ?>"
                                class="h-8 w-8 mt-2 object-cover rounded-full" alt="Moment it Logo" />
                            <div class="flex flex-col justify-start mx-2 max-w-xs">
                                <a href="/profile/<?= $poster['username'] ?>"
                                    class="text-xl"><b><?= $poster['username'] ?></b></a>
                                <div class="max-w-96 mt-1 break-all">
                                    <p class="text-xl font-poppins"><?= $postingan['judul'] ?></p>
                                    <p class="mt-2 text-base font-poppins"><?= $postingan['deskripsi'] ?></p>
                                    <div class="my-4">
                                        <a href="#" class="bg-gray-500 text-white p-2 text-base font-poppins rounded-lg"><?= $postingan['tag'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Outside of the scrolling container -->
                        <!-- Outside of the scrolling container -->
                        <!-- Outside of the scrolling container -->
                        <?php if(!empty($comment)) : ?>
                        <div id="comment" class="flex flex-col my-2 mx-3 bg-white rounded-lg h-56 max-h-56 overflow-auto">  
                            <h1 class="pl-2"><b>Komentar</b></h1>
                                <?php foreach($comment as $c) : foreach($user_comment as $uc) : if($uc['id_user'] == $c['id_user']) :?>
                                <div id="comment-<?= $c['id_komentar'] ?>"
                                    class="flex justify-between items-start py-3 px-2 relative">
                                    <!-- Wrapper for the image, username, isi, and dropdown -->
                                    <div class="inline-flex items-start">
                                        <img src="/upload/profile/<?= $uc['folder'] ?>/<?= $uc['profile_picture'] ?>"
                                            class="h-10 w-10 rounded-full object-cover" alt="Profile Picture" />
                                        <div class="flex flex-col justify-between mx-2 max-w-xs">
                                            <p><b><?= $uc['username'] ?></b></p>
                                            <div class="max-w-52">
                                                <p><?= $c['isi'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Dropdown inside of the relative positioned container -->
                                    <div class="relative inline-block ml-2">
                                        <button type="button" id="komentar-<?= $c['id_komentar'] ?>"
                                            class="inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Content -->
                                        <div id="komentar-dropdown-<?= $c['id_komentar'] ?>"
                                            class="absolute right-0 mt-2 w-36 rounded-md bg-white shadow-lg z-50 transition-all duration-300 ease-in-out transform opacity-0 scale-0">
                                            <div class="py-1">
                                                <!-- Dropdown Item -->
                                                <button type="button" id="edit-komentar-<?= $c['id_komentar'] ?>"
                                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit</button>
                                                <!-- Dropdown Item -->
                                                <a href="/remove-comment/<?= $postingan['id_postingan'] ?>/<?= $c['id_komentar'] ?>"
                                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="update-komentar-<?= $c['id_komentar'] ?>" class="hidden">
                                    <form action="/edit-comment/<?= $postingan['id_postingan'] ?>/<?= $c['id_komentar'] ?>"
                                        method="post" class="mt-3">
                                        <input type="text" name="komentar" id="" value="<?= $c['isi'] ?>"
                                            class="w-full h-10 bg-gray-200 text-black resize-none p-3 rounded-lg text-sm items-center overflow-hidden"
                                            placeholder="Tulis komentar">
                                        <button type="submit" class="hidden"></button>
                                    </form>
                                </div>
                                <?php endif; endforeach ; endforeach ; ?>
                        </div>
                        <?php else : ?>
                        <div class="flex my-2 mx-3 bg-white rounded-lg h-56 max-h-56 overflow-auto flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-32 h-32 text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                            </svg>
                            <h1 class="font-poppins text-gray-300">Theres no comment be the first one to comment</h1>
                        </div>
                        <?php endif ; ?>
                    </div>
                    <form action="/add-comment/<?= $postingan['id_postingan'] ?>" method="post" class="mx-3 mt-3">
                        <input type="text" name="komentar" id=""
                            class="w-full h-10 bg-gray-200 text-black resize-none p-3 rounded-lg text-sm items-center overflow-hidden"
                            placeholder="Tulis komentar">
                        <button type="submit" class="hidden"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.0/dist/js/splide.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
function confirmDelete(deleteUrl) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this post!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = deleteUrl; // Redirect to delete URL if confirmed
            }
        });
}

function sharePost(judul, deskripsi) {
    if (navigator.share) {
        navigator.share({
            title: judul,
            text: deskripsi,
            url: window.location.href
        }).then(() => {
            console.log('Shared Succesfully');
        }).catch((error) => {
            console.error('Error sharing', error);
        })
    }
}



$('#dropdown-toggle').on("click", function() {
    if ($('#dropdown-menu').hasClass('open')) {
        $('#dropdown-menu').removeClass('open');
        $('#dropdown-menu').removeClass('opacity-100 scacle-100');
        $('#dropdown-menu').addClass('opacity-0 scale-0');
    } else {
        $('#dropdown-menu').addClass('open');
        $('#dropdown-menu').removeClass('opacity-0 scale-0');
        $('#dropdown-menu').addClass('opacity-100 scacle-100');
    }
})

let images = <?= json_encode($gambar); ?>;


if (images.length > 1) {
  new Splide('#image-carousel', {
    type: 'fade',
    heightRatio: 1,
    pagination: false,
    arrows: true,
    rewind: true,
    fixedWidth: true, // Prevent sliding when there's only one image
    focus: 'center', // Ensure centered display for single image
  }).mount();
} else {
  new Splide('#image-carousel', {
    type: 'fade',
    heightRatio: 1,
    arrows: false,
    pagination: false,
    fixedWidth: true, // Ensure no sliding and centered display
  }).mount();
}


<?php foreach($comment as $c) : ?>
$('#komentar-<?= $c['id_komentar'] ?>').on("click", function() {
    if ($('#komentar-dropdown-<?= $c['id_komentar'] ?>').hasClass('open')) {
        $('#komentar-dropdown-<?= $c['id_komentar'] ?>').removeClass('open');
        $('#komentar-dropdown-<?= $c['id_komentar'] ?>').removeClass('opacity-100 scacle-100');
        $('#komentar-dropdown-<?= $c['id_komentar'] ?>').addClass('opacity-0 scale-0');
    } else {
        $('#komentar-dropdown-<?= $c['id_komentar'] ?>').addClass('open');
        $('#komentar-dropdown-<?= $c['id_komentar'] ?>').removeClass('opacity-0 scale-0');
        $('#komentar-dropdown-<?= $c['id_komentar'] ?>').addClass('opacity-100 scacle-100');
    }
})

$('#edit-komentar-<?= $c['id_komentar'] ?>').on("click", function() {
    if (!$('#update-komentar-<?= $c['id_komentar'] ?>').hasClass('open')) {
        if ($('#komentar-dropdown-<?= $c['id_komentar'] ?>').hasClass('open')) {
            $('#komentar-dropdown-<?= $c['id_komentar'] ?>').removeClass('open');
            $('#komentar-dropdown-<?= $c['id_komentar'] ?>').removeClass('opacity-100 scacle-100');
            $('#komentar-dropdown-<?= $c['id_komentar'] ?>').addClass('opacity-0 scale-0');
        }

        $('#comment-<?= $c['id_komentar'] ?>').removeClass('flex');
        $('#comment-<?= $c['id_komentar'] ?>').addClass('hidden');
        $('#update-komentar-<?= $c['id_komentar'] ?>').removeClass('hidden');
        $('#update-komentar-<?= $c['id_komentar'] ?>').addClass('block');
        $('#update-komentar-<?= $c['id_komentar'] ?>').addClass('open');
    }
})

<?php endforeach ; ?>

function openModal() {
    document.getElementById('modal-overlay').classList.remove('hidden');
    document.getElementById('modal').classList.remove('hidden');
}

// Close modal function
function closeModal() {
    document.getElementById('modal-overlay').classList.add('hidden');
    document.getElementById('modal').classList.add('hidden');
}

// Add event listeners to open and close modal
document.getElementById('open-modal').addEventListener('click', openModal);
document.getElementById('close-modal').addEventListener('click', closeModal);

$("#add-album-trigger").on("click", function() {
    $("#add-album").addClass("hidden");
    $("#close-modal").addClass("hidden");
    $("#add-album-form").removeClass("hidden");
})

$("#close-form").on("click", function() {
    $("#add-album-form").addClass("hidden");
    $("#add-album").removeClass("hidden");
    $("#close-modal").removeClass("hidden");
})

</script>

<?= $this->endSection(); ?>