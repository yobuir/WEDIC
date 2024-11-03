 <section class="relative ">
     <div class="w-full flex flex-col justify-center py-24 relative lg:p-8">
         <div class="flex flex-col">
             <div class="flex flex-col gap-3">
                 <h1 class="font-bold lg:text-base">{{ $training?->title }}</h1>
                 <a href="" class="flex underline text-sm text-blue-500 gap-1 ">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                     </svg>
                     <span>View description</span>
                 </a>
             </div>
             <div class="lg:mt-6 border-t pt-6 dark:border-gray-700">
                 @if (
                     $this->applicant->application_status == 'paid' or
                         $this->applicant->application_status == 'accepted' or
                         $this->applicant->application_status == 'rejected')
                     @if ($this->applicant->application_status == 'rejected')
                         Application was not accepted
                     @elseif ($this->applicant->application_status == 'accepted')
                         You have been accepted
                     @else
                         Process completed successfully
                     @endif
                 @else
                     <form wire:submit.prevent="initializePaymentRequest"
                         class="rounded-3xl bg-white  dark:bg-wedic-blue-800 border dark:border-gray-700 p-8 lg:p-10 mt-6">
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
                         <div class="flex justify-between items-center">
                             @if ($pricing->type != 'free')
                                 <div class="lg:max-w-[30%] lg:block hidden">
                                     <h2 class="mb-5 font-medium text-blue-500" style="font-size:25px;">
                                         {{ __('Pay admission fee') }}
                                     </h2>
                                     <p>
                                         {{ __("To finish up your training application,  you'll be required to complete payment for your application to be considered.") }}
                                     </p>
                                 </div>
                             @endif
                             <div class="flex flex-col  w-full lg:w-[60%]">
                                 @if ($pricing->type != 'free')
                                     <div class="grid lg:grid-cols-1 grid-cols-1 gap-4 ">
                                         @if ($pricing->method == 'installments')
                                             You will pay admission fee in installments
                                         @endif
                                         <h1 class="text-base font-bold">Amount :
                                             {{ Number::currency($pricing?->amount ?? 0, in: $pricing?->currency ?? 'RWF') }}
                                         </h1>
                                         <h2>
                                             @if ($pricing->method == 'installments')
                                                 <div class="flex flex-col gap-3">
                                                     <div class="">
                                                         {{ Number::currency($pricing->installmentAmount ?? 0, in: $pricing?->currency ?? 'RWF') }}
                                                         / <span class="text-sm capitalize text-blue-500">
                                                             {{ $pricing->frequency }}</span>
                                                     </div>
                                                     <div class="flex flex-col text-xs font-semi-bold">
                                                         <div class="">
                                                             Paid amount:
                                                             {{ Number::currency($installmentTracker->p_amount ?? 0, in: $pricing?->currency ?? 'RWF') }}
                                                         </div>
                                                         <div class="">
                                                             Remain Amount:
                                                             {{ Number::currency($installmentTracker->r_amount ?? 0, in: $pricing?->currency ?? 'RWF') }}
                                                         </div>
                                                     </div>
                                                 </div>
                                             @endif
                                         </h2>
                                         <div class="text-xs">
                                             After clicking on pay now button you'll be redirected to securre
                                             flutterwave
                                             payment gateway page and complete your payment.
                                         </div>
                                     </div>
                                     <div class="mt-4 flex">
                                         <button
                                             class="rounded-full bg-blue-600 px-8 py-2 h-12 text-sm font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full"
                                             wire:loading.attr="disabled">
                                             <span wire:loading.remove
                                                 wire:target="initializePaymentRequest">{{ __('Pay now') }}</span>
                                             <span wire:loading wire:target="initializePaymentRequest"> .... </span>
                                         </button>
                                     </div>
                                 @else
                                     Training is free of charge <br>
                                     Wait for approval from admission committee
                                 @endif

                             </div>
                         </div>
                     </form>
                 @endif

             </div>
         </div>
     </div>
 </section>
