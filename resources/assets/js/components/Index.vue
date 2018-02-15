<template>
    <div class="">

        <div>
            <h2>
                Ultimos Funcionários Cadastrados
            </h2>
        </div>
        <div> 
            <el-table
                :data="tableData"
                border
                style="width: 100%;top: 3px;">
                <el-table-column
                prop="date"
                label="Date"
                width="180">
                </el-table-column>
                <el-table-column
                prop="name"
                label="Name"
                width="180">
                </el-table-column>
                <el-table-column
                prop="email"
                label="E-mail">
                </el-table-column>
            </el-table>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        tableData: [{
          date: '2018-02-14',
          name: 'Tom',
          email: 'tom@gmail.com'
        }, {
          date: '2018-02-14',
          name: 'George',
          email: 'george@gmail.com'
        }, {
          date: '2018-02-14',
          name: 'Menphis',
          email: 'menphis@gmail.com'
        }, {
          date: '2018-02-14',
          name: 'Tomas',
          email: 'tomas@gmail.com'
        }]
      }
    }
  }
</script>