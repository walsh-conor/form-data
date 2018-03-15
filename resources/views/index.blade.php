<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Conor Walsh - Form Data</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
        <div class="container">

            <header>
                <div class="row">
                    <div class="text-center col-12">
                        <h1>Conor Walsh - Form Data</h1>
                        <p>Site built using the Laravel framework, HTML5, CSS3, bootstrap, and MySQL</p>
                        <p>Fields are validated on client and server side. Password is Hashed before being saved in the database. Email Address must be unique. Email, Name and Password are required. Images are resized and saved in a non-public folder, and the image path is saved in the database.</p>
                    </div>
                </div>
            </header>
            @if (Session::get('success'))
                <div class="alert alert-success">Form Submitted Successfully</div>
            @endif

            <div class="row">
                <div class="col-12">
                     <form action="/submit" method="POST" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Please fix the following errors
                            </div>
                        @endif

                        {!! csrf_field() !!}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" >
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address_one') ? ' has-error' : '' }}">
                            <label for="address_one">Address Line 1</label>
                            <input type="text" name="address_one" class="form-control" id="address_one" placeholder="Address Line 1" value="{{ old('address_one') }}" >
                            @if($errors->has('address_one'))
                                <span class="help-block">{{ $errors->first('address_one') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address_two') ? ' has-error' : '' }}">
                            <label for="address_two">Address Line 2</label>
                            <input type="text" name="address_two" class="form-control" id="address_two" placeholder="Address Line 2" value="{{ old('address_two') }}" >
                            @if($errors->has('address_two'))
                                <span class="help-block">{{ $errors->first('address_two') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('eircode') ? ' has-error' : '' }}">
                            <label for="eircode">Eir Code</label>
                            <input type="text" name="eircode" class="form-control" id="eircode" placeholder="Eir Code" value="{{ old('eircode') }}" >
                            @if($errors->has('eircode'))
                                <span class="help-block">{{ $errors->first('eircode') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country">Country</label>
                            @include('partials/country-select')
                            @if($errors->has('country'))
                                <span class="help-block">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            @if($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('fileinput') ? ' has-error' : '' }}">
                            <label for="fileinput">Upload Profile Image</label>
                            <input type="file" name="fileinput" class="form-control-file" id="fileinput">
                            <small>Only the following file types are accepted - .jpeg, .jpg, .png</small><br>
                            @if($errors->has('fileinput'))
                                <span class="help-block">{{ $errors->first('fileinput') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <footer class="footer text-center">
                <p>Conor Walsh | <a href="mailto:cw.conorwalsh@gmail.com">cw.conorwalsh@gmail.com</a> | 0876929685</p>
            </footer>

        </div> <!-- /container -->

        <script src="js/bootstrap.min.js"></script>
        <script src="js/ie10-viewport-bug-workaround.js"></script><!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </body>
</html>
