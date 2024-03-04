<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<style>
.pagination {
    color: white;
}
</style>

<div class="mx-2 gap-4 columns-2 sm:columns-4 mt-20 lg:columns-5" id="all-postingan">
    <?php foreach($postingan as $p) : ?>
    <div class="flex flex-col break-inside-avoid mb-3 items-center" id="postingan">
        <div class="max-w-44 overflow-hidden rounded-2xl lg:max-w-64 xl:max-w-80 2xl:max-w-96">
            <?php foreach($gambar as $g) :  if($p['id_postingan'] == $g['id_postingan']) :?>
            <a href="/detail-postingan/<?= $p['id_postingan'] ?>">
                <img class="relative object-cover brightness-95"
                    src="/upload/gambar_postingan/<?= $g['folder'] ?>/<?= $g['img'] ?>" alt="Image">
            </a>
            <?php break; endif; endforeach ?>
        </div>
    </div>
    <?php endforeach ?>
</div>
<div class="fixed p-6 bottom-6 right-0 text-white md:bottom-0">
    <button class="p-2 rounded-full bg-white text-black font-poppins" id="scroll-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
        </svg>
    </button>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        var start = 1;
        $(window).scroll(function(){
            var posisi = $(window).scrollTop();
            var bawah = $(document).height() - $(window).height();
            // console.log(bawah);
            if(posisi >= bawah) {
                infinitesrollprocess = $.ajax({
                    url: "<?= site_url('/get-more-postingan') ?>",
                    type: "POST",
                    data: {start: start}
                });
                infinitesrollprocess.done(function(data){
                    $("#all-postingan").append(data);
                    start += 1;
                });     
            }
        });
        $("#scroll-to-top").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });
    })
</script>

<?= $this->endSection() ?>