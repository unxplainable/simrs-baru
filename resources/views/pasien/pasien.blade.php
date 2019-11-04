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
            @foreach ($pasien as $data)            
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nama_pasien}}</td>
                    <td>{{$data->nama_pasien}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->golongan_darah}}</td>
                    <td>{{$data->pendidikan}}</td>
                    <td>{{$data->asuransi}}</td>
                    <td>{{$data->tempat_lahir}}</td>
                    <td>
                        <form method="POST" action="{{route('pasien.destroy', $data->id )}}" class="dropdown-item">                            
                             {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button><i class="icon-file-excel"></i>Delete</button>
                    </form
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>

@endsection