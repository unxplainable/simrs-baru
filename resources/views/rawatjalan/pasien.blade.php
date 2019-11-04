@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
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
            @foreach ($rawatjalan as $data)                        
                <tr>                            
                    <td>{{$no++}}</td>
                    <td><a href="#">{{$data->nama_pasien}}</a></td>
                    <td>{{$data->nama_poli}}</td>
                    <td>{{$data->nama_user}}</td>
                    <td><span class="badge badge-success">{{$data->nama_tindakan}}</span></td>
                    <td><span class="badge badge-success">{{$data->jumlah_resep}}</span></td>
                    <td><span class="badge badge-success">{{$data->tanggal_masuk}}</span></td>
                    <tdble-visible footable-last-column">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export
                                        to .pdf</a>
                                    <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export
                                        to .csv</a>
                                    <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export
                                        to .doc</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
	
		</tbody>
	</table>
</div>

@endsection