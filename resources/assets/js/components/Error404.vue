<template>
    <div class="">
        <h1>404</h1>
        <b>Oops. Nada aqui para ser visto...</b>
        <p>
            <el-button v-show="canGoBack">
                Voltar
            </el-button>
            <el-button @click="$router.replace('/')">
                Inicio
            </el-button>
        </p>
    </div>
</template>

<script>
export default {
  data() {
    return {
      canGoBack: window.history.length > 1
    };
  },
  methods: {
    goBack() {
      this.$router.go(-1);
    }
  }
};
</script>