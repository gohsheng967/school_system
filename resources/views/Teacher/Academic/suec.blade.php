<x-home-master>
    @section('content')
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('message')}}
        </div>
    @elseif(Session::has('message_error'))
    <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('message_error')}}

        </div> 
    @endif
    @if(count($import_error) != 0)
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach($import_error as $error)
                <li>{{$error}} -> importFailed <span class= "badge badge-danger">Reason: Duplicate / Invalid Grade / Student Not Found</span> </li>
            @endforeach
        </div> 
    
    @endif

    <div class="container">
    <div class="row my-1">
        <a href="{{route('academic.menu')}}" class ="btn btn-secondary ml-auto btn-sm">目录</a>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-body">
            <div class="row">
                
            </div>
            <form action="{{ route('academic.suec_import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="Suec_excel" name ="Suec_excel" required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <label class="custom-file-label" for="customFile">Specific File Format and Headers Required</label>
                    </div>
                </div>
                <div class="row my-1">
                    <button class="btn btn-success btn-sm">Import 高中统考成绩</button>
                </div>
            </form>
            <div class="row">
                <a href="/storage/Import_Template/Student_SeniorUEC_template.xlsx" download>范本 Sample</a>
            </div>
        </div>
    </div>


    @endsection
</x-home-master>