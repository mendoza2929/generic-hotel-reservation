<!-- JavaScript Bundle with Popper -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    function alerts(type,message){
        let bs_class = (type== 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML =`
        
        <div class="alert ${bs_class} alert-dismissible fade show text-center custom-alert" role="alert">
        <strong class="m-3">${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        
        `;

        document.body.append(element)
    }
</script>