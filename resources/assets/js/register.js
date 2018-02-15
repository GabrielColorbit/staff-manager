import { email, minLength, required } from "vuelidate/lib/validators";
import { mapActions, mapGetters } from "vuex";

import App from "./app";
import store from "./store";

const app = new App({
  store,
  el: "#app",
  data() {
    return {
      form: {}
    };
  },
  validations: {
    form: {
      name: { required },
      email: { email, required },
      password: { minLength: minLength(4), required }
    }
  },
  computed: {
    ...mapGetters(["auth", "loggedIn"])
  },
  methods: {
    ...mapActions(["login"]),
    onSubmit(event) {
      const { form } = this.$v;
      form.$touch();
      const { $error } = form;

      if ($error) {
        // stop
        event.preventDefault();
        event.stopPropagation();

        this.$alert(
          "Verifique s dados do formulário e tente novamente",
          "Erro no formulário",
          {
            confirmButtonText: "OK"
          }
        );

        return !$error;
      }

      this.login(this.form);

      return !$error;
    }
  },
  mounted() {
    const { auth } = this;
    if (auth.remember) {
      this.form = auth;
    }
  }
});