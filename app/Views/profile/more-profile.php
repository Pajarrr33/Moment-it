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