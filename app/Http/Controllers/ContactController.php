<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\SiteUi;
use App\Models\Detail;
use Illuminate\Http\Resources\Json;
use App\Mail\NotifyMail;
use Mail;
use App\Jobs\SendEmailContact;

class ContactController extends Controller
{
    /**
     * Submit Contact me
     * @OA\Post (
     *  path="/api/contact",
     *  tags={"Non Auth"},
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(
     *                  type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="subject",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="recaptcha",
     *                      type="string"
     *                  )
     *              ),
     *              example={
     *                  "name":"Alwis Madhusanka",
     *                  "email":"example@email.com",
     *                  "phone":"+1 234 567 8900",
     *                  "subject":"regarding ",
     *                  "message":"Some Messege",
     *                  "recaptcha":"recaptcha-verification",
     *               }
     *           )
     *      )
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="success",
     *      @OA\JsonContent(
     *          @OA\Property(property="success", type="boolean", example=true)
     *      )
     *  ),
     *  @OA\Response(
     *      response=422,
     *      description="error",
     *      @OA\JsonContent(
     *          @OA\Property(property="message", type="string", example="Recaptcha Validation"),
     *          @OA\Property(
     *              property="errors",
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="recaptcha", type="string", example="validation.recaptcha")
     *              )
     *          )
     *      )
     *  )
     * )
     *
     */
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:rfc,strict,dns,filter,spoof',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
            'recaptcha' => 'required|recaptcha',
            'ipdata' => 'json'
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->ipdata = $request->ipdata;
        $contact->save();

        $ui = SiteUi::where('id', 1)->first();
        $dt = Detail::where('id', 1)->first();
        $data = [];
        $data['logo'] = "https://cdn.alwism.com/sv3/" . $ui->logo;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['mymail'] = $dt->email;
        $data['mywhatsapp'] = $dt->whatsapp;
        $data['bcc'] = env('BCC_MAIL');

        dispatch(new SendEmailContact($data));

        return response()->json([
            'success' => true
        ], 200);
    }
}
