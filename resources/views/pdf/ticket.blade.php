<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali OM Tour E-Ticket</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            page-break-inside: avoid;
            border: 2px solid #ccc;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            margin-bottom: 0px;
        }

        .logo {
            height: 50px;
        }

        .header-title {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 4px;
        }

        .info {
            font-size: 13px;
            margin-top: 2px;
        }

        .ticket-number {
            text-align: right;
            font-weight: bold;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        hr {
            border: none;
            border-top: 2px solid #888;
            margin-top: -2px;
            margin-bottom: 15px;
        }

        .field-table {
            width: 100%;
            border-spacing: 0 8px;
            margin-bottom: 10px;
        }

        .field-table td {
            vertical-align: top;
        }

        .field {
            border-bottom: 1px solid #666;
            display: inline-block;
            height: 16px;
        }

        .w-60 {
            width: 60px;
        }

        .w-100 {
            width: 100px;
        }

        .w-150 {
            width: 150px;
        }

        .w-200 {
            width: 200px;
        }

        .w-300 {
            width: 300px;
        }

        .w-350 {
            width: 350px;
        }

        .w-450 {
            width: 450px;
        }

        .w-700 {
            width: 700px;
        }

        fieldset {
            border: 1px solid #aaa;
            padding: 10px;
            margin-top: 15px;
            page-break-inside: avoid;
        }

        legend {
            font-weight: bold;
            padding: 0 6px;
        }

        .checkbox-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 6px;
        }

        .checkbox-grid label {
            width: 48%;
        }

        .signature-area {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .signature-box {
            text-align: center;
            width: 45%;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 200px;
            margin: 30px auto 8px;
        }

        .footer-note {
            font-size: 10px;
            color: red;
            font-style: italic;
            margin-top: 10px;
        }
    </style>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bali OM Tour E-Ticket</title>
<style>
    @page {
        size: A4 landscape;
        margin: 10mm;
    }

    body {
        font-family: sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        page-break-inside: avoid;
        border: 2px solid #ccc;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 12px;
        margin-bottom: 0px;
    }

    .logo {
        height: 50px;
    }

    .header-title {
        font-size: 36px;
        font-weight: bold;
        letter-spacing: 4px;
    }

    .info {
        font-size: 13px;
        margin-top: 2px;
    }

    .ticket-number {
        text-align: right;
        font-weight: bold;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    hr {
        border: none;
        border-top: 2px solid #888;
        margin-top: -2px;
        margin-bottom: 15px;
    }

    .field-table {
        width: 100%;
        border-spacing: 0 8px;
        margin-bottom: 10px;
    }

    .field-table td {
        vertical-align: top;
    }

    .field {
        border-bottom: 1px solid #666;
        display: inline-block;
        height: 16px;
    }

    .w-60 {
        width: 60px;
    }

    .w-100 {
        width: 100px;
    }

    .w-150 {
        width: 150px;
    }

    .w-200 {
        width: 200px;
    }

    .w-300 {
        width: 300px;
    }

    .w-350 {
        width: 350px;
    }

    .w-450 {
        width: 450px;
    }

    .w-700 {
        width: 700px;
    }

    fieldset {
        border: 1px solid #aaa;
        padding: 10px;
        margin-top: 15px;
        page-break-inside: avoid;
    }

    legend {
        font-weight: bold;
        padding: 0 6px;
    }

    .checkbox-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: 6px;
    }

    .checkbox-grid label {
        width: 48%;
    }

    .signature-area {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }

    .signature-box {
        text-align: center;
        width: 45%;
    }

    .signature-line {
        border-top: 1px solid #000;
        width: 200px;
        margin: 30px auto 8px;
    }

    .footer-note {
        font-size: 10px;
        color: red;
        font-style: italic;
        margin-top: 10px;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="header" style="display: flex; align-items: center; gap: 12px;">
            @php
                $path = public_path('assets/img/baliomtour.png');
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            @endphp

            <img src="{{ $base64 }}" alt="Logo Bali Om" style="height: 50px;">

            <div>
                <div class="header-title">BALI OM TOURS</div>
                <div class="info">Tourist Information and Travel Agent</div>
                <div class="info">Jl. Bisma no. 3 Ubud • +62 81936976234 / +62 82237397076</div>
            </div>
        </div>

        <div class="ticket-number">No. <span class="field w-100">#E-{{ $transaksi->transaksi_id }}</span></div>
        <hr>

        <table class="field-table">
            <tr>
                <td>Name: <span class="field w-350">{{ $transaksi->pemesanan->pelanggan->nama_pemesan }}</span></td>
                <td>Phone No.: <span class="field w-200">{{ $transaksi->pemesanan->pelanggan->nomor_whatsaap }}</span>
                </td>
            </tr>
            <tr>
                <td>Pax: <span class="field w-60">{{ $transaksi->jumlah_peserta }}</span></td>
                <td>Provider: <span class="field w-300">{{ $transaksi->pemesanan->mobil->sopir->nama_sopir }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="3">Activity: <span class="field w-700">{{ $transaksi->paketWisata->judul }}</span></td>
            </tr>
            <tr>
                <td colspan="3">Date Activity: <span
                        class="field w-200">{{ $transaksi->pemesanan->tanggal_keberangkatan }}</span></td>
            </tr>
            <tr>
                <td>Total Transaction: <span class="field w-100">{{ $transaksi->total_transaksi }}</span></td>
                <td>Deposit: <span class="field w-100">{{ $transaksi->deposit }}</span></td>
                <td>Balance: <span class="field w-100">{{ $transaksi->balance }}</span></td>
            </tr>
            <tr>
                <td colspan="3">Pick up time: <span
                        class="field w-150">{{ $transaksi->pemesanan->jam_mulai }}</span></td>
            </tr>
            <tr>
                <td colspan="3">Other: <span class="field w-700"></span></td>
            </tr>
        </table>

        <fieldset>
            <legend>Include</legend>
            <div class="checkbox-grid">
                @php $include = $transaksi->includeModel; @endphp
                <label><input type="checkbox" {{ $include?->bensin ? 'checked' : '' }}> Bensin</label>
                <label><input type="checkbox" {{ $include?->parkir ? 'checked' : '' }}> Parkir</label>
                <label><input type="checkbox" {{ $include?->sopir ? 'checked' : '' }}> Supir</label>
                <label><input type="checkbox" {{ $include?->makan_siang ? 'checked' : '' }}> Makan Siang</label>
                <label><input type="checkbox" {{ $include?->makan_malam ? 'checked' : '' }}> Makan Malam</label>
                <label><input type="checkbox" {{ $include?->tiket_masuk ? 'checked' : '' }}> Tiket Masuk</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Exclude</legend>
            <div class="checkbox-grid">
                @php $exclude = $transaksi->exclude; @endphp
                <label><input type="checkbox" {{ $exclude?->bensin ? 'checked' : '' }}> Bensin</label>
                <label><input type="checkbox" {{ $exclude?->parkir ? 'checked' : '' }}> Parkir</label>
                <label><input type="checkbox" {{ $exclude?->sopir ? 'checked' : '' }}> Supir</label>
                <label><input type="checkbox" {{ $exclude?->makan_siang ? 'checked' : '' }}> Makan Siang</label>
                <label><input type="checkbox" {{ $exclude?->makan_malam ? 'checked' : '' }}> Makan Malam</label>
                <label><input type="checkbox" {{ $exclude?->tiket_masuk ? 'checked' : '' }}> Tiket Masuk</label>
            </div>
        </fieldset>

        <div class="signature-area"
            style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: nowrap; margin-top: 50px; width: 100%;">
            <div class="signature-box" style="text-align: center; flex: 1;">
                <div class="signature-line" style="border-top: 1px solid #000; width: 200px; margin: 30px auto 8px;">
                </div>
                <p>Customer</p>
            </div>
            <div class="signature-box" style="text-align: center; flex: 1;">
                <div class="signature-line" style="border-top: 1px solid #000; width: 200px; margin: 30px auto 8px;">
                </div>
                <p>Bali Om Tourist Information</p>
            </div>
        </div>
        <div class="signature-area" style="display: flex; justify-content: space-between; margin-top: 50px;">
            <div class="signature-box" style="text-align: center; width: 45%;">
                <div class="signature-line" style="border-top: 1px solid #000; margin-bottom: 5px;"></div>
                <p>Customer</p>
            </div>
            <div class="signature-box" style="text-align: center; width: 45%;">
                <div class="signature-line" style="border-top: 1px solid #000; margin-bottom: 5px;"></div>
                <p>Bali Om Tourist Information</p>
            </div>
        </div>


        <div class="footer-note">Cancellation fee 50% from the full amount</div>
    </div>
</body>

</html>
