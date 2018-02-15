<template>
  <el-main>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <span>Empregados</span>
        <el-button @click="$router.push('/employees/add')">Adicionar</el-button>
      </div>
      <el-table :data="list" style="width: 100%" height="500">
        <el-table-column prop="name" label="Name"></el-table-column>
        <el-table-column prop="address" label="Address"></el-table-column>
        <el-table-column prop="email" label="E-mail"></el-table-column>
        <el-table-column prop="phone" label="Telefone"></el-table-column>
        <el-table-column prop="gender" label="Gênero" :formatter="genderFormatter" width="100px"></el-table-column>
        <el-table-column prop="dependents" label="Dependentes" align="right"></el-table-column>
        <el-table-column prop="hired_at" label="Data Contratação" :formatter="dateFormatter" align="center" width="150px"></el-table-column>
        <el-table-column prop="fired_at" label="Data Demissão" :formatter="dateFormatter" align="center"></el-table-column>
        <el-table-column fixed="right" width="120">
          <template slot-scope="scope">
            <el-button type="primary" icon="el-icon-edit" size="mini" @click="$router.push(`/employees/edit/${scope.row.id}`)"></el-button>
          </template>
        </el-table-column>
      </el-table>

    </el-card>
  </el-main>
</template>

<script>
import service from "../../services/employees";
import moment from "moment";

export default {
  data() {
    return {
      list: []
    };
  },
  methods: {
    dateFormatter(row, column, cellValue) {
      return moment(cellValue).format("DD/MM/YYYY");
    },
    genderFormatter(row, column, cellValue) {
      return ["Masculino", "Feminino", "Outro"]["MFO".indexOf(cellValue)];
    }
  },
  mounted() {
    service.get().then(response => {
      this.list = response.data;
    });
  }
};
</script>

