<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <div class="w-screen h-screen bg-black text-white">
        <div class="pt-28 flex flex-col items-center justify-center">
            <img src="/img/user.png" class="h-20 rounded-full border border-white" alt="Flowbite Logo" />
            <p class="mt-5 font-poppins text-2xl">Ahmad Fajar Shidik</p>
            <div class="mt-10 grid grid-cols-2">
                <div class="col-span-1 mx-2">
                    <a href=""  class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Edit</a>
                </div>
                <div class="col-span-1 mx-2">
                    <a href=""  class="bg-white text-black font-poppins md:px-16 py-2 rounded-50">Delete</a>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>