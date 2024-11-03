 <section class="relative overflow-hidden">
     <div class="w-full flex flex-col justify-center py-24 relative lg:p-8">
         <div class="flex flex-col">
             <div class="flex flex-col gap-3">
                 <h1 class="font-bold lg:text-lg">{{ $item->title }}</h1>
                 <a href="{{ route('training.apply', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="flex underline text-sm text-blue-500 gap-1 ">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                     </svg>
                     <span>View description</span>

                 </a>
             </div>
             <div class="lg:mt-6 border-t pt-6 dark:border-gray-700">
                 <form wire:submit.prevent="submit" x-data="{ step: 1 }"
                     class="rounded-3xl bg-white  dark:bg-wedic-blue-800 border dark:border-gray-700 p-8 lg:p-10 mt-6">
                     <div class="">
                         {{ __('application_form.title') }}
                     </div>
                     @if (session()->has('message'))
                         <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 text-xs rounded relative"
                             role="alert">
                             <strong class="font-bold">Success!</strong>
                             <span class="block sm:inline">{{ session('message') }}</span>
                         </div>
                     @endif

                     @if ($errors->any())
                         <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                             role="alert">
                             <strong class="font-bold">Whoops! Something went wrong.</strong>
                             <span class="block sm:inline">Please fix the following errors:</span>
                             <ul class="mt-3 list-disc list-inside text-xs text-red-600">
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                     <div class="flex w-full justify-center items-center mb-4">
                         {{-- @auth
                             <div class="block mt-4">
                                 <label for="userMyData" class="flex items-center">
                                     <x-checkbox id="userMyData" wire:model.live="userMyData" name="userMyData" />
                                     <span
                                         class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Use my saved data') }}</span>
                                 </label>
                             </div>
                             @if ($userMyData)
                                 <a href="">You can change (update) it through <span
                                         class="font-bold underline text-blue-600">settings</span></a>
                             @endif
                         @endauth --}}

                     </div>
                     <div x-show="step === 1" class="flex justify-between items-center">

                         <div class="lg:max-w-[30%] lg:block hidden">
                             <h2 class="mb-5 font-medium text-blue-500" style="font-size:25px;">
                                 {{ __('application_form.step1') }}
                             </h2>
                             <p>
                                 {{ __('application_form.description') }}
                             </p>
                         </div>
                         <div class="flex flex-col  w-full lg:w-[60%]">
                             <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 ">

                                 <div class="">
                                     <x-label for="name"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.fullname') }}</x-label>
                                     <x-input type="text" name="name" id="name" wire:model.live="name"
                                         class="w-full" placeholder="{{ __('application_form.email_p') }}" />
                                     <x-input-error for="name" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="Email"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.email') }}</x-label>
                                     <x-input type="email" name="email" id="email" wire:model.live="email"
                                         class="w-full" placeholder="{{ __('application_form.email_p') }}" />
                                     <x-input-error for="email" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="telephone"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.telephone') }}</x-label>
                                     <x-input type="tel" name="number" id="telephone" wire:model.live="telephone"
                                         class="w-full" placeholder="{{ __('application_form.telephone_p') }}" />
                                     <x-input-error for="telephone" class="mt-2" />
                                 </div>
                                 <div class="">
                                     <x-label for="address"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.address') }}</x-label>
                                     <x-input type="text" id="address" name="address" class="w-full"
                                         placeholder="{{ __('application_form.address_p') }}"
                                         wire:model.live="address" />
                                     <x-input-error for="address" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="date_of_birth"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.date') }}</x-label>
                                     <x-input type="date" name="date_of_birth" id="date_of_birth" class="w-full"
                                         wire:model.live="date_of_birth" />
                                     <x-input-error for="date_of_birth" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="name"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.gender') }}</x-label>

                                     <span class="inline-flex items-center space-x-2">
                                         <x-label for="gender-male"
                                             class="text-sm text-gray-700">{{ __('application_form.male') }}</x-label>
                                         <x-input type="radio" id="gender-male" name="gender" value="male"
                                             class="appearance-none w-4 h-4 rounded-full border border-gray-300 checked:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                             wire:model.live="gender" />

                                         <x-label for="gender-female"
                                             class="text-sm text-gray-700">{{ __('application_form.female') }}</x-label>
                                         <x-input type="radio" id="gender-female" name="gender" value="female"
                                             class="appearance-none w-4 h-4 rounded-full border border-gray-300 checked:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                             wire:model.live="gender" />

                                     </span>
                                     <x-input-error for="gender" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="passport"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.passport') }}</x-label>
                                     <x-input type="number" name="passport" id="passport"
                                         wire:model.live="passport" class="w-full"
                                         placeholder="{{ __('application_form.passport_p') }}" />
                                     <x-input-error for="passport" class="mt-2" />

                                 </div>
                             </div>
                             <div class="mt-4 flex">
                                 <button
                                     class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full"
                                     @click="step++">{{ __('application_form.next') }}</button>
                             </div>
                         </div>

                     </div>

                     <!-- Step 2 -->
                     <div x-show="step === 2" class="flex justify-between items-center">
                         <div class="lg:max-w-[30%] lg:block hidden">
                             <h2 class="mb-5  font-medium text-blue-500" style="font-size:25px;">
                                 {{ __('application_form.step2') }}
                             </h2>
                             <p>
                                 {{ __('application_form.description') }}
                             </p>
                         </div>
                         <div class="flex flex-col  w-full lg:w-[60%]">

                             <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 w-full">
                                 <div class="w-full">
                                     <x-label for="degree"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.highest_degree') }}</x-label>
                                     <x-input type="file" name="degree" id="degree" name="degree"
                                         wire:model.live="degree" class="w-full" />
                                     <x-input-error for="degree" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="school"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.school') }}</x-label>
                                     <x-input type="text" name="school" id="school" class="w-full"
                                         placeholder="{{ __('application_form.school_p') }}"
                                         wire:model.live="school" />
                                     <x-input-error for="school" class="mt-2" />

                                 </div>

                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.field') }}</x-label>
                                     <x-input type="text" name="field" id="field" class="w-full"
                                         placeholder="{{ __('application_form.field_p') }}"
                                         wire:model.live="field" />
                                     <x-input-error for="field" class="mt-2" />

                                 </div>

                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.graduation') }}</x-label>
                                     <x-input type="date" name="graduation_date" id="graduation" class="w-full"
                                         wire:model.live="graduation" placeholder="enter your graduation date" />
                                     <x-input-error for="graduation" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.skills') }}
                                     </x-label>
                                     <x-input type="text" name="skills" id="skills" class="w-full"
                                         placeholder="{{ __('application_form.skills_p') }}"
                                         wire:model.live="skills" />
                                     <x-input-error for="skills" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for=""
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.experience') }} (Years)</x-label>
                                     <x-input type="number" name="experience" id="experience" class="w-full"
                                         wire:model.live="experience"
                                         placeholder="{{ __('application_form.experience_p') }}" />
                                     <x-input-error for="experience" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.language') }}</x-label>
                                     <x-input type="text" id="language" name="language"
                                         wire:model.live="language" class="w-full"
                                         placeholder="{{ __('application_form.language_p') }}" />
                                     <x-input-error for="language" class="mt-2" />

                                 </div>

                             </div>
                             <div class="mt-4 flex flex-wrap gap-2">
                                 <button
                                     class="rounded-full bg-blue-50 px-8 py-2 h-12 text-sm font-semibold text-blue-600 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full"
                                     @click="step--">{{ __('application_form.previous') }}</button>
                                 <button
                                     class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full"
                                     @click="step++">{{ __('application_form.next') }}</button>
                             </div>
                         </div>
                     </div>

                     <!-- Step 3 -->
                     <div x-show="step === 3" class="flex justify-between items-center">
                         <div class="lg:max-w-[30%] lg:block hidden">
                             <h2 class="mb-5  font-medium text-blue-500" style="font-size:25px;">
                                 {{ __('application_form.step3') }}
                             </h2>
                             <p>
                                 {{ __('application_form.description') }}
                             </p>
                         </div>
                         <div class="flex flex-col   w-full lg:w-[60%]">
                             <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 ">
                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.resume') }}</x-label>
                                     <x-input type="file" name="resume" id="resume" wire:model.live="resume"
                                         class="w-full" placeholder="" />
                                     <x-input-error for="resume" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.portfolio') }}</x-label>
                                     <x-input type="url" name="portfolio" id="portfolio" class="w-full"
                                         wire:model.live="portfolio"
                                         placeholder="{{ __('application_form.portfolio_p') }}" />
                                     <x-input-error for="portfolio" class="mt-2" />

                                 </div>
                                 <div class="">
                                     <x-label for="linkedin"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.linkedin') }}L</x-label>
                                     <x-input type="url" name="linkedin" id="linkedin"
                                         wire:model.live="linkedin" class="w-full"
                                         placeholder="{{ __('application_form.linkedin_p') }} " />
                                     <x-input-error for="linkedin" class="mt-2" />

                                 </div>

                                 <div class="">
                                     <x-label for="field"
                                         class="block text-sm font-medium text-gray-700">{{ __('application_form.github') }}</x-label>
                                     <x-input type="url" id="github" name="github" wire:model.live="github"
                                         class="w-full" placeholder="{{ __('application_form.github_p') }} " />
                                     <x-input-error for="github" class="mt-2" />

                                 </div>
                                 <div class="block mt-4">
                                     <label for="create_account" class="flex items-center">
                                         <x-checkbox id="create_account" wire:model.live="create_account"
                                             name="account" />
                                         <span
                                             class="ms-2 text-xs text-gray-600 dark:text-gray-400">{{ __('Submit and create my account with provided informations') }}</span>
                                     </label>
                                 </div>
                             </div>
                             <div class="mt-4 flex flex-wrap gap-2">
                                 <button
                                     class="rounded-full bg-blue-50 px-8 py-2 h-12 text-sm font-semibold text-blue-600 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full"
                                     @click="step--">{{ __('application_form.previous') }}</button>
                                 <button
                                     class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full"
                                     wire:loading.attr="disabled">

                                     <span wire:loading.remove
                                         wire:target="submit">{{ __('application_form.submit') }}</span>
                                     <span wire:loading wire:target="submit"> .... </span>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
 </section>
