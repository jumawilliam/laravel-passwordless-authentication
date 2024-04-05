<x-mail::message>
# {{$data['subject']}}

{{$data['message']}}

<x-mail::button :url="$url">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
