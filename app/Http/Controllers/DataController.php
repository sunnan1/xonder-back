<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
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
            $application = Applications::whereEmail($request->get('email'))->first();
            if ($application) {
                if ($application->completed == 1) {
                    return 'Application is already submitted for this email';
                }
            }
            else {
                $application = new Applications();
            }
            $application->accountType = $request->get('accountType') ?? '';
            $application->firstName = $request->get('firstName') ?? '';
            $application->lastName = $request->get('lastName') ?? '';
            $application->email = $request->get('email') ?? '';
            $application->businessName = $request->get('businessName') ?? '';
            $application->tradingName = $request->get('tradingName') ?? '';
            $application->tradingAddress = $request->get('tradingAddress') ?? '';
            $application->businessDescription = $request->get('businessDescription') ?? '';
            $application->webAddress = $request->get('webAddress') ?? '';
            $application->expectedTurnOver = $request->get('expectedTurnOver') ?? 0;
            $application->singlePaymentIncome = $request->get('singlePaymentIncome') ?? 0;
            $application->singlePaymentOutgoing = $request->get('singlePaymentOutgoing') ?? 0;
            $application->largePaymentReceiveAccount = $request->get('largePaymentReceiveAccount') ?? 0;
            $application->largePaymentTransferAccount = $request->get('largePaymentTransferAccount') ?? 0;
            $application->averageAmountWeek = $request->get('averageAmountWeek') ?? 0;
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

    //
}
