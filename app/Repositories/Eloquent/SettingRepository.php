<?php

namespace App\Repositories\Eloquent;

use App\Jobs\EmailOne;
use App\Models\SiteSetting;
use App\Repositories\Interfaces\ISetting;
use App\Services\SettingService;
use App;
use Image;
class SettingRepository extends AbstractModelRepository implements ISetting
{

    public function __construct(SiteSetting $model)
    {
        parent::__construct($model);
    }

    public function updateSetting($data=[])
    {
        foreach ( $data as $key => $val )
            if ($key == 'logo') {
                $img           = Image::make($val);
                $name          = $key .'.png';
                $thumbsPath    = 'public/storage/images/settings';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($key == 'default_user'){
                $img           = Image::make($val);
                $name          = 'default.png';
                $thumbsPath    = 'public/storage/images/users';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($val){
                $this->model->where( 'key', $key ) -> update( [ 'value' => $val ] );
            }
    }

     public  function getAppInformation()
     {
         return SettingService::appInformations($this->model::pluck('value', 'key'));
     }


     public function reports(){
        return [
        ];
     }


     public function contactInfo(){
        $data           = $this->getAppInformation();
        return [
            'phone'                   => $data['phone'],
            'email'                   => $data['email'],
            'whatsapp'                => $data['whatsapp'],
            'twitter'                 => $data['twitter'],
            'instagram'               => $data['instagram'],
            'facebook'                => $data['facebook'],
            'youtube'                 => $data['youtube'],
            'commission_percentage'   => $data['commission_percentage'],
        ];
     }

     public function getPage($page){
        $data           =  $this->getAppInformation();
        return  $data[$page] ;
     }

    public function sendEmail($data=[])
    {
        dispatch(new EmailOne($data['email'], $data['message']));
    }
}
