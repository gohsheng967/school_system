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
    <a href="{{route('principal.menu')}}" class ="btn-sm btn-secondary">目录</a>
  <br>
  <br>
    <table class="table table-bordered" id ="dataTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style ="width:2%"> #</th>
                <th scope="col" style ="width:50%">优惠标题</th>
                <th scope="col" style ="width:18%">类别</th>
                <th scope="col" style ="width:30%">备注</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotion as $promo)
            <tr>
                <th scope="row"></th>
                <td class = 'align-middle'><a href="{{route('principal.promotion_details',$promo->id)}}" class='font-weight-bold'>{{$promo->title}}</a></td>
                <td class = 'align-middle'>{{$promo->category}}</td>
                <td class = 'align-middle'>{{$promo->remark}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row my-1">
        <button class="btn btn-success col-sm-11 btn-sm mx-auto" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i></button>
    </div>


{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@promotion_add']]) !!}
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">添加优惠</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="promo_title" class="col-sm-2 col-form-label">优惠标题</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="promo_title">
            </div>
        </div>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">类型</label>
            <div class="col-sm-10">
              <select name="category" class ="form-control">
                <option value="奖学金">奖学金</option>
                <option value="助学金">助学金</option>
                <option value="奖励金">奖励金</option>
                <option value="贷学金">贷学金</option>
                <option value="贷书">贷书</option>
                <option value="其他">其他</option>
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label">备注</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="remark">
            </div>
        </div>
        <div class="row">
          <input type="submit" class ='btn btn-success btn-sm col-sm-3 ml-auto mr-3' name ='submit' value ='添加'>
        </div>

      </div>

    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
</x-home-master>