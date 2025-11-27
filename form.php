<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PACKAGE-FORM | AFEEYA WELLNESS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #FFF8F9;
        margin: 0; padding: 0;
    }
    
    header {
        background-color: #F8BBD0;
        padding: 20px;
        text-align: center;
        font-size: 22px;
        font-weight: 700;
        color: #512DA8;
    }
    
    .container {
        width: 480px;
        background: #fff;
        margin: 40px auto;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #444;
    }
    
    input {
        width: 100%;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #bbb;
        margin-bottom: 16px;
        font-size: 16px;
    }
    
    .btn {
        width: 100%;
        background: linear-gradient(135deg, #A7C7E7, #F88BD0);
        padding: 12px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        color: #512DA8;
        transition: 0.3s;
    }
    
    .btn:hover {
        transform: scale(1.05);
        color: white;
    }
</style>

</head>

<body>

<header>Details Form</header>

<div class="container">

    <form action="success-form.html" method="POST">
        
        <label>Your Full Name</label>
        <input type="text" name="fullname" placeholder="Enter your full name" required>

        <label>Your Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Your Phone Number</label>
        <input type="text" name="phone" placeholder="Enter your phone number" required>

        <label>Selected Package</label>
        <input type="text" id="package" name="package" readonly required>

        <button type="submit" class="btn">Submit</button>

    </form>

</div>

<script>
    const params = new URLSearchParams(window.location.search);
    document.getElementById('package').value = params.get('package');
</script>

</body>
</html>
