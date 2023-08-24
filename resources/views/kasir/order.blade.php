@extends('kasir.app')

@section('content')
    <div class="row g-5">
        <div class="col-md-7 col-lg-8">
            <div class="col-sm-12 mb-3">
                <div class="card" style="width: auto;">
                    <div class="card-body">
                        <div class="row row-cols-2">
                            <div class="col">
                                <input type="text" class="form-control" name="scanBarcode" id="scanBarcode"
                                    aria-describedby="scanBarcode" placeholder="Scan Barcode">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#pilihBarang">Pilih Barang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Pilih Barang-->
            <div class="modal fade" id="pilihBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">List Barang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered nowrap" id="dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5px">No.</th>
                                            <th width="125px">Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th width="85px">Satuan</th>
                                            <th width="85px">Stok</th>
                                            <th width="150px">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-5 col-lg-4 order-md-last">
            <div class="card mb-3" style="width: auto;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong class="text-gray-dark">Invoice</strong>
                        <h6>#0001</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <strong class="text-gray-dark">Kasir</strong>
                        <h6>Anonim</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <strong class="text-gray-dark">Pelanggan</strong>
                        <h6>Anonim</h6>
                    </div>
                </div>
            </div>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Sub Total</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Diskon</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (IDR)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" id="nominalBayar" name="nominalBayar"
                        placeholder="Masukkan Nominal">
                    <button type="submit" class="btn btn-secondary">Bayar</button>
                </div>
            </form>
        </div>

    </div>
@endsection
