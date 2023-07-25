@extends('admin.app')

@section('content')
    <p class="h3 mt-3">List Produk</p>
    <button type="button" id="addProduk" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#produkModal">Tambah data</button>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Kategori</th>
                        <th>Supplier</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="produkForm" name="produkForm">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="kode_produk" class="form-label">Kode Produk</label>
                <input type="text" class="form-control" name="kode_produk" id="kode_produk" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan Nama Produk">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" name="satuan" id="satuan" aria-label="Satuan">
                </div>
                <div class="col">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" aria-label="Stok">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="text" class="form-control" name="harga_beli" id="harga_beli" aria-label="Harga Beli">
                </div>
                <div class="col">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" aria-label="Harga Jual">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" id="kategori" name="kategori_id" style="width: 100%">
                   
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                <label for="supplier" class="form-label">Supplier</label>
                <select class="form-select" id="supplier" name="supplier_id" style="width: 100%">
                    
                </select>
                </div>
            </div>
        </div>
        </form>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="button" class="btn btn-primary" id="saveBtn">Simpan</button>
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
        
        // Render Datatable
        var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 5,
                ajax: "{{ route('produk.index') }}",
                dataType: 'json',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '10px', orderable: false, searchable: false},
                    {data: 'kode_produk', name: 'kode_produk'},
                    {data: 'nama_produk', name: 'nama_produk'},
                    {data: 'satuan', name: 'satuan'},
                    {data: 'stok', name: 'stok'},
                    {data: 'harga_beli', name: 'harga_beli'},
                    {data: 'harga_jual', name: 'harga_jual'},
                    {data: 'kategori.nama', name: 'kategori.nama'},
                    {data: 'supplier.nama', name: 'supplier.nama'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
        });
        
        $('#kategori').select2({
            placeholder: 'Select an option',
            dropdownParent: $('#produkModal'),

            ajax: {
                url: "{{ route('produk.kategori') }}",
                dataType: 'json',
                processResults: function({data}){
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama
                            }
                        }),
                    }
                }
            }
        });
        $('#supplier').select2({
            placeholder: 'Select an option',
            dropdownParent: $('#produkModal'),

            ajax: {
                url: "{{ route('produk.supplier') }}",
                dataType: 'json',
                processResults: function({data}){
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama
                            }
                        }),
                    }
                }
            }
        });
        $('#addProduk').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('produk.kode') }}",
                type: "GET",
                // dataType: 'json',
                    success: function(response) {
                        $('#kode_produk').val(response.data);
                    }
            })
        })
        
        // Reset Form when Close Button
        $('#produkModal').on('hidden.bs.modal', function () {
            $('#id').val('');
            $("#kategori").val('').trigger('change');
            $("#supplier").val('').trigger('change');
            $(this).find('form').trigger('reset');
        });
        // save and update form
        $('#saveBtn').click(function (e) {
            e.preventDefault();
      
            $.ajax({
            data: $('#produkForm').serialize(),
            url: "{{ route('produk.store') }}",
            type: "POST",
            dataType: 'json',
                success: function (data) {
                   $('#produkForm').trigger("reset");
                   $('#produkModal').modal('hide');
                   table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Simpan');
                }
            });
        });
        // Button edit
        $('body').on('click', '#btn-edit', function () {
            var id = $(this).data('id');

            $.ajax({
                url: `/produk/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    $('#id').val(response.data.id);
                    $('#kode_produk').val(response.data.kode_produk);
                    $('#nama_produk').val(response.data.nama_produk);
                    $('#deskripsi').val(response.data.deskripsi);
                    $('#satuan').val(response.data.satuan);
                    $('#stok').val(response.data.stok);
                    $('#harga_beli').val(response.data.harga_beli);
                    $('#harga_jual').val(response.data.harga_jual);
                    $('#kategori').html('<option value = "'+response.data.kategori.id+'" selected>'+response.data.kategori.nama+'</option>');
                    $('#supplier').html('<option value = "'+response.data.supplier.id+'" selected>'+response.data.supplier.nama+'</option>');

                    $('#produkModal').modal('show');
                }
            })       
        });
        // Delete Data
        $('body').on('click', '#btn-delete', function () {
            var id = $(this).data('id');
            bootbox.confirm({ 
                title: 'Konfirmasi',
                message: 'Anda yakin akan menghapus data ini?',
                buttons: { 
                    cancel: { label: '<i class="fa fa-times"></i> Batal' },
                    confirm: { label: '<i class="fa fa-check"></i> Ya' }
                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: `/produk/${id}`,
                            type: "DELETE",
                            dataType: "json",
                            success: function(response) {
                                table.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data)
                            }
                        });       
                    }
                }
            });
        });
    });
    //format rupiah js
    var rupiah_beli = document.getElementById('harga_beli');
    rupiah_beli.addEventListener('keyup', function(e){
        rupiah_beli.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah_beli		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
				separator = sisa ? '.' : '';
				rupiah_beli += separator + ribuan.join('.');
			}
        rupiah_beli = split[1] != undefined ? rupiah_beli + ',' + split[1] : rupiah_beli;
        return prefix == undefined ? rupiah_beli : (rupiah_beli ? 'Rp. ' + rupiah_beli : '');
    };
    //format rupiah js
    var rupiah_jual = document.getElementById('harga_jual');
    rupiah_jual.addEventListener('keyup', function(e){
        rupiah_jual.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah_jual		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
				separator = sisa ? '.' : '';
				rupiah_jual += separator + ribuan.join('.');
			}
            rupiah_jual = split[1] != undefined ? rupiah_jual + ',' + split[1] : rupiah_jual;
        return prefix == undefined ? rupiah_jual : (rupiah_jual ? 'Rp. ' + rupiah_jual : '');
    };
    </script>
@endpush