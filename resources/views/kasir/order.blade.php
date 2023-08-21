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
                                    aria-describedby="scanBarcode">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary">Primary</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
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
