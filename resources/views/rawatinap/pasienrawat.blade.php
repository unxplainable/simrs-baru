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
	<button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modal_theme_success"><b><i class="icon-reading"></i></b> Tambah Rawat Inap</button>
	</div>
	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Job Title</th>
				<th>DOB</th>
				<th>Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($pasienrawat as $data) 
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->nama_pasien}}</td>
					<td>{{$data->tanggal_masuk}}</td>
					<td>{{$data->nama_kelas}}</td>
					<td>{{$data->nama_user}}</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
									<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
									<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


<div id="modal_theme_success" class="modal fade" tabindex="-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Pendaftaran Baru</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Jenis Kelamin:</label>
                                        <div class="col-lg-8">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <div class="uniform-choice"><span class="checked"><input type="radio" class="form-input-styled" name="gender" checked="" data-fouc=""></span></div>
                                                    Laki - laki
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <div class="uniform-choice"><span><input type="radio" class="form-input-styled" name="gender" data-fouc=""></span></div>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Petugas:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Asuransi:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>BPJS</option>
                                                <option>Non BPJS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>Poli Anak</option>
                                                <option>Poli Bedah</option>
                                                <option>Poli Gigi</option>
                                                <option>Poli THT</option>
                                                <option>Poli Penyakit Dalam</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection