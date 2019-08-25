@extends('layouts.master')

@section('title', 'child page 1')

@section('content')
    @parent
    <p>Dòng này là của child_page_1.blade.php</p>

    @hellokmin
@endsection

@section('breadcrumb')
    <div class="ui breadcrumb">
        <a class="section" href={{ url("test_master_layout") }}>Home</a>
        <i class="right angle icon divider"></i>
        <div class="active section">Post detail</div>
    </div>
@endsection
