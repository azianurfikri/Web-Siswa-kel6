@extends('layouts.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				@if(session('sukses'))
        		<div class="alert alert-success" role="alert">
        		{{session('sukses')}}
				@endif

				@if(session('error'))
				<div class="alert alert-danger" role="alert">
				{{session('error')}}
				@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="120px" height="120px">
										<h3 class="name">{{$siswa->nama_depan}}</h3>
										<span class="online-status status-available">Siswa Aktif</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}} <span>Mapel</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info" style="margin-top: 15px">
										<h4 class="heading" >Data diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>Alamat <span>{{$siswa->alamat}}</span></li>
											</ul>
									</div>
									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
								Tambah Nilai
								</button>
    						<div class="panel">
								<div class="panel-heading" >
									<h3 class="panel-title" or>Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-stripe">
										<thead>
											<tr>
												<th>Kode</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="siswa/c{{$siswa->id}}/addnilai" method="POST">
        <div class="mb-3">
        {{csrf_field()}}
		<div class="form-group">
        <label for="mapel">Mata Pelajaran</label>
        <select name="mapel"  class="form-control" id="mapel">
		@foreach($matapelajaran as $mp)
            <option value="{{$mp->id}}"> {{$mp->nama}}</option>
		@endforeach
        </select>
        </div>
            <label for="exampleInputEmail1" class="form-label">Nilai</label>
            <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nilai" placeholder="Masukan Nilai">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
      </div>
    </div>
  </div>
</div>
@stop