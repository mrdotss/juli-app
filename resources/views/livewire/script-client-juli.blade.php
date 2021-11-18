<!-- Javascripts -->
<script src="{{url('backend/dashboard/assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{url('backend/dashboard/assets/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{url('backend/dashboard/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('backend/dashboard/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('backend/dashboard/assets/js/connect.min.js')}}"></script>

<!-- Province API -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(function () {

    $('#id_card_province').on('change', function () {
        axios.post('{{ route('storeCity') }}', {id: $(this).val()})
            .then(function (response) {
                $('#id_card_city').empty();
                $.each(response.data, function (id, name) {
                    console.log(id, name);
                    $('#id_card_city').append(new Option(name, id))
                })
            });
        });

    $('#id_card_city').on('change', function () {
    axios.post('{{ route('storeDistrict') }}', {id: $(this).val()})
        .then(function (response) {
            $('#id_card_districts').empty();
            $.each(response.data, function (id, name) {

                $('#id_card_districts').append(new Option(name, id))
            })
        });
    });

    $('#id_card_districts').on('change', function () {
    axios.post('{{ route('storeVillage') }}', {id: $(this).val()})
        .then(function (response) {
            $('#id_card_village').empty();
            $.each(response.data, function (id, name) {

                $('#id_card_village').append(new Option(name, id))
            })
        });
    });

});

    $('input[type=file]').change(function(e) {
        $in = $(this);
        $in.next().html($in.val());
    });

    function thisFileUpload() {
            document.getElementById("file").click();
        };
</script>