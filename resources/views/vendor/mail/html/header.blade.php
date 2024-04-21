@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
            <img src="https://cbs-cameroun.com/img_site/logo_first.png" class="logo" alt="CBS Logo">
            @endif
        </a>
    </td>
</tr>