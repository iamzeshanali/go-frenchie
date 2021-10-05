<div id="contact-form" class="wrapper gf-contactform d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="col-lg-6">
            <img src="/images/homepage/gf-home-contact-image.png" width="450" loading="lazy" alt="">
        </div>
        <div class="col-lg-6">
            <div class="gf-contactform-area">
                <h4>Contact Us With Any Questions </h4>
                <form onsubmit="javascript:{
                    if(!$('#output').hasClass('correctCaptcha')){
                        alert('Invalid Captcha'); return false;
                    }

                }" action="{{route('contactUsMail')}}" method="POST">
                    @csrf
                    <div class="">
                        @if(\Illuminate\Support\Facades\Session::get('status'))
                        <div class="alert alert-success"> <span>Thankyou for contacting us</span> </div>
                        @endif
                        @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            {{ \Session::get('error') }}
                        </div>
                        @endif
                    </div>
                    {{--                    <div class="form-group row mb-0">--}}
                    {{--                        <div class="col">--}}
                        {{--                            <input id="email" type="email" class="gf-form-field" name="email" required autocomplete="email" placeholder="{{ __('Email') }}">--}}
                        {{--                        </div>--}}
                    {{--                    </div>--}}
                    <input class="gf-form-field" type="text" name="name" placeholder="Name" required>
                    <input class="gf-form-field" type="email" name="email" placeholder="Email" required>
                    <textarea name="message" cols="30" rows="5" placeholder="Message" required></textarea>
                    <label for="captchaWrap">To continue, please type the characters below:</label>
                    <div id="captchaWrap" class="captchaWrap d-flex align-items-center text-align-center">
                        <canvas id="captcha"></canvas>
                        <button type="button" id="refreshButton" class="captcha-refresh-btn"><i class="fas fa-redo"></i></button>
                        <span id="output" class="ml-2"></span>
                    </div>
                    <div class="mb-2">
                        <input id="textBox" class="captcha-textBox gf-form-field mr-2" type="text" name="text" placeholder="Captcha Text" required>
                    </div>
                    <button type="submit" id="btn-submit-contact-us" class="gf-btn-dark">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
