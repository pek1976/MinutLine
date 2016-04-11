<script>
//codigo javascript
function validateForms()
{
    myform = document.myform;
    if(myform.username.value == "" ||  myform.password.value == ""){
        alert('Ingrese los datos del formulario!');
        myform.username.focus();
        return false;
    }
    return true;
}
</script>
<h2>Login</h2>
<?php 
//pasamos atributos propieos de un form comun, mas la validacion!
$atributos = array('onSubmit' => 'return validateForms()', 'name' => 'myform');
//generamos el tag form
echo form_open('login/procesarFormulario', $atributos); 
?>
    
<h5>Usuario</h5>
<input type="text" name="username" value="" size="20" />

<h5>Password</h5>
<input type="password" name="password" value="" size="20" />

<div><input type="submit" value="Enviar" /></div>

</form>
