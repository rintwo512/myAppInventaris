<table>
    <thead>
    <tr>
        <th>No.</th> 
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
    @foreach($dataExportCctv2 as $dataCctv2)
        <tr>
            <td>{{ $loop->iteration }}</td>           
            <td>{{ $dataCctv2->lokasi }}</td>
            <td>{{ $dataCctv2->merk }}</td>
            <td>{{ $dataCctv2->type }}</td>
            <td>{{ $dataCctv2->resolusi }}</td>
            @if ($dataCctv2->status == "Rusak")
            <td style="background-color: #E72E2E;color:white">{{ $dataCctv2->status }}</td>
            @else
            <td style="background-color: #11B522;color:white">{{ $dataCctv2->status }}</td>
            @endif
            <td>{{ $dataCctv2->tgl_pemasangan }}</td>
            <td>{{ $dataCctv2->petugas_pemasangan }}</td>
            <td>{{ $dataCctv2->kerusakan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>