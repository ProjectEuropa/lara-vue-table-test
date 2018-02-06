@extends('layouts.app')

@section('css')
<style rel="stylesheet" href="{{ asset('css/css-loader.css') }}"></style>
@endsection

@section('content')
<main class="container">
    <div class="under-header">
    <input type="hidden" id="search-type" value="{{ $searchtype == 'team' ?  'team' : 'match' }}">
        <h2>{{ $searchtype == 'team' ?  'Team' : 'Match' }} Data</h2>
        <p>{{ $searchtype == 'team' ?  'チーム' : 'マッチ' }}データの検索が可能です。ダウンロードアイコンをクリックするとダウンロードが始まります。</p>
    </div>
    <div id="app">
        <example-component></example-component>
    </div>
</main>


@endsection

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
</script>
@endsection