<script>
    const loanForm = document.querySelector('#loan-form');
    loanForm.addEventListener('submit', (e) => {
    e.preventDefault();

    //Computing the results
    const amount = document.getElementById('amount').value;
    const interest = document.getElementById('interest').value;
    const years = document.getElementById('plan').value;

    //Calculate
    const principal = parseFloat(amount);
    const calculatedInterest = parseFloat(interest) / 100 / 12;
    const calculatedPayments = parseFloat(plan) * 4;

    //Calculating the weekly payment
    const x = Math.pow(1 + calculatedInterest, calculatedPayments);
    const weekly = (principal * x * calculatedInterest) / (x - 1);
    const weeklyPayment = weekly.toFixed(2);

    //calculating the total interest
    const totalInterest = (weekly * calculatedPayments - principal).toFixed(2);

    //calculating the total payment
    const totalPayment = (weekly * calculatedPayments).toFixed(2);

    //Display elements using DOM manipulation
    document.getElementById("weeklyPayment").innerHTML = "Ush " + weeklyPayment;

    document.getElementById("totalInterest").innerHTML = "% " + totalInterest;

    document.getElementById("totalPayment").innerHTML = "Ush " + totalPayment;
})
</script>

<!-- Bootstrap core JavaScript-->


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
