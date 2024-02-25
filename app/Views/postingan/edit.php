<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<?php $session = session() ; ?>
<style>
    .filepond--root{
        max-height: 350px;
    }
</style>

<div class="w-screen h-screen bg-black text-white flex items-center">
    <div class="container mx-auto w-full">
        <form action="/update-postingan/<?= $postingan['id_postingan'] ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 bg-white sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 h-100 pr-5 pl-5 w-3/4 mx-auto rounded-lg">
                <div class="col-span-1 0 p-4 my-4 rounded-lg">
                    <div class="relative">
                        <input type="file" name="img[]" id="img" multiple="multiple">
                        <?php if(isset($session->get('error')['img'])) : ?>
                            <p class="text-red-600 absolute top-20 left-0"><?= $session->get('error')['img'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-span-1 my-7">
                    <div class="relative">
                        <h1 class="text-black font-poppins">Judul</h1>
                        <input type="text" name="judul" value="<?= $postingan['judul'] ?>" placeholder="Tambahkan Judul" id="" class="font-poppins border border-black p-2 w-full h-10 rounded-50 text-black">
                        <?php if(isset($session->get('error')['judul'])) : ?>
                            <p class="text-red-600 absolute top-16 left-4"><?= $session->get('error')['judul'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="relative mt-5">
                        <h1 class="text-black font-poppins">Deskripsi</h1>
                        <textarea name="deskripsi" id="" placeholder="Tambahkan deskripsi" class="resize-none overflow-y-hidden font-poppins border border-black p-4 w-full h-24 rounded-3xl text-black justify-start"><?= $postingan['deskripsi'] ?></textarea>
                        <?php if(isset($session->get('error')['deskripsi'])) : ?>
                            <p class="text-red-600 absolute top-28 pt-2 left-4"><?= $session->get('error')['deskripsi'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="relative mt-4">
                        <h1 class="text-black font-poppins">Tags</h1>
                        <select name="tag" id="" class="font-poppins text-black border border-black p-2 w-full h-10 rounded-50">
                            <?php if ($postingan['tag'] === 'Animal'): ?>
                                <option value="Animal" selected>Animal</option>
                                <option value="Panorama">Panorama</option>
                                <option value="Family">Family</option>
                            <?php elseif ($postingan['tag'] === 'Panorama'): ?>
                                <option value="Panorama" selected>Panorama</option>
                                <option value="Animal">Animal</option>
                                <option value="Family">Family</option>
                            <?php elseif ($postingan['tag'] === 'Family'): ?>
                                <option value="Family" selected>Family</option>
                                <option value="Animal">Animal</option>
                                <option value="Panorama">Panorama</option>
                            <?php else: ?>
                                <option value="">-- Pilih Tag --</option>
                                <option value="Animal">Animal</option>
                                <option value="Panorama">Panorama</option>
                                <option value="Family">Family</option>
                            <?php endif; ?>
                        </select>
                        <?php if(isset($session->get('error')['tag'])) : ?>
                            <p class="text-red-600 absolute top-16 left-4"><?= $session->get('error')['tag'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mt-2 text-right">
                       <button type="submit" class="text-white pt-4 pb-4 pr-12 pl-12 rounded-50" style="background-color: #376FFF;">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.getElementById("navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 0) {
                    navbar.classList.remove("bg-black");
                    navbar.classList.add("bg-transparent");
                } else {
                    navbar.classList.remove("bg-transparent");
                    navbar.classList.add("bg-black");
                }
            });
        });
        //Get image preiview plugin 
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="img"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        pond.setOptions({
            server: {
                process: '/tmp-img',
                allowMultiple: true,
                revert: '/tmp-img-delete'
            }
        });

        let images = <?= json_encode($gambar); ?>;
        
        images.forEach(g => {
            const images = g.img ;
            const folder = g.folder ;
            const url = <?= json_encode(base_url('/upload/gambar_postingan/')); ?>;
                
            pond.addFiles(url + folder + "/" + images);
        });
        
        </script>

<?= $this->endSection() ?>