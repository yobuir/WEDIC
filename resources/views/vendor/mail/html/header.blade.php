@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'WEDIC')
    <img src="{{ asset('logo/logo.png') }}" class="logo" alt="WEDIC">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
