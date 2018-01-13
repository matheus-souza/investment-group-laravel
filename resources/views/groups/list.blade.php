<table class="default-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome do grupo</th>
        <th>Instituição</th>
        <th>Nome do responsável</th>
        <th>Ações</th>
    </thead>
    <tbody>
    @foreach($group_list as $group)
        <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->name }}</td>
            <td>{{ $group->institution->name }}</td>
            <td>{{ $group->user->name }}</td>
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']); !!}
                {!! Form::submit('Remover') !!}
                {!! Form::close(); !!}
            </td>
        </tr>
    @endforeach
    </tbody>
    </tr>
</table>
