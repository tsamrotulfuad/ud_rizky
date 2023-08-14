@extends('kasir.app')

@section('content')
    <div class="row g-5">
        <div class="col-md-7 col-lg-8">
            <div class="col-sm-12 mb-3">
                <div class="card" style="width: auto;">
                    <div class="card-body">
                        <div class="d-flex">
                            <input type="text" class="form-control g-3" id="exampleFormControlInput1"
                                placeholder="Cari Barang">
                            <button type="button" class="btn btn-primary">Primary</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card" style="width: auto;">
                    <div class="card-body">
                        <table class="table table-borderless caption-top">
                            <caption>Daftar Barang</caption>
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5px;">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Qty</th>
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
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-lg-4 order-md-last">
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
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Total</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
            </form>
        </div>

    </div>
@endsection
