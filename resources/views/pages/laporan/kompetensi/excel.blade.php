<table>
    <thead>
    <tr>
        <th>User Id</th>
        <th>Nama</th>
        <th>Pelatihan</th>
        <th>Nilai</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td><strong>{{ $item->id }}</strong></td>
            <td colspan="3"><strong>{{ $item->nama }}</strong></td>
        </tr>
            @foreach ($item->kompetensi_auditors as $kompetensi)
                <tr>
                    <td colspan="2"></td>
                    <td>{{ $kompetensi->pelatihan }}</td>
                    <td class="text-right">{{ number_format($kompetensi->nilai, 2) }}</td>
                </tr>
            @endforeach
        <tr>
            <td colspan="3"><strong>Rata - Rata</strong></td>
            <td class="text-right"><strong>{{ number_format($item->kompetensi_auditors->avg('nilai'), 2) }}</strong></td>
        </tr>
        @endforeach
    </tbody>
</table>
