@component('mail::message')
	
<b>Selamat!</b> anda telah berhasil mendaftar sebagai Peserta ITCC 2018 pada  <b>Cabang Lomba {{$comp}}</b>.<br>
Langkah selanjutnya adalah aktivasi akun Anda dengan menekan tombol dibawah ini.<br>
<span style="color: red; font-size: 8px;">*anda tidak dapat melanjutkan ke tahap pendaftaran selanjutnya sebelum akun anda aktif</span>

@component('mail::button', ['url' => url('/verifyemail/'.$email_token) ])
Aktivasi Akun
@endcomponent

Terimakasih,<br>
Admin {{ config('app.name') }}
@endcomponent