<script>
    $(".container-click").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });


    $(document).ready(function () {

        let price_components = $('#salary, #vacancy, #number-days');
        var sal = $('#salary');
        var vac_required = $('#vacancy');
        var no_of_days = $('#number-days');

        var total = $('#total-wages');

        //Initialise the inputs

        total.val(0.00);
        sal.val(0);
        vac_required.val(0);
        no_of_days.val(0);

        //Do calculation here
        sal.keyup(function () {
            total.val(parseFloat(sal.val()) * parseFloat(vac_required.val()) * parseFloat(no_of_days.val()));
        });
        vac_required.keyup(function () {
            total.val(parseFloat(sal.val()) * parseFloat(vac_required.val()) * parseFloat(no_of_days.val()));
        });

        no_of_days.keyup(function () {
            total.val(parseFloat(sal.val()) * parseFloat(vac_required.val()) * parseFloat(no_of_days.val()));
        });

        console.log("faskljflasjdlfkalj");
        $('#vacancy1').keyup(function () {
            var salary = $('#salary').val();
            console.log('sdvbfd');
            if (salary) {
                $.ajax({
                    url: '{{ URL::to("/dashboard/employer/job/wages")}}',
                    type: "POST",
                    data: {sal: salary},
                    success: function (Response) {
                        console.log(Response);
                    },
                });
                console.log("good");
            }


        });
    });


</script>
