<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<style>
.pagination {
    color: white;
}
</style>

<h1 class="font-poppins text-2xl font-bold text-white pt-20 flex justify-center"><?= $dicari ?></h1>
<div class="mx-2 gap-4 columns-2 sm:columns-4 mt-5 lg:columns-5" id="all-postingan">
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

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        var pencarian = <?= json_encode($dicari); ?>;
        var start = 1;
        $(window).scroll(function(){
            var posisi = $(window).scrollTop();
            var bawah = $(document).height() - $(window).height();
            // console.log(bawah);
            if(posisi >= bawah) {
                infinitesrollprocess = $.ajax({
                    url: "<?= site_url('/get-more-search') ?>",
                    type: "POST",
                    data: {start: start,search: pencarian}
                });
                infinitesrollprocess.done(function(data){
                    $("#all-postingan").append(data);
                    start += 1;
                });     
            }
        });
    })
</script>

<?= $this->endSection() ?>