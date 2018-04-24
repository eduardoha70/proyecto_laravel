<template>
  <modal
    @cerrar="$emit('cerrar')"
    @guardar="guardar"
  >
    <h3 slot="header" class="modal-title">
      Registrar producto
    </h3>

    <form
      slot="body"
    >
      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback"
        :class="{'bad has-error': errors.has('producto')}"
      >
        <label for="producto">Descripcion</label>
        <input type="text"
          class="form-control"
          name="producto"
          placeholder="Descripcion de producto"
          v-validate="'required|min:5|max:250'"
          v-model="formData.descripcion"
        >
        <span class="help-block" v-text="errors.has('producto')
          ? errors.first('producto') : ''">
        </span>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback"
        :class="{'bad has-error': errors.has('precio')}"
      >
        <label for="precio">Precio</label>
        <input type="text"
          class="form-control"
          name="precio"
          placeholder="Precio"
          v-validate="'required'"
          v-model="formData.precio"
        >
        <span class="help-block" v-text="errors.has('precio')
          ? errors.first('precio') : ''">
        </span>
      </div>

    </form>
  </modal>
</template>

<script>
  import Modal from './../../layouts/modal';

  export default{
    name: 'modal-productos',
    components:{
      Modal
    },
    props:{
      producto:{
        required: false
      }
    },
    data(){
      return{
        formData:{
          descripcion: '',
          precio: '',
          ...this.producto
        }
      }
    },
    methods:{
      guardar() {
        axios.post('/api/productos', this.formData)
          .then((resp) => {
            this.$emit('cerrar')
          })
      }
    }
  }
</script>
