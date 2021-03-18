@extends('admin.header')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <h1 class="mb-3">Data Kategori</h1>

    <!-- Form edit artikel -->
<div class="card">
  <div class="card-header">
    <h3>{{session('cek')}} Kategori</h3>
    <hr>
  </div>
  <div class="card-body">
    <?php if (session('cek') == "Edit") {?>
    <form action="{{url('EditKategori')}}/{{@$kategoris->id}}" method="POST">
	@method('patch')
	@csrf
  <?php } else {?>
  <form action="{{url('TambahKategori')}}" method="POST">
	@csrf
  <?php }?>
      <table class="table table-sm table-borderless table-responsive mb-2">
        <tbody>
          <tr><th scope="row">Nama Kategori</th>    <td><input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{@$kategoris->nama_kategori}}"> 
		  @error('nama_kategori')
		  <div class="invalid-feedback">
		  {{$message}}
		  </div>
		  @enderror
		  </td> </tr>
         <!-- <tr><th scope="row">Gambar Produk</th>    <td><input type="file" class="form-control-file" id="gambar-produk" name="gambar">  <img id="preview" src="#" alt="your image" class="img-thumbnail" style="border:none;"/></td> </tr>
         <tr><th scope="row">Deskripsi Produk</th>    <td><textarea id="summernote" name="editordata"></textarea></td> </tr>
          <tr><th scope="row">Waktu posting</th>    <td><input type="text" class="form-control" id="formGroupExampleInput" placeholder="23-03-2020"></td></tr>-->
        </tbody>
      </table>
    <div class="float-right mr-5 my-3">
      <button type="submit" class="btn btn-success">{{session('cek')}}</button>
      <a href="{{url('/admin-kategori')}}" class="btn btn-secondary">Cancel</a>
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
