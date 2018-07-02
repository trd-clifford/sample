<template>
    <div class="full-height">
        <div class="content">
            <keep-alive>
                <component v-bind:is="currentMainComponent"></component>
            </keep-alive>
        </div>
    </div>
</template>

<script>
var COMPONENT_LIST = {
    "2" : "main-content_time-line",
    "3" : "main-content_remind",
    "4" : "main-content_warning",
    "5" : "main-content_options",
    "6" : "main-content_github-analytics",
    "7" : "main-content_settings"
}
export default {
	props : ['menu_index'],
    data  : function() {
        return {
            currentMainComponent: this.get_component_name(this.menu_index)
        }
    },
    methods: {
        get_component_name : function(key) {
            return COMPONENT_LIST[key];
        },
        update_main_content: function(params) {
            history.pushState('RWS_STATE', '', '?menu=' + params.currentIndex );
            this.currentMainComponent = this.get_component_name(params.currentIndex);
        }
    },
    mounted: function() {
        this.$nextTick(function () {
            this.$parent.hub.$on('update_main_content', this.update_main_content);
        }.bind(this));
    }
}
</script>

<style scoped>
.content {
    margin: 10px;
    align-items: center;
    display: flex;
    justify-content: center;
}
</style>
