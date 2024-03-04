<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<style>
    .ml-6 {
      margin-left: 1.5rem;
    }
    .w-60 {
      width: 15rem;
    }
</style>
<div class="bg-black text-white">
    <div class="pt-20 flex justify-around w-full">
        <div class="flex justify-center items-start"></div>
        <div class="flex justify-center items-start ml-6">
            <img src="/upload/profile/<?= $profile['folder'] ?>/<?= $profile['profile_picture'] ?>"
                class="h-20 w-20 rounded-full border border-white object-cover" alt="Flowbite Logo" />
        </div>
        <div class="flex justify-end">
            <div class="relative">
                <button type="button" id="dropdown-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
                <div id="dropdown-menu"
                    class="absolute right-0 mt-3 w-36 rounded-md bg-white shadow-lg z-10 transition-all duration-300 ease-in-out transform opacity-0 scale-0">
                    <div class="py-1">
                        <!-- Dropdown Item -->
                        <a href="/logout" class="text-black font-poppins block px-4 py-2 hover:bg-gray-100">Logout</a>
                        <!-- Dropdown Item -->
                        <a href="#" onclick="confirmDeleteProfile('/delete-profile/<?= $profile['id_user'] ?>')"
                            class="text-black font-poppins block px-4 py-2 hover:bg-gray-100">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <p class="mt-5 font-poppins text-white text-2xl"><?= $profile['username'] ?></p>
        <p class="mt-3 font-poppins text-white text-lg"><?= $profile['bio'] ?></p>
        <?php $session = session(); if($session->get('id_user') == $profile['id_user']) : ?>
        <div class="pt-3 flex items-center justify-center">
            <div class="mx-2 flex items-center justify-center">
                <a href="/edit-profile/<?= $profile['id_user'] ?>"
                    class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Edit</a>
            </div>
            <!-- <div class="col-span-1 mx-2 flex items-center justify-center">
                <a href="/logout" class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Logout</a>
            </div>
            <div class="col-span-1 mx-2 flex items-center justify-center">
                <a href="#" onclick="confirmDeleteProfile('/delete-profile/<?= $profile['id_user'] ?>')" class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Delete</a>
            </div> -->
        </div>
        <?php endif ; ?>
        <div class="pt-8 grid grid-cols-2 items-center justify-center gap-5">
            <div class="col-span-1 mx-2 flex items-center justify-center">
                <button type="button" id="dibuat" class="text-white font-poppins underline">Dibuat</button>
            </div>
            <div class="col-span-1 mx-2 items-center justify-center">
                <button type="button" id="disimpan" class="text-white font-poppins">Disimpan</button>
            </div>
        </div>
    </div>
    <div id="sudah-dibuat" class="mx-2 gap-4 columns-2 sm:columns-4 mt-10 lg:columns-5">
        <?php foreach($postingan as $p) : if( $p['id_user'] == $profile['id_user'] ) : ?>
        <div class="flex flex-col break-inside-avoid mb-3 items-center">
            <div class="max-w-44 overflow-hidden lg:max-w-64 xl:max-w-80 2xl:max-w-96">
                <?php foreach($gambar as $g) :  if($p['id_postingan'] == $g['id_postingan']) :?>
                <a href="/detail-postingan/<?= $p['id_postingan'] ?>">
                    <img class="relative object-cover brightness-95 rounded-2xl"
                        src="/upload/gambar_postingan/<?= $g['folder'] ?>/<?= $g['img'] ?>" alt="Image">
                </a>
                <?php break; endif; endforeach ?>
            </div>
        </div>
        <?php endif ; endforeach ; ?>
    </div>
    <div id="sudah-disimpan" class="mx-2 hidden gap-4 columns-2 sm:columns-4 mt-10 lg:columns-5">
        <?php foreach($album as $a) :  ?>
        <?php $hasItems = false; foreach($album_items as $ai) : if($ai['id_album'] == $a['id_album']) : $hasItems = true;  foreach($all_postingan as $p) : if($ai['id_postingan'] == $p['id_postingan']) : foreach($gambar as $g) :  if($p['id_postingan'] == $g['id_postingan']) : ?>
        <div class="flex flex-col break-inside-avoid mb-3 items-center">
            <div class="max-w-44 overflow-hidden lg:max-w-64 xl:max-w-80 2xl:max-w-96">
                <a href="/album/<?= $profile['username'] ?>/<?= $a['id_album'] ?>">
                    <img class="relative object-cover brightness-95 rounded-2xl"
                        src="/upload/gambar_postingan/<?= $g['folder'] ?>/<?= $g['img'] ?>" alt="Image">
                    <h1 class="text-poppin text-white"><?= $a['album_name'] ?></h1>
                </a>
            </div>
        </div>
        <?php break; endif; endforeach; break; endif; endforeach; break; endif; endforeach; if (!$hasItems) : ?>
        <div class="flex flex-col break-inside-avoid mb-3 items-center">
            <div class="max-w-44 overflow-hidden lg:max-w-64 xl:max-w-80 2xl:max-w-96">
                <a href="/album/<?= $profile['username'] ?>/<?= $a['id_album'] ?>">
                    <div class="bg-gray-500 relative h-32 w-60 rounded-2xl">

                    </div>
                    <h1 class="text-poppin text-white"><?= $a['album_name'] ?></h1>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    var username = <?= json_encode($profile['username']); ?>;
    var start = 1;
    $(window).scroll(function() {
        var posisi = $(window).scrollTop();
        var bawah = $(document).height() - $(window).height();
        // console.log(bawah);
        if (posisi >= bawah) {
            infinitesrollprocess = $.ajax({
                url: "<?= site_url('/get-more-profile') ?>",
                type: "POST",
                data: {
                    start: start,
                    username: username
                }
            });
            infinitesrollprocess.done(function(data) {
                $("#sudah-dibuat").append(data);
                start += 1;
            });
        }
    });
})

function confirmDeleteProfile(deleteUrl) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover your account!",
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

$("#dibuat").on("click", function() {
    $("#sudah-dibuat").removeClass("hidden");
    $("#sudah-disimpan").addClass("hidden");
    $("#disimpan").removeClass("underline")
    $("#dibuat").addClass("underline");
})

$("#disimpan").on("click", function() {
    $("#sudah-dibuat").addClass("hidden");
    $("#sudah-disimpan").removeClass("hidden");
    $("#dibuat").removeClass("underline");
    $("#disimpan").addClass("underline")
})

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
</script>
<?= $this->endSection() ?>