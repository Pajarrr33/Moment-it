<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="bg-black text-white">
    <div class="pt-20 flex items-center justify-around">
        <div></div>
        <h1 class="font-poppins text-2xl font-bold"><?= $album['album_name'] ?></h1>
        <div class="relative">
            <button type="button" id="dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </button>
            <div id="dropdown-menu"
                class="absolute right-0 mt-3 w-36 rounded-md bg-white shadow-lg z-10 transition-all duration-300 ease-in-out transform opacity-0 scale-0">
                <div class="py-1">
                    <!-- Dropdown Item -->
                    <button id="open-modal" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit</button>
                    <!-- Dropdown Item -->
                    <a href="/delete-album/<?= $album['id_album'] ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div id="sudah-dibuat" class="mx-2 gap-4 columns-2 sm:columns-4 mt-10 lg:columns-5">
        <?php foreach($album_items as $ai) : foreach($postingan as $p) : if($ai['id_postingan'] == $p['id_postingan']) : ?>
        <div class="flex flex-col break-inside-avoid mb-3 items-center">
            <div class="max-w-44 overflow-hidden lg:max-w-64 xl:max-w-80 2xl:max-w-96">
                <?php foreach($gambar as $g) :  if($p['id_postingan'] == $g['id_postingan']) :?>
                <a href="/detail-postingan/<?= $p['id_postingan'] ?>">
                    <img class="relative object-cover brightness-95 rounded-2xl"
                        src="/upload/gambar_postingan/<?= $g['folder'] ?>/<?= $g['img'] ?>" alt="Image">
                    <h1 class="font-poppin text-white"><?= $p['judul'] ?></h1>
                </a>
                <?php break; endif; endforeach ?>
            </div>
        </div>
        <?php endif ; endforeach ; endforeach ; ?>
    </div>
</div>
<!-- Modal Overlay -->
<div id="modal-overlay" class="fixed top-0 left-0 w-full h-full bg-black opacity-50 z-50 hidden"></div>

<!-- Modal -->
<div id="modal"
    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-4 rounded-md shadow-lg z-50 hidden">
    <!-- Modal Content -->
    <div class="text-center w-96">
        <h2 class="text-2xl font-bold mb-2 font-poppins">Edit your album name</h2>
        <hr class="mb-2">
        <form id="add-album-form" action="/update-album/<?= $album['id_album'] ?>" method="post">
            <input type="text" name="album_name" value="<?= $album['album_name'] ?>" class="w-full h-12 p-2 border rounded-lg border-black mb-2"
                placeholder="Set a name for your album">
            <hr class="mb-6">
            <div class="text-right">
                <button type="button" id="close-modal"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
$('#dropdown-toggle').on("click", function() {
    if ($('#dropdown-menu').hasClass('open')) {
        $('#dropdown-menu').removeClass('open');
        $('#dropdown-menu').removeClass('opacity-100 scacle-100');
        $('#dropdown-menu').addClass('opacity-0 scale-0');
    } else {
        $('#dropdown-menu').addClass('open');
        $('#dropdown-menu').removeClass('opacity-0 scale-0');
        $('#dropdown-menu').addClass('opacity-100 scacle-100');
    }
})

function openModal() {
    $('#dropdown-menu').removeClass('open');
    $('#dropdown-menu').removeClass('opacity-100 scacle-100');
    $('#dropdown-menu').addClass('opacity-0 scale-0');
    document.getElementById('modal-overlay').classList.remove('hidden');
    document.getElementById('modal').classList.remove('hidden');
}

// Close modal function
function closeModal() {
    document.getElementById('modal-overlay').classList.add('hidden');
    document.getElementById('modal').classList.add('hidden');
}

// Add event listeners to open and close modal
document.getElementById('open-modal').addEventListener('click', openModal);
document.getElementById('close-modal').addEventListener('click', closeModal);
</script>
<?= $this->endSection() ?>