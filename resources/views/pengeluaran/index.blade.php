@extends('structure.master')

@section('title', 'Daftar Pengeluaran')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pengeluaran</h4>
                        <div class="float-end">
                            <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Pengeluaran
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Saldo Saat Ini</th>
                                        <th width="280px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($pengeluarans as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                            <td>
                                                <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('pengeluaran.show', $item->id) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('pengeluaran.edit', $item->id) }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {!! $pengeluarans->links() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
