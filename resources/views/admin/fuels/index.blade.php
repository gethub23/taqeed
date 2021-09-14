@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("وقود")}}' deletebutton="false" addbutton="false" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('السعر')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->price}}</td>
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