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
    @foreach($dataExportCctv3 as $data3)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data3->lantai }}</td>
            <td>{{ $data3->wing }}</td>
            <td>{{ $data3->lokasi }}</td>
            <td>{{ $data3->merk }}</td>
            <td>{{ $data3->type }}</td>
            <td>{{ $data3->resolusi }}</td>
            @if ($data3->status == "Rusak")
            <td style="background-color: #E72E2E;color:white">{{ $data3->status }}</td>
            @else
            <td style="background-color: #11B522;color:white">{{ $data3->status }}</td>
            @endif
            <td>{{ $data3->tgl_pemasangan }}</td>
            <td>{{ $data3->petugas_pemasangan }}</td>
            <td>{{ $data3->kerusakan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>