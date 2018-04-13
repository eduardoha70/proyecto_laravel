<template>
  <div>

    <button class="btn btn-default"
      @click.prevent="showModal = true"
    >
      Abrir modal
    </button>

    {{data}}

    <modal
      v-if="showModal"
      @close="showModal = false"
    >
      <h3 slot="header" class="modal-title">
        Modal title
      </h3>
    </modal>

    {{ productos }}

  </div>
</template>

<script>
  import Modal from './../../layouts/modal';

  export default{
    name: 'bandeja-productos',
    data(){
      return{
        showModal: false,
        productos: []
      }
    },
    mounted() {
      axios.get('/api/productos')
      .then((resp) => {
          this.productos = resp.data;
      }).catch(function (resp) {
          console.log(resp);
      });
    },
    components: {
      Modal
    },
    computed: {
      data(){
        let a = [2,3,1,10,8]
        return a.filter((item) => {
          return item > 4
        })
      }
    }
  }
</script>
