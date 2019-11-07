@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<div class="card-header header-elements-inline">
			<button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah User Baru</button>
	</div>

	<table id="tabel-user" class="table datatable-basic">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Role</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

<!--Modal Create User -->
<div id="add-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h6 class="modal-title">Create New User<p id="nama-user"></p></h6>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="card-body">
				<form id="addForm">
					<div class="modal-body">
						<div class="alert alert-danger" id="create-error-bag" hidden>
							<ul id="create-user-errors">
							</ul>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Nama</label>
									<input type="text" id="nama_user" name="nama_user" placeholder="Nama" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Email</label>
									<input type="text" id="email" name="email" placeholder="Email" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Role</label>
									<input class="form-control" id="role_id" name="role_id" type="hidden">
									<select id="select-user-role-create" class="form-control form-control-select" name="user-role">
										<option>-- Pilih Role User --</option>
										@foreach ($roles as $role)
											<option value="{{ $role->id }}">
												{{ $role->nama_role }}
											</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div id="password-input" class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>New Password</label>
									<input type="password" name="password" placeholder="Password" class="form-control">
								</div>
							</div>
						</div>

						<div id="password-input" class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Confirm New Password</label>
									<input type="password" name="confirmpassword" placeholder="Re-Enter Password" class="form-control">
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button id="btn-create-user" type="submit" class="btn bg-success add-data">Create User</button>
					</div>
				</form>
			</div>  
		</div>
		<!-- /2 columns form -->
	</div>
</div>
<!--End Modal Create User-->

<!--Modal edit ruangan -->
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
								<label class="col-lg-3 col-form-label">Kelas:</label>
								<div class="col-lg-9">
									<select name="id_kelas" class="form-control">
										{{-- @foreach ($kelas as $data)
										<option value="{{$data->id_kelas}}">{{$data->nama_kelas}}</option>
										@endforeach --}}
				
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Status</label>
								<div class="col-lg-6">
									<select name="status" class="form-control">
										<option value="1">Penuh</option>
										<option value="0">Kosong</option>
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
				<button type="button" class="btn bg-success edit_ruangan">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!--End Modal edit ruangan-->

<!--Modal delete -->
<div id="delete-modal" class="modal fade" tabindex="-2">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h6 class="modal-title">Delete Data</h6>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
	
			<div class="modal-body">
				<div class="col-xl-12">
					<div class="card-body">
						<p>Anda yakin ingin menghapus data ini?</p>
					</div>
				</div>
			</div>
	
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
				<button type="button" class="btn bg-danger delete-data">Delete</button>
			</div>
		</div>
	</div>
</div>
<!--End Modal delete-->
@endsection

@push('scripts')
<script>
$(document).on('click', '.add-data', function(e){
	e.preventDefault();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
		},
		$('#select-user-role-create').on('change', function(){
			var role = $(this).val();
			$('#addForm #role_id').val(role);
		});
		url: "{{ route('user.add') }}",
		method: "POST",
		data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
		success: function(data){
			Swal.fire({
				type: 'success',
				title: 'Ruang berhasil di ditambah!',
				text: 'Ruangan  anda telah berhasil ditambahkan!',
			});
			$("#addForm")[0].reset();
			$('#add-modal').modal('hide');
			$('#tabel-user').DataTable().ajax.reload();
		}
	});
});

$(document).on('click', '.edit_ruangan', function(e){
	e.preventDefault();
		var id = $(this).attr("id");
	
		$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
		},
		url: "{{ route('ruang.editRuang') }}",
		method: "post",
		data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
		success: function(data){
			console.log(data)
			Swal.fire({
				type: 'success',
				title: 'Ruang berhasil di ubah!',
				text: 'Ruangan yang anda pilih telah diubah!',
			});
			$('#edit-modal').modal('hide');
			$('#ruang-tables').DataTable().ajax.reload();
		}
	});

});
// delete ruangan
$(document).on('click', '.delete-modal', function(){
	var id = $(this).attr("id");
	$('.delete-data').attr("id", id);
});

$(document).on('click', '.delete-data', function(){
	var id = $(this).attr("id"); 
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
		},
		url: "{{ route('user.delete') }}",
		method: "DELETE",
		data: {id: id},
		success: function(data){
			Swal.fire({
				type: 'success',
				title: data.success
			});
			$('#delete-modal').modal('hide');
			$('#tabel-user').DataTable().ajax.reload();
		}
	});
	
});

//GET ALL DATA
$(function(){
	$('#tabel-user').DataTable({
		prossessing: true,
		serverside: true,
		"bDestroy": true,
		"columnDefs": [
			{ className: "text-center", "targets": [ 4 ] }
		],
		ajax: '{!! route('user.dataJSON') !!}',
		columns: [
			{ 
				name: 'id',
				data: 'DT_RowIndex'
			},
			{
				name: 'nama_user',
				data: 'nama_user'
			},
			{
				name: 'email',
				data: 'email',
			},
			{
				name: 'role_user',
				data: 'role_user',
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