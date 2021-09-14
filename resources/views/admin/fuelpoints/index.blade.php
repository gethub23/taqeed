@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("نقطة")}}' deletebutton="false" addbutton="false" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('اسم النقطة')}}</th>
                    <th>{{awtTrans('نوع البنزين')}}</th>
                    <th>{{awtTrans('الرقم التسلسي')}}</th>
                    <th>{{awtTrans('قراءه البنزين')}}</th>
                    <th>{{awtTrans('حالة النقطة')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->fuel->name}}</td>
                            <td>{{$row->identity}}</td>
                            <td>{{$row->fuel_reading}}</td>
                            <td>
                                @if($row->status == 'off')
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('معطل')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @elseif($row->status == 'used')
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('مستخدم')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @else
                                     <span class="btn btn-sm round btn-outline-success"> 
                                        {{awtTrans('متاح')}}  <i class="la la-check font-medium-2"></i>
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