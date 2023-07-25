@extends('admin.app')

@section('content')
    <p class="h3 mt-3">List Kategori</p>
    <button type="button" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#kategoriModal">Tambah data</button>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addBtn">Tambah Kategori</h1>
        </div>
        <div class="modal-body">
        <form id="kategoriForm" name="kategoriForm">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama kategori">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="clodeBtn" data-bs-dismiss="modal">Keluar</button>
            <button type="button" class="btn btn-primary" id="saveBtn">Simpan</button>
        </div>
        </form>
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
                ajax: "{{ route('kategori.index') }}",
                dataType: 'json',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '10px', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama'},
                    {data: 'deskripsi', name: 'deskripsi'},
                    {data: 'action', name: 'action', width: '225px', orderable: false, searchable: false},
                ],
        });
        // Reset Form when Close Button
        $('#kategoriModal').on('hidden.bs.modal', function () {
            $('#id').val('');
            $(this).find('form').trigger('reset');
        });
        // save and update form
        $('#saveBtn').click(function (e) {
            e.preventDefault();
      
            $.ajax({
            data: $('#kategoriForm').serialize(),
            url: "{{ route('kategori.store') }}",
            type: "POST",
            dataType: 'json',
                success: function (data) {
                   $('#kategoriForm').trigger("reset");
                   $('#kategoriModal').modal('hide');
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
                url: `/kategori/${id}`,
                type: "GET",
                dataType: "json",
                cache: false,
                success: function(response) {
                    $('#id').val(response.data.id);
                    $('#nama').val(response.data.nama);
                    $('#deskripsi').val(response.data.deskripsi);

                    $('#kategoriModal').modal('show');
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
                            url: `/kategori/${id}`,
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
    </script>
@endpush