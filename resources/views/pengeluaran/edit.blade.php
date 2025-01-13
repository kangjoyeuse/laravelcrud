@extends('structure.master')

@section('title', 'Edit Pengeluaran')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pengeluaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
                        @csrf
@method('PATCH')
                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ $pengeluaran->tanggal->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="{{ $pengeluaran->keterangan }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" value="{{ $pengeluaran->jumlah }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
