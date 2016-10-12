@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">欢迎</div>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <div class="panel-body">
                        请登录或注册！
                    </div>
                @else
                    <div class="panel-body">
                        您已登录，可以开始管理工作了！
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
