@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    @component('admin.components.card')

    @slot('title')
        <h1>Título Card</h1>
    @endslot
        Um card de exemplo
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

    <hr>

    @if (isset($products))
        @foreach ($products as $product)
            <p class="@if ($loop->first) last @endif">
                {{ $product }}</p>
        @endforeach
    @endif

    <hr>

    @forelse ($products as $product)
        <p class="@if ($loop->last) last @endif">{{ $product }}</p>
    @empty
        <p>Não existem produtos cadastrados</p>
    @endforelse

    <hr>
    @if ($nome === 'Márcio')
        <p>Igual</p>
    @elseif ($nome == 'Marcio')
        <p>Igual!!</p>
    @else
        <p>Diferente</p>
    @endif

    @unless ($nome === 'Márcio')
        <p>Teste lógico contrário do IF</p>
    @else
        Diferente mesmo
    @endunless

    @isset ($nome)
        <p>Variável existe</p>
    @endisset

    @empty ($teste)
        <p>Variável vazia</p>
    @endempty

    @auth
        <p>Autenticado</p>
    @else
        <p>Não autenticado</p>
    @endauth

    @guest
        <p>Não autenticado</p>
    @endguest

    @switch ($teste2)
        @case(1)
            Caso 1
            @break
        @case(2)
            Caso 1
            @break
        @default
            Padrão
    @endswitch


@endsection

<style>
    .last {background: #CCC;}
</style>
