<table>
    <thead>
    <tr>
        <th>No.</th>
        <th>Lantai</th>        
        <th>Wing</th>
        <th>Lokasi</th>
        <th>Merk</th>        
        <th>Type</th>                    
        <th>Resolusi</th>
        <th>Status</th>
        <th>Tgl.Pemasangan</th>
        <th>Pet.Pemasangan</th>        
        <th>Ket</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dataExportCctv1 as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->lantai }}</td>
            <td>{{ $data->wing }}</td>
            <td>{{ $data->lokasi }}</td>
            <td>{{ $data->merk }}</td>
            <td>{{ $data->type }}</td>
            <td>{{ $data->resolusi }}</td>
            @if ($data->status == "Rusak")
            <td style="background-color: #E72E2E;color:white">{{ $data->status }}</td>
            @else
            <td style="background-color: #11B522;color:white">{{ $data->status }}</td>
            @endif
            <td>{{ $data->tgl_pemasangan }}</td>
            <td>{{ $data->petugas_pemasangan }}</td>
            <td>{{ $data->kerusakan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>