<div class="kop">
    <table class="kop-table" width="100%">
        <tr>
            <td width="15%" align="center">
                @if(setting('site_logo'))
                    <img src="{{ public_path('storage/' . setting('site_logo')) }}" width="80">
                @endif
            </td>

            <td width="85%" align="center">
                <h1>PEMERINTAHAN DESA {{ strtoupper(setting('nama_desa')) }}</h1>
                <h2>KECAMATAN {{ strtoupper(setting('nama_kecamatan')) }}</h2>
                <h2>KABUPATEN {{ strtoupper(setting('nama_kabupaten')) }}</h2>

                <p>
                    {{ setting('alamat_desa') }} <br>
                    Telp: {{ setting('telepon_desa') }}
                </p>
            </td>
        </tr>
    </table>
</div>
<hr>
