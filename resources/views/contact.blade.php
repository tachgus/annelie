@extends('layout')

@section('left-content-1')
Bent u nieuwsgierig geworden naar mij? 
Wilt u meer informatie over boekingen of wilt u gewoon een vraag stellen? 
Dan kunt u onderstaand contactformulier invullen. 
@stop

{{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

@section('left-content-2')
<form name="frmContact" id="frmContact" method="POST" action="/mailme/{{$token}}">
    <div class="flash-message">
        
        {{-- Flash message when email is sent successfully --}}
        @if(Session::has('status'))
        <div class='contact-bedankt'>
            {!! session('status') !!}
        </div>
        @endif
        
    </div> <!-- end .flash-message -->
  
                    <div>
                        <label for="txtName">Naam:</label><span>*</span>
                        
                        @if ($errors->has('txtName')) 
                        <span class="input-error">
                            {!! $errors->first('txtName') !!}
                        </span>
                        @endif
                        
                        <div>
                            <input type="text" name="txtName" id="txtName" placeholder="Uw naam.." value="{{$sesName}}">
                        </div>
                    </div>
                    
                    <div>
                        <label for="txtEmail">E-mailadres:</label><span>*</span>
                        
                        @if ($errors->has('txtEmail')) 
                        <span class="input-error">
                            {!! $errors->first('txtEmail') !!}
                        </span>
                        @endif
                        
                        <div>
                            <input type="text" name="txtEmail" id="txtEmail" placeholder="Uw e-mailadres" value="{{$sesEmail}}">
                            
                            <span>
                                <input type="checkbox" style="width: 25px; height: 25px;" name="chkCopy" id="chkCopy" value="ikwilookontvangen" >
                                <span style="font-size: 12px; vertical-align: super;">Ja, ik wil een kopie ontvangen.</span>
                            </span>
                            
                        </div>
                    </div>
                    
                    <div>
                        <label for="txtSubject">Onderwerp:</label><span>*</span>
                        
                        @if ($errors->has('txtSubject')) 
                        <span class="input-error">
                            {!! $errors->first('txtSubject') !!}
                        </span>
                        @endif
                        
                        <div>
                            <input type="text" name="txtSubject" id="txtSubject" placeholder="Onderwerp" value="{{$sesSubject}}">
                        </div>
                    </div>
                    
                    <div>
                        <label for="txtMessage">Bericht:</label><span>*</span>
                        
                        @if ($errors->has('txtMessage')) 
                        <span class="input-error">
                            {!! $errors->first('txtMessage') !!}
                        </span>
                        @endif
                        
                        <div>
                            <textarea name="txtMessage" id="txtMessage" style="width: 400px; height: 150px;" placeholder="Uw bericht">{{$sesMessage}}</textarea>
                        </div>
                    </div>
                    
                    <div>
                        <label for="g-recaptcha">Captcha:</label><span>*</span>
                        
                        @if ($errors->has('g-recaptcha-response')) 
                        <span class="input-error">
                            {!! $errors->first('g-recaptcha-response') !!}
                        </span>
                        @endif
                        
                        <div class="g-recaptcha" data-sitekey="6LeEihcTAAAAAMKhwgafaLReySMiqdmQA2xLoy_0"></div>
                    </div>
                    
                    <div>
                        <label for="btnSubmit">&nbsp;</label>
                        <div>
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Versturen">
                        </div>
                    </div>
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                </form>
@stop