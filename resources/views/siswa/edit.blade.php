@extends('layouts.master')
@section('content')
<div class="main">
      <div class="main-content">
        <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
        @endif
          <div class="row"> 
            <div class="col-md-12">
              <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b>Edit Data</b></h3>
                </div>
                    <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        {{csrf_field()}}
        <label for="exampleInputEmail1" class="form-label">Nama Depan :</label>
            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan" placeholder="Masukan Nama Depan" value="{{$siswa->nama_depan}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Belakang :</label>
            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang" placeholder="Masukan Nama Belakang" value="{{$siswa->nama_belakang}}">
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Jenis Kelamin :</label>
        <select name="jenis_kelamin"  class="form-control" id="exampleFormControlSelect1">
            <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif> Laki-laki</option>
            <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif> >Perempuan</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Agama :</label>
            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama" placeholder="Agama" value="{{$siswa->agama}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat :</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Tulis Alamat..." >{{$siswa->alamat}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Avatar :</label>
            <input name="avatar" class="form-control" type="file">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/siswa">Batal</a></button>
        <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>                  
@stop