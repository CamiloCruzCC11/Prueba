<template>
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
</template>
<script>
export default {
    mounted() {
        this.getEmpleados()
    },

    data(){
        return{
            empleados: [],
            aSelected: null,
            documento: '',
            nombres: '',
            apellidos: '',
            fecha_nac: '',
            sexo: '',
            est_civil: '',
            foto: '',
            cargo: '',
            est_contra: '',
            jefe: ''
        }
    },

    methods:{

        obtenerImagen(e){
        
        let file= 'sasasas.jpg';
        console.log(file);
        this.foto= file;
        // this.cargarImagen(file);

        },

        // cargarImagen(file){

        // let reader = new FileReader();

        // reader.onload = (e) => {
        // this.imagenMiniatura = e.target.result;
        // }

        // reader.readAsDataURL(file);

        // },

        getEmpleados(){

            var urlType= "empleados";
            axios.get(urlType).then(response=>
                {this.empleados = response.data;
                });

        },

        newEmpleado() {
            const params = {
                documento: this.documento,
                nombres: this.nombres,
                apellidos: this.apellidos,
                fecha_nac: this.fecha_nac,
                sexo: this.sexo,
                est_civil: this.est_civil,
                foto: this.foto,
                cargo: this.cargo,
                est_contra: this.est_contra,
                jefe: this.jefe
            };
            this.documento = '';
            this.nombres = '';
            this.apellidos = '';
            this.fecha_nac = '';
            this.sexo = '';
            this.est_civil = '';
            this.foto = '';
            this.cargo = '';
            this.est_contra = '';
            this.jefe = '';

            axios.post('empleados', params)
            .then((response) => {
                const empleados = response.data;
                this.$emit('new', empleados);
                // console.log(response.data);
            });

            $('#exampleModal').modal('hide');
        }
    },

}


</script>