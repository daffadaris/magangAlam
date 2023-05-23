    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body>

            <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Artis</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach ($artis as $a)
                                <form action="/artis/update" method="post">
                                    {{ csrf_field() }}
                                    <input name="kode" value="{{ $a->kd_artis }}" hidden>
                                    Nama <input type="text" name="artis" value="{{ $a->nm_artis }}" required="required">
                                    <br />
                                    <label for="jk">jenis kelamin
                                        <select id="jk" name="jk">
                                            <option value="PRIA">PRIA</option>
                                            <option value="WANITA">WANITA</option>
                                        </select>
                                    </label><br />
                                    Bayaran <input type="number" name="bayaran" value="{{ $a->bayaran }}"
                                        required="required"> <br />
                                    Award <input type="number" name="award" placeholder="0" value="{{ $a->award }}">
                                    <br />
                                    <label for="negara">Asal Negara
                                        <select id="negara" name="negara">
                                            @foreach ($negara as $n)
                                                <option value="{{ $n->kd_negara }}"
                                                    {{ $n->kd_negara == $a->negara ? 'selected' : '' }}>{{ $n->nm_negara }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label><br />
                                    <input type="submit" value="Simpan Data">
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </body>

    </html>
