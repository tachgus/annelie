<?php

namespace App\Http\Controllers;

use Mail;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller {
    
    private $strName = NULL;
    private $strEmail = NULL;
    private $strSubject = NULL;
    private $strMessage = NULL;
    
    private $fromMail = 't.denouden@quicknet.nl';
    private $fromName = 'Annelie Smits';
    
    private $subject = 'Contactformulier van anneliesmits.nl';

//------------------------------------------------------------------------------
    public function sendEmailContact(Request $request, $token) {
        
        $this->strEmail   = $request->input('txtEmail');
        $this->strName    = $request->input('txtName');
        $this->strSubject = $request->input('txtSubject');
        $this->strMessage = $request->input('txtMessage');
        
        // set values to session
        $request->session()->put('sesName', $this->strName);
        $request->session()->put('sesEmail', $this->strEmail);
        $request->session()->put('sesSubject', $this->strSubject);
        $request->session()->put('sesMessage', $this->strMessage);
        
        // Set validation messages
        $messages = [
            'txtName.required' => "U dient uw naam op te geven.",
            'txtEmail.required' => "U dient een e-mailadres op te geven.",
            'txtEmail.email' => "U heeft een ongeldig e-mailadres ingevoerd.",
            'txtSubject.required' => "U dient een onderwerp op te geven.", 
            'txtMessage.required' => "U dient een bericht tekst in te voeren.",
            'g-recaptcha-response.required' => 'U dient aan te geven of u geen robot bent.',
            'g-recaptcha-response.captcha' => 'Captcha is onjuist.',
        ];
        
//        $this->validate($request, [
//            'txtName' => 'required',
//            'txtEmail' => 'required|email',
//            'txtSubject' => 'required',
//            'txtMessage' => 'required',
////            'g-recaptcha-response' => 'required|captcha',   // Please note: For live website this needs to be on!
//        ],
//        $messages);
        $validator = Validator::make($request->all(), [
            'txtName' => 'required',
            'txtEmail' => 'required|email',
            'txtSubject' => 'required',
            'txtMessage' => 'required',
//            'g-recaptcha-response' => 'required|captcha',   // Please note: For live website this needs to be on!
        ],
        $messages);

        
        if ($validator->fails()) {
//            var_dump( $validator );
//            die("En nu ik!");
            $url = route('homepage') . '#contact';
//            return Redirect::to($url);
            return redirect($url)
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
//            die("Alles is ok...");
        }
        
        $blnCopy = FALSE;
        $blnCopy = $this->checkUserCopy( $request );
        
//        $blnMail[] = $this->checkCaptcha( $request );
        
//        die( "Hey there! Lets send some mail!" );
        
        $data = ['strFormNaam' => $this->strName
            , 'strFormEmail' => $this->strEmail
            , 'strFormSubject' => $this->strSubject
            , 'strFormBericht' => $this->strMessage
        ];
        
        if( $blnCopy === TRUE ) {
            
            // This mail should be send to the posted e-mail address
            Mail::send('emails.contact_klant', $data, function ($m) {
                $m->from($this->fromMail, $this->fromName );

                $m->to($this->strEmail, $this->strName)->subject( $this->subject );
            });
        }
        
        // This mail should be send to Annelie
        Mail::send('emails.contact_annelie', $data, function ($m) {
            $m->from($this->fromMail, $this->fromName);

            $m->to($this->fromMail, $this->fromName)->subject( $this->subject );
        });
        
        $request->session()->flash('status', 'Bedankt voor uw interesse!');
        
//        die( "Hey there! Received some mail!" );
        
//        return redirect()->route("contact");
        $url = route('homepage') . '#contact';
        return Redirect::to($url);
//        return redirect()->route("homepage") . '#contact';
//        return response()->view('contact', ['name' => 'contact', 'sesName' => $this->strName, 'sesEmail' => $this->strEmail
//            , 'sesSubject' => $this->strSubject, 'sesMessage' => $this->strMessage, 'token' => $token]);
    }
    
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    private function checkCaptcha( $request ) {
        
        $strCaptcha = $request->input('g-recaptcha-response');
        
        // Dit stukje is voor de Google - ReCaptcha
        if( isset( $strCaptcha ) && ! empty( $strCaptcha ) ) {
        
            $siteKey    = '6LeEihcTAAAAAMKhwgafaLReySMiqdmQA2xLoy_0';
            $secret     = '6LeEihcTAAAAAGG5RbbcI3uKhr-dh7jk4a5hmyGK';
        
// If the form submission includes the "g-captcha-response" field
// Create an instance of the service using your secret
//            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $recaptcha = new ReCaptcha($secret);
        
            // Make the call to verify the response and also pass the user's IP address
            $resp = $recaptcha->verify( $strCaptcha, $_SERVER['REMOTE_ADDR'] );
//var_dump( $resp );
            if ($resp->isSuccess()) {
//                $blnMail = TRUE;
                return TRUE;
            }
            else {
//            $arrCaptchaError = array();
                foreach ($resp->getErrorCodes() as $code) {
                
                    switch( $code ) {
                        case "invalid-input-response":
                            $_SESSION['sesArrMailError']['captcha'] = "U heeft een foute captcha waarde opgegeven.";
                    }
//                echo '<tt>' , $code , '</tt> ';
                }// eof foreach
                
                return FALSE;
            }
            
        }
        else {
            // Deze mag niet ontbreken!!
//            $blnMail = FALSE;
            return FALSE;
//        $_SESSION['sesArrMailError']['captcha'] = "U heeft een foute captcha waarde opgegeven.";
        }
        
    }

//------------------------------------------------------------------------------
    private function checkUserCopy( $request ) {
        
        $blnUserCopy = FALSE;
        $strCopy = $request->input('chkCopy');
        
        if( isset( $strCopy ) && ! empty( $strCopy ) && is_string( $strCopy ) && $strCopy === "ikwilookontvangen" ) {
            $blnUserCopy = TRUE;
        }
        
        return $blnUserCopy;
    }
//------------------------------------------------------------------------------
    
}