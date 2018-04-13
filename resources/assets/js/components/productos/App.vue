<template>
  <div>
    <router-view v-if="!fetching"></router-view>
  </div>
</template>

<script>

  export default{
    data(){
      return{
        fetching: true
      }
    },
    beforeMount(){
      this.fetching = false
    }
  }

</script>
