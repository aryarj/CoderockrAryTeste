@csrf
    R$
    <input type="number" name="quantia" required placeholder="quantia:" value="{{old('quantia')}}">
    Data Inicial do investimento:
    <input type="data" name="dataInicial" required placeholder="dd/mm/yyyy" value="{{old('dataInicial')}}">
    <input type="text" name="cpf" required maxlength="11" minlength="11" placeholder="cpf:" value="{{$cliente->cpf ?? old('cpf')}}">
    <button type="submit">Enviar</button>