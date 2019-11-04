@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Tabel Pendaftaran</h5>
    </div>

    <div class="card-header">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modal_theme_success"><b><i class="icon-reading"></i></b> Tambah Pasien Baru</button>
        <button type="button" class="btn bg-primary btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modal_theme_primary"><b><i class="icon-reading"></i></b> Tambah Pendaftaran Baru</button>
    </div>


	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>Tanggal Kunjungan</th>
				<th>Nama Pasien</th>
				<th>Poli</th>
				<th>Asuransi</th>
                <th>Jenis Kelamin</th>
                <th>Petugas</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>Maxwell</td>
                <td>Maben</td>
                <td>Maben</td>
				<td>Regional Representative</td>
				<td>25 Feb 1988</td>
				<td><span class="badge badge-danger">Suspended</span></td>
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
		</tbody>
	</table>
</div>

<!--Modal Form Pendaftaran -->
    <div id="modal_theme_success" class="modal fade" tabindex="-2">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h6 class="modal-title">Form Pendaftaran</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
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
                                            <select class="form-control form-control-select" id="jenis_kelamin" name="jenis_kelamin">
                                                <option>Pilih Jenis Kelamin </option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Alamat Pasien:</label>
                                        <div class="col-lg-8">
                                            <textarea rows="3" cols="3" class="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Propinsi:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Provinsi" id="provinsi" name="provinsi">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Kabupaten:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Kabupaten" id="kabupaten" name="kabupaten">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Kecamatan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Kecamatan" id="kecamatan" name="kecamatan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Desa:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Desa" id="desa" name="desa">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> IDENTITAS PASIEN</legend>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Golongan Darah:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select" id="golongan_darah" name="golongan_darah">
                                                <option>Pilih Goldar</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                                <option value="AB">AB</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Status:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select" id="status" name="status">
                                                <option>Status</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tempat Lahir:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Umur (Th)</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="Umur" id="umur" name="umur">
                                        </div>
                                        <label class="col-form-label col-md-3">Tgl Lahir</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="datetime" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Pekerjaan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Pendidikan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Pendidikan" id="pendidikan" name="pendidikan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Pekerjaan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Pendidikan" id="pekerjaan" name="pekerjaan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Agama:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select" id="agam" name="agama">
                                                <option>Pilih Agama</option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="protestan">Protestan</option>
                                                <option value="budha">Budha</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i>PEMERIKSAAN</legend>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Petugas:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Asuransi:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select" id="id_role_pembayaran" name="id_role_pembayaran">
                                                <option>Pilih Asuransi</option>
                                                <option value="1">BPJS</option>
                                                <option value="2">Non BPJS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select" id="id_poli" name="id_poli">
                                                <option>Pilih Poli</option>
                                                <option value="1">Poli Anak</option>
                                                <option value="2">Poli Bedah</option>
                                                <option value="3">Poli Gigi</option>
                                                <option value="4">Poli THT</option>
                                                <option value="5">Poli Penyakit Dalam</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>  
            </div>
            <!-- /2 columns form -->
        </div>
    </div>
    <!--End Modal Pendaftaran-->

    <!--Modal Form Pendaftaran Baru -->
    <div id="modal_theme_primary" class="modal fade" tabindex="-2">
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
    <!--End Modal Pendaftaran-->

@endsection