@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('FAQ/faq.css') }}">
@endpush

@section('content')
    <div id="faq" class="faq-body">
      <div class="faq-header">
        <h3 class="faq-title">FAQ's</h3>
        <div class="seperator"></div>
      </div>
      <div class="faq-list">
          <div>
            <details open>
              <summary title="Bagaimana saya bisa melakukan absen?">Bagaimana saya bisa melakukan absen?</summary>
              <p class="faq-content">Setelah anda melakukan register maka akan di redirect ke home, sebelum anda bisa melakukan absen anda harus memverify email anda.</p>
            </details>
            </div>
          <div>
            <details>
              <summary title="Kenapa saya tidak bisa melakukan absen hadir?">Kenapa saya tidak bisa melakukan absen hadir?</summary>
              <p class="faq-content">Sebelum anda bisa melakukan hadir anda harus berada didalam zona absen yang sudah ditentukan.</p>
            </details>
            </div>
          <div>
            <details>
              <summary title="Bagaimana saya bisa melakukan absen sakit?">Bagaimana saya bisa melakukan absen sakit?</summary>
              <p class="faq-content">Anda cukup melakukan click button sakit terus anda bisa buat surat sakit dengan mengclick PDF surat sakit, sakit bisa dilakukan dimana saja tanpa harus berada di dalam zona absen.</p>
            </details>
            </div>
          <div>
            <details>
              <summary title="Bagaimana saya bisa malukan absen izin?">Bagaimana saya bisa malukan absen izin?</summary>
              <p class="faq-content">Anda cukup melakukan click button izin terus anda bisa buat surat izin dengan mengclick PDF surat izin, izin bisa dilakukan dimana saja tanpa harus berada di dalam zona absen.</p>
            </details>
            </div>
          <div>
            <details>
              <summary title="Bagaimana cara kerja Alfa/Data ketidak hadiran?">Bagaimana cara kerja Alfa/Data ketidak hadiran?</summary>
              <p class="faq-content">Data ketidak hadiran bekerja dengan jika siswa tidak melakukan absen dalam jangka waktu tertentu maka sistem akan mengcreate data alfa.</p>
            </details>
            </div>
            <div>
                <details>
                  <summary title="Bagaimana cara saya menganti Email?">Bagaimana cara saya menganti Email atau Password?</summary>
                  <p class="faq-content">Anda cukup pergi ke menu profile, disitu anda bisa melakukan change email dan change password.</p>
                </details>
                </div>
          <div>
                <details>
                    <summary title="Bagaimana saya bisa menghubungi admin?">Bagaimana saya bisa menghubungi admin?</summary>
                    <p class="faq-content">Jika anda ingin menghubungi admin anda cukup mengclick contack dan chat via whatsapp, anda bisa memilih admin mana yang mau dihubungi.</p>
                </details>
            </div>
            <div>
                <details>
                  <summary title="Pertanyaan tidak ada?">Pertanyaan tidak ada?</summary>
                  <p class="faq-content">Jika pertanyaan yang anda cari tidak ada anda bisa menghubungi admin absensi.</p>
                  <a href="{{ route('contact') }}" class="btn btn-sm btn-primary">admin</a>
                </details>
                </div>
      </div>
    </div>
@endsection
