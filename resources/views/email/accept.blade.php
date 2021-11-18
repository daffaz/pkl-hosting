@component('mail::message')
# Akun anda telah diverifikasi

Selamat akun anda sudah diverifikasi dan dapat digunakan sekarang 

@component('mail::button', ['url' => 'https://macabuku.xyz'])
Baca sekarang
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
