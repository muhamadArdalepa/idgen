<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container py-4">
        <form action="/" class="d-flex flex-column gap-3" method="POST">
            @csrf
            <h5>Tambah Pelanggan</h5>
            <div class="form-group">
                <label for="id">ID</label>
                <input required type="text" name="id" class="form-control" value="{{ $id }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input required type="text" name="nama" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input required type="text" name="password" class="form-control" value="{{ $password }}">
            </div>
            <button class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-warning" onclick="window.location.reload()">Reset</button>
            <button type="button" class="btn btn-danger" onclick="deletepelanggan()">Hapus</button>
        </form>

        <div class="list-group mt-5">
            @foreach ($pelanggan as $p)
                <div class="list-group-item list-group-item-action lh-sm" data-id="{{ $p->id }}"
                    data-nama="{{ $p->nama }}" data-password="{{ $p->password }}">
                    <div class="small">{{ $p->id }}</div>
                    <div class="h5">{{ $p->nama }}</div>
                    <div class="">{{ $p->password }}</div>
                </div>
            @endforeach
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            [...document.getElementsByClassName('list-group-item')].map(liss => liss.addEventListener('click',
        () => {
                document.querySelector('input[name="id"]').value = liss.dataset.id
                document.querySelector('input[name="nama"]').value = liss.dataset.nama
                document.querySelector('input[name="password"]').value = liss.dataset.password
            }))
        })

        function deletepelanggan() {
            window.location.href = `delete/${document.querySelector('input[name="id"]').value}`
        }
    </script>

</body>

</html>
