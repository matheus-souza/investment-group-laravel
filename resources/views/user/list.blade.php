<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th >
            <th scope="col">CPF</th >
            <th scope="col">Nome</th >
            <th scope="col">Telefone</th >
            <th scope="col">Nascimento</th >
            <th scope="col">E-mail</th >
            <th scope="col">Status</th >
            <th scope="col">Permissão</th >
            <th scope="col">Ações</th >
        </tr>
    </thead>
    <tbody>
    @foreach($user_list as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->formatted_cpf }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->formatted_phone }}</td>
            <td>{{ $user->formatted_birth }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->permission }}</td>
            <td class="btn-toolbar">
                <div class="btn-group mr-2">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-xs btn-warning">Editar</a>
                </div>
                <div class="btn-group mr-2">
                    {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger">Remover</button>
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
