<template>
    <el-row :gutter="20">
      <el-col  :span="8">
        <el-form ref="form" :model="form" label-width="120px">
          <el-form-item label="name">
            <el-input v-model="form.name"></el-input>
          </el-form-item>
          <el-form-item label="bedrooms">
            <el-input v-model="form.bedrooms"></el-input>
          </el-form-item>
          <el-form-item label="bathrooms">
            <el-input v-model="form.bathrooms"></el-input>
          </el-form-item>
          <el-form-item label="storeys">
            <el-input v-model="form.storeys"></el-input>
          </el-form-item>
          <el-form-item label="garages">
            <el-input v-model="form.garages"></el-input>
          </el-form-item>
          <el-form-item label="min price">
            <el-input v-model="form.min_price"></el-input>
          </el-form-item>
          <el-form-item label="max price">
            <el-input v-model="form.max_price"></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">Search</el-button>
          </el-form-item>
        </el-form>
      </el-col>
      <el-col :span="16">
        <el-table
            v-loading="loading"
            stripe
            empty-text="There is nothing"
            :data="tableData">
          <el-table-column
              prop="name"
              label="Name">
          </el-table-column>
          <el-table-column
              prop="price"
              label="Price">
          </el-table-column>
          <el-table-column
              prop="bedrooms"
              label="Bedrooms">
          </el-table-column>
          <el-table-column
              prop="bathrooms"
              label="Bathrooms">
          </el-table-column>
          <el-table-column
              prop="storeys"
              label="Storeys">
          </el-table-column>
          <el-table-column
              prop="garages"
              label="Garages">
          </el-table-column>
        </el-table>
      </el-col>
    </el-row>
</template>

<script>
export default {
  data () {
    return {
      form     : {},
      tableData: [],
      loading  : false
    }
  },
  mounted () {
    console.log( 'Component mounted.' )
  },
  methods: {
    onSubmit () {
      this.loading = true
      axios.post( 'api/house', this.form )
           .then( ( resp ) => {
             this.tableData= resp.data.data
           } )
           .catch( ( e ) => {

           } )
           .finally( () => {
             this.loading = false
           } )
    }
  }
}
</script>
<style>
.el-row{
  margin:50px 0!important;
}
</style>
