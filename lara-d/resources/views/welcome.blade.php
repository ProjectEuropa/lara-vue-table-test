@extends('layouts.app')

@section('content')
<main class="container">
    <div class="under-header">
        <h2>Team Data</h2>
        <p>チームデータの検索が可能です。ダウンロードアイコンをクリックするとダウンロードが始まります。</p>
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