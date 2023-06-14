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
    @foreach($dataExportCctv4 as $dataCctv4)
        <tr>
            <td>{{ $loop->iteration }}</td>           
            <td>{{ $dataCctv4->lokasi }}</td>
            <td>{{ $dataCctv4->merk }}</td>
            <td>{{ $dataCctv4->type }}</td>
            <td>{{ $dataCctv4->resolusi }}</td>
            @if ($dataCctv4->status == "Rusak")
            <td style="background-color: #E72E2E;color:white">{{ $dataCctv4->status }}</td>
            @else
            <td style="background-color: #11B522;color:white">{{ $dataCctv4->status }}</td>
            @endif
            <td>{{ $dataCctv4->tgl_pemasangan }}</td>
            <td>{{ $dataCctv4->petugas_pemasangan }}</td>
            <td>{{ $dataCctv4->kerusakan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>