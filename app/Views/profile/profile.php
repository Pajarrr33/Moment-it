<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="bg-black text-white">
    <div class="pt-20 flex flex-col items-center justify-center">
        <img src="/upload/profile/<?= $profile['folder'] ?>/<?= $profile['profile_picture'] ?>"
            class="h-20 w-20 rounded-full border border-white object-cover" alt="Flowbite Logo" />
        <p class="mt-5 font-poppins text-2xl"><?= $profile['username'] ?></p>
        <p class="mt-3 font-poppins text-lg"><?= $profile['bio'] ?></p>
        <?php $session = session(); if($session->get('id_user') == $profile['id_user']) : ?>
        <div class="pt-3 grid grid-cols-3 items-center justify-center">
            <div class="col-span-1 mx-2 flex items-center justify-center">
                <a href="/edit-profile/<?= $profile['id_user'] ?>" class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Edit</a>
            </div>
            <div class="col-span-1 mx-2 flex items-center justify-center">
                <a href="/logout" class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Logout</a>
            </div>
            <div class="col-span-1 mx-2 flex items-center justify-center">
                <a href="#" onclick="confirmDeleteProfile('/delete-profile/<?= $profile['id_user'] ?>')" class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Delete</a>
            </div>
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
                    <h1 class="font-poppin text-white"><?= $p['judul'] ?></h1>
                </a>  
                <?php break; endif; endforeach ?>
            </div>
        </div>
        <?php endif ; endforeach ; ?>
    </div>
    <div id="sudah-disimpan" class="mx-2 hidden gap-4 columns-2 sm:columns-4 mt-10 lg:columns-5">
        <?php foreach($album as $a) : ?>
        <div class="flex flex-col break-inside-avoid mb-3 items-center">
            <div class="max-w-44 overflow-hidden lg:max-w-64 xl:max-w-80 2xl:max-w-96">
                <a href="/album/<?= $profile['username'] ?>/<?= $a['id_album'] ?>">
                    <img class="relative object-cover brightness-95 rounded-2xl"
                    src="/upload/album_thumnail/<?= $a['folder'] ?>/<?= $a['thumnail'] ?>" alt="Image">
                    <h1 class="text-poppin text-white"><?= $a['album_name'] ?></h1>
                </a>  
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

    $(document).ready(function(){
        var username = <?= json_encode($profile['username']); ?>;
        var start = 1;
        $(window).scroll(function(){
            var posisi = $(window).scrollTop();
            var bawah = $(document).height() - $(window).height();
            // console.log(bawah);
            if(posisi >= bawah) {
                infinitesrollprocess = $.ajax({
                    url: "<?= site_url('/get-more-profile') ?>",
                    type: "POST",
                    data: {start: start,username: username}
                });
                infinitesrollprocess.done(function(data){
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

    $("#dibuat").on("click", function(){
        $("#sudah-dibuat").removeClass("hidden");
        $("#sudah-disimpan").addClass("hidden");
        $("#disimpan").removeClass("underline")
        $("#dibuat").addClass("underline");
    })

    $("#disimpan").on("click", function(){
        $("#sudah-dibuat").addClass("hidden");
        $("#sudah-disimpan").removeClass("hidden");
        $("#dibuat").removeClass("underline");
        $("#disimpan").addClass("underline")
    })
</script>
<?= $this->endSection() ?>