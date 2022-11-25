@extends('modelos.app')

@section('title','Previsão')

@section('content')
<h1>Current date:{{$today = date('d/m/Y');}}</h1>

<h1>Investors table</h1>

<table>
    <thead>
        <th>Name</th>
        <th>Initial value</th>
        <th>Invest date</th>
        <th>Number of months</th>
        <th>Gross value</th>
        <th>Net value</th>
    </thead>
    {{$count=0}}
    @foreach ($investors as $i)
    <tbody>
        <tr>
            <td>{{$i['nome']}}</td>
            <td>R$ {{$i['valorInicial']}}</td>
            <td>{{$i['initialdate']}}</td>
            <td>{{$c[$count]}}</td>
            <td>R${{$transport[$count]}}</td>
            <td>R${{$transportNet2[$count]}}</td>
        </tr>
        {{$count=$count+1}}
        @endforeach
    </tbody>
</table>

<!--<h1>Investors list</h1>
<ul>
    {{$count=0}}
        @foreach ($investors as $i)
            
                <li>id:{{$i['id']}} - {{$i['nome']}} - R$ {{$i['valorInicial']}} - 
                     {{$i['initialdate']}} - {{$c[$count]}} - R${{$transport[$count]}} 
                     - R${{$transportNet2[$count]}}</li>
                     {{$count=$count+1}}  
        @endforeach
        
        
</ul>-->
<p>Total values: Gross: {{$sumGross}} - Net: {{$sumNet}} - Initial application: {{$sumInitialValues}} - Taxes : {{$sumTaxes}}</p>
@endsection
