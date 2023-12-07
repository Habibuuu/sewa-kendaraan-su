<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tambah Transaksi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb mb-3">
                <div class="float-start">
                    <h2>Tambah Transaksi</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coustumer</label>
                                <select class="form-control @error('coustumer_id') is-invalid @enderror" name="coustumer_id">
                                    <option value="">Pilih Coustumer</option>
                                    @foreach ($coustumer as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('coustumer_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kendaraan</label>
                                <select class="form-control @error('kendaraan_id') is-invalid @enderror" name="kendaraan_id">
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach ($kendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kendaraan_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Mulai Sewa</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" class="form-control">
                                @error('tanggal_mulai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Selesai Sewa</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" class="form-control">
                                @error('tanggal_selesai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Sewa</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" class="form-control">
                        @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
