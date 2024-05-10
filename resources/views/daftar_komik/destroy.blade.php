@extends('layouts.app')
@section('title', 'Daftar Daftar Komik')
@section('content')
    <h2>Apakah Anda akan menghapus data ini?</h2>
    @isset($daftar)
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{ $daftar->id }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $daftar->nama }}</td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td>{{ $daftar->lokasi }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ $daftar->keterangan }}</td>
            </tr>
        </table>
    @endisset
    <form method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Hapus" />&nbsp;
        <div class="send_bt">
            <a href="{{ url('/daftar_komik') }}">Kembali</a>
        </div>
    </form>
@endsection
