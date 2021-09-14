@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("مدير")}}' deletebutton="false" addbutton="false" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('اسم المدير')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th>{{awtTrans('نوع الصلاحية')}}</th>
                    <th>{{awtTrans('رقم الهوية')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr>
                            <td><img src="{{$row->avatar}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->stationRole->name}}</td>
                            <td>{{$row->identity}}</td>
                        </tr>
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