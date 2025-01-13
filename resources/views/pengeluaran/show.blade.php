@extends('structure.master')

@section('title', 'Detail Pengeluaran')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Pengeluaran</h4>
                    </div>
                    <div class="card-body">
@if($pengeluaran)
    <p><strong>Tanggal:</strong> {{ $pengeluaran->tanggal->format('d/m/Y') }}</p>
    <p><strong>Keterangan:</strong> {{ $pengeluaran->keterangan }}</p>
    <p><strong>Jumlah:</strong> Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</p>
@else
    <p>Data pengeluaran tidak ditemukan.</p>
@endif
                        <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
