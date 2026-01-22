<p style="margin-top: 30px;">
    {{ setting('nama_desa') }},
    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
</p>

<table width="100%" style="margin-top: 20px;">
    <tr>
        <td width="60%"></td>
        <td align="center">
            Kepala Desa {{ setting('nama_desa') }}
            <br><br><br><br>

            <strong>{{ setting('nama_kepala_desa') }}</strong><br>

            @if(setting('nip_kepala_desa'))
                NIP. {{ setting('nip_kepala_desa') }}
            @endif
        </td>
    </tr>
</table>
