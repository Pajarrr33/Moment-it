<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<style>
.pagination {
    color: white;
}
</style>

<div class="mx-2 gap-4 columns-2 sm:columns-4 mt-20 lg:columns-5">
    <?php foreach($postingan as $p) : ?>
    <div class="flex flex-col break-inside-avoid mb-3 items-center">
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

<?= $pager->links('postingan','pagination'); ?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    var page = 1;
    var loading = false;

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            if (!loading) {
                loading = true;
                page++;

                $.ajax({
                    url: '/fetch-post',
                    type: 'GET',
                    data: {
                        page: page
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#posts-container').append(response.posts);
                        $('#pagination').html(response.pager);
                        loading = false;
                    }
                });
            }
        }
    });
});
</script>

<?= $this->endSection() ?>