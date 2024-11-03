 <div class="bg-blue-600 py-24">
     <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
         <h2 class="text-4xl font-bold text-center text-white mb-16">
             What Our Partners Say
             <div class="w-24 h-1 bg-white mx-auto mt-4"></div>
         </h2>
         <div class="relative">
             <div class="bg-white rounded-xl p-8 shadow-xl">
                 <div class="flex items-center gap-6">
                     <img src="{{ $testimonials[$activeTestimonial]['image'] }}"
                         alt="{{ $testimonials[$activeTestimonial]['author'] }}"
                         class="w-24 h-24 rounded-full object-cover">
                     <div>
                         <p class="text-2xl text-gray-600 italic mb-6">
                             "{{ $testimonials[$activeTestimonial]['quote'] }}"</p>
                         <div>
                             <div class="font-semibold text-xl">{{ $testimonials[$activeTestimonial]['author'] }}
                             </div>
                             <div class="text-blue-600">{{ $testimonials[$activeTestimonial]['role'] }}</div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="flex justify-center mt-8 gap-4">
                 <button wire:click="previousTestimonial"
                     class="p-1 w-12 h-12 rounded-full bg-white text-blue-600 hover:bg-gray-100 transition-colors">
                     <i class="fas fa-chevron-left"></i>
                 </button>
                 <button wire:click="nextTestimonial"
                     class="p-1 w-12 h-12 rounded-full bg-white text-blue-600 hover:bg-gray-100 transition-colors">
                     <i class="fas fa-chevron-right"></i>
                 </button>
             </div>
         </div>
     </div>
 </div>
