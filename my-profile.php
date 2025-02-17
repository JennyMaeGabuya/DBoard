<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Events | ERMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/mk-icon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/owl.theme.css" />
    <link rel="stylesheet" href="css/owl.transitions.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/meanmenu.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/educate-custon-icon.css" />
    <link rel="stylesheet" href="css/morrisjs/morris.css" />
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css" />
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css" />
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css" />
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .container-fluid {
            margin-top: 30px;
        }

        h1 {
            font-size: 28px;
            color: #333;
        }

        hr {
            margin: 20px 0;
            border-color: #ddd;
        }

        .widget-box {
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .widget-title {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
        }

        .widget-title .icon {
            margin-right: 10px;
        }

        .widget-content {
            padding: 20px;
        }

        .control-group {
            margin-bottom: 20px;
        }

        .control-group label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .control-group .controls {
            display: flex;
            align-items: center;
        }

        .control-group .controls input,
        .control-group .controls select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-actions {
            text-align: center;
            margin-top: 20px;
        }

        .form-actions button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-actions button:hover {
            background-color: #45a049;
        }

        #profile-picture {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .error-message {
            color: red;
            font-size: 12px;
        }

        .span11 {
            width: 100%;
        }
    </style>

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!-- Sidebar and Header include -->
    <?php include 'includes/sidebar.php'; ?>
    <?php include 'includes/header.php'; ?>

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Personal Information</a></li>
                        </ul>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="widget-content nopadding">
                                
                                <div class="form-row">
                                    <!-- Left Column -->
                                    <div class="control-group">
                                        <label class="control-label">Surname :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="surname" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">First Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="firstname" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Middle Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="middlename" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Date of Birth :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="dob" placeholder="mm/dd/yyyy" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Address :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="address" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Place of Birth :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="place_of_birth" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="form-row">
                                    <div class="control-group">
                                        <label class="control-label">Sex :</label>
                                        <div class="controls">
                                            <select name="sex" class="span11" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Civil Status :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="civil_status" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Blood Type :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="blood_type" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">GSIS ID NO. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="gsis_id" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">PAG-IBIG ID NO. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="pagibig_id" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">PHILHEALTH NO. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="philhealth_no" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">SSS NO. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="sss_no" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">TIN NO. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="tin_no" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Telephone No. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="telephone_no" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Mobile No. :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="mobile_no" required />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Email Address :</label>
                                        <div class="controls">
                                            <input type="email" class="span11" name="email_address" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to update?')">Update Details</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer include -->
    <?php include 'includes/footer.php'; ?>
</body>

</html>