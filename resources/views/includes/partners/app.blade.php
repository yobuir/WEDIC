@if (count($partners) > 0)
    <div class="bg-gray-100">
        <div class="container mx-auto py-16">
            <div class="flex flex-col items-center">
                <h2 class="text-3xl md:text-4xl font-semibold text-wedic-blue-500 mb-6">Our Partners and Sponsors</h2>
                <p class="text-lg text-gray-600 mb-12">
                    We are grateful for the support of our partners and sponsors. Together, we can make a difference in
                    promoting oral health worldwide.
                </p>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @forelse ($partners as $partner)
                        <a  wire:navigate href="{{ $partner?->url }}" target="__blank" class="flex justify-center items-center" wire:key="{{ $partner?->id }}">
                            <img src="{{ $partner?->logo }}" alt="{{ $partner?->name }}" class='w-24 h-24 object-cover' />
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endif
