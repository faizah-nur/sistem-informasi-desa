<div class="kop">
    <table class="kop-table">
        <tr>
            <td width="15%" align="center" valign="middle">
                @if(setting('site_logo'))
                    <img 
                        src="{{ public_path('storage/' . setting('site_logo')) }}" 
                        class="kop-logo"
                    >
                @endif
            </td>

            <td width="85%" class="kop-text">
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
