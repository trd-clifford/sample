<template>

  <div class="block">
    <el-date-picker
      v-model="selected_date"
      type="date"
      placeholder="Pick a day"
      :picker-options="pickerOptions">
    </el-date-picker>
  </div>
  
  
</template>

<script>
export default {
data() {
  return {
    pickerOptions: {
      disabledDate(time) {
        return time.getTime() > Date.now();
      },
      shortcuts: [{
        text: 'Today',
        onClick(picker) {
          picker.$emit('pick', new Date());
        }
      }, {
        text: 'Yesterday',
        onClick(picker) {
          const date = new Date();
          date.setTime(date.getTime() - 3600 * 1000 * 24);
          picker.$emit('pick', date);
        }
      }, {
        text: 'A week ago',
        onClick(picker) {
          const date = new Date();
          date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
          picker.$emit('pick', date);
        }
      }]
    },
    selected_date: '',
  };
}
};
</script>

<style scoped>
.el-date-editor {
    margin-bottom: 10px;
}
</style>
