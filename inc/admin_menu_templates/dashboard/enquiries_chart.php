
<canvas id="registrationChart" width="400" height="250"></canvas>

	
<script>
var ctx = document.getElementById("registrationChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["January", "Febuary", "March", "April", "May", "June", "July", "August","September","October","November","December"],
        datasets: [{
            label: '# of Enquiries',
            data: [12, 19, 3, 5, 2, 3],
            lineTension:0.5,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
               
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
