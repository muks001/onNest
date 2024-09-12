@extends('layouts.app')
@section('title', 'User')
@section('content')
@include('admin.message')
<div class="page-heading">
    <div class="pull-left">
        <h4>Users</h4>
    </div>
    {{-- <a class="primary-btn-sm ms-3" href="{{route('admin.user.export',request()->all())}}" >Export</a> --}}
</div>
<div class="content-inner">
    <div class="table-header">
        <div class="table-filter">
            <form action="" method="" class="d-flex flex-wrap align-items-center">
                {!! Form::select('status', ["1"=>"Active","0"=>"InActive"], request('status'), ["class"=>"table-filter-control me-3",
                "id"=>"active-filter",
                "placeholder"=>"Any"]) !!}
                {!! Form::text('search', request('search'),["class"=>"table-filter-control me-3","placeholder"=>"Type here to search..."]) !!}
                <button class="search-btn" type="submit" aria-label="Search">
                    <img src="{{asset('images/search-icon.svg')}}" alt="Search" />
                </button>
            </form>
        </div>
    </div>
    <table class="table table-bordered custom-table" id="dataTable">
        <thead>
            <tr>
                <th width="70">Sr. No.</th>
                <th width="70">Image</th>
                <th width="100">User</th>
                <th width="100">Email</th>
                <th width="100">Mobile</th>
                <th width="120">Inactive/Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users  as $key => $user )
            <tr>
                <td>{{$users->firstItem() + $key}}</td>
                <td class="user-image"> 
                    <img src="{{asset($user->image)??'http://127.0.0.1:8000/storage/images/no-found.jpg'}}" width="50" alt="{{$user->name}}">
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mobile_no}}</td>
                <td>{{$user->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end custom-pagination">
        {!! $users->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection


@section('script')

<script>

   
</script>

@endsection
