<?php $pager->setSurroundCount(0) ?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="flex items-center justify-center pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="inline border rounded-lg border-black p-4 bg-white text-black font-poppins">
                <a href="<?= $pager->getPrevious() ?>" class="prev"><?= lang('Pager.previous') ?></a>
            </li>
        <?php endif ?>
        <?php foreach ($pager->links() as $link): ?>
        <li class="inline border rounded-lg border-black p-4 bg-white text-black font-poppins <?= $link['active'] ? 'underline' : '' ?>">
            <a href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
        <?php endforeach ; ?>
        <?php if ($pager->hasNext()) : ?>
        <li class="inline border rounded-lg border-black p-4 bg-white text-black font-poppins">
            <a href="<?= $pager->getNext() ?>" class="next">
                <?= lang('Pager.next') ?>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
