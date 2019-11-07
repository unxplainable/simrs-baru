@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Tabel Transaksi Rawat Jalan</h5>
	</div>

	<div class="card-header">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left"  data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Transaksi</button>
    </div>

	<table class="table datatable-basic" id="transaksi-poli">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pasien</th>
				<th>Tindakan</th>
				<th>Resep</th>
				<th>Total Biaya</th>
				<th>Status</th>
				<th>Petugas</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

<!--Modal show ruangan -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Form Rawat Inap</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">
                            
                            
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success add_ruangan">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal show ruangan-->

<!--Modal edit ruangan -->
@foreach($transaksijalan as $data)
<div id="edit-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h6 class="modal-title">Form Rawat Inap</h6>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class="col-xl-12">
					<!-- Form -->
					<div class="card-body">
						<form id="editForm" name="editForm">
							<div class="form-group row">
								<label class="col-lg-4 col-form-label">Nama Pasien :</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien" value="{{$data->nama_pasien}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label">Status Pembayaran:</label>
									<div class="col-lg-8">
										<select class="form-control select" data-fouc id="status_pembayaran" name="status_pembayaran">
											<option>Status Pembayaran </option>
											<option value="0">Belum Membayar</option>
											<option value="1">Sudah Membayar</option>
										</select>
									</div>
							</div>
						</form>
						<!-- /Form -->
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="button" class="btn bg-success edit-data">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!--End Modal edit ruangan--> 
@endforeach
@endsection

@push('scripts')
<script>

    //add pendaftaran

    

     //edit ruangan
    $(document).on('click', '.edit-transaksi-jalan', function(){
         var id = $(this).attr("id");
         $('.edit-data').attr("id", id);
    });

	
    $(document).on('click', '.edit-data', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
         console.log("ini id ", id);
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('keuangan.editTransaksiJalan') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data)
                Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di ubah!',
                  text: 'Data pendaftaran yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#transaksi-poli').DataTable().ajax.reload();
            }
         });
        
      });


    
    

    // delete ruangan
    $(document).on('click', '.delete-modal', function(){
       var id = $(this).attr("id");
       $('.delete-data').attr("id", id);
    });

   

     //GET ALL DATA
     $(function(){
            $('#transaksi-poli').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 6 ] }
                ],
               ajax: '{!! route('transaksijalan.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien',
                  },
                  {
                     name: 'nama_tindakan',
                     data: 'nama_tindakan',
                  },
                  {
                     name: 'nama_resep',
                     data: 'nama_resep',
                  },
				  {
					 name: 'total_pembayaran',
                     data: 'total_pembayaran',
				  },
                  {
                     name: 'status_pembayaran',
                     data: 'status_pembayaran',
                    
                     render: function(data){
                        return data == 0 ? '<span class="badge badge-danger">Belum Membayar</span>' : '<span class="badge badge-success">Sudah Membayar</span>';
                     }
                  },
                  {
                     name: 'nama_user',
                     data: 'nama_user',
                  },
                  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });
        
         



</script>
@endpush

@section('js')
    <script src="{{asset('/template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_layouts.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_inputs.js')}}"></script>
@endsection