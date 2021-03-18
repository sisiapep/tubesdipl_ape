@extends('admin.header')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
	@if (session('status'))
		<div class="alert alert-success">
		{{ session('status')}}
		</div>
	@endif
    <h1>Data Produk</h1>
    <div class="content-header row mt-2 mb-2">
      <div class="content-header-left col-md-6 col-12">
        <fieldset class="form-group relative has-icon-left col-md-6 col-12 float-left p-0">
          <input class="form-control" id="iconLeft" type="text" placeholder="Search..." />
          <div class="form-control-position"><i class="fa fa-search"></i></div>
        </fieldset>
      </div>
		<div class="content-header-right col-md-6 col-12">
			<a href="{{url('/admin-produk-tambah')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah Produk</a>
		</div>
	</div>
    <!-- Table head options with primary background start -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="table-responsive text-center">
              <table class="table mb-0">
                <thead class="bg-teal bg-lighten-4">
                  <tr>
                    <th>No</th>
                    <th>Nama Event</th>          
                    <th>Kategori Event</th>          
                    <th>Gambar</th>          
                    <th>Harga</th>  
                    <th>Tanggal</th>          
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
				<?php $no = 1;?>
			@foreach($produks as $produk)
                  <tr>
                    <th scope="row">{{$no}}</th>
                    <td>{{ $produk->nama_produk }}</td>
					<td><?php
					$link = mysqli_connect("127.0.0.1", "root", "", "ape");
								 
								// jalankan query
								$result = mysqli_query($link, "SELECT * FROM kategoris where kategoris.id = $produk->id_kategori");
					while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
												{
												   echo @$row['nama_kategori'];
												}
					?></td>
                    <td><img src="{{ url('uploads') }}/{{ $produk->gambar }}" class="img-fluid d-block" alt="{{asset('assets')}}/images/carousel1.png" style="width: 100%; max-width: 120px; height:100px;"></td>
                    <td>Rp. {{ number_format($produk->harga_produk)}}</td>
                    <td><span class="badge badge-success" type="button">{{$produk->created_at}}</span></td>
                    <td>
                 
                      <a href="{{url('/admin-produk-edit')}}/{{$produk->id}}" class="btn btn-success btn-sm mr-sm-1 mb-1 mb-sm-0" ><i class="fa fa-pencil"></i> Edit</a> 
                      <a href="{{url('/admin-produk-hapus')}}/{{$produk->id}}" class="btn btn-danger btn-sm " ><i class="fa fa-trash-o"></i> Hapus</a>
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

<!-- Modal -->

@endsection 
