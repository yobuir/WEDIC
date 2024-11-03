<div class="flex flex-col">
    <div class="">
        <x-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">
            Add new Pricing
        </x-secondary-button>
    </div>
    <div class="">
        <x-dialog-modal wire:model.live="openModel">
            <x-slot name="title">
                {{ __('Add new Pricing') }}
            </x-slot>

            <x-slot name="content">
                <div class="flex flex-col gap-3">
                    <div class="mt-3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="type-radio-1" type="radio" value="premium" wire:model.live="type"
                                name="type"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                            <label for="type-radio-1"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Premium
                                Training</label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input checked id="type-radio-2" type="radio" value="free" wire:model.live="type"
                                name="type"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                            <label for="type-radio-2"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Free training</label>
                        </div>
                        <x-input-error for="type" class="mt-2" />
                    </div>
                    <div>
                        <div class="w-full  gap-2 flex flex-col mt-3">
                            <x-label class="" for="duration">{{ __('Training duration (Months)') }}</x-label>
                            <x-input id="duration" class="block mt-1 w-full" type="number" wire:model.live="duration"
                                autofocus autocomplete="duration" />
                        </div>
                    </div>
                    @if ($type == 'premium')
                        <div class="mt-3">
                            <x-label class="mb-2" for="method">{{ __('Pricing modal') }}</x-label>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="method-radio-1" type="radio" value="fixed" wire:model.live="method"
                                    name="method"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                                <label for="method-radio-1"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fixed</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input checked id="method-radio-2" type="radio" value="installments"
                                    wire:model.live="method" name="method"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                                <label for="method-radio-2"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Installments</label>
                            </div>
                            <x-input-error for="method" class="mt-2" />
                        </div>

                        <div class="w-full  gap-2 flex flex-col">
                            <x-label class="" for="amount">{{ __('Total Amount') }}</x-label>
                            <x-input id="amount" class="block mt-1 w-full" type="number" wire:model.live="amount"
                                autofocus autocomplete="amount" />
                            <x-input-error for="amount" class="mt-2" />
                        </div>
                        @if ($method == 'installments')
                            <div wire:ignore class="w-full gap-2 flex flex-col">
                                <x-label class=""
                                    for="currency">{{ __('Choose installment frequency') }}</x-label>

                                <select id="frequency" wire:model="frequency" name="frequency"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm']) !!}>">
                                    <option value="">Select frequency</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="quatery">Quatery</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                                <div>
                                    <div class="w-full  gap-2 flex flex-col mt-3">
                                        <x-label class=""
                                            for="amount">{{ __('Amount for Each Installment') }}</x-label>
                                        <x-input id="installmentAmount" class="block mt-1 w-full" type="number"
                                            wire:model.live="installmentAmount" autofocus
                                            autocomplete="installmentAmount" />
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div wire:ignore>
                        <div class="w-full  gap-2 flex flex-col mt-3">
                            <x-label class="" for="currency">{{ __('Choose a currency') }}</x-label>
                            <select id="currency" wire:model="currency" name="currency"
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm']) !!}>">
                                <option value="">Select currency</option>
                            </select>
                        </div>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('openModel')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="store" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="store">Saving...</div>
                    <span wire:loading.remove wire:target="store">{{ __('Save & continue') }}</span>
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('{{ asset('CommonCurrency.json') }}')
                .then(response => response.json())
                .then(data => {
                    const selectElement = document.getElementById('currency');
                    for (const code in data) {
                        if (data.hasOwnProperty(code)) {
                            const option = document.createElement('option');
                            option.value = code;
                            option.text = data[code].name + ` (${code})`;
                            selectElement.appendChild(option);
                        }
                    }
                })
                .catch(error => console.error('Error fetching currency data:', error));
        });
    </script>
</div>
