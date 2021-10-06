<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No. Surat</th>
            <th>Kepada</th>
            <th>Perihal</th>
            <th>Tembusan</th>
            <th>Keterangan</th>
            <th>Dibuat Oleh</th>
            <th>Tgl Dibuat</th>
        </tr>
    </thead>

    <tbody>
        @php $no = 1 @endphp
        @foreach ($surats as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nomor_surat.$data->takahs->takah.$data->tahun }}</td>
            <td>{{ $data->kepada }}</td>
            <td>{{ $data->perihal }}</td>
            <td>{{ $data->tembusan }}</td>
            <td>{{ $data->keterangan }}</td>
            <td>{{ $data->pembuat }}</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>