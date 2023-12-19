<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- Correct Font Awesome link -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <div class="row">
            <div class="col">
                <img src="{{asset('template/dist/img/bandara.jpg')}}" style="absolute; width: 650px; height:590px;">
                <div style="position: absolute; top: 0; left: 0; width: 650px; height: 590px; background: linear-gradient(rgba(11, 8, 169, 0.25), rgba(83, 80, 248, 0.50));"></div>
            </div>
            <div class="col d-flex align-items-center">
                <div class="container" style="margin: 2em;">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <img src="{{asset('template/dist/img/injourney.png')}}" style="width: 175px; height: auto;" alt="Logo">
                        </div>
                        <div class="col-4">
                            <img src="{{asset('template/dist/img/angkasapura2.png')}}" style="width: 175px; height: auto;" alt="Logo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{asset('template/dist/img/logologin.png')}}" style="width: 250px; height: auto;" alt="Logo">
                    </div>
                    <form action="" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{$item}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <span class="input-group-text">
                                <label><i class="fas fa-solid fa-envelope"></i></label>
                            </span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <span id="mybutton" onclick="change()" class="input-group-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-2 d-grid">
                            <button name="submit" type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8l+ua/CY5BzoI6mRWLFl9JpI+9WxIzG+J0cQxhWlWLA8NcDW1RKKbthg9Ios" crossorigin="anonymous"></script>
    <script>
        function change() {
            var x = document.getElementById('floatingPassword').type;
            if (x == 'password') {
                document.getElementById('floatingPassword').type = 'text';
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                </svg>`;
            }
            else {
                document.getElementById('floatingPassword').type = 'password';
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>`;
            }
        }
    </script>
</html>