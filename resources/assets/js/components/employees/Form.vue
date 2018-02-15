<template>
    <el-main>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span v-if="!form.id">Cadastro de Empregados</span>
                <span v-else>Editar Empregado</span>
            </div>
            <el-form ref="form" :model="form" width="100%">
                <el-form-item>
                    <el-col :span="11">
                        <el-form-item :error="$v.form.name.$error ? 'Nome inválido' : ''" label="Nome">
                            <el-input type="string" placeholder="Nome" v-model="form.name" clearable @blur="$v.form.name.$touch"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11" :offset="2" :error="$v.form.card_id.$error ? 'RG inválido' : ''">
                        <el-form-item label="RG">
                            <el-input placeholder="RG" type="tel" v-mask="'##.###.###-#'" v-model="form.card_id" @blur="$v.form.card_id.$touch"></el-input>
                        </el-form-item>
                    </el-col>
                </el-form-item>
                <el-form-item>
                    <el-col :span="11">
                        <el-form-item label="Telefone" :error="$v.form.phone.$error ? 'Telefone inválido' : ''">
                            <el-input placeholder="Telefone" type="tel" v-model="form.phone" v-mask="['(##) ####-####', '(##) #####-####']" @blur="$v.form.phone.$touch"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11" :offset="2">
                        <el-form-item label="E-mail" :error="$v.form.email.$error ? 'E-mail inválido' : ''">
                            <el-input placeholder="E-mail" type="email" v-model="form.email" @blur="$v.form.email.$touch"></el-input>
                        </el-form-item>
                    </el-col>
                </el-form-item>
                <el-form-item>
                    <el-col :span="11">
                        <el-form-item label="Endereço" :error="$v.form.address.$error ? 'Endereço inválido' : ''">
                            <el-input type="text" placeholder="Endereço" v-model="form.address" @blur="$v.form.address.$touch"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="5" :offset="2">
                        <el-form-item label="Dependentes" :error="$v.form.dependents.$error ? 'Número inválido' : ''">
                            <el-input-number v-model="form.dependents" controls-position="right" :value="0" :min="0" :max="10" @blur="$v.form.dependents.$touch"></el-input-number>
                        </el-form-item>
                    </el-col>
                </el-form-item>
                <el-form-item>
                    <el-col :span="6">
                        <el-form-item label="Gênero" :error="$v.form.gender.$error ? 'Gênero inválido' : ''">
                            <el-select v-model="form.gender" placeholder="Select" @blur="$v.form.gender.$touch">
                                <el-option v-for="item in genders" :key="item.value" :label="item.label" :value="item.value" width="80%">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="8" :offset="1">
                        <el-form-item label="Data Contratação" :error="$v.form.hired_at.$error ? 'Data inválida' : ''">
                            <el-date-picker type="date" placeholder="Data Contratação" format="dd/MM/yyyy" value-format="yyyy-MM-dd HH:mm:ss" v-model="form.hired_at" @blur="$v.form.hired_at.$touch"></el-date-picker>
                        </el-form-item>
                    </el-col>
                    <el-col :span="8" :offset="1">
                        <el-form-item label="Data Demissão" :error="$v.form.fired_at.$error ? 'Data inválida' : ''">
                            <el-date-picker type="date" placeholder="Data Demissão" format="dd/MM/yyyy" value-format="yyyy-MM-dd HH:mm:ss" v-model="form.fired_at" @blur="$v.form.fired_at.$touch"></el-date-picker>
                        </el-form-item>
                    </el-col>
                </el-form-item>

                <el-form-item>
                    <el-button @click="$router.go(-1)">Voltar</el-button>
                    <el-button type="success" @click="confirmSave">Salvar</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </el-main>


</template>
<script>
import moment from "moment";
import service from "../../services/employees";
import { email, date, minLength, required, phone } from "vuelidate/lib/validators";
import { mapActions, mapGetters } from "vuex";

export default {
  data() {
    return {
      form: {},
      hired_at: null,
      fired_at: null,
      genders: [
        { value: "M", label: "Masculino" },
        { value: "F", label: "Feminino" }
      ]
    };
  },
  validations: {
    form: {
      name: { required },
      card_id: { minLength: minLength(9), required },
      phone: { minLength: minLength(11), required },
      email: { email, required },
      gender: { required },
      address: { required },
      dependents: { required },
      hired_at: {  required },
      fired_at: {  required }
    }
  },
  methods: {
    save() {
      const promisse = this.form.id
        ? service.put(this.form.id, this.form)
        : service.post(this.form);

      promisse
        .then(response => {
            this.form = response.data;
            this.$message({
                type: 'success',
                message: 'Funcionário Salvo com Sucesso'
            });
        })
        .catch(error => {
            this.$message({
                type: 'danger',
                message: error.message
            });
        });
    },
    confirmSave() {
        if(this.$v.form.$invalid) {
            this.$message({
                message: 'Favor preencher todos os campos do formulário.',
                type: 'warning'
            });
        }else{
            this.$confirm('', 'Salvar Funcionário?', {
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            type: 'warning'
            }).then(() => {
                this.save();
            }).catch();
           
        }
    }
  },
  mounted() {
    const { id } = this.$route.params;
    if (id) {
      service
        .get(id)
        .then(response => {
          this.form = response.data;
        })
        .catch(error => {
          // TODO: add some message
        });
    }
  }
};
</script>

