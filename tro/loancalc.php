<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<style>
    /* @import "https://fonts.googleapis.com/css?family=Poppins"; */

    /* * {
        box-sizing: border-box;
        font-family: Poppins, sans-serif;
    } */

    

    .content {
        padding: 5px;
    }

    .form-content {
        padding: 10px;
    }

    .loan-form {
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    button {
        margin: 10px 0 10px 0;
        background-color: #3944BC;
        color: white;
        border: 0;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        padding: 10px 25px;
        font-size: 14px;
        width: 100%;
    }

    input {
        padding: 10px;
        width: 100%;
        outline: none;
        border: 1px solid #edeef6;
        border-radius: 10px;
    }

    input:focus {
        outline: none;
        background: rgba(0, 120, 250, 0.1);
        transition: transform 0.2s ease;
    }

    h2 {
        margin-bottom: 0;
        text-align: center;
    }

    .results {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .card-1 {
        color: white;
        background-color: #47a386;
        padding: 20px;
        margin: 10px;
        width: 300px;
        height: 200px;
        border-radius: 5px;
    }

    .card-2 {
        color: white;
        background-color: #7273c5;
        padding: 20px;
        margin: 10px;
        width: 300px;
        height: 200px;
        border-radius: 5px;
    }

    .card-3 {
        color: white;
        background-color: #5445db;
        padding: 20px;
        margin: 10px;
        width: 300px;
        height: 200px;
        border-radius: 5px;
    }

    #monthlyPayment,
    #totalInterest,
    #totalPayment {
        font-size: 2em;
    }

    .indicators {
        font-size: 1.3em;
    }

    footer {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        margin: 10px;
    }

    footer>span {
        opacity: 0.5;
    }

    footer>span>a {
        text-decoration: none;
    }

    @media (max-width: 480px) {

        .results {
            justify-content: center;
        }

        .card-1,
        .card-2,
        .card-3 {
            margin-left: 0;
            margin-right: 0;
        }
    }
</style>

<div class="container">
    <div class="form-content">
        <h2>CFA Loan Calculator</h2>
        <form id="loan-form" class="loan-form mb-4" style="color:black !important;">
            <div class="form-group">
                <label>Loan Amount</label>
                <input type="number" id="amount" placeholder="Ush">
            </div>
            <div class="form-group">
                <label>Interest</label>
                <input type="number" id="interest" placeholder="%">
            </div>
            <div class="form-group">
                <label>Number of Years</label>
                <input type="number" id="years">
            </div>

            <button type="submit">Calculate</button>
        </form>
    </div>

    <h2>Calculated Results</h2>
    <div class="results">
        <div class="card-1">
            <p id="monthlyPayment">Ush</p>
            <p class="indicators">Monthly Payments</p>
        </div>

        <div class="card-2">
            <p id="totalInterest">%</p>
            <p class="indicators">Total Interest</p>

        </div>

        <div class="card-3">
            <p id="totalPayment">Ush</p>
            <p class="indicators">Total Amount to be Paid</p>
        </div>
    </div>

    <!-- <footer>
                <span class="footer_desc">Done with &#10084; by <a class="git_link" href="https://github.com/waynegakuo"
                        target="_blank" rel="noopener">Wayne Gakuo</a></span>
            </footer> -->
</div>

<script type="text/javascript">
    const loanForm = document.querySelector('#loan-form');
    loanForm.addEventListener('submit', (e) => {
        e.preventDefault();

        //Computing the results
        const amount = document.getElementById('amount').value;
        const interest = document.getElementById('interest').value;
        const years = document.getElementById('years').value;

        //Calculate
        const principal = parseFloat(amount);
        const calculatedInterest = parseFloat(interest) / 100 / 12;
        const calculatedPayments = parseFloat(years) * 12;

        //Calculating the monthly payment
        const x = Math.pow(1 + calculatedInterest, calculatedPayments);
        const monthly = (principal * x * calculatedInterest) / (x - 1);
        const monthlyPayment = monthly.toFixed(2);

        //calculating the total interest
        const totalInterest = (monthly * calculatedPayments - principal).toFixed(2);

        //calculating the total payment
        const totalPayment = (monthly * calculatedPayments).toFixed(2);

        //Display elements using DOM manipulation
        document.getElementById("monthlyPayment").innerHTML = "Ush " + monthlyPayment;

        document.getElementById("totalInterest").innerHTML = "% " + totalInterest;

        document.getElementById("totalPayment").innerHTML = "Ush " + totalPayment;
    })
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>