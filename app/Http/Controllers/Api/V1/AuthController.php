<?php

namespace App\Http\Controllers\Api\V1;
use JWTAuth;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IUser;
use App\Http\Resources\Api\UserResource;
use App\Repositories\Interfaces\IWorker;
use App\Http\Resources\Api\WorkerResource;
use App\Http\Requests\Api\User\SignInRequest;
use App\Http\Requests\Api\updateEmailRequest ;
use App\Http\Requests\Api\User\ActivateRequest;
use App\Repositories\Interfaces\IStationWorker;
use App\Http\Requests\Api\User\StoreUpdateRequest;
use App\Http\Requests\Api\User\UserUpgradeRequest;
use App\Http\Requests\Api\User\ResetPasswordRequest;
use App\Http\Requests\Api\User\UpdateProviderReuest;
use App\Http\Requests\Api\User\ForgetPasswordRequest;
use App\Http\Requests\Api\Workers\WorkerSignInRequest;
use App\Http\Requests\Api\Workers\checkChangePasswordCodeRequest;

class AuthController extends Controller
{
    use     Responses;

    private $userRepository;
    private $worker;

    public function __construct(IStationWorker $worker)
    {
        $this->worker         = $worker;
    }
    

    // worker login function
    public function signIn(WorkerSignInRequest $request){
        $token = auth('worker')->attempt(['phone' => $request['phone'], 'password' => $request['password'], 'type' => $request['type']]);
        if(!$token){
            $wrongType = auth('worker')->attempt(['phone' => $request['phone'], 'password' => $request['password']]);
            if($wrongType){
                auth('worker')->logout() ; 
                $this->response('fail', trans('auth.incorrect_auth_type'));
            }
            $this->response('fail', trans('auth.incorrect_pass_or_phone'));
        }
        if (auth('worker')->user()->ban)
            $this->response('blocked', trans('auth.blocked'));
           

        $this->worker->updateDeviceId(auth('worker')->user() , $token , $request);
        auth('worker')->user()->update(['token' => $token]);
        $this->response('sucsess',__('apis.signed') , new WorkerResource(auth('worker')->user()));
    }

    //  forget password 
    public function forgetPassword(ForgetPasswordRequest $request){
        $data  = $this->worker->forgetPassword($request->phone);
    }

    //  forget password 
    public function checkChangePasswordCode(checkChangePasswordCodeRequest $request){
        $data  = $this->worker->checkChangePasswordCode($request->code);
    }
    // resend code 
    public function resendcode()
    {
        $this->worker->updateCode(auth('worker')->user());
        $this->response('success' ,__('auth.code_re_send'));

    }

    // reset password function
    public function resetPassword(ResetPasswordRequest $request , $id){
        $update = auth('worker')->user()->updates()->findOrFail($id);
        if ($update->confirmed == 0) 
            $this->response('fail' , __('auth.not_authorized'));
            
        $update->delete() ; 
        auth('worker')->user()->update(['password' => $request->password]);
        $this->response('success' , __('apis.passwordReset') , new WorkerResource(auth('worker')->user()) );
    }

    // logout
    public function Logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            $this->userRepository->deleteToken(auth()->id() , $request->device_id);
            JWTAuth::invalidate($token);
            return $this->sendResponse(null,trans('apis.loggedOut'));
        } catch (JWTException $e) {
            return $this->sendError(null,__('apis.something_wrong'));
        }
    }

    
    public function updateEmailRequest(updateEmailRequest $request)
    {
        $code =   $this->userRepository->updateEmailRequest($request->validated());
        return $this->sendResponse(['code' => $code],trans('apis.send_activated'));
    }

    public function updateEmail()
    {
        $this->userRepository->updateEmail();
        return $this->sendResponse(new UserResource(auth()->user()),trans('apis.email_changed'));
    }
}
