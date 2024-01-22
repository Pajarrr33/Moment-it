<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <div class="w-screen h-screen bg-black text-white flex items-center">
        <div class="container mx-auto w-full">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="col-span-1 bg-gray-300 p-4">a</div>
                <div class="col-span-1 bg-gray-300 p-4">a</div>
                <div class="col-span-1 bg-gray-300 p-4">a</div>
                <div class="col-span-1 bg-gray-300 p-4">a</div>
                <div class="col-span-1 bg-gray-300 p-4">a</div>
                <div class="col-span-1 bg-gray-300 p-4">a</div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>