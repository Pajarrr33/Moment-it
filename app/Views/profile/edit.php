<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<style>
    .filepond--root{
        max-height: 350px;
    }
</style>

<div class="w-screen h-screen bg-black text-white flex items-center">
    <div class="container mx-auto w-full">
        <?php $session = session() ; if($session->get('error')) : ?>

        <?php var_dump($session->get('error')) ; endif ; ?>
        <form action="/update-profile/<?= $profile['id_user'] ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 bg-white sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 h-100 pr-5 pl-5 w-3/4 mx-auto rounded-lg">
                <div class="col-span-1 0 p-4 my-4 rounded-lg">
                    <input type="file" name="img[]" id="img">
                </div>
                <div class="col-span-1 my-7">
                    <div>
                        <h1 class="text-black font-poppins">Username</h1>
                        <input type="text" name="username" value="<?= $profile['username'] ?>" placeholder="Insert Username" id="" class="font-poppins border border-black p-2 w-full h-10 rounded-50 text-black">
                    </div>
                    <div>
                        <h1 class="text-black font-poppins">Email</h1>
                        <input type="email" name="email" value="<?= $profile['email'] ?>" placeholder="Insert Email" id="" class="font-poppins border border-black p-2 w-full h-10 rounded-50 text-black">
                    </div>
                    <div class="mt-2">
                        <h1 class="text-black font-poppins">Bio</h1>
                        <?php if($profile['bio'] == '') : ?>
                        <textarea name="Bio" id="" placeholder="Tambahkan bio" class="resize-none overflow-y-hidden font-poppins border border-black p-4 w-full h-28 rounded-3xl text-black justify-start"></textarea>
                        <?php else : ?>
                        <textarea name="Bio" id="" placeholder="Tambahkan bio" class="resize-none overflow-y-hidden font-poppins border border-black p-4 w-full h-28 rounded-3xl text-black justify-start"><?= $profile['bio'] ?></textarea>
                        <?php endif ; ?>
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
                revert: '/tmp-img-delete'
            }
        });

        const images = <?= json_encode($profile["profile_picture"]); ?>;
        const folder = <?= json_encode($profile['folder']); ?>;
        const url = <?= json_encode(base_url('/upload/profile/')); ?>;
            
        pond.addFiles(url + folder + "/" + images);
        </script>

<?= $this->endSection() ?>