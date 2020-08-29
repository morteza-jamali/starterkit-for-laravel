@extends('starter-kit::layouts.adminlayout')

@section('content')
    <div class="container">

        @include('starter-kit::component.err')
        <div class="alert alert-dark">
            <span>
                {{__("Filter")}}:
            </span>
            <a href="{{route('admin.news.index')}}" class="btn btn-dark" data-filter="all" >
                {{__("All")}}
            </a>
            <a href="?filter=0" data-filter="0" class="btn btn-dark filter">
                {{__("Drafted")}}
            </a>
            <a href="?filter=1" data-filter="1" class="btn btn-dark filter">
                {{__("Published")}}
            </a>
        </div>
        <form action="{{route('admin.news.bulk')}}" method="post" class="bulk-action">
            @csrf
            <table class="table table-striped table-bordered ">
                <thead class="thead-dark">
                <tr>
                    <th>
                        <input type="checkbox" class="chkall"/>
                    </th>
                    <th>
                        {{__("Image")}}
                    </th>
                    <th>
                        {{__("Title")}}
                    </th>
                    <th>
                        {{__("Status")}}
                    </th>
                    <th>
                        {{__("Action")}}
                        <a href="{{route('admin.news.create')}}" class="btn btn-success float-right"><i
                                class="fa fa-plus"></i></a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($news as $n)
                    <tr>
                        <td>
                            <input type="checkbox" name="id[]" value="{{$n->id}}" class="m-2 chkbox"/>
                            {{$n->id}}
                        </td>
                        <td>
                            @if($n->getMedia()->count() > 0)
                                <img src="{{$n->imgurl()}}" class="feature-image" alt="">
                            @endif
                        </td>
                        <td>
                            {{$n->title}}
                        </td>
                        <td>
                            <div class="status news-status-{{$n->status}}"></div>
                        </td>
                        <td>
                            <a href="{{route('admin.news.edit',$n->slug)}}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> &nbsp;
                                {{__("Edit")}}
                            </a>
                            <a href="{{route('admin.news.delete',$n->slug)}}"
                               class="btn btn-danger  delete-confirm">
                                <i class="fa fa-times"></i> &nbsp;
                                {{__("Delete")}}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('starter-kit::component.bulk',['actions' =>['draft' => __("Draft now"),'publish' => __("Publish now")]])
        </form>
        <div class="text-center pt-3">
            {{$news->links()}}
        </div>
    </div>
@endsection