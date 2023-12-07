<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb mb-3">
                <div class="float-start">
                    <h2>Data Transaksi</h2>
                </div>
                <div class="float-end">
                    <a class="btn btn-success" href="{{ route('transaksi.create') }}"> Create Transaksi</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Coustumer</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Harga Sewa</th>
                            <th>status</th>
                            <th>Tanggal Buat</th>
                            <th>Tanggal Update</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $item->coustumer->nama }}</th>
                                <th>{{ $item->kendaraan->nama }}</th>
                                <th>{{ $item->tanggal_mulai }}</th>
                                <th>{{ $item->tanggal_selesai }}</th>
                                <th>{{ $item->harga }}</th>
                                <th>{{ $item->status }}</th>
                                <th>{{ $item->created_at }}</th>
                                <th>{{ $item->updated_at }}</th>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('transaksi.edit', $item->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <th class="text-center bg-warning" colspan="10">Transaksi Belum Ada</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#laravel_datatable').DataTable();
        });

    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
