<div class="form-group d-flex flex-column align-items-center justify-content-center">
    <label for="captchaDisplay">CAPTCHA:</label>
        <div id="captchaDisplay" class="d-inline-block mr-2">
        </div>
        
        <div class="d-flex align-items-center"> <!-- Wrap the button and input in a flex container -->
            <button type="button" class="btn btn-primary mr-2" onclick="generateCaptcha()">Generate New CAPTCHA
            </button>
                <input type="text" id="userCaptcha" name="userCaptcha" class="form-control" placeholder="Enter CAPTCHA" required>
        </div>
        
        <input type="hidden" id="captcha" name="captcha">

</div>
        
    <div class="form-group d-flex justify-content-center align-items-center">
        <input type="submit" value="Submit" class="btn btn-primary" onclick="return validateCaptcha()">
    </div>