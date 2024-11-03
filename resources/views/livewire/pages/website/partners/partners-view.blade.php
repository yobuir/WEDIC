<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #FAFAFA; 
    }
    .container {
        width: 100%;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #FFFFFF; 
    }
    h1 {
        font-size: 24px;
        margin: 0; 
        text-align: center;
        font-weight: bold;
    }
    .swiper-container {
        width: 100%; 
        height: auto;
        overflow: hidden; /* Ensure no overflow */
    }
    .swiper-wrapper {
        display: flex;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px; 
        box-sizing: border-box;
    }
    .swiper-slide img {
        max-height: 100px;
        object-fit: cover; /* Changed to cover for better image fit */
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .swiper-slide img {
            max-height: 80px;
        }
    }
    @media (max-width: 768px) {
        .swiper-slide img {
            max-height: 60px;
        }
    }
    @media (max-width: 640px) {
        .swiper-slide img {
            max-height: 50px;
        }
        .swiper-slide {
            width: 100%; /* Ensure full width for small screens */
        }
    }
</style>

<div class="swiper-container">
    <div class="swiper-wrapper">
        @forelse ($partners as $item)
            <div class="swiper-slide">
                <a href="{{ $item->url}}" target="_blank" rel="noreferrer">
                    <img src="{{ $item->logo}}" alt="Microsoft">
                </a>
            </div>
            
            
            
        @empty
            <div>No partners added yet</div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1280: {
                slidesPerView: 5,
                spaceBetween: 25,
            },
        },
    });
</script>
