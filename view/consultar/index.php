    <?php require_once('../header/header.php') ?>
    <section class="principal">
        <div class="formulario">
            <div class="box">
                <a class="button" href="#popup1">Generar consulta</a>
            </div>
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h2>Consulta</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <form action="<?php echo constant('URL');?>consulta/registrarConsulta" method="POST" id="formConsulta">
                            <div class="consulta">
                                <label for="fecha_con">Fecha consulta</label>
                                <input type="date" name="fecha_con" id="fecha_con" min="2018-03-25">
                                <input type="time" name="hora_con" id="hora_con">
                            </div>
                            <p class="title">Datos de Paciente</p>
                            <div class="datos">
                                <input type="hidden" name="id_user" id="id_user" >
                                <div class="personales">
                                    <input type="text" name="nombres" id="nombres" placeholder="Nombres completos">
                                    <input type="number" name="dni" id="dni" maxlength="8" minlength="8" placeholder="Ingresar DNI">
                                </div>
                                <div class="cronologia">
                                    <input type="text" name="edad" id="edad" placeholder="Ingresar edad">
                                    <input type="date" name="fecha_nac" id="fecha_nac">
                                    <input type="text" name="telefono" id="telefono" placeholder="Ingrese teléfono">
                                </div>
                                <div class="direccion">
                                    <input type="text" name="ocupacion" id="ocupacion" placeholder="Ocupación">
                                    <input type="text" name="direccion" id="direccion" placeholder="Ingresar Dirección">
                                </div>
                                <div class="tipo">
                                    <select name="tipo_con" id="tipo_con">
                                        <option value="">Seleccion tipo de consulta</option>
                                        <option value="1">Medicina General</option>
                                        <option value="2">Cirugia Plastica</option>
                                    </select>
                                </div>
                                
                            </div>
                            <p class="title">Signos Vitales</p>
                            <div class="signos">
                                <div>
                                    <input type="text" name="sat" id="sat" placeholder="Sat O2">
                                    <input type="text" name="fc" id="fc" placeholder="FC">
                                    <input type="text" name="fr" id="fr" placeholder="FR">
                                    <input type="text" name="pa" id="pa" placeholder="PA">
                                    <input type="text" name="temp" id="temp" placeholder="T°">
                                    <input type="text" name="peso" id="peso" placeholder="Peso">
                                    <input type="text" name="talla" id="talla" placeholder="Talla">
                                    <input type="text" name="mic" id="mic" placeholder="MIC">
                                </div>
                            </div>
                            <div class="button">
                                <input type="button" value="Guardar Consulta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="listado">
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Fecha consulta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jeysson</td>
                        <td>Seclen Meoño</td>
                        <td>87456321</td>
                        <td>21/03/2021</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
            const fecha = new Date();
            let añoActual = fecha.getFullYear();
            let hoy = fecha.getDate();
            let mesActual = fecha.getMonth() + 1;
            let mes;
            if(mesActual < 9){
                mes = `0${mesActual}`
            }else{
                mes= mesActual;
            }

            let nodo = document.getElementById("fecha_con");
            let a = document.createAttribute("min");
            a.value = añoActual+'-'+mes+'-'+hoy;
            nodo.setAttributeNode(a);
            console.log(mes); //2020
        
            $('.button input[type="button"]').on('click',function(){
                $.ajax({
                    url : document.getElementById('formConsulta').action,
                    type: 'POST',
                    dataType: 'html',
                    data: $("#formConsulta").serialize(),
                    success: function(result){
                        if(result == "Error"){
                            alert('error')
                        }
                    }
                })
            })
        
    </script>
    <?php require_once('../footer/footer.php') ?>
</body>
</html>