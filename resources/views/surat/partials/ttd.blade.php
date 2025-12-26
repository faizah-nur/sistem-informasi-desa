{{-- surat/partials/ttd.blade.php --}}
<p style="margin-top: 30px;">
    {{ config('desa.nama_desa') }},
    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
</p>

<table style="width: 100%; margin-top: 20px;">
    <tr>
        <td style="width: 60%;"></td>
        <td style="text-align: center;">
            Kepala Desa {{ config('desa.nama_desa') }}
            <br><br><br><br>
            <strong>{{ config('desa.nama_kepala_desa') }}</strong>
        </td>
    </tr>
</table>
