@extends('admin.header')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
  @if (session('status'))
		<div class="alert alert-success">
		{{ session('status')}}
		</div>
	@endif
    <h1 class="mb-2">Data Kategori</h1>
      <a href="{{url('/admin-kategori-tambah')}}"  class="btn btn-primary mb-2" ><i class="fa fa-plus"></i> Tambah Kategori</a>
    <!-- Table head options with primary background start -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="table-responsive text-left">
              <table class="table mb-0 text-center">
                <thead class="bg-teal bg-lighten-4">
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
				<?php $no = 1;?>
			@foreach($kategoris as $kategori)
                  <tr>
                    <th scope="row">{{$no}}</th>
                    <td>{{$kategori->nama_kategori}}</td>
					<td>
                    <a href="{{url('/admin-kategori-edit')}}/{{$kategori->id}}" class="btn btn-success btn-sm mr-sm-1 mb-1 mb-sm-0" ><i class="fa fa-pencil"></i> Edit</a> 
                     <a href="{{url('/admin-kategori-hapus')}}/{{$kategori->id}}" class="btn btn-danger btn-sm " ><i class="fa fa-trash-o"></i> Hapus</a>
					</td>
				  </tr>
				  <?php $no++;?>
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
<!-- Table head options with primary background end -->
@endsection 
