<template>
    <div>
        <el-menu mode="horizontal" :default-active="activeIndex" @select="handleSelect">
            <el-menu-item index="1" disabled>RiverWorkingSystem</el-menu-item>
            <el-menu-item index="2">TimeLine</el-menu-item>
            <el-menu-item index="3">Remind</el-menu-item>
            <el-menu-item index="4">Warning</el-menu-item>
            <el-menu-item index="5">Options</el-menu-item>
            <el-menu-item index="6">GithubanAnalytics</el-menu-item>
            <el-menu-item index="7">Settings</el-menu-item>
        </el-menu>
    </div>
</template>

<script>
export default {
    props : ['menu_index'],
    data : function() {
        var index = (this.menu_index) ? this.menu_index : "2";
        this.handleSelect(index);
        return {
            activeIndex : index
        }
    },
    methods: {
        handleSelect(key) {
            var data = {
                'currentIndex' : key
            };
            this.$parent.hub.$emit('update_main_content', data);
        }
    }
}
</script>

<style scoped>
.el-menu-item {
    font-size: 12px;
}
</style>
