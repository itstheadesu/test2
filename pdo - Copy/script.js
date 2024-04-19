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
document.getElementById('cc1Option4').addEventListener('change', function() {
    if (this.checked) {
        // Disable all cc2 options except N/A
        document.getElementById('cc2Option1').disabled = true;
        document.getElementById('cc2Option2').disabled = true;
        document.getElementById('cc2Option3').disabled = true;
        document.getElementById('cc2Option4').disabled = true;
        document.getElementById('cc2Option5').checked = true; // Ensure N/A is selected

        // Disable all cc3 options except N/A
        document.getElementById('cc3Option1').disabled = true;
        document.getElementById('cc3Option2').disabled = true;
        document.getElementById('cc3Option3').disabled = true;
        document.getElementById('cc3Option4').checked = true; // Ensure N/A is selected
    } else {
        // Enable all cc2 options if cc1Option4 is not selected
        document.getElementById('cc2Option1').disabled = false;
        document.getElementById('cc2Option2').disabled = false;
        document.getElementById('cc2Option3').disabled = false;
        document.getElementById('cc2Option4').disabled = false;
        document.getElementById('cc2Option5').checked = false;

        // Enable all cc3 options if cc1Option4 is not selected
        document.getElementById('cc3Option1').disabled = false;
        document.getElementById('cc3Option2').disabled = false;
        document.getElementById('cc3Option3').disabled = false;
        document.getElementById('cc3Option4').checked = false;
    }
});

