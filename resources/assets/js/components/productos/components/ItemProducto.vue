<template>
  <tr>
    <td>{{producto.descripcion}}</td>
    <td>{{producto.precio}}</td>
    <td>
      <a href="#"
        @click.prevent="showModal = true"
      >
        <i class="fa fa-edit"></i>
      </a>

      <a href="#"
        @click.prevent="borrar(producto.id)"
      >
        <i class="fa fa-trash"></i>
      </a>
    </td>
    <modal-productos
      v-if="showModal"
      :producto="producto"
      @cerrar="showModal = false"
    >
    </modal-productos>
  </tr>
</template>

<script>
  import ModalProductos from './ModalProductos'

  const sweetAlertConfig = {
    title: '¿Está seguro de borrar este articulo?',
    text: "Esta cambio no se puede revertir",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Aceptar',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar'
  }

  export default{
    name:'item-productos',
    components: {
      ModalProductos
    },
    data(){
      return{
        showModal: false
      }
    },
    props: {
      producto:{
        required: true
      },
      productos:{
        required: true
      }
    },
    methods:{
      borrar(id){
        let that = this
        this.$swal(sweetAlertConfig)
        .then(() => {
          axios.delete('/api/productos/' + id).then(() => {
            let index = this.productos.findIndex(item => item.id === id);
            this.productos.splice(index, 1);
          })
        }).catch((resp) => {
          console.log(resp)
        });
      }
    }
  }
</script>
