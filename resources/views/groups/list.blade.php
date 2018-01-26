<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do grupo</th>
            <th scope="col">Instituição</th>
            <th scope="col">Nome do responsável</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($group_list as $group)
        <tr>
            <th scope="row">{{ $group->id }}</th>
            <td>{{ $group->name }}</td>
            <td>{{ $group->institution->name }}</td>
            <td>{{ $group->user->name }}</td>
            <td class="btn-toolbar">
                <div class="btn-group mr-2">
                <a href="{{ route('group.show', $group->id) }}" class="btn btn-xs btn-info">Detalhes</a>
                </div>
                <div class="btn-group mr-2">
                <a href="{{ route('group.edit', $group->id) }}" class="btn btn-xs btn-warning">Editar</a>
                </div>
                <div class="btn-group mr-2">
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']); !!}
                    <button type="submit" class="btn btn-danger">Remover</button>
                {!! Form::close(); !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
    </tr>
</table>
