<template>
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <formempleados-component @new="addEmpleado"></formempleados-component>
        </div>
        <table class="table table-bordered" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="text-left">Id</th>
              <th scope="col" class="text-left">Documento</th>
              <th scope="col" class="text-left">Empleado</th>
              <th scope="col" class="text-left">Cargo</th>
              <th scope="col" class="text-left">Estado</th>
              <th scope="col" class="text-left">Jefe</th>
              <th scope="col" class="text-left">Opciones</th>
          </tr>
      </thead>
      <tbody>
        <tr v-for="empleado in empleados" :key="empleado.id" :empleado="empleado" >
            <th scope="row" class="text-left">000{{empleado.id}}</th>
            <th scope="row" class="text-left">{{empleado.documento}}</th>
            <th scope="row" class="text-left">{{empleado.nombres}} {{empleado.apellidos}}</th>
            <th scope="row" class="text-left">{{empleado.cargo}}</th>
            <th scope="row" class="text-left" v-if="empleado.est_contra==0">Inactivo</th>
            <th scope="row" class="text-left" v-if="empleado.est_contra==1">Activo</th>
            <th scope="row" class="text-left" v-if="empleado.jefe==0"></th>
            <th scope="row" class="text-left" v-for="jefe in empleados" :key="jefe.id" :jefe="jefe"  v-if="empleado.jefe!=0 && jefe.documento == empleado.jefe">{{jefe.nombres}} {{jefe.apellidos}}
            <br>{{jefe.cargo}}</th>
            <!-- <th scope="row" class="text-left" v-for="sub in empleados" :key="sub.id" :sub="sub"  v-if="sub.jefe==empleado.documento && empleado.length==1">
            <a href="" style="color: #FCCF1B">Editar</a> | <i style="color:#D32929; cursor: pointer;" v-on:click="deleteEmpleado(empleado)">Eliminar</i>  
            </th> -->
            <th scope="row" class="text-left"><a href="" style="color: #FCCF1B">Editar</a> | <i style="color:#D32929; cursor: pointer;" v-on:click="deleteEmpleado(empleado)">Eliminar</i></th>
        </tr>
    </tbody>
</table>
<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="container">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir tipo de producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" v-on:submit.prevent="newEmpleado()">
                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">Documento</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="documento" v-model="documento" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombres" v-model="nombres" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellidos" v-model="apellidos" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input class="form-control" type="date" name="fecha_nac" v-model="fecha_nac" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>

                            <div class="col-md-6">
                                <select class="custom-select" v-model="sexo" required>
                                    <option value="Masculino">Masculino</option>  
                                    <option value="Femenino">Femenino</option>   
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="est_civil" class="col-md-4 col-form-label text-md-right">Estado civil</label>

                            <div class="col-md-6">
                                <select class="custom-select" v-model="est_civil" required>
                                    <option value="Casado">Casado</option>  
                                    <option value="Soltero">Soltero</option>   
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Fotografía</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" @change="obtenerImagen" accept="image/*" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Buscar un archivo...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">Cargo</label>

                            <div class="col-md-6">
                                <select class="custom-select" v-model="cargo" required>
                                    <option value="Gerente">Gerente</option>  
                                    <option value="Sub Gerente">Sub Gerente</option>
                                    <option value="Administrador">Administrador</option>  
                                    <option value="Secretaria">Secretaria</option>   
                                    <option value="Operario">Operario</option> 
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="est_contra" class="col-md-4 col-form-label text-md-right">Estado del contrato</label>

                            <div class="col-md-6">
                                <select class="custom-select" v-model="est_contra" required>
                                    <option value="1">Activo</option>  
                                    <option value="0">Inactivo</option>   
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Jefe a Cargo</label>

                            <div class="col-md-6">
                                <select class="custom-select" v-model="jefe" required>
                                    <option v-for="empleado in empleados" :key="empleado.id" :empleado="empleado" :value="empleado.documento">{{empleado.nombres}} {{empleado.apellidos}}</option>    
                                </select>
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>   
                    </form>
                </div>

            </div>
        </div>
    </div>
    
</div> -->
</div>
</template>

<script>
import datables from 'datatables.net'
export default {
    mounted() {
        this.getEmpleados()
    },

    data(){
        return{
            empleados: [],
            filleEmpleados:{'id':'','documento':'','nombres':'','apellidos':''
            ,'fecha_nac':'','sexo':'','est_civil':'','foto':'','cargo':''
            ,'est_contra':'','jefe':''}
        }
    },

    methods:{

        mytable(){
            $(function () {
                $('#myTable').DataTable({

                    "columnDefs": [ {
                        "targets": [6],
                        "orderable": false
                    } ],

                    "pageLength": 5,
                    "bLengthChange" : false,
                    "bInfo":false, 
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast":"Último",
                            "sNext":"Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "sProcessing":"Procesando...",
                    } 
                });
            } );
        },

        getEmpleados(){

            var urlType= "empleados";
            axios.get(urlType).then(response=>
                {this.empleados = response.data;
                    this.mytable()
                });

        },

        addEmpleado() {

            $('#myTable').DataTable().destroy();
            var urlType= "empleados";
            axios.get(urlType).then(response=>
                {this.empleados = response.data;
                    this.mytable()
                });

            Swal.fire({
              type: 'success',
              title: '¡Guardado!',
              text: 'Los datos se guardaron correctamente.',
              showConfirmButton: false,
              timer: 1800
          });
            
        },
        deleteEmpleado(empleado) {
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-primary ml-2',
                cancelButton: 'btn btn-dark'
            },
            buttonsStyling: false
        })

            swalWithBootstrapButtons.fire({
                title: '¿Está seguro de borrar este empleado?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Sí, ¡eliminar!',
                reverseButtons: true
            }).then((result) => {
              if (result.value) {
                axios.delete(`empleados/${empleado.id}`).then(() => {
                    $('#myTable').DataTable().destroy();
                    var urlType= "empleados";
                    axios.get(urlType).then(response=>
                        {this.empleados= response.data;
                            this.mytable()
                        });
                });
                Swal.fire({
                  type: 'success',
                  title: '¡Eliminado!',
                  text: 'El empleado fue borrado correctamente.',
                  showConfirmButton: false,
                  timer: 1800
              });
            }
        })


        },
},

}
</script>
