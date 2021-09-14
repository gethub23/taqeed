@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("خزان")}}' deletebutton="false" addbutton="false" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('اسم الخزان')}}</th>
                    <th>{{awtTrans('نوع الوقود')}}</th>
                    <th>{{awtTrans('السعة الاساسية')}}</th>
                    <th>{{awtTrans('حالة الخزان')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->fuel->name}}</td>
                            <td>{{$row->capacity}}</td>
                            <td>
                                @if($row->status == 'empty')
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('فارغ')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @elseif($row->status == 'broken')
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('معطل')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @else
                                     <span class="btn btn-sm round btn-outline-success"> 
                                        {{awtTrans('نشط')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @endif
                            </td>
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