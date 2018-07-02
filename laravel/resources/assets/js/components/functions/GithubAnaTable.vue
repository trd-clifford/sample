<template>
  <el-table
    :data="tableData4"
    style="width: 1000px"
    max-height="800">

    <el-table-column fixed prop="name" label="Name" width="100"></el-table-column>
    <el-table-column prop="h0900" label="09:00" width="100"></el-table-column>
    <el-table-column prop="h0905" label="09:05" width="100"></el-table-column>
    <el-table-column prop="h0910" label="09:10" width="100"></el-table-column>
    <el-table-column prop="h0915" label="09:15" width="100"></el-table-column>
    <el-table-column prop="h0920" label="09:20" width="100"></el-table-column>
    <el-table-column prop="h0925" label="09:25" width="100"></el-table-column>
    <el-table-column prop="h0930" label="09:30" width="100"></el-table-column>
    <el-table-column prop="h0935" label="09:35" width="100"></el-table-column>
    <el-table-column prop="h0940" label="09:40" width="100"></el-table-column>
    <el-table-column prop="h0945" label="09:45" width="100"></el-table-column>
    <el-table-column prop="h0950" label="09:50" width="100"></el-table-column>
    <el-table-column prop="h0955" label="09:60" width="100"></el-table-column>
    <el-table-column prop="h1000" label="10:00" width="100"></el-table-column>
    
    <el-table-column
      fixed="right"
      label="Detail"
      width="100">
      <template slot-scope="scope">
        <el-button
          @click.native.prevent="detailRow(scope.$index, tableData4)"
          type="text"
          size="small">
          Detail
        </el-button>
          <br>
          issue 4 (today) <br>
          done 2 (today) <br>
          issue 10 (mon) <br>
          done 5 (mon)
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
  export default {
    methods: {
      detailRow(index, rows) {
        alert(index);
      }
    },
    data() {
      return {
        tableData4: [
        {
          name: 'tokikawa',
          h0900: 'rws #123 In Progress',
          h0905: 'rws #123 In Progress',
          h0910: 'rws #123 In Progress',
          h0915: 'rws #123 In Progress',
          h0920: 'rws #123 In Done'
        },
        {
          name: 'ethel',
          h0920: 'rws #123 In Progress / rws #121 Done',
          h0925: 'rws #123 In Progress / rws #121 Done',
          h0930: 'rws #123 In Done'
        },
        {
          name: 'ethel',
          h0920: 'rws #123 In Progress / rws #121 Done',
          h0925: 'rws #123 In Progress / rws #121 Done',
          h0930: 'rws #123 In Done'
        },
        {
          name: 'ethel',
          h0920: 'rws #123 In Progress / rws #121 Done',
          h0925: 'rws #123 In Progress / rws #121 Done',
          h0930: 'rws #123 In Done'
        }
        ]
      }
    }
  }
</script>

<style scoped>
.el-table {
    font-size: 12px;
}
</style>
