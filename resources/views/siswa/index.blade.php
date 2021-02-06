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
                    <h3 class="panel-title"><b>DATA SISWA</b></h3>
                      <div class="right">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="lnr lnr-plus-circle"></i>
                        </button>
                      </div>
                  </div>
                  <div class="panel-body">
                    <table class="table table-hover">
                    <thead>
                      <tr>
                          <th> NAMA DEPAN </th>
                          <th> NAMA BELAKANG </th>
                          <th> JENIS KELAMIN </th>
                          <th> AGAMA </th>
                          <th> ALAMAT </th>
                          <th> AKSI </th>
                      </tr>
                    </thead> </tbody>
                      @foreach($data_siswa as $siswa)
                      <tr>
                          <td>{{$siswa->nama_depan}}</td>
                          <td>{{$siswa->nama_belakang}}</td>
                          <td>{{$siswa->jenis_kelamin}}</td>
                          <td>{{$siswa->agama}}</td>
                          <td>{{$siswa->alamat}}</td>
                          <td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                          <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data siswa?')">Hapus</a></td>
                      </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah data siswa!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="siswa/create" method="POST">
        <div class="mb-3">
        {{csrf_field()}}
            <label for="exampleInputEmail1" class="form-label">Nama Depan :</label>
            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan" placeholder="Masukan Nama Depan">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Belakang :</label>
            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang" placeholder="Masukan Nama Belakang">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email :</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang" placeholder="Masukan Email">
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Jenis Kelamin :</label>
        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
          <option>Laki-laki</option>
          <option>Perempuan</option>
        </select>
        </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Agama :</label>
            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama" placeholder="Agama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat :</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Tulis Alamat..." ></textarea>
        </div>
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
@stop