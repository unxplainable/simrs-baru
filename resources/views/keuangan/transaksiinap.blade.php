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

	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pasien</th>
				<th>Ruang</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Keluar</th>
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
@endsection