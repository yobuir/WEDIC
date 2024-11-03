 <footer class="bg-gray-900 text-gray-300">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
         <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
             <div>
                 <h3 class="text-2xl font-bold text-white mb-4">{{ config('app.name') }}</h3>
                 <p class="text-gray-400">
                     Empowering communities through inclusive excellence and sustainable development.
                 </p>
             </div>

             <div>
                 <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                 <ul class="space-y-2">
                     @foreach (['About Us', 'Services', 'Projects', 'Contact'] as $link)
                         <li>
                             <a href="#" class="hover:text-white transition-colors">{{ $link }}</a>
                         </li>
                     @endforeach
                 </ul>
             </div>

             <div>
                 <h3 class="text-wedic-blue-500 font-semibold mb-6">Contact Info</h3>
                 <ul class="">
                     <li class="flex items-center space-x-3 text-wedic-blue-200/80">
                         <div
                             class="w-10 h-10 rounded-full bg-black-800 flex items-center justify-center text-wedic-blue-500">
                             <i class="fas fa-map-marker-alt"></i>
                         </div>
                         <span>Norrsken House Kigali KN 76st</span>
                     </li>
                     <li class="flex items-center space-x-3 text-wedic-blue-200/80">
                         <div
                             class="w-10 h-10 rounded-full bg-black-800 flex items-center justify-center text-wedic-blue-500">
                             <i class="fas fa-phone"></i>
                         </div>
                         <a href="tel:+250795296952">+250795296952</a>
                     </li>

                     <li class="flex items-center space-x-3 text-wedic-blue-200/80">
                         <div
                             class="w-10 h-10 rounded-full bg-black-800 flex items-center justify-center text-wedic-blue-500">
                             <i class="fas fa-envelope"></i>
                         </div>
                         <span>{{ 'wedicltd@gmail.com' }}</span>
                     </li>
                 </ul>
             </div>

             <div>
                 <h4 class="text-lg font-semibold text-white mb-4">Connect With Us</h4>
                 <div class="flex space-x-4">
                     @foreach (['facebook', 'twitter', 'linkedin', 'instagram'] as $social)
                         <a href="#"
                             class="w-10 h-10 rounded-full bg-wedic-blue-800 flex items-center justify-center hover:bg-blue-600 transition-colors">
                             <i class="fab fa-{{ $social }}"></i>
                         </a>
                     @endforeach
                 </div>
             </div>
         </div>

         <div class="border-t border-gray-800 mt-12 pt-8 text-center">
             <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
         </div>
     </div>

     <button x-data="{ showButton: false }" x-init="window.addEventListener('scroll', () => { showButton = window.scrollY > 500 })" x-show="showButton" x-transition.opacity
         @click="window.scrollTo({top: 0, behavior: 'smooth'})"
         class="fixed bottom-8 right-8 w-10 h-10 flex items-center justify-center bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-colors">
         <i class="fas fa-arrow-up"></i>
     </button>
 </footer>
