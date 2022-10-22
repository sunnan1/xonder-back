<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function saveDetails(Request $request) {

        if ($request->has('email')) {
            if ($request->get('email') == '' || $request->get('email') == null) {
                return "Email can't be empty !";
            }
            $application = Applications::whereEmail($request->get('email'))->first();
            if ($application) {
                if ($application->completed == 1) {
                    return 'Application is already submitted for this email';
                }
            }
            else {
                if ($request->has('accountType')) {
                    $application = new Applications();
                    $application->email = $request->get('email');
                } else {
                    return 'Application not found for this email';
                }
            }
            if ($request->has('accountType')) {
                $application->accountType = $request->get('accountType') ?? '';
            }
            if ($request->has('firstName')) {
                $application->firstName = $request->get('firstName') ?? '';
            }
            if ($request->has('lastName')) {
                $application->lastName = $request->get('lastName') ?? '';
            }
            if ($request->has('businessName')) {
                $application->businessName = $request->get('businessName') ?? '';
            }
            if ($request->has('tradingName')) {
                $application->tradingName = $request->get('tradingName') ?? '';
            }
            if ($request->has('tradingAddress')) {
                $application->tradingAddress = $request->get('tradingAddress') ?? '';
            }
            if ($request->has('businessDescription')) {
                $application->businessDescription = $request->get('businessDescription') ?? '';
            }
            if ($request->has('webAddress')) {
                $application->webAddress = $request->get('webAddress') ?? '';
            }
            if ($request->has('expectedTurnOver')) {
                $application->expectedTurnOver = $request->get('expectedTurnOver') ?? 0;
            }
            if ($request->has('singlePaymentIncome')) {
                $application->singlePaymentIncome = $request->get('singlePaymentIncome') ?? 0;
            }
            if ($request->has('singlePaymentOutgoing')) {
                $application->singlePaymentOutgoing = $request->get('singlePaymentOutgoing') ?? 0;
            }
            if ($request->has('largePaymentReceiveAccount')) {
                $application->largePaymentReceiveAccount = $request->get('largePaymentReceiveAccount') ?? 0;
            }
            if ($request->has('largePaymentTransferAccount')) {
                $application->largePaymentTransferAccount = $request->get('largePaymentTransferAccount') ?? 0;
            }
            if ($request->has('averageAmountWeek')) {
                $application->averageAmountWeek = $request->get('averageAmountWeek') ?? 0;
            }
            
            $application->save();
            return 1;
        } else {
            return 'No Email Found !';
        }

    }

    public function savePhoto(Request $request) {
        if ($request->has('email')) {
            if ($request->has('image')) {
                $fileName = $request->get('email').'photoId'.'.'.$request->image->extension();
                $request->image->move(base_path('public').'/uploads', $fileName);
                Applications::whereEmail($request->get('email'))->update(['photo_id' => $fileName]);
                return 1;
            }
            return 'No Image Found';
        }
        return 'No Email Found';
    }

    public function saveLicense(Request $request) {
        if ($request->has('email')) {
            if ($request->has('image')) {
                $fileName = $request->get('email').'license'.'.'.$request->image->extension();
                $request->image->move(base_path('public').'/uploads', $fileName);
                Applications::whereEmail($request->get('email'))->update(['driving_license' => $fileName]);
                return 1;
            }
            return 'No License Found';
        }
        return 'No Email Found';
    }

    public function savePassport(Request $request) {
        if ($request->has('email')) {
            if ($request->has('image')) {
                $fileName = $request->get('email').'passport'.'.'.$request->image->extension();
                $request->image->move(base_path('public').'/uploads', $fileName);
                Applications::whereEmail($request->get('email'))->update(['passport' => $fileName]);
                return 1;
            }
            return 'No Passport Found';
        }
        return 'No Email Found';
    }

    public function savePermit(Request $request) {
        if ($request->has('email')) {
            if ($request->has('image')) {
                $fileName = $request->get('email').'permit'.'.'.$request->image->extension();
                $request->image->move(base_path('public').'/uploads', $fileName);
                Applications::whereEmail($request->get('email'))->update(['uk_residence_permit' => $fileName]);
                return 1;
            }
            return 'No Permit Found';
        }
        return 'No Email Found';
    }

    public function getDetails(Request $request) {
        $app = Applications::whereEmail($request->get('email'))->first();
        if ($app) {
            return $app;
        }
        return -1;
    }

    public function complete(Request $request) {
        
        if ($request->has('email')) {
            $application = Applications::whereEmail($request->email)->first();
            if ($application) {
                $application = $application->toArray();
                if ($application['completed'] == 1) {
                    return 'Application is already submitted';
                }
                try {
                    Mail::send('mail', $application, function($message) use ($application) {
                        $message->to($application['email'], $application['firstName'])->subject('Xonder Application');
                        $message->from(config('mail.from.address'),config('mail.from.name'));
                        $message->attach(base_path('public').'/uploads/'.$application['photo_id']);
                        $message->attach(base_path('public').'/uploads/'.$application['passport']);
                        $message->attach(base_path('public').'/uploads/'.$application['driving_license']);
                        $message->attach(base_path('public').'/uploads/'.$application['uk_residence_permit']);
                    });
                    Applications::whereEmail($request->email)->update(['completed' => 1]);
                    return 1;
                }catch(Exception $exception) {
                    return 'Something Went Wrong : '. $exception->getMessage();
                }
            } else {
                return 'No Application Found';
            }
        } else {
            return  'No Email Found';
        }
    }

    //
}
