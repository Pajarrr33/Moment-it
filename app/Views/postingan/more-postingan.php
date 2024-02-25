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