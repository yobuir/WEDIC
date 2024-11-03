  <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
      <div class="relative overflow-hidden aspect-video">
          <a wire:navigate href="{{ route('news.view', $blog?->slug) }}">
              <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                  src="{{ $blog?->featured_image }}" alt="{{ $blog?->title }}" />
          </a>
          <div class="absolute top-4 right-4 flex">
              <a wire:navigate href="{{ route('news.category', $blog?->category?->id) }}"
                  class="inline-flex text-white bg-wedic-blue-500 font-medium text-sm py-2 px-4 rounded-full">
                  {{ $blog?->category->name }}
              </a>
          </div>
      </div>
      <div class="p-6">
          <h3 class="text-xl font-bold text-black-500 mb-4 group-hover:text-wedic-blue-500 transition-colors duration-300">
              <a wire:navigate href="{{ route('news.view', $blog?->slug) }}">
                  {{ $blog?->title }}
              </a>
          </h3>
          <p class="text-black-400 mb-4">{{ Str::limit($blog?->header, 100) }}</p>
          <div class="flex items-center gap-3 mb-4">
              <i class="fas fa-calendar "></i>
              <div>
                  <p class="text-sm ">{{ $blog?->created_at?->format('M d, Y') }}</p>
              </div>
          </div>
          <a href="{{ route('news.view', $blog?->slug) }}"
              class="hover:underline text-blue-600 hover:text-blue-700 font-medium flex items-center">
              Read More
              <i class="fas fa-arrow-right ml-2"></i>
          </a>

      </div>
  </div>
