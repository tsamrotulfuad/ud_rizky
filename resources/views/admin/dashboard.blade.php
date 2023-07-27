@extends('admin.app')

@section('content')
    <p class="h3 mt-3 mb-3">Dashboard</p>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100 bg-primary">
                <div class="card-body text-white">
                    <h2 class="card-title">Rp. </h2>
                    <h6 class="card-text mt-3">PENJUALAN HARI INI</h6>
                    {{-- <p class="card-text">PENJUALAN HARI INI</p> --}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-danger">
                <div class="card-body text-white">
                    <h2 class="card-title">Rp.</h2>
                    <h6 class="card-text mt-3">PENJUALAN MINGGU INI</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-warning">
                <div class="card-body text-white">
                    <h2 class="card-title">Rp.</h2>
                    <h6 class="card-text mt-3">PENJUALAN BULAN INI</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-success">
                <div class="card-body text-white">
                    <h2 class="card-title">Rp.</h2>
                    <h6 class="card-text mt-3">PENJUALAN TOTAL</h6>
                </div>
            </div>
        </div>
    </div>

    <p class="h3 mt-5 mb-3">List data</p>

    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
        <div class="col">
            <div class="card h-100 bg-primary">
                <div class="card-body text-white">
                    <h1 class="card-title">{{ $total_kategori }}</h1>
                    <h5 class="card-text">Kategori</h5>
                    <p class="card-text"><a href="{{ route('kategori.index') }}"
                            class="text-white text-decoration-none">Lihat detail</a></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-primary">
                <div class="card-body text-white">
                    <h1 class="card-title">{{ $total_produk }}</h1>
                    <h5 class="card-text">Produk</h5>
                    <p class="card-text"><a href="{{ route('produk.index') }}" class="text-white text-decoration-none">Lihat
                            detail</a></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-primary">
                <div class="card-body text-white">
                    <h1 class="card-title">{{ $total_supplier }}</h1>
                    <h5 class="card-text">Supplier</h5>
                    <p class="card-text"><a href="{{ route('supplier.index') }}"
                            class="text-white text-decoration-none">Lihat detail</a></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-primary">
                <div class="card-body text-white">
                    <h1 class="card-title">19</h1>
                    <h5 class="card-text">Pelanggan</h5>
                    <p class="card-text">Lihat detail </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            // Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endpush
