
<x-layout>
    <x-slot:dokumentitle>{{$title}}</x-slot>
    <x-slot:title>{{$title}}</x-slot>
    <h3>Selamat datang di profil {{ $nama }}</h3>
    <br>
    <p>nama: {{ $nama }}</p>
    <p>kelas: {{ $kelas }}</p>
    <br>
    <p>LinkedIn: <a href={{ $linkedin }}>LinkedIn Profile</a></p>
    <p>GitHub: <a href={{ $github }}>GitHub Profile</a></p>
</x-layout>

