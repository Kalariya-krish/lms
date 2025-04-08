<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/additional-methods.min.js"></script>
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            color: #4a4a4a;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            max-width: 900px;
            margin: auto;
        }
        .container {
            display: flex;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 100%;
        }
        .column {
            flex: 1;
            padding: 20px;
        }
        .contact-info {
            background: #7d01a3;
            color: white;
            padding: 20px;
            border-radius: 50px;
        }
        h2, h3 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn {
            background: #7d01a3;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        .btn:hover {
            background: #e18afc;
        }
    </style>
</head>
<body>
<?php include 'component/header.php'; ?>
    <div class="main-container">
        <div class="container">
            <div class="column">
                <h2>Contact Us</h2>
                <form id="contactForm">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                    <span id="nameError" style="color: red; display: none;">Name is required.</span>
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <span id="emailError" style="color: red; display: none;">Valid email is required.</span>
                    
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    <span id="messageError" style="color: red; display: none;">Message cannot be empty.</span>
                    
                    <button type="submit" class="btn">Send Message</button>
                </form>
                <p id="responseMessage" style="text-align:center; color: green;"></p>
            </div>
            
            <div class="column contact-info" style="text-align:center">
                <br>
                <h2>Contact Information</h2><br><br>
                <h4><strong>Location</strong></h4>
                <p>123 Main Street, City, Country</p>
                <h4><strong>Phone</strong></h4>
                <p>+123 456 7890</p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(){
            $('#contactForm').validate({
                rules: {
                    name: {
                        minlength : 3,
                        required : true
                    },
                    email:{
                        email:true
                    },
                    message:{
                        required:true,
                        minlength:10
                    }
                },
                messages:{
                    name:{
                        minlength:"input atleast 3 character",
                        required:"Name is required",
                    },
                    email:{
                        email:"Valid email is required"
                    },
                    message:{
                        required:"Message cannot be empty",
                        minlength:"Message should be atleast 10 character"
                    }
                }
            })
        }
    </script>
    <?php include 'component/footer.php'; ?>
    
</body>
</html>
