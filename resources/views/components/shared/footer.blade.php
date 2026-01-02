@php
    $socialsLinks = [
        'Linkedin' => 'https://www.linkedin.com/in/liandrosilva/',
        'Github' => 'https://github.com/liandro-silva',
    ];
@endphp

<div class="px-2 h-20 border-t-2 border-black-500">
    <div class="flex gap-5 items-center px-2 h-20 w-4/5 m-auto">
        <div>
            <p>&#169; <strong></strong>{{ date('Y') }}</strong></p>
        </div>
        <div>
            <ul class="flex gap-4">
                @foreach($socialsLinks as $key => $link)
                    <li>
                        <a href="{{ $link }}" target="_blank">{{ $key }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>