  <div
      class="group  border bg-white dark:bg-wedic-blue-800 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
      <div class="p-4 sm:p-6">
          <!-- Flex container that switches to column on mobile -->
          <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6">
              <!-- Event Image - Full width on mobile -->
              <div class="w-full sm:w-40 h-48 sm:h-40 rounded-xl overflow-hidden flex-shrink-0">
                  <img src="{{ $event->featured_image }}" alt="{{ $event->title }}"
                      class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
              </div>

              <!-- Event Details - Full width on mobile -->
              <div class="flex-1 w-full">
                  <div class="flex flex-col sm:flex-row items-start justify-between gap-4 sm:gap-0">

                      <div class="flex flex-col gap-4">
                          <div class="flex">
                              <!-- Date/Time -->
                              <div
                                  class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 dark:bg-wedic-blue-700/50 rounded-full text-sm text-gray-600 dark:text-gray-300 w-full sm:w-auto border ">
                                  <div class="flex gap-2 pr-2 items-center">
                                      <svg class="w-4 h-4 text-wedic-blue-500 flex-shrink-0" fill="none"
                                          stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                      </svg>
                                      <span
                                          class="truncate">{{ Carbon\Carbon::parse($event->date)->format('F j') }}</span>

                                      -
                                      <span
                                          class="truncate">{{ Carbon\Carbon::parse($event->end_date)->format('F j') }}</span>
                                  </div>
                                  <div class="flex gap-2 items-center border-l pl-3">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke-width="1.5" stroke="currentColor"
                                          class="size-6 w-4 h-4 text-wedic-blue-500 flex-shrink-0">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                      </svg>
                                      <div>
                                          <span
                                              class="truncate">{{ Carbon\Carbon::parse($event->date)->format('g:i A') }}</span>
                                          -
                                          <span
                                              class="truncate">{{ Carbon\Carbon::parse($event->end_date)->format('g:i A') }}</span>
                                      </div>
                                  </div>

                              </div>

                          </div>

                          <h3
                              class="text-xl sm:text-2xl font-bold mb-2 group-hover:text-wedic-blue-600 dark:group-hover:text-wedic-blue-400 transition-colors duration-300">
                              <a href="{{ route('event.show', $event->slug) }}">
                                  {{ $event->title }}
                              </a>
                          </h3>
                          <!-- Event Meta Information - Stack on mobile -->
                          <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">

                              <!-- Location -->
                              <div
                                  class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 dark:bg-wedic-blue-700/50 rounded-full text-sm text-gray-600 dark:text-gray-300 w-full sm:w-auto">
                                  <svg class="w-4 h-4 text-wedic-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                                      viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>
                                  <span class="truncate">{{ $event->location }}</span>
                              </div>

                              <!-- Category Tag -->
                              @if ($event->category)
                                  <div
                                      class="flex items-center gap-2 px-3 py-1.5 bg-wedic-blue-50 dark:bg-wedic-blue-900/30 rounded-full text-sm text-wedic-blue-600 dark:text-wedic-blue-400 w-full sm:w-auto">
                                      <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                          viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                      </svg>
                                      <span class="truncate">{{ $event?->category?->name }}</span>
                                  </div>
                              @endif
                          </div>

                          <!-- Additional Features -->
                          @if ($event->featured || $event->status === 'published')
                              <div class="mt-4 flex gap-3">
                                  @if ($event->featured)
                                      <span
                                          class="inline-flex items-center gap-1 text-amber-600 dark:text-amber-400 text-sm">
                                          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                              <path
                                                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                          </svg>
                                          Featured Event
                                      </span>
                                  @endif
                              </div>
                          @endif
                      </div>

                      <!-- Action Button - Full width on mobile -->
                      <div class="flex w-full sm:w-auto">
                          <a href="{{ route('event.show', $event->slug) }}"
                              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5
                                  bg-white dark:bg-wedic-blue-700 border-2 border-wedic-blue-600 dark:border-wedic-blue-500
                                  text-wedic-blue-600 dark:text-wedic-blue-400 rounded-full hover:bg-wedic-blue-50
                                  dark:hover:bg-gray-600 transition-all duration-300 transform
                                  hover:scale-105 focus:outline-none focus:ring-2 focus:ring-wedic-blue-500
                                  focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                              View Details
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 7l5 5m0 0l-5 5m5-5H6" />
                              </svg>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
