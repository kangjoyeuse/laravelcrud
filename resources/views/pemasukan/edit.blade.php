@extends('structure.master')

@section('content')

<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Pemasukan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('pemasukan.update', $pemasukan->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sumber_dana">Sumber Dana</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="sumber_dana" class="form-control @error('sumber_dana') is invalid @enderror" name="sumber_dana" value="{{ old('sumber_dana')?? $pemasukan->sumber_dana }}" placeholder="Sumber Dana ...">
                                @error('sumber_dana')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah">Jumlah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" id="jumlah" class="form-control @error('jumlah') is invalid
                                @enderror" name="jumlah" value="{{ old('jumlah')?? $pemasukan->jumlah }}" placeholder="Jumlah ...">
                                @error('jumlah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="keterangan">Keterangan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="keterangan" class="form-control @error('keterangan') is invalid
                                @enderror" name="keterangan" value="{{ old('keterangan')?? $pemasukan->keterangan }}" placeholder="Keterangan...">
                                @error('keterangan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection