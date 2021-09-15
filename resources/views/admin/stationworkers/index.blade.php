@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("عامل_بنزينة")}}' deletebutton="false" addbutton="false" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('الهاتف')}}</th>
                    <th>{{awtTrans('رقم الهوية')}}</th>
                    <th>{{awtTrans('وقت العمل')}}</th>
                    <th>{{awtTrans('المدينة')}}</th>
                    <th>{{awtTrans('الجنسية')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr >
                            <td><img src="{{$row->avatar}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->identity}}</td>
                            <td>{{$row->work_time}}</td>
                            <td>{{$row->city->name}}</td>
                            <td>{{$row->nationality->name}}</td>
                        </tr >
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >