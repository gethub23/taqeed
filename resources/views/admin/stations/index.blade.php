@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("محطة")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>
                       <div class="form-checkbox">
                           <input type="checkbox" value="value1" name="name1" id="checkedAll">
                           <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                       </div>
                    </th>
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('اسم المحطة')}}</th>
                    <th>{{awtTrans('عرض مجموعة صلاحيات المحطة')}}</th>
                    <th>{{awtTrans('عرض مجموعة مديرين المحطة')}}</th>
                    <th>{{awtTrans('عرض انواع الوقود')}}</th>
                    <th>{{awtTrans('عرض الخزانات')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td><img src="{{$row->logo}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td><a href="{{url('admin/stationroles/'.$row->id)}}">{{awtTrans('عرض')}}</a></td>
                            <td><a href="{{url('admin/stationadmins/'.$row->id)}}">{{awtTrans('عرض')}}</a></td>
                            <td><a href="{{url('admin/fuels/'.$row->id)}}">{{awtTrans('عرض')}}</a></td>
                            <td><a href="{{url('admin/tanks/'.$row->id)}}">{{awtTrans('عرض')}}</a></td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id       = '{{$row->id}}'
                                            data-route    = '{{route('admin.stations.update' , [$row->id])}}'
                                            data-logo     = '{{$row->logo}}'
                                            data-name     = '{{$row->name}}'
                                            data-phone    = '{{$row->phone}}'
                                            data-active   = '{{$row->active}}'
                                            data-block    = '{{$row->block}}'
                                            data-logo     = '{{$row->logo}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-logo     = '{{$row->logo}}'
                                            data-name     = '{{$row->name}}'
                                            data-phone    = '{{$row->phone}}'
                                            data-active   = '{{$row->active}}'
                                            data-block    = '{{$row->block}}'
                                            data-logo     = '{{$row->logo}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.stations.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.stations.store")}}' singleName='{{awtTrans("محطة")}}' >
        <x-slot name="inputs">
           <div class="col-12">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="logo" class="imageUploader">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم المحطة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

             <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم هاتف المحطة ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('حظر')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id=""  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option  value="1">{{awtTrans('محظور')}}</option>
                            <option  value="0">{{awtTrans('غير محظور')}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("محطة")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="logo" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  id="logo">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم المحطة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

             <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم هاتف المحطة ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('حظر')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="block"  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option  value="1">{{awtTrans('محظور')}}</option>
                            <option  value="0">{{awtTrans('غير محظور')}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("محطة")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  class="avatar">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.stations.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >