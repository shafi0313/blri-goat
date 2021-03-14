<table>
    <thead>
        <tr>
            <th>SL</th>
            <th>Sire</th>
            <th>Dam</th>
            <th>Animal Tag</th>
            <th>Coat color</th>
            <th>Sex</th>
            <th>Birth Wt. (kg)</th>
            <th>Litter Size</th>
            <th>Generation</th>
            <th>Paity</th>
            <th>Dam Milk</th>
            <th>Date of Birth</th>
            <th>Season Date of Birth</th>
            <th>Death Date</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>
        @php $x=1; @endphp
        @foreach ($animalInfos as $animalInfo)
        <tr>
            <td class="text-center">{{ $x++ }} </td>
            <td>{{ $animalInfo->sire }} </td>
            <td>{{ $animalInfo->dam }} </td>
            <td>{{ $animalInfo->animal_tag }} </td>
            <td>{{ $animalInfo->color }} </td>
            <td>{{ $animalInfo->sex }} </td>
            <td>{{ $animalInfo->birth_wt }} </td>
            <td>{{ $animalInfo->litter_size }} </td>
            <td>{{ $animalInfo->generation }} </td>
            <td>{{ $animalInfo->paity }} </td>
            <td>{{ $animalInfo->dam_milk }} </td>
            <td>{{ $animalInfo->d_o_b }} </td>
            <td>{{ $animalInfo->season_d_o_b }} </td>
            <td>{{ $animalInfo->death_date }} </td>
            <td>{{ $animalInfo->remark }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
