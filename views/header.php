<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>


<form method='get' action='' id='form_lang' >
    Select Language : <select name='lang' onchange='changeLang();' >
        <option value='es' <?php if(isset($_GET['lang']) && $_GET['lang'] == 'es'){ echo "selected"; } ?> >Castellano</option>
        <option value='ca' <?php if(isset($_GET['lang']) && $_GET['lang'] == 'ca'){ echo "selected"; } ?> >Català</option>
    </select>
</form>