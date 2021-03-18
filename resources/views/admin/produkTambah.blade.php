@extends('admin.header')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <h1 class="mb-3">Data Produk</h1>

    <!-- Form edit artikel -->
<div class="card">
  <div class="card-header">
    <h3>{{session('cek')}} Produk</h3>
    <hr>
  </div>
  <div class="card-body">
  <?php if (session('cek') == "Edit") {?>
    <form action="{{url('Edit')}}/{{@$produks->id}} " method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	@method('patch')
	@csrf
  <?php } else {?>
  <form action="{{url('Tambah')}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
  <?php }?>
      <table class="table table-sm table-borderless table-responsive mb-2">
        <tbody>
          <tr><th scope="row">Nama Event</th>    <td><input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{@$produks->nama_produk}}"> 
		  @error('nama_produk')
		  <div class="invalid-feedback">
		  {{$message}}
		  </div>
		  @enderror
		  </td> </tr>    
		  <tr><th scope="row">Kategori Event</th> 
		  <?php $link = mysqli_connect("127.0.0.1", "root", "", "ape");
								 
								// jalankan query
								$result = mysqli_query($link, "SELECT * FROM kategoris");
			?>
		  <td><select class="form-control form-control-sm @error('id_kategori') is-invalid @enderror" name="id_kategori">
						<?php
						$selek = "";
						while ($row=mysqli_fetch_array($result))
								{
									if ($row['id'] == @$produks->id_kategori){ $selek = "selected";}
									echo "<option value='".$row['id']."'".$selek.">".$row['nama_kategori']."</option>";
								}
						?>
		  </td> </tr>
          <tr><th scope="row">Harga Pendaftaran</th>    <td><input type="text" class="form-control @error('harga_produk') is-invalid @enderror" id="harga_produk" name="harga_produk" value="{{@$produks->harga_produk}}">
		   @error('harga_produk')
		  <div class="invalid-feedback">
		  {{$message}}
		  </div>
		  @enderror
		  </td> </tr>
         <tr><th scope="row">Gambar Event</th>    <td><input type="file" class="form-control-file @error('file') is-invalid @enderror" id="gambar-produk" name="file">  <img id="preview" src="<?php if(session('cek') == 'Edit') {echo url('uploads').'/'.@$produks->gambar;}?>#" alt="your image" class="img-thumbnail" style="border:none;"/>
		 @error('file')
		 <div class="invalid-feedback">
		  {{$message}}
		  </div>
		  @enderror
		 </td> </tr>
          <tr><th scope="row">Deskripsi Event</th><td><input type="text" class="form-control @error('des_produk') is-invalid @enderror" id="des_produk" name="des_produk" value="{{@$produks->des_produk}}">
		  @error('des_produk')
		  <div class="invalid-feedback">
		  {{$message}}
		  </div>
		  @enderror
		  </td></tr>
          <!--<tr><th scope="row">Waktu posting</th>    <td><input type="text" class="form-control" id="formGroupExampleInput" placeholder="23-03-2020"></td></tr>-->
        </tbody>
      </table>
    <div class="float-right mr-5 my-3">
      <button type="submit" class="btn btn-success">{{session('cek')}}</button>
      <a href="{{url('/admin-produk')}}" class="btn btn-secondary">Cancel</a>
    </div>
    </form>
  </div>
</div>
<!--  end -->

<!-- Modal -->

@endsection 
@section('js')
<script>
  $(document).ready(function() {
  $('#summernote').summernote();
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#gambar-produk").change(function() {
  readURL(this);
});
</script>
@endsection
