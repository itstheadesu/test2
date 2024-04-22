// GET DEPARTMENT LIST FOR DROPDOWN
$(document).ready(function() {
    $.ajax({
        url: 'get_department.php',
        dataType: 'json',
        success: function(data) {
            var dropdown = $('#departmentDropdown');
            $.each(data, function(key, value) {
                dropdown.append($('<option></option>').attr('value', value).text(value));
            });
        },
        error: function(xhr, status, error) {
            console.error('Failed to fetch departments:', error);
        }
    });
});


// CAPTCHA
// GENERATE CAPTCHA
function generateCaptcha() {
    var captcha = Math.floor(10000 + Math.random() * 90000);
    document.getElementById('captcha').value = captcha;
    document.getElementById('captchaDisplay').innerHTML = captcha;
    document.getElementById('captchaDisplay').style.fontSize = "30px"; // Set the font size here
}

function validateCaptcha() {
    var userInput = document.getElementById('userCaptcha').value;
    var captcha = document.getElementById('captcha').value;
    if (userInput == captcha) {
        return true;
    } else {
        alert("CAPTCHA does not match. Please try again.");
        return false;
    }
}

window.onload = generateCaptcha;

// Prevents copy paste on captcha display
document.getElementById('captchaDisplay').addEventListener('keydown', function(e) {
    e.preventDefault();
});

// DATE
// Set date to today on load
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('date').value = today;
});

// CC QUESTIONS
// Auto selects N/A on CC2 & CC3 when CC1 answer is option 4
document.addEventListener('DOMContentLoaded', function() {
    // Selecting all the relevant elements
    const cc1Options = document.querySelectorAll('input[name="cc1"]');
    const cc2Options = document.querySelectorAll('input[name="cc2"]');
    const cc3Options = document.querySelectorAll('input[name="cc3"]');
    const cc2Option5 = document.getElementById('cc2Option5');
    const cc3Option4 = document.getElementById('cc3Option4');

    // Event listener for cc1 options
    cc1Options.forEach(function(option) {
        option.addEventListener('change', function() {
            // If cc1Option1, cc1Option2, or cc1Option3 is selected
            if (this.value === 'option1' || this.value === 'option2' || this.value === 'option3') {
                // Enable all cc2 and cc3 options
                cc2Options.forEach(function(opt) {
                    opt.disabled = false;
                });
                cc3Options.forEach(function(opt) {
                    opt.disabled = false;
                });
                // Disable cc2Option5 and cc3Option4
                cc2Option5.disabled = true;
                cc2Option5.checked = false;
                cc3Option4.disabled = true;
                cc3Option4.checked = false;
            } else {
                // If cc1Option4 is selected, disable all cc2 and cc3 options except cc2Option5 and cc3Option4
                cc2Options.forEach(function(opt) {
                    opt.disabled = true;
                    opt.checked = false;
                });
                cc3Options.forEach(function(opt) {
                    opt.disabled = true;
                    opt.checked = false;
                });
                cc2Option5.disabled = false;
                cc3Option4.disabled = false;
            }
        });
    });

    // Event listener for cc1Option4
    document.getElementById('cc1Option4').addEventListener('change', function() {
        if (this.checked) {
            cc2Options.forEach(function(opt) {
                opt.disabled = true;
                opt.checked = false;
            });
            cc3Options.forEach(function(opt) {
                opt.disabled = true;
                opt.checked = false;
            });
            cc2Option5.disabled = false;
            cc2Option5.checked = true;
            cc3Option4.disabled = false;
            cc3Option4.checked = true;
        }
    });
});


/* // ALERT TIMEOUT
document.addEventListener('DOMContentLoaded', function() {
    var alertMessage = document.getElementById('alertMessage');
    if (alertMessage) {
        setTimeout(function() {
            alertMessage.parentNode.removeChild(alertMessage);
        }, 3000); // 3000 milliseconds = 3 seconds
    }
}); */