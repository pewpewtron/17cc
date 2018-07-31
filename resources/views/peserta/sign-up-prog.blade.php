@extends('layout.template')
@section('title')
	Pendaftaran - Pemrograman - ITCC 2018
@endsection

@section('navbar')
<li><a href="/">Beranda</a></li>
<li class="menu-has-children"><a href="#">Pendaftaran</a>
    <ul>
      <li><a href="/daftar/pemrograman">Lomba Pemrograman</a></li>
      <li><a href="/daftar/desainweb">Lomba Desan Web</a></li>
      <li><a href="/daftar/cerdascermat">Lomba Cerdas Cermat</a></li>
      <li><a href="/daftar/android">Lomba Pengembangan Aplikasi Android</a></li>
      <li><a href="/daftar/idebisnis">Lomba Pengembangan Ide Bisnis TIK</a></li>
    </ul>
</li>
<li><a href="/login">Masuk</a></li>
<li><a href="/faq">FAQ</a></li>
@endsection

@section('content')
	@include('peserta.form.competition_single')
@endsection