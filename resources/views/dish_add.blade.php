@extends('layouts.app', ['title' => __('msg.NewDish')])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{__('msg.NewDish')}}</div>
                <div class="card-body">
                    <form method="Post" action="{{url(App::getLocale().'/dish/new')}}" class='form-horizontal' accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <label>{{__('msg.name')}}</label>
                        <input class="form-control botmarg" name="name" type="text" value="">   
                        @if ($errors->has('name')) <p>{{ $errors->first('name') }}</p> @endif 

                        <label>{{__('msg.ingred')}}</label>
                            <button type="button" class="btn btn-a" onclick="adding()">+</button>
                            <button type="button" class="btn btn-a" onclick="remove()">-</button><br/>
                        <div id="selects">
                            <select name="ingred" class="form-control" id="ingred">
                                @foreach ($ings as $ingr)
                                    <option value="{{$ingr->name}}">{{$ingr->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>{{__('msg.price')}}</label>
                        <input class="form-control botmarg" name="price" type="number" value="">  
                        @if ($errors->has('price')) <p>{{ $errors->first('price') }}</p> @endif 

                        <label>{{__('msg.photo')}}</label>
                        <input class="form-control botmarg" type="file" name="file">
                        @if ($errors->has('file')) <p>{{ $errors->first('file') }}</p> @endif 

                        <input class="btn btn-a right" type="submit" value={{__('msg.add')}}>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var i=0;
    function adding()
    {
        var sel1 = document.getElementById('ingred').cloneNode(true);
        i++;
        sel1.name=sel1.name+i;
        document.getElementById('selects').appendChild(sel1);
    }
    function remove()
    {
        var sel1 = document.getElementById('selects');
        if (sel1.childElementCount>1) 
            {
                i--;
                sel1.removeChild(sel1.lastChild);
            }
    }
</script>
@endsection