@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Observacion
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('observacions.show_fields')
                    <a href="{!! route('observacions.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
