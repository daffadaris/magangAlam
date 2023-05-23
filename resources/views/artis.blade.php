<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <a href="/" ><h1 class="title">MagangAlam</h1></a>
        </div>
        <a href="/artis/tambah"> + Tambah artis Baru</a>
        <table border="1" class="table">
            <tr>
                <th>Artis</th>
                <th>Jenis Kelamin</th>
                <th>Bayaran</th>
                <th>Award</th>
                <th>Negara</th>
            </tr>
            @foreach($artis as $a)
            <tr>
                <td>{{ $a->nm_artis }}</td>
                <td>{{ $a->jk }}</td>
                <td>{{ $a->bayaran }}</td>
                <td>{{ $a->award }}</td>
                <td>{{ $a->nm_negara }}</td>
                <td>
                    <button class="editButton" data-id="{{ $a->kd_artis }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                    |
                    <a href="/artis/hapus/{{ $a->kd_artis }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div id="editModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Artis</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="/artis/update" method="post">
                    {{ csrf_field() }}
                    <input id="editId" name="kode" value="{{ $artiss->kd_artis }}" hidden>
                    Nama <input id="editName" type="text" name="artis" value="{{ $artiss->nm_artis }}" required="required">
                    <br />
                    <label for="jk">Jenis kelamin
                        <select id="editJk" name="jk">
                            <option value="PRIA" {{ $artiss->jk == 'PRIA' ? 'selected' : '' }}>PRIA</option>
                            <option value="WANITA" {{ $artiss->jk == 'WANITA' ? 'selected' : '' }}>WANITA</option>
                        </select>
                    </label><br />
                    Bayaran <input id="editBayaran" type="number" name="bayaran" value="{{ $artiss->bayaran }}" required="required"> <br />
                    Award <input id="editAward" type="number" name="award" placeholder="0" value="{{ $artiss->award }}">
                    <br />
                    <label for="negara">Asal Negara
                        <select id="editNegara" name="negara">
                            @foreach ($negara as $n)
                                <option value="{{ $n->kd_negara }}" {{ $n->kd_negara == $artiss->negara ? 'selected' : '' }}>{{ $n->nm_negara }}</option>
                            @endforeach
                        </select>
                    </label><br />
                    <input type="submit" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for the edit button
        $('.editButton').click(function() {
            var id = $(this).data('id');

            // Send AJAX request to get the edit form
            $.ajax({
                url: '/artis/edit/' + id,
                type: 'GET',
                success: function(response) {
                    // Parse the response as JSON
                    var data = JSON.parse(response);

                    $('#editModal').modal('show'); // Show the modal
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
