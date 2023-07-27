@extends('admin.app')

@section('content')
    <p class="h3 mt-3">List Supplier</p>
    <button type="button" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#supplierModal">Tambah
        data</button>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addBtn">Tambah Supplier</h1>
                </div>
                <div class="modal-body">
                    <form id="supplierForm" name="supplierForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Supplier</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan nama kategori">
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">Telp</label>
                            <input type="number" class="form-control" name="telp" id="telp"
                                placeholder="Masukkan No. Telp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeBtn" data-bs-dismiss="modal">Keluar</button>
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
                responsive: true,
                ajax: "{{ route('supplier.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        width: '10px',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
            // Reset Form when Close Button
            $('#supplierModal').on('hidden.bs.modal', function() {
                $('#id').val('');
                $(this).find('form').trigger('reset');
            });
            // save and update form
            $('#saveBtn').click(function(e) {
                e.preventDefault();

                $.ajax({
                    data: $('#supplierForm').serialize(),
                    url: "{{ route('supplier.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#supplierForm').trigger("reset");
                        $('#supplierModal').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Simpan');
                    }
                });
            });
            // Button edit
            $('body').on('click', '#btn-edit', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: `/supplier/${id}`,
                    type: "GET",
                    dataType: "json",
                    cache: false,
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#nama').val(response.data.nama);
                        $('#telp').val(response.data.telp);
                        $('#alamat').val(response.data.alamat);

                        $('#supplierModal').modal('show');
                    }
                })
            });
            // Delete Data
            // Delete Data
            $('body').on('click', '#btn-delete', function() {
                var id = $(this).data('id');
                bootbox.confirm({
                    title: 'Konfirmasi',
                    message: 'Anda yakin akan menghapus data ini?',
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Batal'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Ya'
                        }
                    },
                    callback: function(result) {
                        if (result) {
                            $.ajax({
                                url: `/supplier/${id}`,
                                type: "DELETE",
                                dataType: "json",
                                success: function(response) {
                                    table.draw();
                                },
                                error: function(data) {
                                    console.log('Error:', data)
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
