<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="antialiased">
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <form action="{{ route('make') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="សែម គឹមសាន">
                            </div>
                            <div class="form-group">
                                <label for="org">{{ __('Org') }}</label>
                                <input type="text" class="form-control" id="org" name="org" value="Sem Keamsan">
                            </div>
                            <div class="form-group">
                                <label for="url">{{ __('Url') }}</label>
                                <input type="url" class="form-control" id="url" name="url"
                                    value="https://www.facebook.com/semkeamsan">
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('E-mail') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="keamsan.sem@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="+(885) 969 140 554">
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button class="btn btn-success" type="submit">{{ __('Make') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @if (Session::has('response'))

                <div class="col">
                    {!! QrCode::size(400)->encoding('UTF-8')->generate("BEGIN:VCARD\nVERSION:3.0\nN:Lastname;Surname\nFN:".Session::get('response')['name']."\nORG:".Session::get('response')['org']."\nURL:".Session::get('response')['url']." \n E-mail:".Session::get('response')['email']."\nTEL;TYPE=voice,work,pref:".Session::get('response')['phone']."\nEND:VCARD") !!}
                </div>
            @else
                <div class="col">
                    {!! QrCode::size(400)->encoding('UTF-8')->generate("BEGIN:VCARD\nVERSION:3.0\nN:Lastname;Surname\nFN:សែម គឹមសាន\nORG:Sem Keamsan\nURL:https://www.facebook.com/semkeamsan \n E-mail:keamsan.sem@gmail.com\nTEL;TYPE=voice,work,pref:+(885) 969 140 554\nEND:VCARD") !!}
                </div>
            @endif


        </div>
    </div>
</body>

</html>
