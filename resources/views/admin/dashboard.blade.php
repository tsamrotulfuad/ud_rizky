@extends('admin.app')

@section('content')
    <p class="h3 mt-3 mb-3">Dashboard</p>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100 bg-primary">
            <div class="card-body text-white">
                <h2 class="card-title">Rp. </h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-danger">
            <div class="card-body text-white">
                <h2 class="card-title">Rp.</h5>
                <p class="card-text">This is a short card.</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-warning">
            <div class="card-body text-white">
                <h2 class="card-title">Rp.</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-success">
            <div class="card-body text-white">
                <h2 class="card-title">Rp.</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
        </div>
    </div>

    <p class="h3 mt-5 mb-3">List data</p>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100 bg-primary">
            <div class="card-body text-white">
                <h1 class="card-title">19</h1>
                <h5 class="card-text">Kategori</h5>
                <p class="card-text">Lihat detail </p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-primary">
            <div class="card-body text-white">
                <h1 class="card-title">19</h1>
                <h5 class="card-text">Produk</h5>
                <p class="card-text">Lihat detail </p>
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
        <div class="col">
            <div class="card h-100 bg-primary">
            <div class="card-body text-white">
                <h1 class="card-title">19</h1>
                <h5 class="card-text">Supplier</h5>
                <p class="card-text">Lihat detail </p>
            </div>
            </div>
        </div>
    </div>
@endsection