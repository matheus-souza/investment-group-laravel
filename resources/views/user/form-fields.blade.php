<div class="form-row">
    @include('form.input', ['input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
</div>
<div class="form-row">
    @include('form.input', ['input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
    @include('form.input', ['input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
</div>
<div class="form-row">
    @include('form.password', ['input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
</div>
