<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style_penjual.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />

</head>

<body style="background-color: orange;">
    <div class="container rounded bg-white mt-4 mb-4">

        <form action="{{ url('/profilesUpdate') }}" method="post">
            {{ csrf_field() }}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <span class="font-weight-bold">{{ $dataPenjual->fullname }}</span>
                            <span class="text-black-50">{{ $dataPenjual->email }}</span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row ">
                                <p> </p>
                                <div class="col-md-6"><label class="labels">Nama Lengkap</label>
                                    <input name="fullname" type="text" class="form-control" placeholder="first name" value="{{ $dataPenjual->fullname }}">
                                    <input name="id" type="hidden" class="form-control" placeholder="first name" value="{{ $dataPenjual->id }}">
                                </div>
                                <div class="col-md-6"><label class="labels">Username</label>
                                    <input name="username" type="text" class="form-control" value="{{ $dataPenjual->username }}" placeholder="surname">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 pb-3"><label class="labels">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="enter phone number" name="nomortelepon" value="{{ $dataPenjual->nomortelepon }}">
                                </div>

                                <div class="col-md-12"><label class="labels">Email ID</label><input name="email" type="text" class="form-control" placeholder="enter email id" value="{{ $dataPenjual->email }}"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Country</label><input name="kota" type="text" class="form-control" placeholder="country" value="{{ $dataPenjual->kota }}"></div>

                                <div class="col-md-6"><label class="labels">State/Region</label><input name="provinsi" type="text" class="form-control" placeholder="state" value="{{ $dataPenjual->provinsi }}"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience"><span> </span><span class="btn btn-secondary"> &nbsp;<a style="text-decoration:none; color:white" href="/dashpenjual">Kembali</a></span></div>

                            <div class=" d-flex justify-content-between align-items-center experience"><span><b>Profil Toko</b></span><span class=" "> </span></div>

                            <div class="col-md-12"> <input name="id_toko" type="hidden" class="form-control" placeholder="Nama Toko" value="{{ $dataPenjual->id_toko }}"></div> <br>

                            <div class="col-md-12"><label class="labels">Nama Toko</label><input name="namatoko" type="text" class="form-control" placeholder="Nama Toko" value="{{ $dataPenjual->namatoko }}"></div> <br>

                            <div class="col-md-12"><label class="labels">Nama Pemilik</label><input name="pemilik" type="text" class="form-control" placeholder="Nama Pemilik" value="{{ $dataPenjual->pemilik }}"></div> <br>

                            <div class="col-md-12"><label class="labels">Alamat</label><input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ $dataPenjual->alamat }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 pb-4 text-center">
                <button class="btn btn-primary profile-button" type="submit" name="save">Save Profile</button>
            </div>
        </form>

    </div>
</body>

</html>
