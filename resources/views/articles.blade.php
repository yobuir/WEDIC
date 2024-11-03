<x-guest-layout>
    <div class="relative bg-gray-50 px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="relative mx-auto max-w-7xl">
        </div>
        @livewire('pages.website.article.articles', ['blog' => $blog])
    </div>
    <x-footer.app />
</x-guest-layout>
