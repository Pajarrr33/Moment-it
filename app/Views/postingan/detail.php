<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="w-screen h-screen flex items-center justify-center">
    <div class="flex items-center justify-center">
        <div class="container bg-gray-100 text-black">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div id="image-carousel" class="col-span-1 mx-auto splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="splide__slide__container  md:w-670 lg:w-800 xl:w-550">
                                    <img src="/img/grid/1.jpg" alt="Image 1" class="object-cover w-full h-full">
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container md:w-670 lg:w-800 xl:w-550">
                                    <img src="/img/grid/2.jpg" alt="Image 1" class="object-cover w-full h-full">
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container md:w-670 lg:w-800 xl:w-550">
                                    <img src="/img/grid/3.jpg" alt="Image 1" class="object-cover w-full h-full">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1 mx-auto md:mx-3">
                    <div class="pt-16">
                        <div class="flex pr-5 items-center justify-end">
                            <div class="p-3 mx-1 rounded-full bg-white">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </div>
                            <div class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                </svg>
                            </div>
                            <div class="p-3 mx-1 rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.0/dist/js/splide.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Splide('#image-carousel', {
        type: 'fade',
        heightRatio: 1,
        pagination: false,
        arrows: true,
        rewind: true,
    }).mount();

    // Add event listeners to show/hide arrows
    document.addEventListener('splide.slide.moved', function(event) {
        const splide = event.detail.splide;
        const index = event.detail.index;
        const track = splide.Components.Track.get();
        const slides = track.querySelectorAll('.splide__slide');

        console.log(slides);

        const prevArrow = splide.Components.Arrows.get().previous;
        const nextArrow = splide.Components.Arrows.get().next;

        // Hide previous arrow for first slide
        prevArrow.classList.toggle('hidden', index === 0);

        // Hide next arrow for last slide
        nextArrow.classList.toggle('hidden', index === slides.length - 1);
    });
});
</script>

<?= $this->endSection(); ?>