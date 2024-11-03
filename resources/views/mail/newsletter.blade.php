<x-mail::message>
{{-- Header --}}
<x-slot:header>
    <x-mail::header :url="config('app.url')">
        <img src="{{ asset('logo/logo.png') }}" class="logo" alt="{{ config('app.name') }}">
    </x-mail::header>
</x-slot:header>

{{-- Title --}}
# {{ $newsletter->title }}

{{-- Main Content --}}
{!! Illuminate\Mail\Markdown::parse(nl2br(e($newsletter->content))) !!}

{{-- Featured Panel --}}
<x-mail::panel>
# Stay Connected
Follow us on social media for the latest updates and news.

<x-mail::button :url="config('app.url')" color="primary">
Visit Our Website
</x-mail::button>
</x-mail::panel>

{{-- Footer --}}
<x-slot:footer>
    <x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </x-mail::footer>
</x-slot:footer>
</x-mail::message>
