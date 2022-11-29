@component('mail::message')
# {{ $area_atuacao ?? '' }}

Data limite para a oportunidade: {{ $data_limite_procura }}

@component('mail::button', ['url' => $url])
Clique aqui para ver a oportunidade
@endcomponent

Cordialmente,<br>
{{ config('app.name') }}
@endcomponent
