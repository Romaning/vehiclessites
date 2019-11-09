@if(session()->has('alert-danger'))
    <div class='alert alert-danger d-flex align-items-center' role='alert' data-toggle="appear" data-class="animated bounceIn">
        <div class='flex-00-auto'>
            <i class='fa fa-fw fa-check'></i>
        </div>
        <div class='flex-fill ml-3'>
            <p class='mb-0'>  {{ session()->get('alert-danger') }}<a class='alert-link'
                                                                     href='javascript:void(0)'></a>!</p>
        </div>
    </div>
    {{--<a href="javascript:history.back(-2);" title="Ir la página anterior" class="btn btn-primary"><i class="fa fa-align-left"></i> ATRAS</a>--}}
@endif
@if(session()->has('alert-success'))
    <div class='alert alert-success d-flex align-items-center' role='alert' data-toggle="appear" data-class="animated bounceIn">
        <div class='flex-00-auto'>
            <i class='fa fa-fw fa-check'></i>
        </div>
        <div class='flex-fill ml-3'>
            <p class='mb-0'>{{ session()->get('alert-success') }}<a class='alert-link'
                                                                      href='javascript:void(0)'></a>!</p>
        </div>
    </div>

@endif
@if (session('status'))
    <div class='alert alert-success d-flex align-items-center' role='alert' data-toggle="appear" data-class="animated bounceIn">
        <div class='flex-00-auto'>
            <i class='fa fa-fw fa-check'></i>
        </div>
        <div class='flex-fill ml-3'>
            <p class='mb-0'>  {{ session('status') }}<a class='alert-link' href='javascript:void(0)'></a>!</p>
        </div>
    </div>
    {{--<a href="javascript:history.back(-2);" title="Ir la página anterior" class="btn btn-primary"><i class="fa fa-align-left"></i> ATRAS</a>--}}
@endif
