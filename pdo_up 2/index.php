<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Client Satisfaction Measurement</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- Display Bootstrap alert message based on form submission status -->
<?php if (isset($_SESSION['form_status'])): ?>
        <div class="container mt-3">
            <div id="alertMessage" class="alert alert-<?php echo $_SESSION['form_status'] == 'success' ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $_SESSION['form_message']; ?>
            </div>
        </div>
        <?php unset($_SESSION['form_status']); unset($_SESSION['form_message']); ?>
    <?php endif; ?>

    <!-- Main Header -->
    <div class="container mt-3">
            <?php include 'header.php'; ?>
    </div>

        <!-- Start of Form -->    
        <form action="process_form.php" method="post">

            <!-- Section 1: Department -->
            <div class="container mt-3">
                <div class="form-group">
                    <label for="department">Department/Office Transacted:</label>
                    <select class="form-control" name="department" required id="departmentDropdown">
                        <option value="">Select Department</option>
                    </select>
                </div>
            </div>

            <!-- Section 2: Client Details -->
            <div class="container mt-3">
                <?php include 'client.php'; ?>
            </div>

            <!-- Section 3: CC Questions -->
            <div class="container mt-3">
                <?php include 'cc.php'; ?>
</div>



            <!-- Section 4: SQD -->
            <div class="container mt-3">
                <?php include 'sqd.php'; ?>
            </div>

            <!-- Section 5: Comment & Contact -->
            <div class="container mt-3">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" name="comment" id="commentField" maxlength="255"></textarea>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <textarea class="form-control" name="contact" id="contactField" maxlength="255"></textarea>
                </div>
            </div>
            
            <!-- Section 6: Captcha & Submit -->
            <div class="container mt-3">
                <?php include 'captcha.php'; ?>
            </div>

        </form>



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
            setTimeout(function() {
                alertMessage.parentNode.removeChild(alertMessage);
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script/script.js"></script>
    
</body>
</html>
