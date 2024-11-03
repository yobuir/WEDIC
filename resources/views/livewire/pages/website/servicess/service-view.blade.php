 <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
     <h2 class="text-4xl font-bold text-center mb-16">
         Our Services
         <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
     </h2>
     <div class="flex justify-center mb-12 space-x-4">
         @foreach ($services as $index => $service)
             <button wire:click="setActiveTab({{ $index }})"
                 class="px-6 py-3 rounded-lg font-semibold transition-all {{ $activeTab === $index ? 'bg-blue-600 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                 {{ $service['title'] }}
             </button>
         @endforeach
     </div>
     <div class="grid md:grid-cols-3 gap-8">
         @foreach ($services as $index => $service)
             <div
                 class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 transform {{ $activeTab === $index ? 'scale-105' : 'scale-100 opacity-75' }}">
                 <div
                     class="w-12 h-12 bg-{{ $service['color'] }}-100 rounded-lg flex items-center justify-center text-{{ $service['color'] }}-600 mb-6">
                     <i class="fas fa-{{ $service['icon'] }}"></i>
                 </div>
                 <h3 class="text-xl font-semibold mb-4">{{ $service['title'] }}</h3>
                 <ul class="space-y-3">
                     @foreach ($service['items'] as $item)
                         <li class="flex items-center text-gray-600">
                             <i class="fas fa-check-circle text-{{ $service['color'] }}-500 mr-2"></i>
                             {{ $item }}
                         </li>
                     @endforeach
                 </ul>
             </div>
         @endforeach
     </div>
 </div>
