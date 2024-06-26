@extends('layouts') <!-- Assuming you have a layout named 'app.blade.php' -->

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
		<div class="pull-left">
		    <h2>Daftar Barang</h2>
		</div>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('Gagal'))
                        <div class="alert alert-danger mt-3">
                            {{ session('Gagal') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('barang.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ITEM</a>
                    </div>

                </div>


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merk</th>
                            <th>Seri</th>
                            <th>Spesifikasi</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th style="width: 15%">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rsetBarang as $rowbarang)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $rowbarang->merk  }}</td>
                                <td>{{ $rowbarang->seri  }}</td>
                                <td>{{ $rowbarang->spesifikasi  }}</td>
                                <td>{{ $rowbarang->stok  }}</td>
                                <td>{{ $rowbarang->kategori->deskripsi  }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/foto/'.$rowbarang->foto) }}" class="rounded" style="width: 150px">
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $rowbarang->id) }}" method="POST">
                                        <a href="{{ route('barang.show', $rowbarang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('barang.edit', $rowbarang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert">
                                Data barang belum tersedia!
                            </div>
                        @endforelse
                    </tbody>
                   
                </table>
                {!! $rsetBarang->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </div>
@endsection