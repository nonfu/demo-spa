<template>
    <div>
        <div class="mb-4 md:mb-0 w-full mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                 style="background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.7));"></div>
            <img src="https://via.placeholder.com/640x480.png/00cc55?text=about"
                 class="absolute left-0 top-0 w-full h-full z-0 object-cover">
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    About Page
                </h2>
            </div>
        </div>
        <div class="post-content px-4 lg:px-0 mt-12 text-gray-700 mx-auto text-lg leading-relaxed">
            <p class="pb-6">
                Occaecati fugiat asperiores adipisci ullam perferendis blanditiis. Distinctio quia molestiae asperiores et nulla.
            </p>
            <p class="pb-6">
                Distinctio dignissimos saepe autem quas aut eum commodi. Tempora dolor voluptas perspiciatis incidunt
                consequuntur. Voluptates id neque illo minima perferendis consequatur quis.
            </p>
            <p class="pb-6">
                Sapiente quo officia consequatur at porro ut facilis. Tempore numquam et cupiditate omnis. Est et
                suscipit minus atque et rem minima. Aut iusto consequatur est neque nobis magni.
            </p>
        </div>
    </div>
</template>

<script>
import PostContent from './common/Content';

export default {
    components: {PostContent}

}
</script>
