# Membuat Tampilan Website
untuk membuat tampilan website disini kita menggunakan HTML, CSS, Dan Bootstrap.
### Melakukan Import Library dan Css code yang digunakan
```HTML
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="{{asset('assets')}}/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bentham&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

```

### membuat tampilan pada form login 
```HTML
<div class="login-main-text">
            <h2>Temukan Event Keinginanmu<br> <strong></strong></h2>
            <p>Join bersama kami untuk wujudkan event mu. </p>
         </div>
      </div>
      <div class="main">
	 
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="post" action ="{{url('doLogin')}}">
			    @if (session('alert'))
				<div class="alert alert-danger">
				{{ session('alert')}}
				</div>
				@endif
			    {{ csrf_field() }}
                  <div class="form-group">
                     <label>User Name </label>
                     <input type="text" class="form-control" placeholder="User Name" name="username" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password" required>
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
               </form>
            </div>
         </div>
      </div>
```